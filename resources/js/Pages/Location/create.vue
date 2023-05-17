<template>
    <app-layout title="Add Location">
        <div>
            <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div v-if="step_one">
          <detail-form @next="go_to_step_two" />
        </div>

        <div v-if="step_two">
          <attachment-form
            @prev="go_to_step_one"           
          />
        </div>
      </div>
        </div>
       
    </app-layout>    
</template>
<script setup>
import AppLayout from "@/Layouts/AppLayout.vue"
import DetailForm from "@/Pages/Location/Partials/Create/DetailForm.vue";
import AttachmentForm from "@/Pages/Location/Partials/Create/AttachmentForm.vue";
import { ref } from "vue";

const step_one = ref(true);
const step_two = ref(false);

function go_to_step_one() {
  reset(), (step_one.value = true);
}

function go_to_step_two() {
  reset(), (step_two.value = true);
}

function reset() {
  (step_one.value = false), (step_two.value = false);
}

</script>