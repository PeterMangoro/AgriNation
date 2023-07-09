
<template>
    <form-section @submitted="updateBlogDetail">
      <template #title> 
        <p class="text-sky-500"> Update Blog </p>  </template>
  
      <template #description>
        <p class="text-slate-900 mb-2"> Update your Blog Title.</p>
 
      </template>
  
      <template #form>
        <div class="col-span-6 sm:col-span-4">
          <input-label for="title" value="Blog Title" />
          <text-input
            id="title"
            ref="blogInput"
            v-model="form.title"
            type="text"
            class="block w-full mt-1"
            autocomplete="title"
          />
          <input-error :message="form.errors.title" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
        <input-label for="tags" value="Tags" />
        <text-area
          id="tags"
          ref="tagsInput"
          v-model="form.tags"
          type="text"
          class="block w-full mt-1"
          autocomplete="tags"
          rows="2"
          required
        />
      </div>
      </template>
  
    </form-section>
    <div class="my-2 shadow-xl  border-none">
    <quill-editor
            theme="bubble"
            :modules="modules"
            toolbar="full"
            v-model:content="form.detail"
            contentType="html"
            style="min-height:300px;"
          />
  </div>
  <div class="text-right">
    <submit-button
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
            @click="updateBlogDetail"
          >
            Save
          </submit-button>
  </div>
  </template>
  <script setup>
  import { ref } from "vue";
  import { useForm } from "@inertiajs/vue3";
  import ActionMessage from "@/Components/Shared/Form/ActionMessage.vue";
  import SubmitButton from "@/Components/Shared/Form/SubmitButton.vue";
  import FormSection from "@/Components/Shared/Form/FormSection.vue";
  import TextInput from "@/Components/Shared/Form/TextInput.vue";
  import TextArea from "@/Components/Shared/Form/TextArea.vue";
  import InputError from "@/Components/Shared/Form/InputError.vue";
  import InputLabel from "@/Components/Shared/Form/InputLabel.vue";
  import { pointConverter } from "@/Composables/pointConverter";
  import "@vueup/vue-quill/dist/vue-quill.snow.css";
import "@vueup/vue-quill/dist/vue-quill.bubble.css";
import { QuillEditor } from "@vueup/vue-quill";
import BlotFormatter from "quill-blot-formatter";

  const detailInput = ref(null);
  const blogInput = ref(null);
  const props = defineProps({
    blog: Object,
  });
  const form = useForm({
    title: props.blog.title,
    tags: pointConverter(props.blog.tags),
    images: null,
    groups: [],
    type: props.blog.type,
    detail: props.blog.detail,    
    blog_uuid: props.blog.uuid,   
    remember: true,
  });
  
  function saleStatus() {
    if (form.sale_status == true) {
      return "Currently Active";
    } else return "Currently Inactive";
  }
  

const modules = {
  name: "blotFormatter",
  module: BlotFormatter,
  options: {
    /* options */
  },
};

  const updateBlogDetail = () => {
    form.put(route("blogs.update", props.blog.uuid), {
      errorBag: "updateBlogDetail",
      preserveScroll: true,
    });
  };
  </script>
  