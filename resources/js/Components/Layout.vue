<script setup>
  import Header from '@/Components/Header.vue';
  import Footer from '@/Components/Footer.vue';
  import FooterSkeleton from '@/Components/FooterSkeleton.vue';
  import { getImageUrlByID } from '@/Inc/globalFunctions.js';
  import { ref, onMounted } from 'vue';
  import axios from 'axios';

  const businessSetting = ref(null);
  const imageData = ref(null);
  const bussinessData = JSON.parse(localStorage.getItem('bussinessData'));
  onMounted(async () => {
    try {
          const response = await axios.get(`/business-settings`);
          businessSetting.value = response.data;
          localStorage.setItem('bussinessData', JSON.stringify(response.data));
          imageData.value = await getImageUrlByID(bussinessData.site_logo);
        } catch (error) {
            console.error(error);
        }

  });

</script>



<template>
  <div class="">
      <Header :imageData="imageData"/>
      <slot />
      
      <Suspense>
        <Footer :imageData="imageData" />
        <template #fallback>
          <FooterSkeleton/>
        </template>
      </Suspense>
      
  </div>
</template>