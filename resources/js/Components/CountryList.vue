<script setup>
import { Squares2X2Icon } from "@heroicons/vue/24/solid";
import { router } from "@inertiajs/vue3";
import { watch } from "vue";
import { ref } from "vue";
import draggable from "vuedraggable";

let props = defineProps({
    title: String,
    cities: Object | Array,
});

let items = ref(props.cities);

watch(
    () => props.cities,
    (newValue) => {
        items.value = newValue;
    }
);

const startDrag = (event, item) => {
    event.dataTransfer.dropEffect = "move";
    event.dataTransfer.effectAllowed = "move";
    event.dataTransfer.setData("itemID", item.id);
};

const onDrop = (event, country) => {
    router.post(route("cities.store"), {
        city_id: event.dataTransfer.getData("itemID"),
        country: country,
    });
};
</script>

<template>
    <div
        class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2 rounded-lg"
        @drop="onDrop($event, props.title)"
        @dragenter.prevent
        @dragover.prevent
    >
        <div class="flex items-center opacity-90 p-3 border-b">
            <Squares2X2Icon class="h-6 w-6 pr-2" />
            {{ title }}
        </div>
        <div
            v-for="(city, i) in props.cities"
            :key="i"
            draggable="true"
            @dragstart="startDrag($event, city)"
            class="p-2 border mb-4 shadow-md"
        >
            <div class="flex items-center pb-2">
                <Squares2X2Icon class="h-6 w-6 pr-2" />
                <div class="text-gray-900">{{ city.name }}</div>
            </div>
            <img :src="city.image_url" alt="" srcset="" />
        </div>
    </div>
</template>
