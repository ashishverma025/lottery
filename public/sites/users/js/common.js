/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



var html = $('#webcam_div').html();
$(document).on('click', '.cancela', function () {
    $('#webcam_div').html('');
    $('#webcam_div').html(html);
});
$('.webcamera').click(function (e) {
    e.preventDefault();
    $('#webcam_div').html('');
    $('#webcam_div').html('<video id="video" width="250" height="200" autoplay></video><button type="button" class="snap-btn" id="snap">Snap Photo</button><button type="button" class="snap-btn" id="cancela">Cancel</button><canvas id="canvas" style="display:none;" width="640" height="480"></canvas>');
    var canvas = document.getElementById('canvas');
    var context = canvas.getContext('2d');
    var video = document.getElementById('video');
    var mediaConfig = {video: true};
    var errBack = function (e) {
        console.log('An error has occurred!', e)
    };

    // Put video listeners into place
    if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
        navigator.mediaDevices.getUserMedia(mediaConfig).then(function (stream) {
            video.src = window.URL.createObjectURL(stream);
            video.play();
        });
    }

    /* Legacy code below! */
    else if (navigator.getUserMedia) { // Standard
        navigator.getUserMedia(mediaConfig, function (stream) {
            video.src = stream;
            video.play();
        }, errBack);
    } else if (navigator.webkitGetUserMedia) { // WebKit-prefixed
        navigator.webkitGetUserMedia(mediaConfig, function (stream) {
            video.src = window.webkitURL.createObjectURL(stream);
            video.play();
        }, errBack);
    } else if (navigator.mozGetUserMedia) { // Mozilla-prefixed
        navigator.mozGetUserMedia(mediaConfig, function (stream) {
            video.src = window.URL.createObjectURL(stream);
            video.play();
        }, errBack);
    }

    // Trigger photo take
    document.getElementById('snap').addEventListener('click', function () {
        context.drawImage(video, 0, 0, 640, 480);
        var image = canvas.toDataURL("image/jpeg", 0.85);
        jQuery.ajax({
            type: "POST",
            url: "/updateprofile",
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            data: {img: image},
            success: function (data) {
            }
        });
    });
});





/*
 * Function for reset form by formid
 * @param string
 * @param string
 */
function ResetForm(myFormId) {
    document.getElementById(myFormId).reset();
}

/*
 * Function for Priview Image
 * @param string
 * @param string
 */
function readURL(input, divID) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        $('#' + divID).show()
        reader.onload = function (e) {
            $('#' + divID).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

/*
 * Function to show notification alerts
 * @param string
 * @param string
 */
function showNotification(alertType, message)
{
    $('#notification_modal').find('.modal-header').html(alertType);
    $('#notification_modal').find('.modal-body').html(message);
    $('#notification_modal').modal('show');
}

$(document).on('click', '#verifyOtp', function () {
    var otp = $('#otp').val();
    var phone = $('#phone').val();
    if (phone == '') {
        swal({title: "Error!", text: "Please enter phone number", type: "error"});
        return false;
    }
    var otpDetails = $("#otp").attr('otp-data')
    $("#otpdiv").removeClass('notvalidate')
    $("#otpdiv").removeClass('validate')
    if (otp.length == 6) {
        if (!otp.match('[0-9]{6}')) {
            $("#otpdiv").addClass('notvalidate')
            swal({title: "Error!", text: "OTP is not valid", type: "error"});
            return false;
        } else {
            $.ajax({
                url: $('meta[name="route"]').attr('content') + '/validateotp',
                method: 'post',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {'otp': otp, 'otpDetails': otpDetails},
                success: function (response) {
                    if (response.Status == 'Success') {
                        $("#countrydiv,#numberdiv").addClass('validate')
                        $("#countrydiv,#numberdiv").addClass('validate')
                        $("#otpdiv").addClass('validate')
                        $("#verifyOtp").attr('disabled', true)
                        $("#otp").attr('disabled', true)
                        setTimeout(function () {
                            location.reload()
                        }, 2000);

                    }
                }
            });
        }
    } else {
        $("#otpdiv").addClass('notvalidate')
        swal({title: "Error!", text: "OTP is not valid", type: "error"});
        return false;
    }
});

function verifyMobile(number) {
    $("#countrydiv,#numberdiv").removeClass('notvalidate')
    $("#countrydiv,#numberdiv").removeClass('validate')
    var isVerified = $("#isVerified").val();
    if (number.length == 10) {
        if (!number.match('[0-9]{10}')) {
            $("#countrydiv,#numberdiv").addClass('notvalidate')
            swal({title: "Error!", text: "Please put 10 digit mobile number", type: "error"});
            return 'Error';
        } else {
            if (isVerified == 'No') {
                $.ajax({
                    url: $('meta[name="route"]').attr('content') + '/sendotp',
                    method: 'post',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data: {'phone': number},
                    success: function (response) {
                        if (response.Status == 'Success') {
                            $("#countrydiv,#numberdiv").addClass('validate')
                            $("#otpSection").show()
                            $("#success_msg").show()
                            $("#otp").attr('otp-data', response.Details)
                            $("#isVerified").val('Yes');
                            swal({title: "Success!", text: "OTP has been send to your mobile number", type: "success"});

                        } else {
                            swal({title: "Error!", text: response.Details, type: "error"});
                            $("#phone").css('border', '2px solid #ff5a5f')
                        }
                        return response.Status;
                    }
                });
                return 'Success';
            }
        }
    } else {
        $("#countrydiv,#numberdiv").addClass('notvalidate')
        swal({title: "Error!", text: "Please put 10  digit valid mobile number", type: "error"});
        return 'Error';
    }
}

$(document).ready(function () {
    // To edit user
    $(document).on('click', '#edit_profile', function () {
        var userId = $(this).attr('userID');
        var isVerified = $("#isVerified").val();

        var phone = $('#phone').val();
        var alternatenumber = $('#alternatephone').val();
        if (phone != '' && isVerified == 'No') {
            var verifiedNumber = $("#verifiedNumber").val();
            var res = verifyMobile(phone)
            if (res != 'Success') {
                return false;
            }
        }

        if (alternatenumber != '') {
            if (!alternatenumber.match('[0-9]{10}') || alternatenumber.length != 10) {
                $("#countrydiv,#numberdiv").addClass('notvalidate')
                swal({title: "Error!", text: "Please put 10 digit alternate mobile number", type: "error"});
                return 'Error';
            }
        }

        $this = $(this);
        var form_data = new FormData();
        var user_image = $('#user_image').prop('files')[0];
        // for image file
        form_data.append('user_image', user_image);

        // for rest data
        form_data.append('fname', $('#fname').val());
        form_data.append('lname', $('#lname').val());
        form_data.append('email', $('#email').val());
        form_data.append('contact', $('#phone').val());
        form_data.append('address', $('#address').val());
        form_data.append('gender', $('#gender').val());
        form_data.append('alternatephone', $('#alternatephone').val());
        form_data.append('months', $('#months').val());
        form_data.append('years', $('#years').val());
        form_data.append('days', $('#days').val());
        form_data.append('user_id', userId);
        console.log(form_data)
        if (userId != '')
        {
            // Get the details of the selected agency
            $.ajax({
                url: $('meta[name="route"]').attr('content') + '/updateprofile',
                method: 'post',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: form_data,
                cache: false,
                contentType: false,
                processData: false,
                success: function (response) {
                    // Auto-fill the form
                    $('#frm_add_user #fname').val(userId);
                    $('#frm_add_user #lname').val(response.name);
                    $('#frm_add_user #email').val(response.email);
                    $('#frm_add_user #phone').val(response.contact);
                    $('#frm_add_user #address').val(response.address);
                    // Show the modal
                    if (response.resCode == 0) {
                        window.location.reload();
                    }
                    if (response.profile_image != '' && response.profile_image != null) {
                        $('#userImg').show()
                        $('#userImg').attr('src', '/admn/images/profile/' + userId + '/' + response.profile_image)
                        $('#datatable_user').DataTable().ajax.reload();

                    } else {
                        $('#userImg').hide()
                    }
                }
            });
        } else
        {
            showNotification('Alert', 'Missing service category id');
        }
    });




    /* ---------- User ---------- */

//    $.fn.dataTableExt.errMode = 'ignore';
//    $('#datatable_user').dataTable({
//        sServerMethod: "get",
//        bProcessing: true,
//        bServerSide: true,
//        sAjaxSource: $('meta[name="route"]').attr('content') + '/admin/fetchuser',
//        language: {
//            processing: '<img src="' + $('meta[name="route"]').attr('content') + '/admin/images/ajax-loader.gif">'
//        },
//        "columnDefs": [
//            {"className": "dt-center", "targets": [0, 7]}
//        ],
//        "aoColumns": [
//            {'bSortable': true, "width": "10%"},
//            {'bSortable': false},
//            {'bSortable': false},
//            {'bSortable': false},
//            {'bSortable': true},
//            {'bSortable': false},
//            {'bSortable': true},
//            {'bSortable': false}
//        ]
//    });
    // To add a new user
    $('#btn_show_user_modal').click(function () {
        ResetForm('frm_add_user');
        $('#frm_add_user #user_id').val('');
        $('#modal_user').modal({backdrop: 'static', keyboard: false});
    });
    $('#frm_add_user').submit(function (e) {
        e.preventDefault();
    });
//    $('#frm_add_user').validate({
//        rules: {
//            user_name: {
//                required: true
//            },
//            user_email: {
//                required: true
//            },
//            user_contact: {
//                required: true
//            },
//            user_address: {
//                required: true
//            }
//        },
//        messages: {
//            user_name: {
//                required: 'Please enter name'
//            },
//            user_email: {
//                required: 'Please enter slug'
//            },
//            user_contact: {
//                required: 'Please enter contact'
//            },
//            user_address: {
//                required: 'Please enter address'
//            },
//        }
//    });
    // Save data
    $('#btn_save_user').click(function (e) {
        $this = $(this);
        var form_data = new FormData();
        var user_image = $('#user_image').prop('files')[0];

        // for image file
        form_data.append('user_image', user_image);

        // for rest data
        form_data.append('name', $('#user_name').val());
        form_data.append('email', $('#user_email').val());
        form_data.append('contact', $('#user_contact').val());
        form_data.append('address', $('#user_address').val());
        form_data.append('status', $('#user_status').val());
        form_data.append('user_id', $('#user_id').val());

        $.ajax({
            url: $('meta[name="route"]').attr('content') + '/admin/saveuser',
            method: 'post',
            data: form_data,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function () {
                // Show the loading button
                $this.button('loading');
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            complete: function ()
            {
                // Change the button to previous
                $this.button('reset');
            },
            success: function (response) {
                if (response.resCode == 0)
                {
                    // Close the modal
                    $('#modal_user').modal('hide');

                    // Refresh the form
                    $('#frm_add_user')[0].reset();

                    // Show the alert
                    showNotification('Success', response.resMsg);

                    // Refresh the datatable
                    $('#datatable_user').DataTable().ajax.reload();
                } else
                {
                    showNotification('Alert', response.resMsg);
                }
            }
        });
    });



    $(document).on('click', '.delete_user', function () {
        $this = $(this);
        if (confirm('Are you sure?'))
        {
            userId = $(this).attr('id');
            $.ajax({
                url: $('meta[name="route"]').attr('content') + '/admin/deleteuser',
                method: 'post',
                beforeSend: function () {
                    $this.button('loading');
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                complete: function () {
                    $this.button('reset');
                },
                data: {userId: userId},
                success: function (response) {
                    // Show the alert
                    showNotification('Success', response.resMsg);
                    // Refresh the datatable
                    $('#datatable_user').DataTable().ajax.reload();
                }
            });
        }
    });
})
/* ---------- End User ---------- */


// Price range slider shop
$(document).ready(function() {
  $('.noUi-handle').on('click', function() {
    $(this).width(50);
  });
  var rangeSlider = document.getElementById('slider-range_v5');
  var moneyFormat = wNumb({
    decimals: 0,
    thousand: ',',
    //prefix: '£'
  });
  noUiSlider.create(rangeSlider, {
    start: [0, 10000],
    step: 1,
    range: {
      'min': [0],
      'max': [10000]
    },
    format: moneyFormat,
    connect: true
  });
 
  rangeSlider.noUiSlider.on('update', function(values, handle) {
    document.getElementById('slider-range-value5').innerHTML = values[0];
    document.getElementById('slider-range-value6').innerHTML = values[1];
    document.getElementsByName('min-value').value = moneyFormat.from(
      values[0]);
    document.getElementsByName('max-value').value = moneyFormat.from(
      values[1]);
  });
  
});


