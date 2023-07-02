<template>
  <app-layout title="Edit Blog">
    <!-- <bread-crumb :id="data.blog.id" :routes="routes" /> -->

    <div>
      <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div>
          <update-blog-information :blog="data.blog"  />
          <JetSectionBorder />
        </div>
        <div>
          <update-blog-images :blog="data.blog"  />
          <JetSectionBorder />
        </div>
        <div>
          <update-blog-documents :blog="data.blog"  />
          <JetSectionBorder />
        </div>
      </div>
    </div>
  </app-layout>
</template>
<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { router  } from "@inertiajs/vue3";
import UpdateBlogInformation from "@/Pages/Blog/Partials/Edit/UpdateBlogInformation.vue";
import UpdateBlogImages from "@/Pages/Blog/Partials/Edit/UpdateBlogImages.vue";
import UpdateBlogDocuments from "@/Pages/Blog/Partials/Edit/UpdateBlogDocuments.vue";
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
