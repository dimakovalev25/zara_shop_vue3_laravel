<template>
    <div class="bg-white p-4 rounded-lg shadow animate-fade-in-down">
        <div class="flex justify-between border-b-2 pb-3">
            <div class="flex items-center">
                <span class="ml-3">Found {{categories.data.length}} categories</span>
            </div>
        </div>

        <table class="table-auto w-full">
            <thead>
            <tr class="text-xl">
                <th class="border-b-2 p-2 text-left">ID</th>
                <th class="border-b-2 p-2 text-left">TITLE</th>
                <th class="border-b-2 p-2 text-left">DESCRIPTION</th>
                <th class="border-b-2 p-2 text-left">ACTIONS</th>
            </tr>
            </thead>
            <tbody v-if="categories.loading || !categories.data.length">
            <tr>
                <td colspan="7">
                    <Spinner v-if="categories.loading"/>
                    <p v-else class="text-center py-8 text-gray-700">
                        There are no categories
                    </p>
                </td>
            </tr>
            </tbody>
            <tbody v-else>
            <tr v-for="(category, index) of categories.data">
                <td class="border-b p-2 ">{{ category.id }}</td>
                <td class="border-b p-2 ">
                    {{ category.title }}
                </td>
                <td class="border-b p-2 max-w-[200px] whitespace-nowrap overflow-hidden text-ellipsis">
                    {{ category.description }}
                </td>

                <td class="border-b p-2">
                    <button
                            :class="[
                        active ? 'bg-indigo-600 text-white' : 'text-gray-900',
                        'group flex w-full items-center rounded-md px-2 py-2 text-sm',
                      ]"
                            @click="deleteCategory(category)"
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
                            @click="editCategory(category)"
                    >
                        <PencilIcon
                                :active="active"
                                class="mr-2 h-5 w-5 text-indigo-400"
                                aria-hidden="true"
                        />
                        Edit
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import {computed, onMounted, ref} from "vue";
import store from "../../store/store.js";
import Spinner from "../../components/core/Spinner.vue";
import {Menu, MenuButton, MenuItem, MenuItems} from "@headlessui/vue";
import CategoryModal from "./CategoryModal.vue";
import {PencilIcon, TrashIcon} from "@heroicons/vue/20/solid/index.js";

const categories = computed(() => store.state.categories);
const sortField = ref('updated_at');
const sortDirection = ref('desc')

const category = ref({})
const showCategoryModal = ref(false);

const emit = defineEmits(['clickEdit'])

onMounted(() => {
    getCategories();
})

function getForPage(ev, link) {
    ev.preventDefault();
    if (!link.url || link.active) {
        return;
    }
    getCategories(link.url)
}

function getCategories(url = null) {
    store.dispatch("getCategories", {
        url,

    });
}


function showAddNewModal() {
    showCategoryModal.value = true
}

function deleteCategory(category) {
    if (!confirm(`Are you sure you want to delete the category?`)) {
        return
    }
    store.dispatch('deleteCategory', category)
        .then(res => {
            store.dispatch('getCategories')
            getCategories()
        })
        .catch(err=> {
            console.log(err)
        })
}

function editCategory(p) {
    emit('clickEdit', p)
}
</script>

<style scoped>

</style>
