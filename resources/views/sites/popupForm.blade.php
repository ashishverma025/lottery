
<!--------------------------  form1  -------------------------->
<section class="form1 form">
   <div class="container" style="width:100% !important">
      <div class="form_inner">
         <div class="header">
            <div class="row">
               <div class="col-lg-6">
                  <div class="logo">
                     <img src="{{ url('public/wippli/img/logo.jpg')}}" alt="logo">
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="logo-right-txt text-right">
                     <p>Powerd By
                        <img src="{{ url('public/wippli/img/Group%201087.png')}}" alt="ftr-logo">
                     </p>
                  </div>
               </div>
            </div>
         </div>
         <div class="form-txt">
            <div class="tabs">

               <p class="header_txt">Vicky Quinlan | Dell Boomi</p>
               <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#home">Short and Sweet</a></li>
                  <li><a data-toggle="tab" href="#menu1">Let's Go Into Details</a></li>
               </ul>
               <div class="tab-content">

                  <div id="home" class="tab-pane fade in active">
                     <form id="shortSweeyForm" method="post" action="{{url('newWippliSave')}}" enctype="multipart/form-data">
                        @csrf
                        <h3>The Job</h3><br>
                        <span class="errMsg"></span>

                        <input type="hidden" name="wippli_id" value="">
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label>Project Name <span>*</span></label>
                                 <input type="text" class="form-control" name="project_name" id="project_name" placeholder="Type here">
                              </div>
                           </div>

                           
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <div class="form-group">
                                    <label>Deadline <span>*</span></label>
                                    <input type="date" class="form-control" name="deadline"  id="deadline">

                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label>Category <span>*</span></label>
                                 <select class="form-control" name="category" id="category">
                                    <option>Select</option>
                                    @foreach($categories as $k=>$cat)
                                    <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                    @endforeach
                                 </select>
                              </div>
                           </div>

                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label>Type <span>*</span></label>
                                 <div id="types">
                                    <select class="form-control" name="type" id="type">
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="form-group text">
                                 <label>Instructions <span>.</span></label>
                                 <textarea class="form-control" rows="8" name="instruction" id="instruction" placeholder="Type here"></textarea>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-12">
                              <div class="row">
                                 <div class="col-md-2">
                                  <div class="form-group">
                                   <img src="{{ url('public/wippli/img') }}/logo-icn.png" id="userImg" height="80" width="80">
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                    <div class="form-group">
                     <label>Attachments/Files</label>
                     <input type="file" name="attachment" id="attachment" class="form-control-file"  onchange= "readURL(this, 'userImg')"  >
                  </div>
                  <button type="submit" id="simpleButton" class="btn form-btn">SUBMIT WIPPLI</button>
               </form>
            </div>





            <div id="menu1" class="tab-pane fade">
               <form id="detailForm"  enctype="multipart/form-data">
                  @csrf
                  <h3>The Job</h3>
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label>Project Name <span>*</span></label>
                           <input type="text" class="form-control" name="project_name" placeholder="Type here">
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <div class="form-group">
                              <label>Deadline <span>*</span></label>
                              <select class="form-control" name="deadline" id="exampleFormControlSelect1">
                                 <option>Select</option>
                                 <option>2</option>
                                 <option>3</option>
                                 <option>4</option>
                                 <option>5</option>
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="form-group or">
                           <label>Type <span>*</span></label>
                           <select class="form-control" name="type" id="type">
                              <option>Select</option>
                              @foreach($categories as $k=>$cat)
                              <option id="{{$cat->id}}">{{$cat->cat_name}}</option>
                              @endforeach
                           </select>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <label style="overflow: hidden;">Type</label>
                           <input type="file" name="type_file" class="form-control-file" >
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="form-group">
                           <div class="form-group">
                              <label>Digital</label>
                              <select class="form-control" name="digital" id="digital">
                                 <option>Select</option>
                                 <option>2</option>
                                 <option>3</option>
                                 <option>4</option>
                                 <option>5</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <div class="form-group">
                              <label>Print</label>
                              <select class="form-control" name="print" id="print">
                                 <option>Select</option>
                                 <option>2</option>
                                 <option>3</option>
                                 <option>4</option>
                                 <option>5</option>
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-6">
                        <div class="form-group">
                           <div class="form-group">
                              <label>Video</label>
                              <select class="form-control" name="video" id="video">
                                 <option>Select</option>
                                 <option>2</option>
                                 <option>3</option>
                                 <option>4</option>
                                 <option>5</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="form-group">
                           <div class="form-group">
                              <label>Other</label>
                              <select class="form-control" name="other" id="other">
                                 <option>Select</option>
                                 <option>2</option>
                                 <option>3</option>
                                 <option>4</option>
                                 <option>5</option>
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="form-group">
                           <label>Objective <span>*</span></label>
                           <input type="text" class="form-control" name="objective" id="objective" placeholder="Type here">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="form-group text">
                           <label>Instructions <span>*</span></label>
                           <textarea class="form-control" rows="3" name="instruction" id="instruction" placeholder="Type here"></textarea>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="form-group text">
                           <label>Message/Copy</label>
                           <textarea class="form-control" name="message" id="message" rows="3" placeholder="Type here"></textarea>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12">
                        <h2>Additional Information</h2>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-4">
                        <div class="form-group or">
                           <div class="form-group">
                              <label>Dimensions</label>
                              <select class="form-control" name="dimensions" id="dimensions">
                                 <option>Choose from standard dimensions</option>
                                 <option>2</option>
                                 <option>3</option>
                                 <option>4</option>
                                 <option>5</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-2">
                        <div class="form-group text-center w">
                           <label>W</label>
                           <input type="text" class="form-control" name="width" id="width"  placeholder="Type here">
                        </div>
                     </div>
                     <div class="col-lg-2">
                        <div class="form-group text-center">
                           <label>H</label>
                           <input type="text" class="form-control" name="height" id="height" placeholder="Type here">
                        </div>
                     </div>
                     <div class="col-lg-2">
                        <div class="form-group">
                           <div class="form-group text-center">
                              <label>UNITS</label>
                              <select class="form-control" name="units" id="units">
                                 <option></option>
                                 <option>2</option>
                                 <option>3</option>
                                 <option>4</option>
                                 <option>5</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-2" style="position: relative;">
                        <ul class="radio-btn">
                           <li>
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" name="portrait" type="checkbox" id="portrait" value="option1">
                                 <label class="form-check-label" for="portrait">Portrait</label>
                              </div>
                           </li>
                           <li>
                              <div class="form-check form-check-inline">
                                 <input class="form-check-input" name="landscape" type="checkbox" id="landscape" value="option2">
                                 <label class="form-check-label" for="inlineClandscapehlandscapeeckbox2">Landscape</label>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12 bdr_botm"></div>
                  </div>
                  <div class="row">
                     <div class="col-lg-4">
                        <div class="form-group text">
                           <label>Comment</label>
                           <textarea class="form-control" name="comment" id="comment" rows="12" placeholder="Type here"></textarea>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="form-group text">
                           <label>Target audience</label>
                           <textarea class="form-control" name="target_audience" id="target_audience" rows="12" placeholder="Type here"></textarea>
                        </div>
                     </div>
                     <div class="col-lg-4">
                        <div class="form-group text">
                           <label>Tone of voice</label>
                           <textarea class="form-control" name="tone_of_voice" id="tone_of_voice" rows="12" placeholder="Type here"></textarea>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="form-group">
                           <label>Attachments/Files</label>
                           <input type="file" name="attachment2" id="attachment2" class="form-control-file"  onchange= "readURL(this, 'userImg')"  >
                        </div>
                     </div>
                  </div>
                  <button type="button" id="detailButton" class="btn form-btn">SUBMIT WIPPLI</button>
               </div>
            </div>
         </form>
         
      </div>
      <div class="form-ftr">
         <p>Powerd By
            <img src="{{ url('public/wippli/img/Group%201087.png')}}" alt="ftr-logo">
         </p>
      </div>
   </div>
</div>
</section>