<script setup>
import Skeleton from "@/Components/Skeleton.vue";
</script>

<style scoped>
  .summary-placeholder {display: flex;flex-direction: column;gap: 8px;width: 100%;}
</style>


<template>
  <footer class="main_footer">
    <div class="footer_section">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="logo_sec">          
                <Skeleton height="80px" width="250px" borderRadius="3%" opacity="0.2" />
            </div>
            <div class="footer_info_sec my-3">          
                <Skeleton height="15px" width="100%" borderRadius="3%" opacity="0.2"/>
                <Skeleton height="15px" width="100%" borderRadius="3%" opacity="0.2" margin="8px 0px 0px 0px" />
                <Skeleton height="15px" width="80%" borderRadius="3%" opacity="0.2" margin="8px 0px 0px 0px" />
            </div>
          </div>
          <div class="col-lg-8 col-md-6">
            <div class="footer_info_sec footer_info_sec1">
              <h3><Skeleton height="30px" width="220px" borderRadius="3%" opacity="0.2" /></h3>
              <ul class="ps-0">
                <li><a href="#"><Skeleton height="15px" width="80%" borderRadius="3%" opacity="0.2"/></a></li>
                <li><a href="#"><Skeleton height="15px" width="80%" borderRadius="3%" opacity="0.2" margin="15px 0px 0px 0px"/></a></li>
                <li><a href="#"><Skeleton height="15px" width="80%" borderRadius="3%" opacity="0.2" margin="15px 0px 0px 0px"/></a></li>
                <li><a href="#"><Skeleton height="15px" width="80%" borderRadius="3%" opacity="0.2" margin="15px 0px 0px 0px"/></a></li>
                <li><a href="#"><Skeleton height="15px" width="80%" borderRadius="3%" opacity="0.2" margin="15px 0px 0px 0px"/></a></li>
                <li><a href="#"><Skeleton height="15px" width="80%" borderRadius="3%" opacity="0.2" margin="15px 0px 0px 0px"/></a></li>
                <li><a href="#"><Skeleton height="15px" width="80%" borderRadius="3%" opacity="0.2" margin="15px 0px 0px 0px"/></a></li>
                <li><a href="#"><Skeleton height="15px" width="80%" borderRadius="3%" opacity="0.2" margin="15px 0px 0px 0px"/></a></li>
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
              <Skeleton height="15px" width="300px" borderRadius="3%" opacity="0.2" margin="0 auto"/>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </footer>
</template>