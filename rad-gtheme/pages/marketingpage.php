<?php
/*
Template Name: Marketing page
*/
get_header('home');
?>

    
    <main class="container-fluid">
        <div class="jumbothrone">

        <div class="text center-block">
          <h1 class="text-uppercase center-block text-center">THE BODY IN MOTION</h1>
          <p class="text-center">AI-powered, real-time motion capture<br>
for AR, VR and 3D animation</p>
</div>
        </div>

        <section class="row introduction" id="introduction">

         <h2 class="text-uppercase center-block text-center">Incredibly fast & easy motion capture</h2>

          
          <div class="row center-block introduction-features">

              <div class="col-xs-12 col-sm-2 center-block">
                <div class="box box-img">

                   <img class="img-responsive center-block" src="<?php echo get_home_url(); ?>/wp-content/uploads/2017/08/devices.png" alt="#">
                </div>
                <p class="text-uppercase text-center">Shoot on any 2D device</p>
              </div>

              <div class="hidden-xs col-sm-1 center-block dash"></div>

              <div class="col-xs-12 col-sm-2 center-block">
                <div class="box text-center">AI</div>
                <p class="text-uppercase text-center">Artificial intelligence</p>
              </div>

              <div class="col-sm-1 hidden-xs center-block dash "></div>

              <div class="col-xs-12 col-sm-2 center-block">
                <div class="box text-center box-text">FBX</div>
                <p class="text-uppercase text-center">Immediate results</p>
              </div>

          </div>
         

          <div class="row cta-row">
            <a href="#sign-popup" class="lightbox col-xs-12 col-sm-3  col-sm-offset-5 btn btn-lg text-uppercase try-it-btn">Try it for free</a>
            <div class="col-xs-12 col-md-3">
              <p>Sign up in under a minute. <br>
              No credit card required.</p>
            </div>
          </div>

        </section>


        <section class="row features" id="features">
          <h2 class="text-uppercase text-center center-block">Features</h2>

          <div class="row">
            <div class="col-xs-10 col-xs-offset-2 col-sm-6 col-sm-offset-3 col-md-7">
                <ul class="list-unstyled">
                  
                  <li class="f-aminate">Automatically detects human motion in 2D videos and converts it into 3D space. 
 </li>
                  <li class="f-aminate">No depth-sensing cameras, sensors, markers, suits, software or constrained environments. </li>
                  <li class="f-aminate">Results can be instantly processed into moving animations. </li>
                  
                </ul>
            </div>
          </div>

          <!--
           <a href="#" class="col-xs-10 col-sm-3 btn btn-lg text-uppercase text-center try-it-btn">Try it for free</a>-->
          
        </section>

        <section class="row freedom-to-create" id="freedom-to-create">
          <h2 class="text-uppercase text-center center-block">Freedom to create and iterate</h2>
          <h3 class="text-center center-block">Our platform provides freedom to create, test and iterate.<br> 
Our AI detects most poses and motion independently of the clothing worn in the video.<br>
No sensors, markers or suits required. </h3>

          <div class="row center-block any-device">
            <div class="col-xs-12 col-sm-4">
                <h4 class="text-uppercase text-right">Any device</h4>
                <p class="text-right">From smartphones through professional cameras, you can shoot on any device.</p>
            </div>
            <div class="col-xs-12 col-sm-8 center-block any-device-image">
                <img class="img-responsive" src="<?php echo get_home_url(); ?>/wp-content/uploads/2017/08/devices2.png" alt="different devices">
            </div>
          </div>

          <div class="row center-block second-row">
            <div class="col-xs-12 col-sm-4">
                <h4 class="text-uppercase text-right">Any environment</h4>
                <p class="text-right">Non-human objects are automatically ignored. We require no specific lighting conditions. </p>
            </div>
            <div class="col-xs-12 col-sm-8">
              <div class="row center-block">

                <div class="col-sm-4">
                <p class="circle text-uppercase">Outdoors</p>
                <img  class="img-responsive" src="<?php echo get_home_url(); ?>/wp-content/uploads/2017/08/nature.png" alt="nature"></div>

                <div class="col-sm-4">
                <p class="circle text-uppercase">Home</p><img  class="img-responsive" src="<?php echo get_home_url(); ?>/wp-content/uploads/2017/08/interior.png" alt="nature"></div>

                <div class="col-sm-4">
                <p class="circle text-uppercase">Studio</p><img  class="img-responsive" src="<?php echo get_home_url(); ?>/wp-content/uploads/2017/08/studio.png" alt="nature"></div>

              </div>
            </div>
          </div>
          
        </section>



        <section class="row output" id="output">
          <h2 class="text-uppercase text-center center-block">Output</h2>
          <h3 class="text-center center-block">We deliver plug-and-play output that is user-friendly.<br> 
Our results are pre-cleaned, and can be instantly previewed and downloaded. </h3>

          <div class="row center-block">
          <div class="col-sm-4 col-xs-12 center-block">
            <img class="img-responsive center-block icon" src="<?php echo get_home_url(); ?>/wp-content/uploads/2017/08/1_01.png" alt="#">
            <h4 class="text-uppercase text-center">AUTOMATIC CLEAN UP</h4>
            <p class="text-center">All output from a scan is put through proprietary algorithms to clean your results for maximum utility.</p><p class="text-center">  

We de-jitter, de-snap and normalize the data, so you can best plug them into your pipeline. </p>
          </div>


          <div class="col-sm-4 col-xs-12 center-block middle-block">
            <img class="img-responsive center-block results" src="<?php echo get_home_url(); ?>/wp-content/uploads/2017/08/1_03.png" alt="#">
            <h4 class="text-uppercase text-center">PREVIEW RESULTS</h4>
            <p class="text-center">We make all results available through our cloud-based visualization engine.</p> 
<p class="text-center">
A rendered skeletal armature allows you to pre-visualize your work product long before you start working on the MoCap file as part of your rig. 

  </p>
  </div>
          <div class="col-sm-4 col-xs-12 center-block">
            <img class="img-responsive center-block icon" src="<?php echo get_home_url(); ?>/wp-content/uploads/2017/08/1_05.png" alt="#">
            <h4 class="text-uppercase text-center">Downloads</h4>
            <p class="text-center">All results are downloadable, for use across animation and gaming engines, including: </p>
            <p>FBX <b>(*.fbx)</b>, AutoCAD DXF <b>(*.dxf)</b>, Alias OBJ <b>(*.obj)</b>, Collada DAE <b>(*.dae)</b>,
            Biovision BVH <b>(*.bvh)</b>, Motion Analysis HTR <b>(*.htr)</b> / TRC <b>(*.trc)</b>, Acclaim ASF <b>(*.asf)</b> / AMC <b>(*.amc)</b></p>

            <ul style="display: none;">
              <li>- FBX (*.fbx)</li>
              <li>- AutoCAD DXF (*.dxf)</li>
              <li>- Alias OBJ (*.obj)</li>
              <li>- Collada DAE (*.dae)</li>
              <li>- Biovision BVH (*.bvh)</li>
              <li>- Motion Analysis HTR (*.htr) / TRC (*.trc)</li>
              <li>- Acclaim ASF (*.asf) / AMC (*.amc)</li>
            </ul>

          </div>
            
          </div>
          
        </section>



         <section class="row how-it-works" id="how-it-works">
          <h2 class="text-uppercase text-center center-block">how it works</h2>
          <h3 class="text-center center-block">Access RAD whenever you need, wherever you are. We’re always on. </h3>

          <div class="row center-block">

            <div class="col-xs-12 col-sm-6">

            <div class="item center-block text-center">
              
              <div class="center-block">
                <img class="img-responsive center-block" src="<?php echo get_home_url(); ?>/wp-content/uploads/2017/08/1_39.png" alt="#">
                <p class="text-uppercase">cloud processing</p>
              </div>

              <ul class="text-center">
                <li>Low cost</li>
                <li>No hardware required</li>
                <li>On demand</li>
              </ul>


              </div>

              <a href="#sign-popup" class="lightbox col-xs-12 col-sm-10  col-md-6 btn btn-lg text-uppercase try-it-btn center-block">Try it out</a>

            

            </div>

            <div class="col-xs-12 col-sm-6">
              

              <div class="item center-block text-center">
              
              <div class="center-block">
                <img class="img-responsive center-block" src="<?php echo get_home_url(); ?>/wp-content/uploads/2017/08/1_36.png" alt="#">
                <p class="text-uppercase">On premise</p>
              </div>

              <ul class="text-center">
                <li>Real time</li>
                <li>Unlimited access</li>
                <li>API Integrations</li>
              </ul>

              </div>

              <a href="tel:+18444387231" class="col-xs-12 col-sm-10  col-md-6 btn btn-lg text-uppercase try-it-btn center-block">CALL US: +1 (844) get-rad1</a>

            

            </div>
            
          </div>
          
        </section>



        <section class="row the-right-package" id="the-right-package">
          <h2 class="text-uppercase text-center center-block">The right package for everyone</h2>
          <h3 class="text-center center-block">See why so many independent animators and studios<br> 
use RAD to power motion in 3D animation and AR/VR. </h3>

          <div class="row center-block">

           <div class="col-xs-12 col-sm-4 col-sm-offset-3 tta">Sign up in under a minute. No credit card required. </div>
           <a href="#sign-popup" class="lightbox col-xs-12 col-sm-3 btn btn-lg text-uppercase try-it-btn">Try it for free</a>
          </div>

          <div class="row table">

            <div class="col-sm-2 col-md-offset-1 col-sm-offset-1 hidden-xs row-names">
              <div class="title">&nbsp;</div>
              <div class="content-table">
                <ul>
                  <li>Price</li>
                  <li>Delivery Method</li>
                  <li>Credits</li>
                  <li class="star">Playtime</li>
                  <li>GPU</li>
                  <li class="pound">Processing time</li>
                  <li>Automatic Cleanup</li>
                  <li>All downloads</li>
                  <li>Customer Support</li>
                </ul>
              </div>
            </div>

            <div class="col-sm-2 column-one">

            <div class="visible-xs col-xs-6">
                <div class="title"></div>
                  <div class="content-table">
                    <ul>
                      <li>Price</li>
                      <li>Delivery Method</li>
                      <li>Credits</li>
                      <li class="star">Playtime</li>
                      <li>GPU</li>
                      <li class="pound">Processing time</li>
                      <li>Automatic Cleanup</li>
                      <li>All downloads</li>
                      <li>Customer Support</li>
                    </ul>
                  </div>
             
                </div>

                <div class="col-xs-6 col-sm-12">
                  <div class="title">PRO</div>
                    <div class="content-table">
                      <ul>
                        <li class="price-option"><small>$</small>400</li>
                        <li>Cloud</li>
                        <li>120</li>
                        <li>360 seconds</li>
                        <li>Nvidia Quadro P5000</li>
                        <li>2x playtime (or faster)</li>
                        <li class="checkmark"></li>
                        <li class="checkmark"></li>
                        <li>phone or email</li>
                      </ul>
                    </div>

                </div>
           

            

          </div><!-- end option column-->

          <div class="col-sm-2 column-one">

            <div class="visible-xs col-xs-6">
                <div class="title text-uppercase"></div>
                  <div class="content-table">
                    <ul>
                      <li>Price</li>
                      <li>Delivery Method</li>
                      <li>Credits</li>
                      <li class="star">Playtime</li>
                      <li>GPU</li>
                      <li class="pound">Processing time</li>
                      <li>Automatic Cleanup</li>
                      <li>All downloads</li>
                      <li>Customer Support</li>
                    </ul>
                  </div>
             
                </div>

                <div class="col-xs-6 col-sm-12">
                  <div class="title text-uppercase">Advanced</div>
                    <div class="content-table">
                      <ul>
                        <li class="price-option"><small>$</small>125</li>
                        <li>Cloud</li>
                        <li>30</li>
                        <li>90 seconds</li>
                        <li>Nvidia Quadro P5000</li>
                        <li>3x playtime (or faster)</li>
                        <li class="checkmark"></li>
                        <li class="checkmark"></li>
                        <li>phone or email</li>
                      </ul>
                    </div>

                </div>
           

            

          </div><!-- end option column-->

          <div class="col-sm-2 column-one">

            <div class="visible-xs col-xs-6">
                <div class="title text-uppercase"></div>
                  <div class="content-table">
                    <ul>
                      <li>Price</li>
                      <li>Delivery Method</li>
                      <li>Credits</li>
                      <li class="star">Playtime</li>
                      <li>GPU</li>
                      <li class="pound">Processing time</li>
                      <li>Automatic Cleanup</li>
                      <li>All downloads</li>
                      <li>Customer Support</li>
                    </ul>
                  </div>
             
                </div>

                <div class="col-xs-6 col-sm-12">
                  <div class="title text-uppercase">Basic</div>
                    <div class="content-table">
                      <ul>
                        <li class="price-option"><small>$</small>50</li>
                        <li>Cloud</li>
                        <li>10</li>
                        <li>30 seconds</li>
                        <li>Nvidia Quadro K6000</li>
                        <li>up to 120 minutes</li>
                        <li class="checkmark"></li>
                        <li class="checkmark"></li>
                        <li>email</li>
                      </ul>
                    </div>

                </div>
           

            

          </div><!-- end option column-->


          <div class="col-sm-2 column-one last">

            <div class="visible-xs col-xs-6">
                <div class="title text-uppercase"></div>
                  <div class="content-table">
                    <ul>
                      <li>Price</li>
                      <li>Delivery Method</li>
                      <li>Credits</li>
                      <li class="star">Playtime</li>
                      <li>GPU</li>
                      <li class="pound">Processing time</li>
                      <li>Automatic Cleanup</li>
                      <li>All downloads</li>
                      <li>Customer Support</li>
                    </ul>
                  </div>
             
                </div>

                <div class="col-xs-6 col-sm-12">
                  <div class="title text-uppercase">Enterprise</div>
                    <div class="content-table">
                      <ul>
                        <li>&nbsp;</li>
                        <li>On Premise and Cloud</li>
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                        <li><b class="text-uppercase">Call us</b></li>
                        <li><a href="tel:+18444387231"><b>+1 (844) get-rad1 </b></a><a href="tel:+18444387231"><b> +1 (844) 438-7231</b></a></li>
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                        <li>&nbsp;</li>
                        
                        
                      </ul>
                    </div>

                </div>
           

            

          </div><!-- end option column-->

          
          </div>

          <div class="row table-footer">
            <div class="col-xs-12 col-sm-6 center-block">
               <p class="star">Estimated. Assumes an average 30 fps. Higher fps rates will result in reduced total playtime. </p> 
<p class="pound">Estimated time required to process one uploaded video file. Does not include upload time. Fps rates above
     30 may result in longer processing times.
     processing time. </p>
            </div>
          </div>
          
        </section>


        <section class="row testimonials" id="testimonials">

        <h2 class="text-uppercase text-center center-block">Testimonials</h2>
          
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                  <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner" role="listbox">


                  <div class="item active text-center center-block">
                    <img class="center-block" src="<?php echo get_home_url(); ?>/wp-content/uploads/2017/08/1_46.png" alt="...">
                    <div class="carousel-caption text-center">
                    <p>“Simply the best system I have ever used on my own projects and with my students. <br>
RAD is the future of motion capture in 3D animation, AR and VR.”</p>

<p>- MATTHEW RADER</p>
<p>
Professor @Fashion Institute of Technology, @School of Visual Arts<br>
Director  @REED + RADER</p>
                    </div>
                  </div>


                  <div class="item text-center center-block">
                    <img class="center-block" src="<?php echo get_home_url(); ?>/wp-content/uploads/2017/08/1_46.png" alt="...">
                    <div class="carousel-caption">
                      <p>
                      “Simply the best system I have ever used on my own projects and with my students. <br>
RAD is the future of motion capture in 3D animation, AR and VR.”</p>

<p>- MATTHEW RADER</p>
<p>
Professor @Fashion Institute of Technology, @School of Visual Arts<br>
Director  @REED + RADER</p>
                    </div>
                  </div>

                  <div class="item text-center center-block">
                    <img class="center-block" src="<?php echo get_home_url(); ?>/wp-content/uploads/2017/08/1_46.png" alt="...">
                    <div class="carousel-caption">
                     <p>
                      “Simply the best system I have ever used on my own projects and with my students. <br>
RAD is the future of motion capture in 3D animation, AR and VR.”</p>

<p>- MATTHEW RADER</p>
<p>
Professor @Fashion Institute of Technology, @School of Visual Arts<br>
Director  @REED + RADER</p>
                    </div>
                  </div>


                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                  <span class="arrow"><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2017/08/left.png" alt="previous slide"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                  <span class="arrow"><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2017/08/right.png" alt="next slide"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>






        </section>



        <section class="row our-mission" id="our-mission">
          <h2 class="text-uppercase text-center center-block">our mission</h2>
        

          <div class="row center-block">
          <div class="col-xs-12 col-sm-7">
          <div>
            <p class="text-right">
              RAD was founded to develop the world’s most powerful computer vision technology focused on detecting, interpreting and measuring the human body in digital images.</p>
<p class="text-right">
AI-powered motion capture for 3D animation, AR, VR and MR <br>
— in the cloud and on every device.</p>
<p class="text-right">
To achieve this, we are using multiple bodies of science in a proprietary configuration, including computer vision, deep learning and anthropometry. Our system continually learns and perpetually improves. In our minds, we will never truly be done.</p>
<p class="text-right">

Our goal is to see the technology implemented across mobile, web and enterprise environments, seamlessly powering 3D animation, gaming, virtual reality, augmented reality and industrial applications, including drones, autonomous vehicles, sports and health.
            </p>

            <p class="text-right">Anna & Gavan</p>
            </div>
          </div>

          <div class="col-xs-12 col-sm-5">
            
            <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2017/08/tablet.png" alt="#">
          </div>
            

            
            
          </div>
          
        </section>



        <section class="row our-team">
          <h2 class="text-uppercase text-center center-block">Team</h2>
        

          <div class="row center-block">
          
            <div class="col-xs-12 col-sm-4">
              
              <div class="row">
                <div class="col-xs-5"><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2017/08/1_08.png" alt="#"></div>
                <div class="col-xs-7">
                  <h5 class="team-name text-uppercase">Gavan Gravesen</h5>
                  <p class="job-title">Co-founder & CEO</p>
                  </div>
              </div>
              <p>Worked @Slated.com (co-founder), @Deutsche Bank, @Cleary Gottlieb • Studied @New York University School of Law, @Copenhagen University, @Conservatory of Music, Berlin</p>
            </div>


            <div class="col-xs-12 col-sm-4">
              
              <div class="row">
                <div class="col-xs-5"><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2017/08/1_15.png" alt="#"></div>
                <div class="col-xs-7">
                  <h5 class="team-name text-uppercase">Anna Bellini</h5>
                  <p class="job-title">Co-founder & CTO</p>
                  </div>
              </div>
              <p>Worked @TopTal(Lead Director of Engineering), @CASY (3D Drone Simulation Scientist) • Studied @Università di Bologna (MS, CS)</p>
            </div>
            

            <div class="col-xs-12 col-sm-4">
              
              <div class="row">
                <div class="col-xs-5"><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2017/08/1_10.png" alt="#"></div>
                <div class="col-xs-7">
                  <h5 class="team-name text-uppercase">ROGER HIE</h5>
                  <p class="job-title">Strategy & Marketing</p>
                  </div>
              </div>
              <p>
                Worked @CANDR&CO (founder), @InDigital Media Group (CEO), @Young & Rubicam (Global Strategy Director) • Studied & @University of Technology - Sydney, Australia
              </p>
            </div>
            
          </div>



          <div class="row center-block">
          
            <div class="col-xs-12 col-sm-4">
              
              <div class="row">
                <div class="col-xs-5"><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2017/08/1_12.png" alt="#"></div>
                <div class="col-xs-7">
                  <h5 class="team-name text-uppercase">PROF. SERGE BELONGIE</h5>
                  <p class="job-title">Advisor</p>
                  </div>
              </div>
              <p>Professor @Cornell U. / Cornell Tech (Computer Vision, Machine Learning), @Orpix (Co-founder & Technical Advisor), @DigitalPersona (Co-founder) • Google Scholar • Studied @Berkeley (PhD)</p>
            </div>


            <div class="col-xs-12 col-sm-4">
              
              <div class="row">
                <div class="col-xs-5"><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2017/08/1_18.png" alt="#"></div>
                <div class="col-xs-7">
                  <h5 class="team-name text-uppercase">STEVE SADOVE</h5>
                  <p class="job-title">Advisor</p>
                  </div>
              </div>
              <p>Board @JCPenney, @Aramark, @Colgate, @Palmolive, @Ruby Tuesday • Worked @Saks (CEO), @Bristol-Myers Squibb (CEO), @Clairol (President), @Kraft General Foods • Studied @Harvard Business School</p>
            </div>
            

            <div class="col-xs-12 col-sm-4">
              
              <div class="row">
                <div class="col-xs-5"><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2017/08/1_20.png" alt="#"></div>
                <div class="col-xs-7">
                  <h5 class="team-name text-uppercase">Dr. Jeffrey A Sachs</h5>
                  <p class="job-title">Advisor</p>
                  </div>
              </div>
              <p>
                Worked @Sachs Policy Group (CEO/Owner), @Health Policy Advisory Committee on federal health care reform (member), @HELP USA (founding director) • Studied @Stony Brook University School of Dental Medicine
              </p>
            </div>
            
          </div>




          <div class="row center-block">
          
            <div class="col-xs-12 col-sm-4">
              
              <div class="row">
                <div class="col-xs-5"><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2017/08/1_23.png" alt="#"></div>
                <div class="col-xs-7">
                  <h5 class="team-name text-uppercase">SIMON COLLINS</h5>
                  <p class="job-title">Advisor</p>
                  </div>
              </div>
              <p>Worked @Parsons School of Design (Dean), @Nike, @Ralph Lauren, @Zegna, @Marks & Spencer • Advisor @WGSN, @WME/IMG • Studied @Epsom School of Art & Design</p>
            </div>
          </div>
          
        </section>

        <footer>
          <div class="row">

            <div class="col-xs-12 col-sm-4">
            <div class="row">
              <div class="col-xs-8">
                  <img src="<?php echo get_home_url(); ?>/wp-content/uploads/2017/08/logo-rad.png" alt="#">
              </div>
            </div>
              <p class="about">AI-powered motion capture for 3D animation, AR, VR and MR — in the cloud and on every device. We’re always learning and improving. Get in touch to find out what’s next.</p>

              <div class="row social">
              <p class="text-uppercase social-title">social</p>

              <a href="google.com" target="_blank">
                <div class="col-xs-6">
                  <div class="col-xs-3"><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2017/08/social_03.png" alt="#"></div>
                  <div class="col-xs-9"><p class="text-uppercase">follow us</p><p>on Twitter</p></div>
                </div>
              </a>

                <a href="google.com" target="_blank">
                <div class="col-xs-6">
                  <div class="col-xs-3"><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2017/08/social_05.png" alt="#"></div>
                  <div class="col-xs-9"><p class="text-uppercase">find us</p><p>on Linked In</p></div>
                </div>
              </a>

              </div>


              <div class="row social">

                <a href="google.com" target="_blank">
                <div class="col-xs-6">
                  <div class="col-xs-3"><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2017/08/social_10.png" alt="#"></div>
                  <div class="col-xs-9"><p class="text-uppercase">follow us</p><p>on AngelList</p></div>
                </div>
              </a>


                <a href="google.com" target="_blank">
                <div class="col-xs-6">
                  <div class="col-xs-3 facebook"><img src="<?php echo get_home_url(); ?>/wp-content/uploads/2017/08/fb_03_03.png" alt="#"></div>
                  <div class="col-xs-9"><p class="text-uppercase">find us</p><p>on Facebook</p></div>
                </div>
              </a>


              </div>
            </div>

            <div class="col-xs-12 col-sm-4 contact-us">
              <h6 class="footer-title text-uppercase">contact us</h6>

              <div class="contact-box">
                <p class="text-uppercase social-title">want updates?</p>
                  <form action="#">
                      <div class="input-group">
                         <button class="btn btn-info btn-lg enter-email" type="submit"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></button>
                         <input class="btn btn-lg" name="email" id="email" type="email" placeholder="Your email here" onfocus="this.placeholder=''" onblur="this.placeholder = 'Your email here'" required>
                         
                      </div>
                  </form>
              </div>

              <div class="contact-box">
                <p class="text-uppercase social-title">Support</p>

                <div class="row">
                   <div class="col-xs-3">
                       <a href="mailto:example@email.com" class="btn btn-info btn-lg mailto"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
                  </div>
                  <div class="col-xs-9">
                    If you’re an existing user with a question, don’t hesitate.
                  </div>

                  </div>


              </div>


              <div class="contact-box">
                <p class="text-uppercase social-title">sales</p>

                <div class="row">
                   <div class="col-xs-3">
                       <a href="mailto:example@email.com" class="btn btn-info btn-lg mailto"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
                  </div>
                  <div class="col-xs-9">
                    If you’re an existing user with a question, don’t hesitate.
                  </div>

                  </div>

                  
              </div>



              <div class="contact-box">
                <p class="text-uppercase social-title">partners</p>

                <div class="row">
                   <div class="col-xs-3">
                       <a href="mailto:example@email.com" class="btn btn-info btn-lg mailto"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
                  </div>
                  <div class="col-xs-9">
                    If you’re an existing user with a question, don’t hesitate.
                  </div>

                  </div>

                  
              </div>


             

              

            </div>

            <div class="col-xs-12 col-sm-4">
              <h6 class="footer-title">The RAD Lab</h6>
              <address>
                <p class="text-uppercase social-title ">office</p>
                <p>125 West 31 Street, Ste 25B<br>
New York, NY 10001</p>
              </address>

              <ul class="contacts">
                <li class="phone"><a href="tel:+19172266244">+1 917 226 6244</a></li>
                <li class="email"><a href="mailto:example@mail.com">info@getrad.co</a></li>
               <li class="skype"> getRAD</li>
              </ul>

              <?php
                  if( has_nav_menu( 'legal' ) )
                        wp_nav_menu( array(
                                'container'    => false,
                                'theme_location' => 'legal',
                                'menu_class'     => 'nav',
                                'items_wrap'     => '<ul class="addtnl-menu text-uppercase">%3$s</ul>',
                                'walker'         => new Dash_Walker_Nav_Menu
                            )
                    );
              ?>

              <!-- <ul class="addtnl-menu">
                <li><a href="#" class="text-uppercase">term of service</a></li>
                <li><a href="#" class="text-uppercase">privacy policy</a></li>
                <li><a href="#" class="text-uppercase">dmca</a></li>
              </ul> -->
            </div>

          </div>

          <div class="row copyright">
            <div class="col-xs-12">
              <p>&copy;Copyright 2017 <span>RADical Solutions, LLC</span>   |   All Rights Reserved</p>
            </div>
          </div>

        </footer>



    </main>
 
  <?php get_footer('home'); ?>