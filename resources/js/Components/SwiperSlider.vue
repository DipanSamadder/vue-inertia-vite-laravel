<!-- SwiperSlider.vue -->
<template>
    <div class="swiper-container">
      <div class="swiper-wrapper">
        <div v-for="(item, index) in items" :key="index" class="swiper-slide">
          <!-- Your slide content here -->
          <div :href="imageUrl" data-fancybox="gallery" data-caption="">
              <img :src="item.imageUrl" alt="Slide Image">
            </div>
        </div>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </template>
  
  <script setup>
  import Swiper from 'swiper';
  import { ref, onMounted } from 'vue';
  import Skeleton from "@/Components/Skeleton.vue";
  const items = ref([
    { imageUrl: 'http://127.0.0.1:8000/uploads/all/3/logo.png' },
    { imageUrl: 'http://127.0.0.1:8000/uploads/all/6/img2.png' },
    { imageUrl: 'http://127.0.0.1:8000/uploads/all/5/kids_img.png' },
    // Add more images as needed
  ]);
  
  onMounted(() => {
    const swiper = new Swiper('.swiper-container', {
      // Swiper options
      slidesPerView: 1,
      spaceBetween: 30,
      loop: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
        breakpoints: {
            640: { slidesPerView: 1 },
            768: { slidesPerView: 2 },
            1024: { slidesPerView: 3, spaceBetween: 20 },
        },
    });
  });
  </script>
  
  <style scoped>
  /* Add scoped styles if needed */
  </style>
  