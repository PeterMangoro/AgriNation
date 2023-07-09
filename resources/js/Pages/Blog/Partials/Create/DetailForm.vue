
<template>
  <form-section @submitted="createBlog">
    <template #title>
      <p class=" ">Add Blog</p>
    </template>

    <template #description>
      <p class=" ">Tell us the title your Blog</p>
      <p class="  mt-2">Please resize your image ,size should not Exceed 2mb.</p>
      <p class="  mt-2">
        Visit <a class="underline" href="https://tinypng.com/" target="_blank">tinypng.com</a> for
        free image resizing.
      </p>
     
    </template>

    <template #form>
      <div class="col-span-6 sm:col-span-4">
        <InputLabel for="title" value="Title" />
        <TextInput
          id="title"
          v-model="form.title"
          type="text"
          class="block w-full mt-1"
          required
          autofocus
          autocomplete="title"
        />
        <InputError class="mt-2" :message="form.errors.title" />
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

      <div class="col-span-6 sm:col-span-4">
        <div>
          <InputLabel for="preview" value="Preview Image" />
          <div
            class="
              flex
              justify-center
              px-6
              pt-5
              pb-6
              mt-1
              border-2 border-gray-300 border-dashed
              rounded-md
            "
          >
            <div class="space-y-1 text-center">
              <svg
                class="w-12 h-12 mx-auto  dark: "
                stroke="currentColor"
                fill="none"
                viewBox="0 0 48 48"
                aria-hidden="true"
              >
                <path
                  d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
              <div class="flex text-sm  dark:  ">
                <label
                  for="file-upload"
                  class="
                    font-medium
                    text-indigo-600
                    bg-transparent bg-white
                    rounded-md
                    cursor-pointer
                    hover:text-indigo-500
                    focus-within:outline-none
                    focus-within:ring-2
                    focus-within:ring-offset-2
                    focus-within:ring-indigo-500
                  "
                >
                 
                  <input
                    id="images"
                    @input="form.images = $event.target.files"
                    type="file"
                    multiple                    
                    @change="onFileChange"
                  />
                </label>
              </div>
              <p class="text-xs  dark: ">PNG, JPG, GIF up to 2MB</p>
              <InputError
                class="mt-2"
                v-for="(error, image) in form.errors.images"
                :key="image"
                :message="error"
              />
            </div>
          </div>
        </div>
      </div>
      
           
    </template>
   
   
  </form-section>

  <div class="my-2 shadow  border-none rounded shadow-green-600">
    <quill-editor
            theme="bubble"
            :modules="modules"
            toolbar="full"
            v-model:content="form.detail"
            contentType="html"
            style="min-height:300px;"
            placeholder="Write Your Blog Here"
          />
  </div>
  <div class="text-right">
    <submit-button
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
            @click="createBlog"
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
import { useStorage } from "@/Composables/useStorage";
import "@vueup/vue-quill/dist/vue-quill.snow.css";
import "@vueup/vue-quill/dist/vue-quill.bubble.css";
import { QuillEditor } from "@vueup/vue-quill";
import BlotFormatter from "quill-blot-formatter";


const form = useForm({
  title: null, 
  tags: null, 
  detail: null,  
  images:[],
  remember: true,
});

const modules = {
  name: "blotFormatter",
  module: BlotFormatter,
  options: {
    /* options */
  },
};
const emit = defineEmits(["next", "prev"]);


function createBlog() {
  form.post(route("blogs.store"), {
    errorBag: "createBlog",
    preserveScroll: true,
    onSuccess: () => {     
      localStorage.removeItem("title");
      localStorage.removeItem("type");     
      localStorage.removeItem("detail");
    },
  });
}

</script>
