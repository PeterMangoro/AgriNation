
<template>
    <div class=" mx-auto mb-15 text-center">
     
     <h1 class="font-heading text-5xl  xs:text-6xl md:text-7xl font-bold">
       {{blog.title}}
     </h1>

     <div class="flex flex-wrap space-x-3 justify-center m-2">
                <p 
              v-for="tag in blog.tags" :key="tag"
              class="border   rounded-full w-fit px-1.5 border-black text-gray-900">{{ tag }}</p>
            
              </div>
   </div>
    <div class="my-2 shadow-xl  border-none">
    <quill-editor
    enable="false"
    readOnly="true"
            theme="bubble"
            :modules="modules"
            toolbar="full"
            v-model:content="blog.detail"
            contentType="html"
            style="min-height:300px;"
          />
  </div>
  
  </template>
  <script setup>
  import "@vueup/vue-quill/dist/vue-quill.snow.css";
import "@vueup/vue-quill/dist/vue-quill.bubble.css";
import { QuillEditor } from "@vueup/vue-quill";
import BlotFormatter from "quill-blot-formatter";

  const props = defineProps({
    blog: Object,
  });


const modules = {
  name: "blotFormatter",
  module: BlotFormatter,
  options: {
    /* options */
  },
};

 
  </script>
  