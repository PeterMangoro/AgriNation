<template>
  <app-layout title="Edit Fertilizer">
    <!-- <bread-crumb :id="data.fertilizer.id" :routes="routes" /> -->

    <div>
      <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div>
          <update-fertilizer-information :fertilizer="data.fertilizer"  />
          <JetSectionBorder />
        </div>
        <div>
          <update-fertilizer-images :fertilizer="data.fertilizer"  />
          <JetSectionBorder />
        </div>
        <div>
          <update-fertilizer-documents :fertilizer="data.fertilizer"  />
          <JetSectionBorder />
        </div>
      </div>
    </div>
  </app-layout>
</template>
<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { router  } from "@inertiajs/vue3";
import UpdateFertilizerInformation from "@/Pages/Fertilizer/Partials/Edit/UpdateFertilizerInformation.vue";
import UpdateFertilizerImages from "@/Pages/Fertilizer/Partials/Edit/UpdateFertilizerImages.vue";
import UpdateFertilizerDocuments from "@/Pages/Fertilizer/Partials/Edit/UpdateFertilizerDocuments.vue";
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
    name: "User Fertilizers",
    link: "fertilizers.index",
  },
  {
    name: "Fertilizer-Edit",
    link: "fertilizers.edit",
  },
];
</script>
