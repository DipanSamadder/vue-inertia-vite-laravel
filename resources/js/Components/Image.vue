<script setup>
import { defineProps } from 'vue';

await new Promise((res) => setTimeout(res, 2000));
const props = defineProps({
  imageData: Object,
  class:{
        type: String,
        default: 'w-100'
    },
});


</script>
<template>
    <img :src="props.imageData && props.imageData.url ? props.imageData.url : '#'" :alt="props.imageData && props.imageData.title ? props.imageData.title : ''" :class="props.class">
</template>