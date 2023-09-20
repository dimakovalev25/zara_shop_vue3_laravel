<template>
    <div class="flex mb-3">
        <div v-if="!editedProduct" class="border-b-2">

            <h1 class="text-3xl font-semibold">Add new product</h1>
            <form @submit.prevent="onSubmit">
                <div class="bg-white px-4 pt-5 sm:p-6 sm:pb-4 border-b-2 bg rounded-lg">
                    <CustomInput class="mb-2" v-model="product.title" label="Product Title"/>
                    <CustomInput type="file" class="mb-2" label="Product Image" @change="file => product.image = file"/>
                    <CustomInput type="textarea" class="mb-2" v-model="product.description" label="Description"/>
                    <CustomInput type="number" class="mb-2" v-model="product.price" label="Price"/>

                    <button type="submit"
                            class="py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 ">
                        Submit
                    </button>
                </div>


            </form>
        </div>

        <div v-if="editedProduct" class="border-b-2">
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
        </div>

    </div>
    <h1 class="text-3xl font-semibold">Products</h1>
    <div class="bg-white p-4 rounded-lg shadow">
        {{ search }}

        <div class="flex justify-between border-b-2 pb-3">
            <div class="flex items-center">
                <span class="whitespace-nowrap mr-3">Per Page</span>
                <select @change="getProducts(null)" v-model="perPage"
                        class="appearance-none relative block w-24 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div>
                <input v-model="search" @change="getProducts(null)"
                       class="appearance-none relative block w-48 px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                       placeholder="Type to Search products">
            </div>
        </div>
        <Spinner v-if="products.loading"/>
        <template v-else>

            <table class="table-auto w-full">
                <thead>
                <tr>
                    <th class="border-b-2 p-2 text-left">ID</th>
                    <th class="border-b-2 p-2 text-left">Image</th>
                    <th class="border-b-2 p-2 text-left">Title</th>
                    <th class="border-b-2 p-2 text-left">Price</th>
                    <th class="border-b-2 p-2 text-left">Actions</th>
                    <th class="border-b-2 p-2 text-left">Last Updated At</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="product of products.data">
                    <td class="border-b p-2 ">{{ product.id }}</td>
                    <td class="border-b p-2 ">
                        <!--                        <img class="w-16" :src="product.image" :alt="product.title">-->
                        <img class="w-16 h-16 object-cover" :src="product.image_url" :alt="product.title">
                    </td>
                    <td class="border-b p-2 max-w-[200px] whitespace-nowrap overflow-hidden text-ellipsis">
                        {{ product.title }}
                    </td>
                    <td class="border-b p-2">
                        {{ product.price }}
                    </td>
                    <td class="border-b p-2">
                        <button
                                :class="[
                        active ? 'bg-indigo-600 text-white' : 'text-gray-900',
                        'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                      ]"
                                @click="deleteProduct(product)"
                        >
                            <TrashIcon
                                    :active="active"
                                    class="mr-2 h-5 w-5 text-red-400"
                                    aria-hidden="true"
                            />
                            Delete
                        </button>
                        <button
                                :class="[
                        active ? 'bg-indigo-600 text-white' : 'text-gray-900',
                        'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                      ]"
                                @click="editProduct(product)"
                        >
                            <PencilIcon
                                    :active="active"
                                    class="mr-2 h-5 w-5 text-indigo-400"
                                    aria-hidden="true"
                            />
                            Edit
                        </button>
                    </td>
                    <td class="border-b p-2 ">
                        {{ product.updated_at }}
                    </td>
                </tr>
                </tbody>
            </table>

            <div class="flex justify-between items-center mt-5">
        <span>
          Showing from {{ products.from }} to {{ products.to }}
        </span>
                <nav
                        v-if="products.total > products.limit"
                        class="relative z-0 inline-flex justify-center rounded-md shadow-sm -space-x-px"
                        aria-label="Pagination"
                >
                    <!-- Current: "z-10 bg-indigo-50 border-indigo-500 text-indigo-600", Default: "bg-white border-gray-300 text-gray-500 hover:bg-gray-50" -->
                    <a
                            v-for="(link, i) of products.links"
                            :key="i"
                            :disabled="!link.url"
                            href="#"
                            @click="getForPage($event, link)"
                            aria-current="page"
                            class="relative inline-flex items-center px-4 py-2 border text-sm font-medium whitespace-nowrap"
                            :class="[
              link.active
                ? 'z-10 bg-indigo-50 border-indigo-500 text-indigo-600'
                : 'bg-white border-gray-300 text-gray-500 hover:bg-gray-50',
              i === 0 ? 'rounded-l-md' : '',
              i === products.links.length - 1 ? 'rounded-r-md' : '',
              !link.url ? ' bg-gray-100 text-gray-700': ''
            ]"
                            v-html="link.label"
                    >
                    </a>
                </nav>
            </div>
        </template>
    </div>
</template>

<script setup>
import {computed, onMounted, ref} from "vue";
import store from '../store/store.js'
import Spinner from "../components/core/Spinner.vue";
import {PRODUCTS_PER_PAGE} from "../constants";
import CustomInput from "./core/CustomInput.vue";
import {TrashIcon} from "@heroicons/vue/20/solid/index.js";
import {PencilIcon} from "@heroicons/vue/20/solid/index.js";

const perPage = ref(PRODUCTS_PER_PAGE);
const search = ref('');
const products = computed(() => store.state.products);


const product = ref({
    title: null,
    image: null,
    description: null,
    price: null
})

const editedProduct = ref(null);

/*async function onEditSubmit() {

    store.dispatch('deleteProduct', editedProduct.value.id)
        .then(res => {
            store.dispatch('updateProduct', {
                id: editedProduct.value.id,
                title: editedProduct.value.title,
                price: editedProduct.value.price,
                image: editedProduct.value.image,
                description: editedProduct.value.description,

            })
                .then(response => {
                    if (response.status === 201) {
                        store.dispatch('getProducts')
                    }
                    getProducts();
                })
                .catch(res => {
                    console.log(res)
                })
                .finally(res => {
                    editedProduct.value = null
                })
        })

}*/
async function onEditSubmit() {

    store.dispatch('updateProduct', {
        id: editedProduct.value.id,
        title: editedProduct.value.title,
        price: editedProduct.value.price,
        image: editedProduct.value.image,
        description: editedProduct.value.description,

    })
        .then(response => {
            if (response.status === 201) {
                store.dispatch('getProducts')
            }
            getProducts();
        })
        .catch(res => {
            console.log(res)
        })
        .finally(res => {
            editedProduct.value = null
        })

}

function editProduct(product) {
    editedProduct.value = {...product};
    console.log(editedProduct.value)
}

onMounted(() => {
    getProducts();
})

function getForPage(ev, link) {
    ev.preventDefault();
    if (!link.url || link.active) {
        return;
    }
    getProducts(link.url)
}

function onSubmit() {
    store.dispatch('createProduct', product.value)
        .then(response => {
            if (response.status === 201) {
                store.dispatch('getProducts')
            }
            getProducts();
        })
        .catch(res => {
            console.log(res)
        })
        .finally(err => {
            product.value = null
        })
}

function deleteProduct(product) {
    store.dispatch('deleteProduct', product.id)
        .then(res => {
            store.dispatch('getProducts')
            getProducts();
        })
}

function getProducts(url = null) {
    store.dispatch("getProducts", {
        url,
        search: search.value,
        perPage: perPage.value,
    });

}
</script>
