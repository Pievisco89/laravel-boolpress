<template>
  
  <div class="container">

    <Header />
    <!-- per ricevere i componenti iniettati dal router -->
    <router-view></router-view>

  </div>
  
</template>

<script>

import Header from './components/Header.vue';

export default {
  name: 'App',
  components: {
    Header
  }
}
</script>

<style lang="scss">

  @import '../sass/frontoffice/global';
  
</style>