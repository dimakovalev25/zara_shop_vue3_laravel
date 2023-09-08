<script setup>
import {computed} from "vue";
import store from "./store/store.js";

const test = computed(()=>store.state.test)
</script>

<template>
  <div>
    <h1 class="text-3xl font-bold underline bg-[#1da1f2]">
      Hello vue!
    </h1>
    <router-link to="login">Login |</router-link>
    <router-link to="request_password">Request password |</router-link>
    <router-link to="reset_password">Reset password |</router-link>
    <router-link to="app">App|</router-link>
    <router-link to="tw">TailWind |</router-link>
    <router-view></router-view>

  </div>

</template>

<style scoped>

</style>
