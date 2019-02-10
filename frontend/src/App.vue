<template>
  <div id="app" class="container">
    <div id="nav">
      <router-link to="/home">Home</router-link> |
      <router-link to="/blips">Blips</router-link> |
      <router-link to="/contacts">Contacts</router-link>
    </div>
    <router-view/>
  </div>
</template>
