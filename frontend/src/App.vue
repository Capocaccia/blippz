<template>
  <div id="app">
    <span class="overlay"></span>
    <div class="nav">
      <router-link to="/home">Home</router-link>
    </div>
    <div>
      <router-view/>
    </div>
  </div>
</template>

<style>

  body {
    margin: 0;
  }

  #app {
    min-height: 100vh;
    background-color: rgb(55,150,131);

  }

  * {
    font-family: 'Montserrat', sans-serif;
  }
</style>