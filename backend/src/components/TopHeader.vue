<template>
    <header class="flex justify-between items-center p-3 h-14">
        topheader
        {{title}}
    </header>
</template>

<script setup>
import state from "../store/state.js";
const title = state.test;

/*import {defineComponent} from "vue";
import store from "../store/store.js";
import router from "../router/router.js";


/* export default defineComponent({

    methods : {
        logout() {
            store.dispatch('logout')
                .then(() => {
                    router.push({name: 'login'})
                })
    }

})
*/
</script>

<style scoped>

</style>