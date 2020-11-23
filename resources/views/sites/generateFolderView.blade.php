<!--------------------------  form1  -------------------------->
      <section class="form1 form boomi">
         <div class="container" style="width:100% !important">
             <div class="row">
             
               <div class="col-lg-9">
            <div class="form_inner">
               <div class="header bimmo_header">
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="logo">
                           <img src="{{ url('public/wippli/img/bimmo_logo.jpg') }}" alt="logo"> 
                        </div>
                        <div class="wipl_logo">
                           Wippli
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-lg-12">
                     <div class="form-txt boomi_txt">
                        <em>Dell Boomi - Australia</em>
                        <h3>Task: Forrester Banners - adjust</h3>
                        <span>
                           <p>VQ</p>
                           Vicky Quinlan - Marketing
                        </span>
                     </div>
                  </div>
               </div>
               <div class="bimmo_collaps">
                  <!--Accordion wrapper-->
                  <div class="accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
                     <!-- Accordion card -->
                     <div class="card">
                        <!-- Card header -->
                        <div class="card-header" role="tab" id="headingOne1">
                           <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true"
                              aria-controls="collapseOne1">
                              <h5 class="mb-0">
                                 The Wippli <i class="fas fa-angle-down rotate-icon"></i>
                              </h5>
                           </a>
                        </div>
                        <!-- Card body -->
                        <div id="collapseOne1" class="collapse show show" role="tabpanel" aria-labelledby="headingOne1"
                           data-parent="#accordionEx">
                           <div class="card-body">
                              <div class="wippli_drop">
                                 <div class="drp_txt">
                                    <b>Project Name/title</b> 
                                    <p>{{@$NewWippli->project_name}}</p>
                                 </div>
                                 <div class="drp_txt">
                                    <b>Deadline</b> 
                                    <p>{{@$NewWippli->deadline}}</p>
                                 </div>
                                 <div class="drp_txt">
                                    <b>Objective</b> 
                                    <p>{{@$NewWippli->objective}}</p>
                                 </div>
                                 <div class="drp_txt">
                                    <b>Instruction</b> 
                                    <p>{{@$NewWippli->instruction}}
                                    </p>
                                 </div>
                                 <div class="drp_txt">
                                    <b>Message/Copy</b> 
                                    <p>{{@$NewWippli->message}}</p>
                                 </div>
                                 <div class="drp_txt">
                                    <b>Format</b> 
                                    <p>{{@$NewWippli->message}}</p>
                                 </div>
                                 <div class="drp_txt">
                                    <b>Attachment</b> 
                                    <p>{{@$NewWippli->message}}</p>
                                    <?php
                                       $uId = $NewWippli->userId;
                                       $wippliImage = !empty($NewWippli->attachment) ? "public/sites/images/wippli-image/$uId/$NewWippli->attachment" : 'public/wippli/img/logo-icn.png';
                                    ?>
                                    <img src="{{url($wippliImage)}}" alt="icn" height="50" width="50">
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- Accordion card -->
                     <!-- Accordion card -->
                     <div class="card">
                        <!-- Card header -->
                        <div class="card-header" role="tab" id="headingTwo2">
                           <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2"
                              aria-expanded="false" aria-controls="collapseTwo2">
                              <h5 class="mb-0">
                                 Job Name <i class="fas fa-angle-down rotate-icon"></i>
                              </h5>
                           </a>
                        </div>
                        <!-- Card body -->
                        <div id="collapseTwo2" class="collapse show" role="tabpanel" aria-labelledby="headingTwo2"
                           data-parent="#accordionEx">
                           <div class="card-body">
                              <div class="row boomi_form">
                                 <div class="col-lg-12">
                                    <div class="fields">
                                       <form>
                                          <b>The job name for Forrester Banners - adjust is looking like this:</b>
                                          <ul>
                                             <li>
                                                <div class="form-group">
                                                     <label>Client</label>
                                                   <input type="text" class="form-control" placeholder="Boomi">
                                                  
                                                </div>
                                             </li>
                                             <li>
                                                <div class="form-group">
                                                     <label>Title</label>
                                                   <input type="text" class="form-control" placeholder="ForresterEvent">
                                                  
                                                </div>
                                             </li>
                                             <li>
                                                <div class="form-group">
                                                     <label>Type</label>
                                                   <input type="text" class="form-control" placeholder="Banner">
                                                  
                                                </div>
                                             </li>
                                             <li>
                                                <div class="form-group">
                                                    <label>Date(3+4)</label>
                                                   <input type="text" class="form-control" placeholder="Aug2020">
                                                   
                                                </div>
                                             </li>
                                             <li>
                                                <div class="form-group">
                                                     <label>Job Number</label>
                                                   <input type="text" class="form-control" placeholder="BOVQ123">
                                                  
                                                </div>
                                             </li>
                                                                    <li class="center_line">
                                                <div class="form-group">
                                                    <label>Characters(50)</label>
                                                   <input type="text" class="form-control" placeholder="46">
                                                   
                                                </div>
                                             </li>
                                                                                           <li>
                                                <div class="form-group">
                                                    <label>JPreset</label>
                                                   <input type="text" class="form-control" placeholder="BOVQ123">
                                                   
                                                </div>
                                             </li>
                                          </ul>
                                       </form>
                                        
                                        <div class="row boomi_btn">
                                        <div class="col-lg-3 col-sm-3">
                                            <a href="#">Cancel</a>
                                            </div>
                                             <div class="col-lg-3 col-sm-3">
                                            <a href="#">Copy File Name</a>
                                            </div>
                                             <div class="col-lg-3 col-sm-3">
                                            <a id="generateFolder" data-id="{{@$NewWippli->id}}">Generate Folders</a>
                                            </div>
                                             <div class="col-lg-3 col-sm-3">
                                            <a href="#">Save</a>
                                            </div>
                                        </div>
                                    </div>
                                 </div>
                              </div>
                               
                           </div>
                        </div>
                     </div>
                     <!-- Accordion card -->
                     <!-- 
                        <div class="card">
                        
                          
                          <div class="card-header" role="tab" id="headingThree3">
                            <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseThree3"
                              aria-expanded="false" aria-controls="collapseThree3">
                              <h5 class="mb-0">
                                Collapsible Group Item #3 <i class="fas fa-angle-down rotate-icon"></i>
                              </h5>
                            </a>
                          </div>
                        
                          
                          <div id="collapseThree3" class="collapse" role="tabpanel" aria-labelledby="headingThree3"
                            data-parent="#accordionEx">
                            <div class="card-body">
                              Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                              wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                              eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                              assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                              nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                              farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                              labore sustainable VHS.
                            </div>
                          </div>
                        
                        </div>
                         -->
                  </div>
                  <!-- Accordion wrapper -->
               </div>
               <div class="form-ftr">
                  <p>Powerd By
                     <img src="{{url('public/wippli/img/Group%201087.png')}}" alt="ftr-logo">
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
                Actions
                </div>
               <div class="">
                </div>

               </div>
            </div>
           </div>
                     <div class="row">
                     <div class="col-lg-12">
                         <div class="form-txt boomi_action_txt">
                            <ul>
                             <li><a href="#">Track Time</a> </li>
                                <li><a href="#">The Wippli</a> </li>
                                <li><a href="#">Job Name</a> </li>
                                <li><a href="#">Generate Folders</a> </li>
                                <li><a href="#">People</a> </li>
                                <li class="line">---------- </li>
                                <li><a href="#">Archive</a> </li>
                                <li><a href="#">Mark as Delivered</a> </li>
                                <li><a href="#">Delete</a> </li>
                             </ul>
                         </div>
                         </div>
                     </div>
                     
                     
                     </div>
                 </div>
             </div>
         </div>
      </section>