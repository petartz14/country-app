<script setup>
import { Squares2X2Icon } from "@heroicons/vue/24/solid";

defineProps({
    title: String,
    cities: Object | Array,
});
</script>

<template>
    <div
        class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2 rounded-lg"
    >
        <div class="flex items-center opacity-90 p-3 border-b">
            <Squares2X2Icon class="h-6 w-6 pr-2" />
            {{ title }}
        </div>
        <div v-for="city in cities" class="p-6">
            <div class="flex items-center pb-2">
                <Squares2X2Icon class="h-6 w-6 pr-2" />
                <div class="text-gray-900">{{ city.name }}</div>
            </div>
            <img :src="city.image_url" alt="" srcset="" />
        </div>
    </div>
</template>
