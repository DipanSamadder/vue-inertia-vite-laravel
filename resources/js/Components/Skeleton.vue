
<script setup>
defineProps({
    height:{
        type: String,
    },
    width:{
        type:String
    },
    borderRadius:{
        type:String
    }
    ,
    opacity:{
        type:String,
        default: '1'
    }
    ,
    margin:{
        type:String,
        default: '0px 0px 0px 0px'
    }
});
</script>

<style scoped>
@keyframes bgSkeleton {
  0% {
    background-position: 50% 0;
  }

  100% {
    background-position: -150% 0;
  }
}
.skeleton {
  height: v-bind(height);
  width: v-bind(width);
  border-radius: v-bind(borderRadius);
  margin: v-bind(margin);
  opacity: v-bind(opacity);
  background-image: linear-gradient(
    to right,
    #d6d7d8 0%,
    #e2e3e4 10%,
    #d6d7d8 20%,
    #d6d7d8 100%
  );
  background-size: 200% 100%;
  box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1),
    0 2px 4px -2px rgb(0 0 0 / 0.1);
  animation: bgSkeleton 1.2s linear infinite;
}

</style>

<template>
    <div class="skeleton">
        &nbsp;
    </div>
</template>
