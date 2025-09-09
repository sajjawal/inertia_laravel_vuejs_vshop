<script setup>
import { router } from '@inertiajs/vue3';
const addToCart = (product) => {
    console.log(product);
    router.post(route('cart.store', product), {
        onSuccess: page => {
            if (page.props.flash.success) {
                Swal.fire({
                    toast: true,
                    icon: 'success',
                    position: 'top-end',
                    showConfirmButton: false,
                    title: page.props.flash.success
                });
            }
        },
    })
}
defineProps({
    products: Array
})


</script>
<template>

    <div class="mt-6 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
        <div v-for="product in products" :key="product.id" class="group relative">
            <img v-if="product.product_images.length > 0" :src='`/${product.product_images[0].image}`'
                :alt="product.imageAlt"
                class="aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-80" />

            <img v-else src="https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg"
                class="aspect-square w-full rounded-md bg-gray-200 object-cover group-hover:opacity-75 lg:aspect-auto lg:h-80" />

            <div
                class="absolute flex justify-center items-center inset-0 opacity-0 group-hover:opacity-100 cursor-pointer">
                <div class="bg-blue-700 p-2 rounded-full">
                    <a @click="addToCart(product)">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                    </a>
                </div>

                <div class="bg-blue-700 p-2 rounded-full ml-2">
                    <a href="detail">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>

                    </a>
                </div>

            </div>
            <div class="mt-4 flex justify-between">
                <div>
                    <h3 class="text-sm text-gray-700">
                        <a href="#">
                            <span aria-hidden="true" class="" />
                            {{ product.title }}
                        </a>
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">{{ product.brand.name }}</p>
                </div>
                <p class="text-sm font-medium text-gray-900">{{ product.price }}</p>
            </div>
        </div>

    </div>
</template>
