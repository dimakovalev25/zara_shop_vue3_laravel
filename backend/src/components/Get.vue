<template>
<div>
    get component {{ test}} {{pr}} !!!
</div>
</template>

<script setup>


import state from "../store/state.js";

const test = state.test
const {pr} = defineProps({
    pr: String
})

</script>

<style scoped>

</style>