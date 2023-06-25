<template>
  <app-layout title="Edit Plant">
    <!-- <bread-crumb :id="data.plant.id" :routes="routes" /> -->

    <div>
      <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div>
          <update-plants-information :plant="data.plant"  />
          <JetSectionBorder />
        </div>
        <div>
          <!-- <update-plant-images :plant="data.plant"  /> -->
          <JetSectionBorder />
        </div>
        <div>
          <!-- <update-plant-documents :plant="data.plant"  /> -->
          <JetSectionBorder />
        </div>
      </div>
    </div>
  </app-layout>
</template>
<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { router  } from "@inertiajs/vue3";
import UpdatePlantsInformation from "@/Pages/Plant/Partials/Edit/UpdatePlantsInformation.vue";
// import UpdatePlantImages from "@/Pages/Plant/Partials/Edit/UpdatePlantImages.vue";
// import UpdatePlantDocuments from "@/Pages/Plant/Partials/Edit/UpdatePlantDocuments.vue";
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
    name: "User Plants",
    link: "plants.index",
  },
  {
    name: "Plant-Edit",
    link: "plants.edit",
  },
];
</script>
