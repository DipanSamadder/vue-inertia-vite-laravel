<script setup>
    import Logo from '@/Components/Logo.vue';
    import Nav from '@/Components/Nav.vue';
    import Skeleton from "@/Components/Skeleton.vue";
    import { defineProps } from 'vue';

    const props = defineProps({
        imageData: Object 
    });

    const bussinessData = JSON.parse(localStorage.getItem('bussinessData'));


</script>


<style scoped>
.summary-placeholder {display: flex;flex-direction: column;gap: 8px;width: 100%;}
</style>


<template>
    <header class="header-area">
        <div class="btm_nav_sec">
            <div class="container">
                <div class="btm_nav_inner d-flex align-items-center justify-content-between">
                    
                    <Suspense>
                        <div class="logo_sec">  
                            <a href=""><Logo :imageData="imageData"/></a>
                        </div>
                        <template #fallback>
                            <div class="logo_sec">          
                                <Skeleton height="80px" width="250px"  borderRadius="3%"/>
                            </div>
                        </template>
                    </Suspense>

                    <div class="main_menu_sec">
                        <nav class="main-nav bottom-nav norm_menu">
                            <Suspense>
                                <Nav :header_menu="bussinessData.header_menu"/>
                                <template #fallback>
                                    <ul class="nav ps-0">
                                        <a href="javascript:void(0)" class="cross_icon">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </a>
                                        <li v-for="menu in bussinessData.header_menu" :key="menu.id"><a href="#"><Skeleton height="20px" width="80px"  borderRadius="3%" /></a></li>
                                    </ul>
                                </template>
                            </Suspense>
                            
                            <div class="menu_icon_sec">
                            <a href="javascript:void(0)">
                                <span></span>
                                <span></span>
                                <span></span>
                            </a>
                            </div>
                        </nav>
                        <nav class="main-nav bottom-nav sticky_menu">
                            <div class="container">
                                <div class="btm_nav_inner d-flex align-items-center justify-content-between">
                                    <Suspense>
                                        <div class="logo_sec">  
                                            <a href=""><Logo :imageData="imageData"/></a>
                                        </div>
                                        <template #fallback>
                                            <div class="logo_sec">          
                                                <Skeleton height="80px" width="250px"  borderRadius="3%"/>
                                            </div>
                                        </template>
                                    </Suspense>
                                    <Suspense>
                                        <Nav :header_menu="bussinessData.header_menu"/>
                                        <template #fallback>
                                            <ul class="nav ps-0 justify-content-end">
                                                <a href="javascript:void(0)" class="cross_icon">
                                                    <span></span>
                                                    <span></span>
                                                    <span></span>
                                                </a>
                                                <li v-for="menu in bussinessData.header_menu" :key="menu.id"><a href="#"><Skeleton height="20px" width="80px"  borderRadius="3%" /></a></li>
                                            </ul>
                                        </template>
                                    </Suspense>
                                    
                                    <div class="menu_icon_sec">
                                        <a href="javascript:void(0)" class="ms-auto">
                                            <span></span>
                                            <span></span>
                                            <span></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>