<template>
    <app-layout title="Edit Debit">
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <detail-form
         :harvest="data.harvest"
         :debit="data.debit"/>
            </div>
        </div>
    </app-layout>    
</template>
<script setup>
import AppLayout from "@/Layouts/AppLayout.vue"
import DetailForm from "@/Pages/Debit/Partials/Edit/DetailForm.vue";

const props = defineProps({
    data:Object
})
</script>