<template>
    <app-layout title="Add Spray">
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <detail-form 
        :plants="data.plants"
        :chemicals="data.chemicals"
        :locations="data.locations"
        />
            </div>
        </div>
    </app-layout>    
</template>
<script setup>
import AppLayout from "@/Layouts/AppLayout.vue"
import DetailForm from "@/Pages/Spray/Partials/Create/DetailForm.vue";

const props = defineProps({
    data:Object
})

</script>