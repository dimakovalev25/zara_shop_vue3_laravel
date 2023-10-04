<script setup>
import {computed} from "vue";
import store from "./store/store.js";

const test = computed(()=>store.state.test)
</script>

<template>
  <div>

    <router-link to="app">App |</router-link>
    <router-link to="logout">Logout |</router-link>
    <router-view></router-view>

  </div>

</template>

<style scoped>

</style>
