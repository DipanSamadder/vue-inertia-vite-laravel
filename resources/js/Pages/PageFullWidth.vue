<script setup>
import Layout from '@/Components/Layout.vue';
import { ref, onMounted } from 'vue';
import { defineProps } from 'vue';
import { getImageUrlByID } from '@/Inc/globalFunctions.js';
import Skeleton from "@/Components/Skeleton.vue";
import Image from '../Components/Image.vue';
import {Head } from "@inertiajs/inertia-vue3"
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
    <Head>
    <title>{{  props.pages.meta_title }}</title>
    <meta head-key="description" name="description" content="{{  props.pages.meta_title }}" />
    <meta head-key="keword" name="keword" content="{{  props.pages.meta_description }}" />
  </Head>
    <section>
    <div class="about_section about_section1 bg-light space_sec" id="about_section1">
        <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="about_content pe-lg-4">
                    <div class="heading_sec">
                    <h2 class="head">{{ props.pages.title }}</h2>
                    </div>
                    <div class="para_sec" v-html="props.pages.content">
                
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