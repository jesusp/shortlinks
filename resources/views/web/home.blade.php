@extends('web.layout')

@section('content')

    <!-- ======= About Section ======= -->
    <div  class="about-area area-padding">
        <div class="container">
            @if(isset($isValid) && $isValid)
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="section-headline text-center ">
                            <h2 class="mb-2">Your ShortLink is ready!</h2>
                            <p class="fs-6">Copy the short link and share it in messages, texts, posts, websites and other locations.</p>
                        </div>
                    </div>
                </div>
                <div class="row p-3">
                        <!-- single-well start-->
                        <div class="col">
                            <div class="input-group input-group-lg">
                                <input value="{{ $shortLink }}" type="text" id="shorturl" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" readonly="readonly">
                                <button class="btn btn-primary" type="button" id="copy-btn">Copy URL</button>
                            </div>
                            <div class="fs-6 pt-3">
                                <strong>Original URL:</strong> {{ $link }}
                            </div>
                            <div class="pt-3">

                                <a href="/" class="btn btn-primary">Try another URL</a>
                                <a href="{{ route('web.counter') }}?u={{ $shortLink }}" class="btn btn-primary">Check total clicks of your ShortLink</a>
                            </div>
                        </div>
                    </div>
            @else
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="section-headline text-center ">
                            <h2 >Paste the URL to be shortened</h2>
                        </div>
                    </div>
                </div>
                <form method="POST">
                    <div class="row pt-0 p-3">
                        <!-- single-well start-->
                        {{ csrf_field() }}
                        <div class="col">
                            <div class="input-group input-group-lg">
                                <input required name="link" value="{{ isset($isValid) && !$isValid && $link ? $link : '' }}" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="Enter the link here">
                                <button class="btn btn-primary" type="submit">Shorten URL</button>
                            </div>
                        </div>
                    </div>
                </form>
                @php 
                $error = session()->get('error');
                @endphp
                @if($error)
                  <div class="row p-3">
                    <div class="col">
                      <div class="alert alert-danger ">{{ $error }}</div>
                    </div>
                  </div>
                @endif
                @if(isset($isValid) && !$isValid)
                    <div class="row p-3">
                        <div class="col">
                            <div class="alert alert-danger ">
                                <ul class="bullet-list px-3">
                                    <li>Check if the domain is correct</li>
                                    <li>Check if the site is online</li>
                                    <li>Check the length of the url is too small</li>
                                    <li>Check the address bars and punctuation</li>
                                    <li>The URL may be being used for spam</li>
                                    <li>The URL may have been blocked</li>
                                    <li>The URL may have been reported</li>
                                    <li>The URL was recently shortened</li>
                                    <li>The URL is not allowed</li>

                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </div><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <div id="features" class="services-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline services-head text-center">
              <h2>Shorten, share and track</h2>
            </div>
          </div>
        </div>
        <div class="row text-center">
          <!-- Start Left services -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="bi bi-hand-thumbs-up"></i>
                  </a>
                  <h4>Easy</h4>
                  <p>
                  ShortURL is easy and fast, enter the long link to get your shortened link                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="bi bi-link"></i>
                  </a>
                  <h4>Shortened</h4>
                  <p>
                  Use any link, no matter what size. we make it shorter.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                   
                    <i class="bi bi-shield-check"></i>

                  </a>
                  <h4>Secure</h4>
                  <p>
                    Our service has HTTPS protocool and data encryption for your links.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="bi bi-bar-chart"></i>
                  </a>
                  <h4>Statistics </h4>
                  <p>
                    Check the number of clicks that your short URL received, You also get analtycs of your shortened link access(PREMIUM USERS).
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <!-- End Left services -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="bi bi-card-checklist"></i>

                  </a>
                  <h4>Reliable</h4>
                  <p>
                  All links that try to disseminate spam, viruses and malware are deleted


                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
          <!-- End Left services -->
          <div class="col-md-4 col-sm-4 col-xs-12">
            <!-- end col-md-4 -->
            <div class=" about-move">
              <div class="services-details">
                <div class="single-services">
                  <a class="services-icon" href="#">
                    <i class="bi bi-phone"></i>
                  </a>
                  <h4>Devices</h4>
                  <p>
                    Compatible with smartphones, tablets and desktop.
                  </p>
                </div>
              </div>
              <!-- end about-details -->
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Services Section -->

    <div id="contact" class="text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline services-head text-center">
              <h2>Contact Us</h2>
            </div>
          </div>
        </div>
        <div class="row ">
          <div class="col-md-6">
            <div class="form contact-form">
              <form action="{{ route('web.contact-us') }}" method="post" role="form" class="php-email-form">
              {{ csrf_field() }}
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                  @error('name')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                    </div>
                  @enderror
                </div>
                <div class="form-group mt-3">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                  @error('email')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                    </div>
                  @enderror
                </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                  @error('subject')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                    </div>
                  @enderror
                </div>
                <div class="form-group mt-3">
                  <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                  @error('message')
                    <div class="alert alert-danger" role="alert">
                      {{$message}}
                    </div>
                  @enderror
                </div>
                <div class="my-3">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <!-- ======= Rviews Section ======= --
    <div class="reviews-area">
      <div class="row g-0">
        <div class="col-lg-6">
          <img src="assets/img/about/2.jpg" alt="" class="img-fluid">
        </div>
        <div class="col-lg-6 work-right-text d-flex align-items-center">
          <div class="px-5 py-5 py-lg-0">
            <h2>working with us</h2>
            <h5>Web Design, Ready Home, Construction and Co-operate Outstanding Buildings.</h5>
            <a href="#contact" class="ready-btn scrollto">Contact us</a>
          </div>
        </div>
      </div>
    </div><!-- End Rviews Section -->

 

    <!-- ======= Pricing Section ======= --
    <div id="pricing" class="pricing-area area-padding">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline text-center">
              <h2>Pricing Table</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="pri_table_list">
              <h3>basic <br /> <span>$80 / month</span></h3>
              <ol>
                <li class="check"><i class="bi bi-check"></i><span>Online system</span></li>
                <li class="check"><i class="bi bi-x"></i><span>Full access</span></li>
                <li class="check"><i class="bi bi-check"></i><span>Free apps</span></li>
                <li class="check"><i class="bi bi-check"></i><span>Multiple slider</span></li>
                <li class="cross"><i class="bi bi-x"></i><span>Free domin</span></li>
                <li class="cross"><i class="bi bi-x"></i><span>Support unlimited</span></li>
                <li class="check"><i class="bi bi-check"></i><span>Payment online</span></li>
                <li class="check"><i class="bi bi-x"></i><span>Cash back</span></li>
              </ol>
              <button>sign up now</button>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="pri_table_list active">
              <span class="saleon">top sale</span>
              <h3>standard <br /> <span>$110 / month</span></h3>
              <ol>
                <li class="check"><i class="bi bi-check"></i><span>Online system</span></li>
                <li class="check"><i class="bi bi-check"></i><span>Full access</span></li>
                <li class="check"><i class="bi bi-check"></i><span>Free apps</span></li>
                <li class="check"><i class="bi bi-check"></i><span>Multiple slider</span></li>
                <li class="cross"><i class="bi bi-x"></i><span>Free domin</span></li>
                <li class="check"><i class="bi bi-check"></i><span>Support unlimited</span></li>
                <li class="check"><i class="bi bi-check"></i><span>Payment online</span></li>
                <li class="cross"><i class="bi bi-x"></i><span>Cash back</span></li>
              </ol>
              <button>sign up now</button>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="pri_table_list">
              <h3>premium <br /> <span>$150 / month</span></h3>
              <ol>
                <li class="check"><i class="bi bi-check"></i><span>Online system</span></li>
                <li class="check"><i class="bi bi-check"></i><span>Full access</span></li>
                <li class="check"><i class="bi bi-check"></i><span>Free apps</span></li>
                <li class="check"><i class="bi bi-check"></i><span>Multiple slider</span></li>
                <li class="check"><i class="bi bi-check"></i><span>Free domin</span></li>
                <li class="check"><i class="bi bi-check"></i><span>Support unlimited</span></li>
                <li class="check"><i class="bi bi-check"></i><span>Payment online</span></li>
                <li class="check"><i class="bi bi-check"></i><span>Cash back</span></li>
              </ol>
              <button>sign up now</button>
            </div>
          </div>
        </div>
      </div>
    </div><!-- End Pricing Section -->

    <!-- ======= Testimonials Section ======= --
    <div id="testimonials" class="testimonials">
      <div class="container">

        <div class="testimonials-slider swiper">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                <h3>Saul Goodman</h3>
                <h4>Ceo &amp; Founder</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item --

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Sara Wilsson</h3>
                <h4>Designer</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item --

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Jena Karlis</h3>
                <h4>Store Owner</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item --

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Matt Brandon</h3>
                <h4>Freelancer</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item --

            <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                <h3>John Larson</h3>
                <h4>Entrepreneur</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item --

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </div><!-- End Testimonials Section -->

   


  

@stop
@section('scripts')
    @if(isset($isValid) && $isValid)
        <script>
            $(function() {
                $("#copy-btn").on('click', () => {
                    document.getElementById('shorturl').select();
                    document.execCommand("copy");
                });
                
            });
        </script>
    @endif
@stop