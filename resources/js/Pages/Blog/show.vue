<template>
    <app-layout :title="data.blog.title">
      <!-- <bread-crumb :id="data.blog.id" :routes="routes" /> -->
  
      <div>
        <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
          <div>
            <show-blog-information :blog="data.blog"  />
            <JetSectionBorder />
          </div>
          
        </div>
      </div>
    </app-layout>
  </template>
  <script setup>
  import AppLayout from "@/Layouts/AppLayout.vue";
  import { router  } from "@inertiajs/vue3";
  import ShowBlogInformation from "@/Pages/Blog/Partials/ShowBlogInformation.vue";
  import JetSectionBorder from "@/Components/SectionBorder.vue";
  
  const props = defineProps({
    data: Object,
  });
  
  
  const deleteImage = (attachmentId) => {
    const result = confirm("Delete Image ?");
    if (result) {
      router.delete(route("attachment.delete", attachmentId), {
        preserveScroll: true,
      });
    }
  };
  
  const routes = [
    {
      name: "User Blogs",
      link: "blogs.index",
    },
    {
      name: "Blog-Edit",
      link: "blogs.edit",
    },
  ];
  </script>
  