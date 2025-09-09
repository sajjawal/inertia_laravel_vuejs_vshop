<script setup lang="ts">
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'
import Footer from './Footer.vue';
import Header from './Header.vue';

onMounted(() => {
    initFlowbite();
})
</script>
<template>
    <Header></Header>

    <slot></slot>
    <Footer></Footer>
</template>
