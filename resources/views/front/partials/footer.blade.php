    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('front/assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('front/assets/js/custom.js')}}"></script>
{{--    <script src="{{asset('backend/assets/js/custom.js')}}"></script>--}}
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <!-- Initialize Slider -->
    <script type="text/javascript">
        $(document).ready(function(){
            $('.image-slider').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                dots: true,
                arrows: true,
                autoplay: true,
                autoplaySpeed: 2000,
            });
        });
    </script>
    <footer>
      <section class="blue_sec" style="background:url('front/assets/img/get.png');">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <strong>Unlock Exclusive Benefits</strong>
              <h5>Join The Membership Today!</h5>
              <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="btn_row">
                <a href="" class=" wht_btn">Log in</a>
                <a href="" class="trans_btn">sign up</a>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="footer_sec">
        <div class="container-fluid">
          <div class="row row_1">
            <div class=" ft1 col-md-3 col-sm-12">
              <img src="{{asset('front/assets/img/footer_logo.png')}}">
            </div>
            <div class="ft2 col-md-5 col-sm-12 d-flex justify-content-between">
              <div class="menu_box">
                <h3 class="widget_title">Product</h3>
                <ul>
                  <li><a href="javascript:;">Features</a></li>
                  <li><a href="/pricing">Pricing</a></li>
                </ul>
              </div>
              <div class="menu_box">
                <h3 class="widget_title">Resources</h3>
                <ul>
                  <li><a href="javascript:;">Blog</a></li>
                  <li><a href="javascript:;">Learn</a></li>
                </ul>
              </div>
              <div class="menu_box">
                <h3 class="widget_title">Company</h3>
                <ul>
                  <li><a href="/about-us">About</a></li>
                  <li><a href="javascript:;">Career</a></li>
                  <li><a href="/contact-us">Contact us</a></li>
                </ul>
              </div>
            </div>
            <div class="ft3 col-md-4 col-sm-12">
              <h3 class="widget_title">Company</h3>
              <p>For grcduCt announcements and exclusive insights</p>
              <form action="/submit-newsletter" method="post" class="newsletter_form">
                <input type="email" id="email" name="email" placeholder="Input your email" required><br><br>
                <button class="submit_btn"><i class="fa-solid fa-arrow-right"></i></button>
              </form>
            </div>
          </div>
          <div class="row row_2">
            <div class="col-md-3 col-sm-12">
              <select id="language" class="language_dropdown" name="language" required>
                <option value="english">English</option>
                <option value="spanish">Spanish</option>
                <option value="french">French</option>
                <option value="german">German</option>
                <option value="chinese">Chinese</option>
                <option value="arabic">Arabic</option>
              </select>
            </div>
            <div class="col-md-6 col-sm-12">
              <div class="site_info text-center">
                © 2024 <a href="/">Prompt Xchange, LLC</a>. • Privacy • Terms • Sitemap
              </div>
            </div>
            <div class="col-md-3 col-sm-12">
              <ul class="social_icons d-flex justify-content-end list-unstyled">
                <li><a href="javascript:;"><i class="fa-brands fa-facebook"></i></a></li>
                <li><a href="javascript:;"><i class="fa-brands fa-twitter"></i></a></li>
                <li><a href="javascript:;"><i class="fa-brands fa-linkedin-in"></i></a></li>
                <li><a href="javascript:;"><i class="fa-brands fa-youtube"></i></a></li>
              </ul>
            </div>
          </div>
      </section>
    </footer>
    </body>

    </html>
