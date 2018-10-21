
@extends('layouts.frontmaster')

@section('content')
<div class="main-body" style="padding-top:180px;">
    <!--Contact Section-->
<section class="contact-section contact-section1 section-padding section-background">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <!--Contact Info Tabs-->
            <div class="contact-info">
                <div class="row ">
 <!-- contact-content Start -->
                                <div class="col-md-4">
                                  <div class="contact-content">
                                    <div class="contact-header contact-form">
                                      <h2>Get In Touch</h2>
                                    </div>
                                    <div class="contact-list">
                                      @php $c = App\Contact::orderBy('id','asc')->first() @endphp
                                      <ul>
                                        <li>
                                          <div class="contact-thumb"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                                          <div class="contact-text">
                                            <p>Address:<span>{{ $c->address }}</span></p>
                                          </div>
                                        </li>
                                        <li>
                                          <div class="contact-thumb"><i class="fa fa-phone" aria-hidden="true"></i></div>
                                          <div class="contact-text">
                                            <p>Call Us :<span>{{ $c->cell_number }}</span></p>
                                          </div>
                                        </li>
                                        <li>
                                          <div class="contact-thumb"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                                          <div class="contact-text">
                                            <p>Mail Us :<span>{{ $c->email }}</span></p>
                                          </div>
                                        </li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                                <!-- contact-content End -->                               
                                <!--Form Column-->
                                <div class="form-column col-md-8 col-sm-12 ">
                                    <!-- Contact Form -->
                                    <div class="contact-form ">
                                        <h2>Send Message Us</h2>
                                       
            
                                      
                                       <form action="" method="post">
                                            <div class="row clearfix">
                                                <div class="col-md-6  col-xs-12 form-group">
                                                    <input type="text" name="name" id="name" placeholder="Your Name*" required="">
                                                </div>
                
                                                <div class="col-md-6  col-xs-12 form-group">
                                                    <input type="email" name="email" id="email" placeholder="Email Address*" required="">
                                                </div>
                
                                                <div class=" col-md-12   form-group">
                                                    <textarea name="message" id="message" placeholder="Your Message..."></textarea>
                                                </div>
                
                                                <div class=" col-md-12 form-group">
                                                    <button class="theme-btn btn-style-one" type="submit" id="submit_subscribe" name="submit-form">Send Message</button>
                                                </div>
                
                                            </div>
                                        </form>
                
                        </div>
                  <!--End Comment Form -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--End Contact Section-->
    <!--Map Section-->
    <div class="map-section">
      <!--Map Outer-->
        <div class="map-outer">
            <div class="google-map" 
                id="contact-google-map" 
                data-map-lat="44.529688" 
                data-map-lng="-72.933009" 
                data-icon-path="assets/img/map-marker.png" 
                data-map-title="Brooklyn, New York, United Kingdom" 
                data-map-zoom="14" 
                data-markers='{
                    "marker-1": [44.529688, -72.933009, "<h4>Head Office</h4><p>44/108 Brooklyn, UK</p>"],
                    "marker-2": [44.231172, -76.485954, "<h4>Branch Office</h4><p>4/99 Alabama, USA</p>"],
                    "marker-3": [44.999684, -69.070334, "<h4>Branch Office</h4><p>4/99 Maine, USA</p>"],
                    "marker-4": [40.880550, -77.393705, "<h4>Branch Office</h4><p>4/99 Pennsylvania, USA</p>"]
                }'>

        </div>

        </div>
    </div>
  <!--End Map Section--> 
</div>


<script>
     $(document).ready(function(){
        
        $(document).on('click', '#submit_subscribe', function(event) {
            event.preventDefault();
            //alert();
            var name = $('#name').val();
            var email = $('#email').val();
            var message = $('#message').val();
            if(name==''){

               swal('Error','The name field is empty!','error'); 
            }else{
                $.ajax({
                        type:"GET",
                        url:'{{route('subscriber.create')}}',
                        data : { name : name, email : email, message:message },
                        success: function (data) {
                            swal('Success','Subscirbe successfully','success');
                            $('#name').val('');
                            $('#email').val('');
                            $('#message').val('');
                        },
                        error:function (error) {
                             swal('Error','The name field is empty!','error'); 
                             console.log(message);
                           
                        }
                    });
            }

     });
 });
          
</script>
@endsection