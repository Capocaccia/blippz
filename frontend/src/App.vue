<template>
  <div id="app">
    <div class="container main-container">
      <router-view/>
    </div>
  </div>
</template>

<style>
  @import url('./css/normalize.css');
  @import url('./css/skeleton-legacy.css');
  @import url('./css/barebones.css');

  .main-container {
    margin-top: 15rem;
  }

  input {
    margin-bottom: 1rem;
    width: 100%;
    outline: none;
    background: transparent;
    padding: .25rem;
    border-style: inherit;
    border-bottom: 2px solid black;
    font-size: 1.5rem;
  }

  input:focus {
    outline: none;
    border-bottom: 2px solid black;
    border-right: none;
    border-top: none;
    border-left: none;
  }

  .form-container {
    width: 60%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    margin: 0 20%;
  }

  .button {
    margin-top: 2rem;
  }

  .button-no-margin {
    margin: 0;
  }

</style>