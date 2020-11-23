@include('sites.common-header')


      <!--------------------------  form1  -------------------------->
      <section class="form1 form form_third">
         <div class="container">
            <div class="form_inner">
               <div class="header">
                  <div class="row">
                     <div class="col-lg-3">
                        <div class="logo">
                           <a href="#">
                              <img src="{{url('public/wippli/img/logo-icn.png')}}" alt="logo"> 
                              <h3>People <span>Setting</span></h3>
                                                      
                        @if(session()->has('message.level'))
                           <div class="alert alert-{{ session('message.level') }}"> 
                           {!! session('message.content') !!}
                           </div>
                        @endif
                           </a>
                        </div>
                     </div>
                     <div class="col-lg-3">
                     </div>
                     <div class="col-lg-3">
                     </div>
                     <div class="col-lg-3">
                     </div>
                  </div>
               </div>
               <div class="form-txt form-txt-third people-seting">
                  <div class="tabs">
                     <form>
                        <ul class="nav nav-tabs third-tab ">
                           <li ><a href="{{url('business-details')}}">New Contact</a></li>
                           <li class="active"><a data-toggle="tab" href="#menu1">Brannium</a></li>
                           <li><a data-toggle="tab" href="#menu2">Clients</a></li>
                           <li><a data-toggle="tab" href="#menu3">Contacts</a></li>
                        </ul>
                        <div class="tab-content">
                           <div id="home" class="tab-pane">
                              <h3>1</h3>

                           </div>
                           <!--********************************************************************************************-->
                           <div id="menu1" class="tab-pane fade in active">
                              <h3>2</h3>
                              <div class="box-wht">
                                 <div class="row white-bg">
                                    <div class="col-lg-3 bdr-rit">
                                       <div class="logo-inner">
                                          <img src="{{url('public/wippli/img/bimmo_logo.jpg')}}" alt="innerlogo">
                                       </div>
                                    </div>
                                    <div class="col-lg-9 border-left">
                                       <div class="logo-inner-txt">
                                          <ul>
                                             <li><i class="fab fa-linkedin-in"></i></li>
                                             <li><i class="fab fa-twitter"></i></li>
                                             <li><i class="fas fa-pencil-alt"></i></li>
                                             <li><i class="fas fa-trash"></i></li>
                                             <li><i class="fas fa-ellipsis-v"></i></li>
                                          </ul>
                                          <b>Brannium PTY LTD</b>
                                          <p>19 114 North Steyne, Manly, NSW, 2095 <br>ABN 1234567</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                               
                                                              
                              <div class="grids_box">
                                 <div class="grid_header">
                                    <ul>
                                       <li>Name</li>
                                       <li>Position</li>
                                       <li>company</li>
                                       <li>Email Address</li>
                                       <li>Type</li>
                                       <li>Role</li>
                                       <li>Email Alerts</li>
                                       <li><i class="fas fa-search"></i></li>
                                    </ul>
                                 </div>
                              </div>
                              @if(!empty($businessDetails))
                              @foreach($businessDetails as $bDetails)
                              <div class="grids_box_white">
                                 <div class="grid-inner">
                                    <ul>
                                       <li>
                                          <div class="grid-iner-div">
                                             <div class="form-check">
                                                <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                                             </div>
                                             <div class="grid-inner-logo">
                                                <a href="#">
                                                <img src="{{url('public/wippli/img/logo-icn-inner.png')}}" alt="logo"> 
                                                </a>
                                             </div>
                                             <div class="grid-inner-txt">{{$bDetails->user_name}}</div>
                                          </div>
                                       </li>
                                       <li>Director</li>
                                       <li>{{$bDetails->business_name}}</li>
                                       <li>{{$bDetails->email}}</li>
                                       <li>
                                          <select id="inputState" class="form-control">
                                             <option selected>Resource</option>
                                             <option>...</option>
                                          </select>
                                       </li>
                                       <li>
                                          <select id="inputState" class="form-control">
                                             <option selected>Superuser</option>
                                             <option>...</option>
                                          </select>
                                       </li>
                                       <li>
                                          <select id="inputState" class="form-control">
                                             <option selected>Limited</option>
                                             <option>...</option>
                                          </select>
                                       </li>
                                       <li><div class="logo-inner-txt">
                                          <ul>
                                             <li><i class="fab fa-linkedin-in"></i></li>
                                             <li><i class="fab fa-twitter"></i></li>
                                             <li><i class="fas fa-pencil-alt"></i></li>
                                             <li><i class="fas fa-trash"></i></li>
                                             <li><i class="fas fa-ellipsis-v"></i></li>
                                          </ul>
                                       </div></li>
                                    </ul>
                                 </div>
                              </div>
                              @endforeach
                              @endif
                               
                           </div>
                           <!--********************************************************************************************13 19-->
                           <div id="menu2" class="tab-pane fade">
                              <h3>3</h3>
                              
                              @if(!empty($ClientDetails))
                              @foreach($ClientDetails as $cDetails)
                              <div class="box-wht">
                                 <div class="row white-bg">
                                    <div class="col-lg-3">
                                       <div class="logo-inner">
                                          @if(!empty($cDetails->logocolours))
                                          <img src="{{url('public/wippli/images/BusinessLogo')}}/{{$cDetails->logocolours}}" data-id="{{$cDetails->id}}" width="50" height="50">
                                          @else
                                          <img src="{{url('public/wippli/img/bimmo_logo.jpg')}}" alt="innerlogo">
                                          @endif
                                       </div>
                                    </div>
                                    <div class="col-lg-4">
                                       <div class="logo-inner-txt">
                                          <b>{{$cDetails->business_name}}</b>
                                          <p>{{$cDetails->address1.' '.$cDetails->address2.' '.$cDetails->state.' '.$cDetails->city.' '.$cDetails->country}} <br>{{$cDetails->post_code}}</p>
                                       </div>
                                    </div>
                                    <div class="col-lg-5">
                                       <div class="logo-inner-txt">
                                          <ul>
                                             <li><i class="fab fa-linkedin-in"></i></li>
                                             <li><i class="fab fa-twitter"></i></li>
                                             <li><i class="fas fa-pencil-alt"></i></li>
                                             <li><i class="fas fa-trash"></i></li>
                                             <li><i class="fas fa-ellipsis-v"></i></li>
                                          </ul>
                                          <b>Agency</b>
                                          <!-- <p>{ {{@$cDetails->tbc1}} }</p>
                                          <p>{ {{@$cDetails->tbc}} }</p> -->
                                          <p>{ TBC1 }</p>
                                          <p>{ TBC }</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              @endforeach
                              @endif
                           </div>
                           <!--********************************************************************************************22 27-->
                           <div id="menu3" class="tab-pane fade">
                              <h3>4</h3>
                               <div class="people-seting-contact">
                                   <div class="tabs">
                              <ul class="nav nav-tabs contact-nav ">
                                 <li class="active"><a data-toggle="tab" href="#boomi">BOOMI</a></li>
                                 <li><a data-toggle="tab" href="#agencies">AGENCIES</a></li>
                              </ul>
                               
                               <div class="tab-content">
                                     <div id="boomi" class="tab-pane fade active in">    
                                         <p>boomi</p>
                                         
                              <div class="grids_box">
                                 <div class="grid_header">
                                    <ul>
                                       <li>Name</li>
                                       <li>Position</li>
                                       <li>company</li>
                                       <li>Email Address</li>
                                       <li>Type</li>
                                       <li>Role</li>
                                       <li>Email Alerts</li>
                                       <li><i class="fas fa-search"></i></li>
                                    </ul>
                                 </div>
                              </div>
                               
                              @if(!empty($businessDetails))
                              @foreach($businessDetails as $bDetails)
                              <div class="grids_box_white">
                                 <div class="grid-inner">
                                    <ul>
                                       <li>
                                          <div class="grid-iner-div">
                                             <div class="form-check">
                                                <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                                             </div>
                                             <div class="grid-inner-logo">
                                                <a href="#">
                                                <img src="{{url('public/wippli/img/logo-icn-inner.png')}}" alt="logo"> 
                                                </a>
                                             </div>
                                             <div class="grid-inner-txt">{{$bDetails->user_name}}</div>
                                          </div>
                                       </li>
                                       <li>Director</li>
                                       <li>{{$bDetails->business_name}}</li>
                                       <li>{{$bDetails->email}}</li>
                                       <li>
                                          <select id="inputState" class="form-control">
                                             <option selected>Resource</option>
                                             <option>...</option>
                                          </select>
                                       </li>
                                       <li>
                                          <select id="inputState" class="form-control">
                                             <option selected>Superuser</option>
                                             <option>...</option>
                                          </select>
                                       </li>
                                       <li>
                                          <select id="inputState" class="form-control">
                                             <option selected>Limited</option>
                                             <option>...</option>
                                          </select>
                                       </li>
                                       <li><div class="logo-inner-txt">
                                          <ul>
                                             <li><i class="fab fa-linkedin-in"></i></li>
                                             <li><i class="fab fa-twitter"></i></li>
                                             <li><i class="fas fa-pencil-alt"></i></li>
                                             <li><i class="fas fa-trash"></i></li>
                                             <li><i class="fas fa-ellipsis-v"></i></li>
                                          </ul>
                                       </div></li>
                                    </ul>
                                 </div>
                              </div>
                              @endforeach
                              @endif

                                         
                               </div>
                               
                               <div id="agencies" class="tab-pane fade">
                                   <p>agencies</p>
                                                                 <div class="grids_box">
                                 <div class="grid_header">
                                    <ul>
                                       <li>Name</li>
                                       <li>Position</li>
                                       <li>company</li>
                                       <li>Email Address</li>
                                       <li>Type</li>
                                       <li>Role</li>
                                       <li>Email Alerts</li>
                                       <li><i class="fas fa-search"></i></li>
                                    </ul>
                                 </div>
                              </div>
                              @if(!empty($ContactDetails))
                              @foreach($ContactDetails as $cDetails)
                              <div class="grids_box_white">
                                 <div class="grid-inner">
                                    <ul>
                                       <li>
                                          <div class="grid-iner-div">
                                             <div class="form-check">
                                                <input class="form-check-input position-static" type="checkbox" id="blankCheckbox" value="option1" aria-label="...">
                                             </div>
                                             <div class="grid-inner-logo">
                                                <a href="#">
                                                <img src="{{url('public/wippli/img/logo-icn-inner.png')}}" alt="logo"> 
                                                </a>
                                             </div>
                                             <div class="grid-inner-txt">{{$cDetails->first_name}}</div>
                                          </div>
                                       </li>
                                       <li>{{$cDetails->positions}}</li>
                                       <li>{{$cDetails->business_name}}</li>
                                       <li>{{$cDetails->email}}</li>
                                       <li>
                                          <select id="inputState" class="form-control">
                                             <option selected>Resource</option>
                                             <option>...</option>
                                          </select>
                                       </li>
                                       <li>
                                          <select id="inputState" class="form-control">
                                             <option selected>Superuser</option>
                                             <option>...</option>
                                          </select>
                                       </li>
                                       <li>
                                          <select id="inputState" class="form-control">
                                             <option selected>Limited</option>
                                             <option>...</option>
                                          </select>
                                       </li>
                                       <li><div class="logo-inner-txt">
                                          <ul>
                                             <li><i class="fab fa-linkedin-in"></i></li>
                                             <li><i class="fab fa-twitter"></i></li>
                                             <li><i class="fas fa-pencil-alt"></i></li>
                                             <li><i class="fas fa-trash"></i></li>
                                             <li><i class="fas fa-ellipsis-v"></i></li>
                                          </ul>
                                       </div></li>
                                    </ul>
                                 </div>
                              </div>
                              @endforeach
                              @endif
                                         
                               </div>
                               </div>
                               </div>
                               </div>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
      @include('sites.common-footer')
