<template>
    <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div>
                Part of the layout
            </div>
            <router-view></router-view>
        </div>
    </div>
</template>
<script>
export default {
    name: "GuestLayout",

    props: ['title'],
    data() {
        return {
            title: this.title
        }
    }
}


</script>
<style scoped>
</style>