<script setup>

await new Promise((res) => setTimeout(res, 2000));
import { defineProps } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
  header_menu: Array
});

</script>

<template>
    <ul class="nav ps-0">
        <a href="javascript:void(0)" class="cross_icon">
            <span></span>
            <span></span>
            <span></span>
        </a>
        <li v-for="menu in props.header_menu" :key="menu.id">
            <Link :href=menu.url class="actives">{{ menu.name }}</Link>
        </li>
    </ul>
</template>


