<template>

    <div class="min-h-full bg-gray-200 flex">
        <Sidebar></Sidebar>
<!--        <button @click.prevent="logout">Logout!!</button>-->
        <!--        <Spinner></Spinner>-->
        <div class="flex-1 bg-gray-200">
            <main class="p-6">
                <router-view></router-view>
            </main>
        </div>
    </div>

</template>
<script>

import TopHeader from "./TopHeader.vue";
import Navbar from "./Navbar.vue";
// import store from "../store/store.js";
import Sidebar from "./Sidebar.vue";
// import Spinner from "./core/Spinner.vue";
import store from "../store/store.js";
import router from "../router/router.js";


export default {
    name: "GuestLayout",
    components: { Sidebar, Navbar},

    mounted() {
        // store.dispatch('getUser')
    },

    data() {
        return {
            title: 'test'
        }
    },

    methods: {
        logout() {
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