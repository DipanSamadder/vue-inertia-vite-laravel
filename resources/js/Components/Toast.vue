<template>
    <div v-if="message" class="toast">
      {{ message }}
    </div>
  </template>
  
  <script>
  export default {
    props: ['message']
  };
  </script>
  
  <style scoped>
  .toast {
    position: fixed;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    background-color: #333;
    color: #fff;
    padding: 10px 20px;
    border-radius: 5px;
  }
  </style>
  