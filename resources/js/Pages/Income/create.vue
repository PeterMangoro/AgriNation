<template>
    <app-layout title="Add Income">
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <detail-form :harvest="data.harvest"/>
            </div>
        </div>
    </app-layout>    
</template>
<script setup>
import AppLayout from "@/Layouts/AppLayout.vue"
import DetailForm from "@/Pages/Income/Partials/Create/DetailForm.vue";

const props = defineProps({
    data:Object
})
</script>