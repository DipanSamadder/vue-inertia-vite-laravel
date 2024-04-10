<script setup>
import Layout from '@/Components/Layout.vue';
import { ref, onMounted } from 'vue';
import { defineProps } from 'vue';
import { getImageUrlByID } from '@/Inc/globalFunctions.js';
import Skeleton from "@/Components/Skeleton.vue";
import Image from '../Components/Image.vue';

const props = defineProps(['pages','section']);
defineOptions({ layout: Layout });

const pageBanner = ref(null);
onMounted(async () => {
    try {
        pageBanner.value = await getImageUrlByID(props.pages.banner);
    } catch (error) {
        console.error(error);
    }
  });

</script>
<template>
    <section>
    <div class="about_section about_section1 bg-light space_sec" id="about_section1">
        <div class="container">
        <div class="row">
            <div class="col-lg-6">
            <div class="about_content pe-lg-4">
                <div class="heading_sec">
                <h2 class="head">{{ props.pages.title }}</h2>
                </div>
                <div class="para_sec" v-html="props.section.about_aboutpagesection_editor_1">
            
                </div>
                <div class="about_btn">
                <a href="#" class="site_btn"><span>View More</span></a>
                </div>
            </div>
            </div>
            <div class="col-lg-6">
            <div class="about_img pe-lg-4">
                <span class="border_bg">
                    <Suspense>
                        <Image :imageData="pageBanner" class="img-fluid w-100"/>
                        <template #fallback>
                            <Skeleton height="500px" width="100%"  borderRadius="0%"/>
                        </template>
                    </Suspense>
                </span>
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