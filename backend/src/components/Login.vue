<template>
    <guest-layout title="Login">
        <form method="POST" class="mt-8 space-y-6">
            <input type="hidden" name="remember" value="true"/>
            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="email-address" class="sr-only">Email address</label>
                    <input v-model="user.email" id="email-address" name="email" type="email" autocomplete="email"
                           required=""
                           class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                           placeholder="Email address"/>
                </div>
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input v-model="user.password" id="password" name="password" type="password"
                           autocomplete="current-password" required=""
                           class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                           placeholder="Password"/>
                </div>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input id="remember-me" name="remember-me" type="checkbox" v-model="user.remember"
                           class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded"/>
                    <label for="remember-me" class="ml-2 block text-sm text-gray-900"> Remember me </label>
                </div>
                <div class="text-sm">
                    <router-link :to="{name: 'request_password'}"
                                 class="font-medium text-indigo-600 hover:text-indigo-500"> Forgot
                        your password?
                    </router-link>
                </div>
            </div>
            <div>
                <button @click.prevent="login" type="submit"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
            </span>
                    Sign in
                </button>
            </div>
        </form>

    </guest-layout>


</template>


<script>
import {defineComponent} from "vue";
import GuestLayout from "./GuestLayout.vue";
import store from "../store/store.js";
import router from "../router/router.js";

export default defineComponent({
    components: {GuestLayout},

    methods: {
        login() {
            store.dispatch('login', this.user)
                .then(() => {
                    router.push({name: 'app.dashboard'})
                })
                .catch(err => {
                })
        }


    },

    data() {
        return {
            user: {
                email: '',
                password: '',
                remember: false
            }
        }
    },

})
</script>

<style scoped>

</style>