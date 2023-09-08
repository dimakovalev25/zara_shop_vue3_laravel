<template>
  <h1>Dashboard</h1>
  <button @click.prevent="logout">logout</button>
</template>

<script>
import store from "../store/store.js";
import router from "../router/router.js";

export default {
  name: "Dashboard",

  methods: {
    logout(){
      const token = sessionStorage.getItem('TOKEN')
      console.log(token)
      store.dispatch('logout')
          .then(() => {
            router.push({name: 'login'})
          })
    }
  }
}
</script>

<style scoped>

</style>
