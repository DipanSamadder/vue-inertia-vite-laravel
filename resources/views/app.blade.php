<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/x-icon" href="images/favicon.png">
  <title>Piet Sanskriti</title>
  <meta name="description" content="{{ $meta }}">
  <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">

  @vite(['resources/css/app.css','resources/js/app.js'])
  
  @inertiaHead
</head>
<body>
@routes


@inertia
<!-- <section>
  <div class="banner_section">
    <img src="images/banner_img.jpg" alt="banner_img" class="w-100">
  </div> 
</section>

<section>
  <div class="principal_section space_sec" id="principal_section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="about_img pe-lg-4">
            <span class="border_bg"><img src="images/kids_img.png" alt="kids_img" class="img-fluid w-100"></span>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="about_content">
            <div class="heading_sec">
              <h2 class="head">About Us</h2>
            </div>
            <div class="para_sec">
                <p>PIET Sanskriti Schools is one of the best schools of its class and is contributing its best in education sector since past 11 years.It believes in being exclusive in thought and action. Thus, it comes as no surprise that it is the best and fastest growing chain of schools in Panipat. PIET Ansals is committed to providing a world class curriculum, has opened its doors to provide sound foundation to young children embarking on the journey of creative learning now in a new zone. PIET Ansals is equipped with all the tech amenities. PIET’s holistic approach and learning strategy is what sets them apart.</p>
                <p>PIET Group dream to ignite a sparkling desire in all the PIET’ians to explore the endless dimensions of the universe and to succeed beyond our best expectations.</p>
                <p>The PIET Sanskriti Schools offers your child a life of ambition, aspiration and achievement!</p>
            </div>
            <div class="about_btn">
              <a href="#" class="site_btn"><span>Read More</span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <img src="images/bubble_icon1.png" alt="bubble_icon1" class="bubble_icon1">
    <img src="images/bubble_icon2.png" alt="bubble_icon2" class="bubble_icon2">
    <img src="images/bubble_icon3.png" alt="bubble_icon1" class="bubble_icon3">
    <img src="images/bubble_icon4.png" alt="bubble_icon2" class="bubble_icon4">
    <img src="images/bubble_icon1.png" alt="bubble_icon1" class="bubble_icon5">
    <img src="images/bubble_icon2.png" alt="bubble_icon2" class="bubble_icon6">
  </div>
</section>

<section>
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
                <span><img src="images/p_icon1.png" alt="icon1" class="img-fluid"></span>
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
                <span><img src="images/p_icon2.png" alt="icon1" class="img-fluid"></span>
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
                <span><img src="images/p_icon3.png" alt="icon1" class="img-fluid"></span>
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
                <span><img src="images/p_icon4.png" alt="icon1" class="img-fluid"></span>
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
                <span><img src="images/p_icon5.png" alt="icon1" class="img-fluid"></span>
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
    <img src="images/bubble_icon1.png" alt="bubble_icon1" class="bubble_icon1">
    <img src="images/bubble_icon2.png" alt="bubble_icon2" class="bubble_icon2">
    <img src="images/bubble_icon3.png" alt="bubble_icon1" class="bubble_icon3">
    <img src="images/bubble_icon4.png" alt="bubble_icon2" class="bubble_icon4">
    <img src="images/bubble_icon1.png" alt="bubble_icon1" class="bubble_icon5">
  </div>
</section>

<section>
  <div class="info_section" id="info_section">
    <div class="bg_overlay"></div>
    <img src="images/card.jpg" alt="card" class="w-100 main_bg">
    <div class="info_inner">
      <div class="container">
        <div class="heading_sec text-center">
          <h2 class="head mb-5">Importance in kids life</h2>
          <div class="para_sec">
            <p>Playschool helps in building a strong foundation in social, pre-academics, and general life skills. It helps in the development of a child’s emotional and personal growth and provides opportunities for children to learn in ways that sheerly interests them and develop a strong sense of curiosity. Consequently, it helps in building a positive association with inquisitive learning in the form of fun activities and guided play.</p>
            <p>Some more benefits of playschool are mentioned below: </p>
            <ul class="d-flex flex-wrap justify-content-between border-0 mb-0 pb-0">
              <li>1. Reduces separation anxiety</li>
              <li>2. Increases growth</li>
              <li>3. Social development</li>
              <li>4. Independent choices</li>
              <li>5. Building language skills</li>
              <li>6. Building motor skills</li>
              <li>7. Building cognitive skills</li>
              <li>8. Meeting other parents</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <img src="images/bubble_icon1.png" alt="bubble_icon1" class="bubble_icon1">
    <img src="images/bubble_icon2.png" alt="bubble_icon2" class="bubble_icon6">
    <img src="images/bubble_icon3.png" alt="bubble_icon1" class="bubble_icon3">
    <img src="images/bubble_icon4.png" alt="bubble_icon2" class="bubble_icon4">
  </div> 
</section>

<section>
  <div class="about_section about_section1 bg-light space_sec" id="about_section1">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="about_content pe-lg-4">
            <div class="heading_sec">
              <h2 class="head">Why choose us</h2>
            </div>
            <div class="para_sec">
              <p>PIET Sanskriti Schools is one of the best schools of its class and is contributing its best in education sector since past 11 years.It believes in being exclusive in thought and action. Thus, it comes as no surprise that it is the best and fastest growing chain of schools in Panipat. PIET Sanskriti is committed to providing a world class curriculum, has opened its doors to provide sound foundation to young children embarking on the journey of creative learning now in a new zone. PIET Sanskriti is equipped with all the tech amenities. PIET’s holistic approach and learning strategy is what sets them apart.</p>
              <p>PIET Group dream to ignite a sparkling desire in all the PIET’ians to explore the endless dimensions of the universe and to succeed beyond our best expectations.</p>
              <p>The PIET Sanskriti Schools offers your child a life of ambition, aspiration and achievement!</p>
            </div>
            <div class="about_btn">
              <a href="#" class="site_btn"><span>View More</span></a>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="about_img pe-lg-4">
            <span class="border_bg"><img src="images/img2.png" alt="kids_img" class="img-fluid w-100"></span>
          </div>
        </div>
      </div>
    </div>
    <img src="images/bubble_icon1.png" alt="bubble_icon1" class="bubble_icon1">
    <img src="images/bubble_icon2.png" alt="bubble_icon2" class="bubble_icon2">
    <img src="images/bubble_icon3.png" alt="bubble_icon1" class="bubble_icon3">
    <img src="images/bubble_icon4.png" alt="bubble_icon2" class="bubble_icon4">
    <img src="images/bubble_icon1.png" alt="bubble_icon1" class="bubble_icon5">
  </div>
</section>

<section>
  <div class="features_section space_sec" id="gallery_section">
    <div class="container">
      <div class="heading_sec text-center">
        <h2 class="head">As a blessings from B k Shivani to Piet Sanskriti kiddo</h2>
      </div>
      <div class="gallery_slider_outer">
        <div class="swiper gallery_slider">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="gallery_box">
                <a href="images/p_img1.jpg" data-fancybox="gallery" data-caption="">
                  <img src="images/p_img1.jpg" alt="Image Gallery">
                </a>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="gallery_box">
                <a href="images/p_img2.jpg" data-fancybox="gallery" data-caption="">
                  <img src="images/p_img2.jpg" alt="Image Gallery">
                </a>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="gallery_box">
                <a href="images/p_img3.jpg" data-fancybox="gallery" data-caption="">
                  <img src="images/p_img3.jpg" alt="Image Gallery">
                </a>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="gallery_box">
                <a href="images/p_img4.jpg" data-fancybox="gallery" data-caption="">
                  <img src="images/p_img4.jpg" alt="Image Gallery">
                </a>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="gallery_box">
                <a href="images/p_img5.jpg" data-fancybox="gallery" data-caption="Devi Chitralekha ji gracing our school with her auspicious presence and holding our school magazine “Milieu” in her hands and showering us with lots of blessings">
                  <img src="images/p_img5.jpg" alt="Image Gallery">
                </a>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="gallery_box">
                <a href="images/p_img6.jpg" data-fancybox="gallery" data-caption="BK Shivani opening and appreciating PIET Sanskriti KIDDO‘s 1st school prospectus and giving blessings">
                  <img src="images/p_img6.jpg" alt="Image Gallery">
                </a>
              </div>
            </div>
            <div class="swiper-slide">
              <div class="gallery_box">
                <a href="images/p_img7.jpg" data-fancybox="gallery" data-caption="">
                  <img src="images/p_img7.jpg" alt="Image Gallery">
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-pagination gallery_pagination"></div>
      </div>
    </div>
    <img src="images/bubble_icon1.png" alt="bubble_icon1" class="bubble_icon1">
    <img src="images/bubble_icon2.png" alt="bubble_icon2" class="bubble_icon2">
    <img src="images/bubble_icon3.png" alt="bubble_icon1" class="bubble_icon3">
    <img src="images/bubble_icon4.png" alt="bubble_icon2" class="bubble_icon4">
    <img src="images/bubble_icon1.png" alt="bubble_icon1" class="bubble_icon5">
  </div>
</section>

<section>

</section>

<section>
  <div class="principal_section bg-light space_sec" id="principal_section1">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="about_img pe-lg-4">
            <span class="border_bg"><img src="images/kids_img.png" alt="kids_img" class="img-fluid w-100"></span>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="about_content">
            <div class="heading_sec">
              <h2 class="head">From Founder’s Pen</h2>
            </div>
            <div class="para_sec">
              <p>Education is not just a process of transfer of information or knowledge it is rather a process of blooming and development of abilities....Piet Sanskriti Kiddo Nestled in the heart of Panipat City, stands as a beacon of early education, catering to the crucial adolescence of toddlers and preschoolers. We aim to nurture happy children for whom learning is the most joyful experience. We ensure the critical childhood years, crucial to development and learning, are fully utilised to develop children into emotionally secure, self-confident, intellectually curious and socially conscious individuals.</p>
              <p>We strongly believe that the learning experience given to a child should develop the 6C’s-Communication, Collaboration, Creativity, Critical thinking, Confidence and Copassion- which are essential 21st century skills.Our experiential teaching methodology aims to create realistic, interactive & sensory stimulating learning experiences that build curiosity and expands learning....It's a domestic faraway from domestic for the little ones. The campus exudes an air of warmth and positivity, developing a secure haven where kids can discover, believe, and thrive.To sum up, we conserve only what we love; we will love only what we understand; we will understand only what we are taught.</p>
            </div>
            <div class="about_btn">
              <a href="#" class="site_btn"><span>Read More</span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <img src="images/bubble_icon1.png" alt="bubble_icon1" class="bubble_icon1">
    <img src="images/bubble_icon2.png" alt="bubble_icon2" class="bubble_icon2">
    <img src="images/bubble_icon3.png" alt="bubble_icon1" class="bubble_icon3">
    <img src="images/bubble_icon4.png" alt="bubble_icon2" class="bubble_icon4">
    <img src="images/bubble_icon1.png" alt="bubble_icon1" class="bubble_icon5">
  </div>
</section> -->






<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js'></script>


</body>
</html>