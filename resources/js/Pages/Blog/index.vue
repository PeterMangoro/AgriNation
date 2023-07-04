<template>
  <app-layout title="Blogs">
    <template #header>
      <div class="max-w-2xl mx-auto mb-15 text-center">
     
      <h1 class="font-heading text-5xl xs:text-6xl md:text-7xl font-bold">
        <span>News &amp;</span>
        <span class="font-serif italic"> Articles</span>
      </h1>
    </div>
    </template>
    <!-- <bread-crumb :routes="routes" /> -->

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <!-- Table -->
      <div class="flex flex-wrap justify-between pb-2">
        <search-table
          class="pb-2"
          route-name="blogs.index"
          placeholder="Search blogs..."
          :searchValue="data.filters.search"
          show_per_page="true"
        />
        <span class="my-auto">
          <button-link
              :link="route('blogs.create')"
              class=" bg-slate-600"
              >New Blog</button-link
            >
        </span>
      </div>

      <section class="relative  overflow-hidden">
  
  <div class="relative container px-4 mx-auto">
    
    <div class="max-w-5xl mx-auto">
      <div class="py-2 border-t-2 border-gray-400" v-for="blog in data.blogs.data" :key="blog.uuid">
        <div class="flex flex-wrap lg:flex-nowrap items-center">
          <div class="w-full lg:w-auto px-4 mb-8 lg:mb-0">
            <img class="block w-44 h-30 object-cover rounded" :src="blog.image" alt="">
          </div>
          <div class="w-full lg:w-9/12 px-4 mb-10 lg:mb-0">
            <div class="max-w-2xl">
              <span class="block text-gray-400 mb-1">{{ blog.date }}</span>
              <p class="text-2xl font-semibold text-gray-900">{{blog.title}}</p>
              <div class="flex flex-wrap  gap-2">
                <p 
              v-for="tag in blog.tags" :key="tag"
              class="border  rounded-full w-fit px-1.5 border-black text-gray-900">{{ tag }}</p>
            
              </div>
              </div>
          </div>
          <div class="w-full lg:w-auto px-4 ml-auto text-right">
            <div class="flex space-x-1">
              
              <ButtonLink
                class="bg-indigo-500 hover:bg-indigo-700"
                :link="route('blogs.show', blog.uuid)"
                >Read</ButtonLink
              >
              <ButtonLink
                class=""
                :link="route('blogs.edit', blog.uuid)"
                >Edit</ButtonLink
              >
              <Button
                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                @click="show_delete_confirmation(blog.id)"
                as="button"
                type="button"
                >Suspend</Button
              >
            </div>
          </div>
        </div>
      </div>
    
     
    </div>
  </div>
</section>
      <span class="w-full" v-if="data.blogs.data.length == 0">
        <no-result-display />
      </span>

      <!-- table End -->
    </div>

    <div v-if="show">
      <delete-confirmation
        :message="message"
        path="blogs.destroy"
        :item="blog_to_be_deleted"
        @close="show = false"
      />
    </div>
  </app-layout>
</template>
    
    <script setup>
import { ref } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import BreadCrumb from "@/Components/Shared/BreadCrumb.vue";
import DeleteConfirmation from "@/Components/Shared/DeleteConfirmation.vue";
import Table from "@/Components/Shared/Table/Table.vue";
import TableData from "@/Components/Shared/Table/TableData.vue";
import TableHead from "@/Components/Shared/Table/TableHead.vue";
import TableRow from "@/Components/Shared/Table/TableRow.vue";
import ButtonLink from "@/Components/Shared/Table/ButtonLink.vue";
import SearchTable from "@/Components/Shared/Table/SearchTable.vue";
import { useSort } from "@/Composables/sort.js";
import NoResultDisplay from "@/Components/Shared/NoResultDisplay.vue";

const props = defineProps({
  data: Object,
});
const message =
  "Are you sure you want to delete this blog. Deleted blogs will not be seen by customers, but can be found in the trash if you want to restore them";

const show = ref(false);
const blog_to_be_deleted = ref(null);

function show_delete_confirmation(blog) {
  show.value = true;
  blog_to_be_deleted.value = blog;
}

function sort(column) {
  useSort(column, "blogs.index");
}
</script>
    