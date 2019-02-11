<template>
  <div id="app">
    <span class="overlay"></span>
    <div class="nav container">
      <router-link to="/home">Home</router-link>
    </div>
    <div class="container">
      <router-view/>
    </div>
  </div>
</template>

<style>
  #app {
    min-height: 100vh;
    position: relative;

  }
  #app:after {
    background-image: url('./assets/outdoors.jpg');
    background-position: center center;
    -webkit-background-size: cover;
    background-size: cover;
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    filter: blur(1.5px);
    z-index: -1;
  }
</style>