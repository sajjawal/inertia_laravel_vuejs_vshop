<template>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">
        <!-- nav bar start  -->
        <Navbar></Navbar>

        <!-- navebar end  -->

        <!-- Sidebar -->
        <Sidebar></Sidebar>

        <!-- sdie bar end  -->
        <main class="p-4 md:ml-64 h-auto pt-20">

            <slot></slot>
        </main>


    </div>
</template>

<script setup lang="ts">
import { onMounted } from 'vue'
import { initFlowbite } from 'flowbite'
import Navbar from './Navbar.vue'
import Sidebar from './Sidebar.vue'



// initialize components based on data attribute selectors
onMounted(() => {
    initFlowbite();
})
</script>
