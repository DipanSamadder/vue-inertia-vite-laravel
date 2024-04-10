<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="images/favicon.png">
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $des }}">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">

    @vite(['resources/css/app.css','resources/js/app.js'])
    
    @inertiaHead
  </head>

  <body>

    @routes

    @inertia
    <!-- <section>
    <div class="features_section bg-light space_sec" id="features_section">
      <div class="container">
        <div class="heading_sec text-center">
          <h2 class="head">Programs Offered</h2>
        </div>
        <div class="programs_slider_outer">
          <div class="swiper programs_slider">
            <div class="swiper-wrapper">
              <div class="swiper-slide">
                <div class="features_box m_height text-center">
                  <span><img src="frontend/images/p_icon1.png" alt="icon1" class="img-fluid"></span>
                  <div class="heading_sec">
                    <h3>Playway</h3>
                    <ul class="d-flex align-items-center justify-content-around">
                      <li>1.5 - 2.5 Years</li>
                      <li>2.5 Hours/Day</li>
                    </ul>
                  </div>
                  <div class="para_sec p_height">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo eligendi laborum corporis quam nesciunt unde cumque laudantium possimus placeat aliquid quos, cupiditate cum nihil nam molestias, delectus porro iusto reiciendis.</p>
                  </div>
                  <div class="about_btn">
                    <a href="#" class="site_btn"><span>Raed More</span></a>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="features_box m_height text-center">
                  <span><img src="frontend/images/p_icon2.png" alt="icon1" class="img-fluid"></span>
                  <div class="heading_sec">
                    <h3>Pre Nursery</h3>
                    <ul class="d-flex align-items-center justify-content-around">
                      <li>1.5 - 2.5 Years</li>
                      <li>2.5 Hours/Day</li>
                    </ul>
                  </div>
                  <div class="para_sec p_height">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo eligendi laborum corporis quam nesciunt unde cumque laudantium possimus placeat aliquid quos, cupiditate cum nihil nam molestias, delectus porro iusto reiciendis.</p>
                  </div>
                  <div class="about_btn">
                    <a href="#" class="site_btn"><span>Raed More</span></a>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="features_box m_height text-center">
                  <span><img src="frontend/images/p_icon3.png" alt="icon1" class="img-fluid"></span>
                  <div class="heading_sec">
                    <h3>Nursery</h3>
                    <ul class="d-flex align-items-center justify-content-around">
                      <li>1.5 - 2.5 Years</li>
                      <li>2.5 Hours/Day</li>
                    </ul>
                  </div>
                  <div class="para_sec p_height">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo eligendi laborum corporis quam nesciunt unde cumque laudantium possimus placeat aliquid quos, cupiditate cum nihil nam molestias, delectus porro iusto reiciendis.</p>
                  </div>
                  <div class="about_btn">
                    <a href="#" class="site_btn"><span>Raed More</span></a>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="features_box m_height text-center">
                  <span><img src="frontend/images/p_icon4.png" alt="icon1" class="img-fluid"></span>
                  <div class="heading_sec">
                    <h3>KG</h3>
                    <ul class="d-flex align-items-center justify-content-around">
                      <li>1.5 - 2.5 Years</li>
                      <li>2.5 Hours/Day</li>
                    </ul>
                  </div>
                  <div class="para_sec p_height">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo eligendi laborum corporis quam nesciunt unde cumque laudantium possimus placeat aliquid quos, cupiditate cum nihil nam molestias, delectus porro iusto reiciendis.</p>
                  </div>
                  <div class="about_btn">
                    <a href="#" class="site_btn"><span>Raed More</span></a>
                  </div>
                </div>
              </div>
              <div class="swiper-slide">
                <div class="features_box m_height text-center">
                  <span><img src="frontend/images/p_icon5.png" alt="icon1" class="img-fluid"></span>
                  <div class="heading_sec">
                    <h3>Daycare</h3>
                    <ul class="d-flex align-items-center justify-content-around">
                      <li>1.5 - 2.5 Years</li>
                      <li>2.5 Hours/Day</li>
                    </ul>
                  </div>
                  <div class="para_sec p_height">
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nemo eligendi laborum corporis quam nesciunt unde cumque laudantium possimus placeat aliquid quos, cupiditate cum nihil nam molestias, delectus porro iusto reiciendis.</p>
                  </div>
                  <div class="about_btn">
                    <a href="#" class="site_btn"><span>Raed More</span></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-pagination programs_pagination"></div>
        </div>
      </div>
      <img src="frontend/images/bubble_icon1.png" alt="bubble_icon1" class="bubble_icon1">
      <img src="frontend/images/bubble_icon2.png" alt="bubble_icon2" class="bubble_icon2">
      <img src="frontend/images/bubble_icon3.png" alt="bubble_icon1" class="bubble_icon3">
      <img src="frontend/images/bubble_icon4.png" alt="bubble_icon2" class="bubble_icon4">
      <img src="frontend/images/bubble_icon1.png" alt="bubble_icon1" class="bubble_icon5">
      <img src="frontend/images/bubble_icon2.png" alt="bubble_icon2" class="bubble_icon6">
    </div>
  </section> -->

    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js'></script>
    
  </body>

</html>