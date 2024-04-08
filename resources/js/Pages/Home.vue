<script setup>
import Layout from '@/Components/Layout.vue';
import Image from '../Components/Image.vue';
import { ref, onMounted } from 'vue';
import { getImageUrlByID } from '@/Inc/globalFunctions.js';
import { defineProps } from 'vue';
import Skeleton from "@/Components/Skeleton.vue";
import { usePage } from '@inertiajs/inertia-vue3';


defineOptions({ layout: Layout });

const contentImage = ref(null);
onMounted(async () => {
    try {
      contentImage.value = await getImageUrlByID(4);
        } catch (error) {
            console.error(error);
        }

  });

</script>
<script>
export default {
  props: {
    page_info: Object // Define the user prop
  }
};
</script>
<template>
  <section>
    <div class="banner_section">
      {{ page_info.id }}
      <Suspense>
          <Image :imageData="contentImage" class="w-100"/>
          <template #fallback>
            <Skeleton height="500px" width="100%"  borderRadius="0%"/>
          </template>
      </Suspense>
    </div> 
</section>
</template>