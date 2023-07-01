<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import DashboardCard from "@/Components/Shared/Cards/DashboardCard.vue";
import ListCard from "@/Components/Shared/Cards/ListCard.vue";
import '@vueup/vue-quill/dist/vue-quill.snow.css';
import '@vueup/vue-quill/dist/vue-quill.bubble.css';
import { QuillEditor } from '@vueup/vue-quill'
import BlotFormatter from 'quill-blot-formatter'
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import SubmitButton from "@/Components/Shared/Form/SubmitButton.vue";

const props = defineProps({
  data:Object
})

const modules = {
      name: 'blotFormatter',  
      module: BlotFormatter, 
      options: {/* options */}
    }

const form = useForm({
 content:null,
  remember: true,
});

function add() {
  form.post(route("blogs.store"), {
    errorBag: "add",
    preserveScroll: true,
    
  });
}

</script>

<template>
  <AppLayout title="Dashboard">
  

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form @submit.prevent="add">
          <quill-editor 
        theme="snow" 
        :modules="modules" 
        toolbar="full"
        v-model:content="form.content"
        contentType="html"
        
        />

        <submit-button
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
      >
        Save
      </submit-button>
        </form>
        
        <!-- <quill-editor theme="bubble"></quill-editor> -->
      </div>

      <quill-editor 
      v-if="data.content"
        theme="bubble" 
        :modules="modules" 
        toolbar="full"
        :content="data.content.detail"
        contentType="html"
        />
    </div>

    
  </AppLayout>
</template>
