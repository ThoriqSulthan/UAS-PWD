<template>
  <div id="app">
    <img alt="Vue logo" src="./assets/logo.png">
    <Makanan />
  </div>
</template>

<script>
import Makanan from './components/Makanan.vue'

export default {
  name: 'app',
  components: {
    Makanan
  }
}
</script>

<style>
#app {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
