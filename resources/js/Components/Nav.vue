<script setup>

await new Promise((res) => setTimeout(res, 2000));
import { defineProps } from 'vue';
import { Link , usePage} from '@inertiajs/vue3'
import { activeNav } from '@/Inc/globalFunctions.js';

const props = defineProps({
  header_menu: Array
});
console.log(props.header_menu);
</script>

<!-- 
<template>
    <ul class="nav ps-0">
        <a href="javascript:void(0)" class="cross_icon">
            <span></span>
            <span></span>
            <span></span>
        </a>
        <li v-for="menu in props.header_menu" :key="menu.id">
            <Link :href=menu.url :class="{ 'active': activeNav($page.url, menu.url, 'full') }">{{ menu.name }}</Link>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown link
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
        </li>
    </ul>
</template> -->

<!-- 
<template>
  <ul class="nav ps-0">
    <a href="javascript:void(0)" class="cross_icon">
      <span></span>
      <span></span>
      <span></span>
    </a>
    <li v-for="menu in props.header_menu" :key="menu.id" :class="{ 'nav-item dropdown': menu.hasChild }">
      <Link :href="menu.url" :class="{ 'nav-link': !menu.hasChild, 'dropdown-toggle': menu.hasChild }" :class="{ 'active': activeNav($page.url, menu.url, 'full') }" v-if="!menu.hasChild">
        {{ menu.name }}
      </Link>
      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" v-else>
        {{ menu.name }}
      </a>
      <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" v-if="menu.hasChild">
        <li v-for="child in menu.Child" :key="child.id">
          <Link :href="child.url" class="dropdown-item" :class="{ 'active': activeNav($page.url, menu.url, 'full') }">{{ child.name }}</Link>
        </li>
      </ul>
    </li>
  </ul>
</template> -->
<template>
  <ul class="nav ps-0">
    <a href="javascript:void(0)" class="cross_icon">
      <span></span>
      <span></span>
      <span></span>
    </a>
    <li v-for="menu in props.header_menu" :key="menu.id" :class="{ 'dropdown': menu.hasChild }">
      <Link :href="menu.url" :class="{ 'nav-link': !menu.hasChild, 'dropdown-toggle': menu.hasChild, 'active': activeNav($page.url, menu.url, 'full') }" v-if="!menu.hasChild">
        {{ menu.name }}
      </Link>
      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" v-else>
        {{ menu.name }}
      </a>
      <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink" v-if="menu.hasChild">
        <li v-for="child in menu.Child" :key="child.id">
          <Link :href="child.url" :class="{ 'dropdown-item': true, 'active': activeNav($page.url, child.url, 'full') }">{{ child.name }}</Link>
        </li>
      </ul>
    </li>
  </ul>
</template>
