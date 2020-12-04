<!DOCTYPE html>
<html lang="en">
<head>
   <title>Business-details</title>
   <meta charset="utf-8">
   <meta name="csrf-token" content="{{ csrf_token() }}">
   <meta name="route" content="{{ url('/') }}">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="{{ url('public/wippli/css/bootstrap.min.css') }}">

   <!-- <script src="js/slider.js"></script> -->
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
   <link rel="stylesheet" href="{{ url('public/wippli/css/main.css') }}">
</head>
<body>
   <style>.has-error{color:red}</style>

   <!--------------------------  form1  -------------------------->
   <section class="form1 form business_form">
      <div class="container">
         <div class="row">
            <div class="col-lg-9">
               <div class="form_inner">
                  <div class="header">
                     <div class="row">
                        <div class="col-lg-6">
                           <div class="logo">
                              <img src="{{url('public/wippli/img/logo.jpg')}}" alt="logo">
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <div class="logo-right-txt text-right">
                              <p class="user">User
                                 <!--   <img src="img/Group%201087.png" alt="ftr-logo">  -->
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-txt">
                     <div class="tabs">

                        @if(session()->has('message.level'))
                        <div class="alert alert-{{ session('message.level') }}"> 
                           {!! session('message.content') !!}
                        </div>
                        @endif
                        <p class="header_txt">Please complete all the required information</p>
                        <ul class="nav nav-tabs">
                           <li class="active"><a data-toggle="tab" href="#home">Business</a></li>
                           <li id="{{empty($businessList)?'notAllowed':''}}"><a data-toggle="tab" href="#menu1" >Contact</a></li>
                        </ul>

                        <div class="tab-content">

                           <div id="home" class="tab-pane fade in active">
                              <form action="save-business-details" id="businessForm"  method="post" enctype="multipart/form-data">
                                 @csrf
                                 <div class="row row-border-dash" id="BA">
                                    <div class="col-lg-12">
                                       <h3>Business Details</h3>
                                    </div>
                                 </div>

                              <div class="row">
                               <div class="col-lg-6">
                                 <div class="form-group">
                                    <label>Business Name <span>*</span></label>
                                    <input type="text" name="business_name" class="form-control"  placeholder="{Businessname}">
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label>Business legal name <span>*</span></label>
                                    <input type="text" name="business_legal_name" class="form-control"  placeholder="{Businessname}">
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label>Business Branch/Location <span>*</span></label>
                                    <input type="text" name="business_branch" class="form-control"  placeholder="{Businessnumber}">
                                 </div>
                              </div>
                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label>Industry <span>*</span></label>
                                    <input type="text" name="industry" class="form-control"  placeholder="{Businessindustry}">
                                 </div>
                              </div>
                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label>Business Short Name <span>*</span></label>
                                    <input type="text" name="business_sort_name" class="form-control"  placeholder="{Businesssystemname}">
                                 </div>
                              </div>
                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label>Business Initials <span>*</span></label>
                                    <input type="text" name="business_initials" class="form-control"  placeholder="{Businessinitials}">
                                 </div>
                              </div>
                           </div>

                           <div class="row">
                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label>Business Number <span>*</span></label>
                                    <input type="text" name="business_number" class="form-control"  placeholder="{Businessnumber}">
                                 </div>
                              </div>
                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label>Business Number Type <span>*</span></label>
                                    <input type="text" name="business_number_type" class="form-control"  placeholder="{bnumbertype}">
                                 </div>
                              </div>
                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label>Tax number <span>*</span></label>
                                    <input type="text" name="tax_number" class="form-control"  placeholder="{Businesstaxname}">
                                 </div>
                              </div>
                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label>Tax Number Type <span>*</span></label>
                                    <input type="text" name="tax_number_type" class="form-control"  placeholder="{taxnumbertype}">
                                 </div>
                              </div>
                           </div>

                           <div class="row row-border-dash" id="ADD">
                              <div class="col-lg-12">
                                 <h3>Address</h3>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label>Country <span>*</span></label>
                                    <input type="text" name="country" class="form-control"  placeholder="{businesscountry}">
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label>State <span>*</span></label>
                                    <input type="text" name="state" class="form-control"  placeholder="{businesstate}">

                                 </div>
                              </div>
                           </div>

                           <div class="row">
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label>Address line 1 <span>*</span></label>
                                    <input type="text" name="address1" class="form-control"  placeholder="{businessaddress1}">

                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label>Address line 2 <span>*</span></label>
                                    <input type="text" name="address2" class="form-control"  placeholder="{businessaddress2}">

                                 </div>
                              </div>
                           </div>

                           <div class="row row-border-dash">
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label>City <span>*</span></label>
                                    <input type="text" name="city" class="form-control"  placeholder="{businesscity}">

                                 </div>
                              </div>
                              <div class="col-lg-4">
                                 <div class="form-group">
                                    <label>Post code <span>*</span></label>
                                    <input type="number" name="post_code" class="form-control"  placeholder="{businesspostcode}">

                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label>Business E-mail</label>
                                    <input type="text" name="email" id="businessEmail" class="form-control"  placeholder="{businessemail}">
                                    <span id="businessEmailErr" style="color:red"></span>
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label>Contact name (Admin)</label>
                                    <input type="text" name="contact" class="form-control"  placeholder="{Businesscontactname}">
                                 </div>
                              </div>
                           </div>
                           <div class="row row-border-dash" id="R&P">
                              <div class="col-lg-12">
                                 <h3>Roles and permissions</h3>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label>Type of Business <span>*</span></label>
                                    <select name="business_type" id="" class="form-control" >
                                       <!-- <option disabled>{Businesstype}</option> -->
                                       <option value="My Own Business">My Own Business</option>
                                       <option value="Agency">Agency</option>
                                       <option value="Supplier">Supplier</option>
                                       <option value="Client">Client</option>
                                    </select>

                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label>Afiliation <span>*</span></label>
                                    <!-- <input type="text" name="afiliation" class="form-control"  placeholder="{Businessafiliation}"> -->
                                    <select name="afiliation" id="" class="form-control" >
                                       <option value="Agent">Agent</option>
                                       <option value="Associate">Associate</option>
                                       <option value="Freelancer">Freelancer</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                           <div class="row row-border-dash">
                              <div class="col-lg-12">
                                 <h3>Social</h3>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label>Linkedin</label>
                                    <input type="text" name="linkedin" class="form-control"  placeholder="{businesslinkedin}">
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label>Twitter</label>
                                    <input type="text" name="twitter" class="form-control"  placeholder="{businesstwitter}">

                                 </div>
                              </div>
                           </div>
                           <div class="row row-border-dash">
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label>Instagram</label>
                                    <input type="text" name="instagram" class="form-control"  placeholder="{businessinstagram}">
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label>Facebook</label>
                                    <input type="text" name="facebook" class="form-control"  placeholder="{businessfacebook}">
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label>Youtube</label>
                                    <input type="text" name="youtube" class="form-control"  placeholder="{businessyoutube}">
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label>Anything else</label>
                                    <input type="text" name="anythingelse" class="form-control"  placeholder="{businessanythingelse}">
                                 </div>
                              </div>
                           </div>
                           <div class="row row-border-dash">
                              <div class="col-lg-12">
                                 <h3>Branding</h3>
                              </div>
                           </div>
                           <div class="row grey_row">
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label>Colour Logo file(png,svg-600x400px)</label>
                                    <input type="file" name="logocolours" class="form-control" onchange= "readURL(this, 'businessColorLogo')"  placeholder="{businesslogocolours}">
                                    <img draggable = "true" id="businessColorLogo" height="40" width="40">

                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label>Color icon file(png,svg-600x400px)</label>
                                    <input type="file" name="coloricon" class="form-control" onchange= "readURL(this, 'businessColorIcon')"  placeholder="{businessiconcolours}">
                                    <img draggable = "true" id="businessColorIcon" height="40" width="40">

                                 </div>
                              </div>
                           </div>
                           <div class="row grey_row row-border-dash">
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label>Negative Logo file(png,svg-600x400px)</label>
                                    <input type="file" name="negativelogo" class="form-control" onchange= "readURL(this, 'businessNegativeLogo')"  placeholder="{businesslogonegative}">
                                    <img draggable = "true" id="businessNegativeLogo" height="40" width="40">

                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label>Negative icon file(png,svg-600x400px)</label>
                                    <input type="file" name="iconnegative" class="form-control" onchange= "readURL(this, 'businessNegativeIcon')"  placeholder="{businessiconnegative}">
                                    <img draggable = "true" id="businessNegativeIcon" height="40" width="40">

                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label>Primary Dark colour 1 <span>*</span></label>
                                    <input type="color" name="primarydarkcolour1" class="form-control" value="#36872c" placeholder="{PrimaryDarkcolour1}">
                                 </div>
                              </div>
                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label>Primary Dark colour 2 <span>*</span></label>
                                    <input type="color" name="primarydarkcolour2" class="form-control" value="#3b4263" placeholder="{PrimaryDarkcolour2}">

                                 </div>
                              </div>
                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label>Primary Light colour 1 <span>*</span></label>
                                    <input type="color" name="primarylightcolour1" class="form-control" value="#613838" placeholder="{PrimaryLightcolour1}">
                                 </div>
                              </div>
                              <div class="col-lg-3">
                                 <div class="form-group">
                                    <label>Primary Light colour 2 <span>*</span></label>
                                    <input type="color" name="primarylightcolour2" class="form-control" value="#d991ca"  placeholder="{PrimaryLightcolour2}">

                                 </div>
                              </div>
                           </div>
                           <div class="row row-border-dash">
                              <div class="col-lg-12">
                                 <h3>File Management</h3>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label>G-drive directory <span></span></label>
                                    <input type="text" name="businessdrive" class="form-control"   placeholder="{businessdrive}">  
                                 </div>
                              </div>
                              <div class="col-lg-6">
                                 <div class="form-group">
                                    <label>Dropbox directory <span>*</span></label>
                                    <input type="text" name="businessdropbox" class="form-control"   placeholder="{businessdropbox}">  
                                 </div>
                              </div>
                           </div>
                           <div class="row btnn-business">
                              <div class="col-lg-4">
                                 <button type="button" class="btn form-btn">Cancel</button>
                              </div>
                              <div class="col-lg-4">
                                 <button type="submit" id="businessSaveBtn" class="btn form-btn">Save</button>
                              </div>
                              <div class="col-lg-4">
                                 <button type="button" class="btn form-btn">New branch</button>
                              </div>
                           </div>
                        </form> 
                     </div>


                     <div id="{{!empty($businessList)?'menu1':''}}" class="tab-pane fade">
                       <div class="row row-border-dash">
                          <div class="col-lg-12">
                            <h3>Afiliation</h3>
                         </div>
                      </div>

                      <form action="save-contact-details" id="contactForm" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label>Organisation <span></span></label>
                                 <select name="organisation"  class="form-control">
                                    @if(!empty($businessList))
                                    @foreach($businessList as $k=>$bDetails)
                                    <option value="{{$bDetails->id}}">{{$bDetails->business_name}}</option>
                                    @endforeach
                                    @endif
                                 </select>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label>Branch <span></span></label>
                                 <input type="text" name="branch" class="form-control"  placeholder="{contactbranch}">
                              </div>
                           </div>
                        </div>
                        <div class="row row-border-dash" id="CD">
                           <div class="col-lg-12">
                              <h3>Contact Details</h3>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label>First Name <span>*</span></label>
                                 <input type="text" class="form-control" name="first_name"  placeholder="{contactalias}">
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label>Surname <span>*</span></label>
                                 <input type="text" class="form-control" name="surname" placeholder="{contactsurname}">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label>Known as <span>*</span></label>
                                 <input type="text" class="form-control" name="known_as"  placeholder="{contactalias}">
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="form-group">
                                 <label>Initials (2 digits) <span>*</span></label>
                                 <input type="text" class="form-control" name="initials"  placeholder="{contactinitials} {CN}">
                              </div>
                           </div>
                           <div class="col-lg-3">
                              <div class="form-group">
                                 <label>TBC1 <span>*</span></label>
                                 <input type="text" class="form-control" name="tbc1"  placeholder="{Ctbc1}">


                              </div>
                           </div>
                        </div>



                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label>Position <span></span></label>
                                 <input type="text" class="form-control" name="positions"  placeholder="{contactposition}">
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label>Department <span></span></label>
                                 <input type="text" class="form-control" name="department"  placeholder="{contactdepartment}">
                              </div>
                           </div>
                        </div>

                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label>E-mail <span></span></label>
                                 <input type="email" id="contactEmail" class="form-control" name="email"  placeholder="{contactemail}">
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label>Phone Number <span></span></label>
                                 <input type="number" class="form-control" name="phone"  placeholder="{contactphonenumber}">
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label>Mobile Number <span></span></label>
                                 <input type="number" class="form-control" name="mobile"  placeholder="{contactmobilenumber}">
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label>TBC@ <span></span></label>
                                 <input type="text" class="form-control" name="tbc"  placeholder="{ctbc2}">
                              </div>
                           </div>
                        </div>
                        <div class="row row-border-dash">
                          <div class="col-lg-6">
                            <h3>Address</h3>
                         </div>
                         <div class="col-lg-6 text-right-check">
                            <div class="form-group">
                             <div class="form-check">
                              <input class="form-check-input" type="checkbox" name="address" id="gridCheck">
                              <label class="form-check-label" for="gridCheck">
                               Same as Business/Branch address
                            </label>
                         </div>
                      </div>
                   </div>
                </div>


                <div class="row">
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Country <span>*</span></label>
                        <input class="form-control" type="text" name="country" id="cCountry" placeholder="{businesscountry}">
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>State <span>*</span></label>
                        <input class="form-control" type="text" name="state" id="cState" placeholder="{businessstate}">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Address line 1 <span>*</span></label>
                        <input class="form-control" type="text" name="address1" id="cAddress1" placeholder="{businessaddress1}">
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Address line 2 <span>*</span></label>
                        <input class="form-control" type="text" name="address2" id="cAddress2" placeholder="{businessaddress2}">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>City <span>*</span></label>
                        <input class="form-control" type="text" name="city" id="cCity" placeholder="{businesscity}">
                     </div>
                  </div>
                  <div class="col-lg-4">
                     <div class="form-group">
                        <label>Post code <span>*</span></label>
                        <input class="form-control" type="number" name="postcode" id="cPostcode" placeholder="{businesspostcode}">
                     </div>
                  </div>
               </div>

               <div class="row row-border-dash" id="CR&P">
                  <div class="col-lg-12">
                     <h3>Roles and permissions</h3>
                  </div>
               </div>

               <div class="row">
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Type <span>*</span></label>
                        <input type="text" class="form-control" nane="type" placeholder="{contactype}">
                     </div>
                  </div>

                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Role <span>*</span></label>
                        <input type="text" class="form-control" name="role"  placeholder="{contactrole}">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Email Notifications <span>*</span></label>
                        <input type="text" class="form-control" id="emailNotification" name="email_notification"  placeholder="{contactnotification}">
                     </div>
                  </div>
               </div>

               <div class="row row-border-dash">
                  <div class="col-lg-12">
                     <h3>Social</h3>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Linkedin</label>
                        <input type="text" class="form-control"  name="linkedin" placeholder="{businesslinkedin}">
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Twitter</label>
                        <input type="text" class="form-control"  name="twitter" placeholder="{businesstwitter}">
                     </div>
                  </div>
               </div>
               <div class="row row-border-dash">
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Instagram</label>
                        <input type="text" class="form-control"  name="instagram" placeholder="{businessinstagram}">
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Facebook</label>
                        <input type="text" class="form-control"  name="facebook" placeholder="{businessfacebook}">
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Youtube</label>
                        <input type="text" class="form-control" name="youtube"  placeholder="{businessyoutube}">
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Anything else</label>
                        <input type="text" class="form-control"  name="anything_else" placeholder="{businessanythingelse}">
                     </div>
                  </div>
               </div>
               <div class="row row-border-dash">
                  <div class="col-lg-12">
                     <h3>Branding</h3>
                  </div>
               </div>

               <div class="row grey_row">
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Colour Logo file(png,svg-600x400px)</label>
                        <input type="file" draggable = "true" class="form-control" name="colorlogo_file" onchange= "readURL(this, 'colorLogo')"  placeholder="{businesslogocolours}">
                        <img id="colorLogo" height="40" width="40">

                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Color icon file(png,svg-600x400px)</label>
                        <input type="file" draggable = "true" class="form-control" name="coloricon_file" onchange= "readURL(this, 'colorIcon')" placeholder="{businessiconcolours}">
                        <img id="colorIcon" height="40" width="40">

                     </div>
                  </div>
               </div>
               <div class="row grey_row">
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Negative Logo file(png,svg-600x400px)</label>
                        <input type="file" draggable = "true" class="form-control" name="negativelogo_file" onchange= "readURL(this, 'negetiveLogo')" placeholder="{businesslogonegative}">
                        <img id="negetiveLogo" height="40" width="40">

                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Negative icon file(png,svg-600x400px)</label>
                        <input type="file" draggable = "true" class="form-control" name="negativeicon_file" onchange= "readURL(this, 'negetiveIcon')"  placeholder="{businessiconnegative}">
                        <img id="negetiveIcon" height="40" width="40">

                     </div>
                  </div>
               </div>


               <div class="row row-border-dash">
                  <div class="col-lg-12">
                     <h3>File Management</h3>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>G-drive directory <span></span></label>
                        <input type="text" class="form-control" name="gdrive_dir"  placeholder="{businessdrive}">

                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Dropx directory <span>*</span></label>
                        <input type="text" class="form-control" name="dropbox_dir"  placeholder="{businessdropbox}">
                     </div>
                  </div>
               </div>
               <div class="row btnn-business">
                  <div class="col-lg-4">
                     <button type="button" class="btn form-btn">Cancel</button>
                  </div>
                  <div class="col-lg-4">
                     <button type="submit" class="btn form-btn">Save</button>
                  </div>
                  <div class="col-lg-4">
                     <button type="button" class="btn form-btn">New branch</button>
                  </div>
               </div>
            </form> 
         </div>
      </div>
   </div>
</div>
<div class="form-ftr">
   <p>Powered By
      <img src="{{ url('public/wippli/img/Group%201087.png') }}" alt="ftr-logo">
   </p>
</div>
</div>
</div>
<div class="col-lg-3">
   <div class="form_inner boomi_actions">
      <div class="header bimmo_header">
         <div class="row">
            <div class="col-lg-12">
               <div class="wipl_logo">
                  Go to
               </div>
               <div class="">
               </div>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col-lg-12">
            <div class="form-txt boomi_action_txt businnes_right_side">
               <ul>
                  <li><a href="#BA">Business Affiliation</a> </li>
                  <li><a href="#menu1">Contact Details</a> </li>
                  <li><a href="#ADD">Address</a> </li>
                  <li><a href="#R&P">Roles and permissions</a> </li>
                  <li><a href="#Social">Social</a> </li>
                  <li><a href="#Branding">Branding</a> </li>
                  <li><a href="#FM">File management</a> </li>
                  <li><a href="#Action">Actions</a> </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
</div>
</section>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="{{ url('public/wippli/js/jquery.min.js') }}"></script>
<script src="{{ url('public/wippli/js/bootstrap.min.js') }}"></script>
<script src="{{ url('public/wippli/js/popper.min.js') }}"></script>   
<script src="{{ url('public/wippli/js/custom-dashboard.js') }}"></script>



<script>
// $('select[name="organisation"]').on('change',function(){
//    var organisationId = $(this).val();
//    getBusinessAddress()
// })
$('#gridCheck').click(function() {
   if ($(this).is(':checked')) {
      var organisationId = $('select[name="organisation"] option:selected').val();
      getBusinessAddress()
   }else{
      $("#cCountry").val('');
         $("#cState").val('');
         $("#cCity").val('');
         $("#cAddress1").val('');
         $("#cAddress2").val('');
         $("#cPostcode").val('');
   }
});


function getBusinessAddress(){
   var organisationId = $('select[name="organisation"] option:selected').val();
      $.ajax({
          url: 'getBusinessById',
          method: 'POST',
          data: {organisationId:organisationId},
          datatype: 'json',
          headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         },
         success: function (data) {
            if(data.country !=''){
               $("#cCountry").val(data.country);
               $("#cState").val(data.state);
               $("#cCity").val(data.city);
               $("#cAddress1").val(data.address1);
               $("#cAddress2").val(data.address2);
               $("#cPostcode").val(data.post_code);
               console.log(data)
         }
      }
      })
}


$("#contactEmail").blur(function(){
   var email = $("#contactEmail").val()
   $("#emailNotification").val(email)
})

$("input[name=surname]").blur(function(){
   var fname = $("input[name=first_name]").val()
   var surname = $("input[name=surname]").val()
   $("input[name=initials]").val(fname.slice(0,1)+surname.slice(0,1))

})

   $(document).ready(function() {
      $("#contactForm").validate({
         errorClass: "has-error",
         ignore: ".ignore",
      // Specify validation rules
      rules: {
         "email": {
            required:true,
            remote: {
             url: 'checkExistEmail',
             type: 'post',
             headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
               email: function(){
                  return $('#contactForm :input[name="email"]').val();
               }
            } 
         }
      },
      "phone":{
         required:true,
         rangelength: [6,10]
      },
      "first_name":{
         required:true,
      },
      "surname":{
         required:true,
      },
      "known_as":{
         required:true,
      },
      "initials":{
         required:true,
      },
      "tbc1":{
         required:true,
      },
      "country":{
         required:true
      },
      "state":{
         required:true
      },
      "address1":{
         required:true
      },
      "address2":{
         required:true
      },
      "city":{
         required:true
      },
      "post_code":{
         required:true
      },

      "type":{
         required:true
      },
      "role":{
         required:true
      },
      "email_notification":{
         required:true
      },
      "tbc1":{
         required:true
      }

      

   },
   messages: {
      email:{
         required: "Please enter your email address.",
         email: "Please enter a valid email address.",
         remote: jQuery.validator.format("{0} is already taken.")
      },
      phone:{
         required:'Please enter phone number',
         rangelength:'Please enter valid phone number',
      },
   },
});


      $("#businessForm").validate({
         errorClass: "has-error",
         ignore: ".ignore",
      // Specify validation rules
      rules: {
         "business_name":{
            required:true,
         },
         "business_branch":{
            required:true
         },
         "industry":{
            required:true
         },
         "business_sort_name":{
            required:true
         },
         "business_initials":{
            required:true
         },
         "business_number":{
            required:true
         },
         "business_number_type":{
            required:true
         },
         "tax_number":{
            required:true
         },
         "tax_number_type":{
            required:true
         },
         "country":{
            required:true
         },
         "state":{
            required:true
         },
         "address1":{
            required:true
         },
         "address2":{
            required:true
         },
         "city":{
            required:true
         },
         "post_code":{
            required:true
         },
         "afiliation":{
            required:true
         }
         
      },
      messages: {
         business_name:{
            required:'Please enter Business Name',
         },
      },
   });
   });

</script>

<script>
   $("#notAllowed").click(function(){
      alert('Add Business to save contacts !');
   });
</script>
</body>
</html>