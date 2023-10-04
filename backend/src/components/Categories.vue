<template>
    Categories

    <div class="flex mb-3">
        <div  v-if="categoryIsInitialized" class="border-b-2">

            <h1 class="text-3xl font-semibold">Add new category</h1>
            <form @submit.prevent="onSubmit">
                <div class="bg-white px-4 pt-5 sm:p-6 sm:pb-4 border-b-2 bg rounded-lg">
                    <CustomInput    class="mb-2" v-model="category.title" label="Category title"/>
                    <CustomInput  class="mb-2" v-model="category.description" label="Category description"/>

                    <button type="submit"
                            class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ">
                        Submit
                    </button>
                </div>


            </form>

        </div>

        <div v-else>
            <Spinner />
        </div>
<!--
        <div class="border-b-2">
            <h1 class="text-3xl font-semibold">Edit product ID: {{ editedProduct.id }}</h1>
            <form @submit.prevent="onEditSubmit">
                <div class="bg-white px-4 pt-5 sm:p-6 sm:pb-4 border-b-2 bg rounded-lg">
                    <CustomInput class="mb-2" v-model="editedProduct.title"/>
                    <CustomInput @change="file => editedProduct.image = file" type="file" class="mb-2"/>
                    <CustomInput class="mb-2" v-model="editedProduct.description"/>
                    <CustomInput type="number" class="mb-2" v-model="editedProduct.price"/>

                    <button type="submit"
                            class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ">
                        Submit
                    </button>
                </div>


            </form>
        </div>-->

    </div>
    <h1 class="text-3xl font-semibold">Categories</h1>
    <div class="bg-white p-4 rounded-lg shadow">

<!--        <Spinner v-if="categories.loading"/>

        <template v-else>

            <table class="table-auto w-full">
                <thead>
                <tr>
                    <th class="border-b-2 p-2 text-left">ID</th>
                    <th class="border-b-2 p-2 text-left">Title</th>
                    <th class="border-b-2 p-2 text-left">Description</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="category of categories.data">
                    <td class="border-b p-2 ">{{ category.id }}</td>

                    <td class="border-b p-2 max-w-[200px] whitespace-nowrap overflow-hidden text-ellipsis">
                        {{ category.title }}
                    </td>
                    <td class="border-b p-2">
                        {{ category.description }}
                    </td>

                </tr>
                </tbody>
            </table>

        </template>-->

        <div>
            <table class="table-auto w-full">
                <thead>
                <tr>
                    <th class="border-b-2 p-2 text-left">ID:</th>
                    <th class="border-b-2 p-2 text-left">Title:</th>
                    <th class="border-b-2 p-2 text-left">Description:</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="category of categories.data">
                    <td class="border-b p-2 ">{{ category.id }}</td>

                    <td class="border-b p-2 max-w-[200px] whitespace-nowrap overflow-hidden text-ellipsis">
                        {{ category.title }}
                    </td>
                    <td class="border-b p-2">
                        {{ category.description }}
                    </td>

                </tr>
                </tbody>
            </table>

        </div>
    </div>

</template>

<script setup>
import {computed, onMounted, ref} from "vue";
import store from '../store/store.js'
import Spinner from "../components/core/Spinner.vue";
import CustomInput from "./core/CustomInput.vue";
/*import {TrashIcon} from "@heroicons/vue/20/solid/index.js";
import {PencilIcon} from "@heroicons/vue/20/solid/index.js";*/

const categories = computed(() => store.state.categories);


const category = ref({
    title: null,
    description: null,

})

const categoryIsInitialized = !!category.value;


onMounted(() => {
    getCategories()
})

async function onSubmit() {
    store.dispatch('createCategory', category.value)

        .then(response => {
            if (response.status === 201) {
                store.dispatch('getCategories')
            }

            console.log('get categories')
        })
        .catch(res => {
            console.log('catch')
        })
        .finally(err => {
            category.value = null
            console.log('finally')
            getCategories();

        })
}


function getCategories(url = null) {
    store.dispatch("getCategories", {
        url
    });
}

</script>
