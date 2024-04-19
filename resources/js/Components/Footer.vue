<script setup>
  import Logo from '@/Components/Logo.vue';
  import { defineProps } from 'vue';

  const props = defineProps({
    imageData: Object 
  });


</script>

<template>
    
  <footer class="main_footer">
    <div class="footer_section">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <a href="#" class="d-block text-center"><Logo :imageData="imageData"/></a>
            <div class="footer_info_sec my-3">
              <p>{{ $page.props.business_setting.site_title }}</p>
            </div>
          </div>
          <div class="col-lg-8 col-md-6">
            <div class="footer_info_sec footer_info_sec1">
              <h3>About Academy</h3>
              <ul class="ps-0">
                <li v-for="menu in $page.props.business_setting.topbar_menu" :key="menu.id"><a :href=menu.url class="actives">{{ menu.name }}</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="copyright_sec">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-12">
            <div class="copyright_inner text-center">
              <p>{{ $page.props.business_setting.site_footer_copyright }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>