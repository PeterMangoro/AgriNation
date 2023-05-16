<template>
  <app-layout title="Edit Chemical">
    <!-- <bread-crumb :id="data.chemical.id" :routes="routes" /> -->

    <div>
      <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div>
          <update-chemical-information :chemical="data.chemical"  />
          <JetSectionBorder />
        </div>
        <div>
          <update-chemical-images :chemical="data.chemical"  />
          <JetSectionBorder />
        </div>
        <div>
          <update-chemical-documents :chemical="data.chemical"  />
          <JetSectionBorder />
        </div>
      </div>
    </div>
  </app-layout>
</template>
<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { router  } from "@inertiajs/vue3";
import UpdateChemicalInformation from "@/Pages/Chemical/Partials/Edit/UpdateChemicalInformation.vue";
import UpdateChemicalImages from "@/Pages/Chemical/Partials/Edit/UpdateChemicalImages.vue";
import UpdateChemicalDocuments from "@/Pages/Chemical/Partials/Edit/UpdateChemicalDocuments.vue";
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
    name: "User Chemicals",
    link: "chemicals.index",
  },
  {
    name: "Chemical-Edit",
    link: "chemicals.edit",
  },
];
</script>
