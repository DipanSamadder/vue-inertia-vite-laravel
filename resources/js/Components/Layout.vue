<script setup>
  import Header from '@/Components/Header.vue';
  import Footer from '@/Components/Footer.vue';
  import FooterSkeleton from '@/Components/FooterSkeleton.vue';

  import { Head } from '@inertiajs/inertia-vue3';

</script>

<script>
export default {
  data() {
    return {
      flashMessage: '',
      flashType: ''
    };
  },
  methods: {
    hideFlashMessage() {
      this.flashMessage = '';
      this.flashType = '';
    }
  },
  watch: {
    '$page.props.flash': {
      handler(newVal) {
        this.flashMessage = newVal.message;
        this.flashType = newVal.type;
        if (newVal.message) {
          setTimeout(this.hideFlashMessage, 5000); // Hide after 10 seconds
        }
      },
      deep: true
    }
  },
  computed: {
    flashClass() {
      return {
        'alert-success': this.flashType === 'success',
        'alert-danger': this.flashType === 'error'
      };
    }
  }
};
</script>

<template>
  <Head>
    <title>{{ $page.props.business_setting.site_title }}</title>
    <meta head-key="description" name="description" content="{{ $page.props.business_setting.site_meta_description }}" />
    <meta head-key="keyword" name="keyword" content="{{ $page.props.business_setting.site_meta_keyword }}" />
  </Head>

  <div class="">
    <div v-if="flashMessage" id="flash_msg" style="position: fixed; right: 80px; bottom: 15px; z-index: 99999999;">
      <div :class="['alert', flashClass]" role="alert">
        {{ flashMessage }}
      </div>
    </div>
      
      <Header :imageData="$page.props.business_setting.site_logo_url"/>
      <slot />

      <Suspense>
        <Footer :imageData="$page.props.business_setting.site_logo_url" />

        <template #fallback>
          <FooterSkeleton/>
        </template>

      </Suspense>
      
  </div>
</template>
<style scoped>
#flash_msg {display: flex;justify-content: flex-end;}
#flash_msg .alert-danger {background-color: #ff6f6f; border-color: #f78686; color: #fff; } 
#flash_msg .alert-success {background-color: #2c7a0a; border-color: #2f7211; color: #fff; } 
#flash_msg .alert-info {background-color: #1d6d95; border-color: #1b89c1d1; color: #fff; } 
#flash_msg .alert-warning {background-color: #bb9d06; border-color: #d9b605; color: #fff; }
</style>