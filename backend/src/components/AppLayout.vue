<template>
<!--    <div class="min-h-full bg-gray-200 flex">
     <sidebar :class="{'-ml-[200px]': !sidebarOpened}"></sidebar>
        <div class="flex-1">
            <top-header @toggle-sidebar="toggleSidebar"></top-header>
            <main class="p-6">
                <router-view></router-view>
            </main>
        </div>
    </div>-->

    <div class="min-h-full bg-gray-200 flex">
        <Sidebar></Sidebar>
<!--        <Spinner></Spinner>-->
        <div class="flex-1 bg-gray-200">
            <top-header></top-header>

            <main class="p-6">
                <router-view></router-view>
            </main>
        </div>
    </div>

</template>
<script>

import TopHeader from "./TopHeader.vue";
import Navbar from "./Navbar.vue";
import store from "../store/store.js";
import Sidebar from "./Sidebar.vue";
import Spinner from "./core/Spinner.vue";



export default {
    name: "GuestLayout",
    components: {Spinner, Sidebar, Navbar, TopHeader},

    mounted() {
        store.dispatch('getUser')
    },

    data() {
        return {
            title: 'test'
        }
    }
}


</script>
<style scoped>
</style>