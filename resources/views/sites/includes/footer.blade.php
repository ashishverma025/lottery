
@if($active != 'userProfile' && $active != 'invitefriend')
</div>
</div>
@endif



<script type="text/javascript" src="{{ asset('public/sites/users/js/jquery.validate.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/sites/users/js/range_slider.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/sites/users/js/common.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/sites/users/js/jquery-ui.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/sites/users/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/sites/users/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/sites/users/js/smoothscroll.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/sites/users/js/ion.rangeSlider.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/sites/users/js/easyResponsiveTabs.js')}}"></script>
<script type='text/javascript' src="{{ asset('public/sites/users/js/jquery.slimscroll.min.js?ver=4.2.5')}}"></script>
<script type="text/javascript" src="{{ asset('public/sites/users/js/sweetalert.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/sites/users/js/validation.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/sites/users/js/footable.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/sites/users/js/footable.paginate.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/sites/users/js/jquery.jqpagination.js')}}"></script>

<script type="text/javascript" src="{{ asset('public/sites/users/js/jquery.tablesorter.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/sites/users/js/formValidation.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/sites/users/js/bootstrap.min2.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/sites/users/js/jquery.steps.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/sites/users/js/bootbox.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/sites/users/js/bootstrap-filestyle.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/sites/users/js/jquery.auto-complete.js')}}"></script>
<script type="text/javascript" src="{{ asset('public/sites/users/js/jquery.Jcrop.js')}}"></script>
<script type="text/javascript" src="{{url('public/sites/users/js/sticky-kit.js')}}"></script>

<script>

$('#tutor-slider').owlCarousel({
    loop:true,
    margin:10,
    navigation : true,
    dots: false,
      //navigationText : ['<span class="fa-stack"><i class="fa fa-circle fa-stack-1x"></i><i class="fa fa-chevron-circle-left fa-stack-1x fa-inverse"></i></span>','<span class="fa-stack"><i class="fa fa-circle fa-stack-1x"></i><i class="fa fa-chevron-circle-right fa-stack-1x fa-inverse"></i></span>'],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
})

</script>







		 <script type="text/javascript">
 $(".add-more").click(function()
     {
       var btn_id=$(this).attr('id');
        if (btn_id=="h") {
            
            $(".more_verify").toggle();
        } else {
           
            $(".more_verify").toggle();
         }

     });
</script>




