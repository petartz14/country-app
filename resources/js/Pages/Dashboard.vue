<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import CountryList from "@/Components/CountryList.vue";
import { Head, usePage } from "@inertiajs/vue3";

let page = usePage();
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Country
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-col-1 md:grid-cols-3 gap-4">
                    <CountryList title="Common" :cities="page.props.cities" />
                    <CountryList title="India" :cities="page.props.cities" />
                    <CountryList
                        title="Philippines"
                        :cities="page.props.cities"
                    />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
