<script setup>
  import Layout from '@/Components/Layout.vue';
  import Image from '../Components/Image.vue';
  import { ref, onMounted } from 'vue';
  import { getImageUrlByID} from '@/Inc/globalFunctions.js';
  import Skeleton from "@/Components/Skeleton.vue";
  import { defineProps } from 'vue';

  defineOptions({ layout: Layout });

  const contentImage = ref(null);
  const AboutImage = ref(null);
  const ImprotantBg = ref(null);
  const photoArray = ref([]);

  const carouselImages = ref([]);
  const initialized = ref(false);

const props = defineProps(['pages','section']);
  onMounted(async () => {
    try {
      if (!initialized.value) {
        contentImage.value = await getImageUrlByID(props.pages.banner);
        AboutImage.value = await getImageUrlByID(props.section.home_aboutus_file_2);
        ImprotantBg.value = await getImageUrlByID(props.section.home_importanceinkidslife_file_2);

        const images = JSON.parse(props.section.home_sanskritikiddo_file_repeter_0);
        
        photoArray.value = images.map(imageId => getImageUrlByID(imageId));


        const imagesArray = JSON.parse(props.section.home_sanskritikiddo_file_repeter_0);
      
        for (const imageId of imagesArray) {
          const imageUrl = await getImageUrlByID(imageId);
          carouselImages.value.push(imageUrl);
        }
        initSwiper();
        initialized.value = true; 
      }
    } catch (error) {
        console.error(error);
    }
  });


const initSwiper = () => {
    new Swiper(".gallery_slider", {
        slidesPerView: 1,
        spaceBetween: 0,
        pagination: {
            el: ".gallery_pagination",
            dynamicBullets: true,
            clickable: true,
        },
        breakpoints: {
            640: { slidesPerView: 1 },
            768: { slidesPerView: 2 },
            1024: { slidesPerView: 3, spaceBetween: 20 },
        },
    });
};



</script>

<template>
  <section>
    <div class="banner_section">
      <Suspense>
          <Image :imageData="contentImage" class="w-100"/>
          <template #fallback>
            <Skeleton height="500px" width="100%"  borderRadius="0%"/>
          </template>
      </Suspense>
    </div> 
  </section>

  <section>
    <div class="principal_section space_sec" id="principal_section">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="about_img pe-lg-4">
              <span class="border_bg">
                <Suspense>
                  <Image :imageData="AboutImage" class="img-fluid w-100"/>
                  <template #fallback>
                    <Skeleton height="500px" width="100%"  borderRadius="0%"/>
                  </template>
              </Suspense>
              </span>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="about_content">
              <div class="heading_sec">
                <h2 class="head">{{ props.section.home_aboutus_text_0 }}</h2>
              </div>
              <div class="para_sec" v-html="props.section.home_aboutus_editor_1">
      
                
              </div>
              <div class="about_btn">
                <a href="{{ props.section.home_aboutus_text_4 }}" class="site_btn"><span>{{ props.section.home_aboutus_text_3 }}</span></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <img src="frontend/images/bubble_icon1.png" alt="bubble_icon1" class="bubble_icon1">
      <img src="frontend/images/bubble_icon2.png" alt="bubble_icon2" class="bubble_icon2">
      <img src="frontend/images/bubble_icon3.png" alt="bubble_icon1" class="bubble_icon3">
      <img src="frontend/images/bubble_icon4.png" alt="bubble_icon2" class="bubble_icon4">
      <img src="frontend/images/bubble_icon1.png" alt="bubble_icon1" class="bubble_icon5">
      <img src="frontend/images/bubble_icon2.png" alt="bubble_icon2" class="bubble_icon6">
    </div>
  </section>


  <section>
    <div class="info_section" id="info_section">
      <div class="bg_overlay"></div>
      <Suspense>
          <Image :imageData="ImprotantBg" class="w-100 main_bg"/>
          <template #fallback>
            <Skeleton height="500px" width="100%"  borderRadius="0%"/>
          </template>
      </Suspense>
      <div class="info_inner">
        <div class="container">
          <div class="heading_sec text-center">
            <h2 class="head mb-5">{{ props.section.home_importanceinkidslife_text_0 }}</h2>
            <div class="para_sec" v-html="props.section.home_importanceinkidslife_editor_1"></div>
          </div>
        </div>
      </div>
      <img src="frontend/images/bubble_icon1.png" alt="bubble_icon1" class="bubble_icon1">
      <img src="frontend/images/bubble_icon2.png" alt="bubble_icon2" class="bubble_icon2">
      <img src="frontend/images/bubble_icon3.png" alt="bubble_icon1" class="bubble_icon3">
      <img src="frontend/images/bubble_icon4.png" alt="bubble_icon2" class="bubble_icon4">
      <img src="frontend/images/bubble_icon1.png" alt="bubble_icon1" class="bubble_icon5">
      <img src="frontend/images/bubble_icon2.png" alt="bubble_icon2" class="bubble_icon6">
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

              <div v-for="(image, index) in carouselImages" :key="index" class="swiper-slide">
                  <div class="gallery_box">
                    <a :href="image.url" data-fancybox="gallery" data-caption="">
                      <img :src="image.url" :alt="image.title">
                    </a>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-pagination gallery_pagination"></div>
        </div>
      </div>
      <img src="frontend/images/bubble_icon1.png" alt="bubble_icon1" class="bubble_icon1">
      <img src="frontend/images/bubble_icon2.png" alt="bubble_icon2" class="bubble_icon2">
      <img src="frontend/images/bubble_icon3.png" alt="bubble_icon1" class="bubble_icon3">
      <img src="frontend/images/bubble_icon4.png" alt="bubble_icon2" class="bubble_icon4">
      <img src="frontend/images/bubble_icon1.png" alt="bubble_icon1" class="bubble_icon5">
      <img src="frontend/images/bubble_icon2.png" alt="bubble_icon2" class="bubble_icon6">
    </div>
  </section>



  <section>
    <div class="principal_section bg-light space_sec" id="principal_section1">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="about_img pe-lg-4">
              <span class="border_bg"><img src="frontend/images/kids_img.png" alt="kids_img" class="img-fluid w-100"></span>
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
      <img src="frontend/images/bubble_icon1.png" alt="bubble_icon1" class="bubble_icon1">
      <img src="frontend/images/bubble_icon2.png" alt="bubble_icon2" class="bubble_icon2">
      <img src="frontend/images/bubble_icon3.png" alt="bubble_icon1" class="bubble_icon3">
      <img src="frontend/images/bubble_icon4.png" alt="bubble_icon2" class="bubble_icon4">
      <img src="frontend/images/bubble_icon1.png" alt="bubble_icon1" class="bubble_icon5">
      <img src="frontend/images/bubble_icon2.png" alt="bubble_icon2" class="bubble_icon6">
    </div>
  </section>

</template>