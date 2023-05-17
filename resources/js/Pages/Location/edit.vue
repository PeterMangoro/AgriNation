<template>
  <app-layout title="Edit Location">
    <!-- <bread-crumb :id="data.location.id" :routes="routes" /> -->

    <div>
      <div class="py-10 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div>
          <update-location-information :location="data.location"  />
          <JetSectionBorder />
        </div>
        <div>
          <update-location-images :location="data.location"  />
          <JetSectionBorder />
        </div>
        <div>
          <update-location-documents :location="data.location"  />
          <JetSectionBorder />
        </div>
      </div>
    </div>
  </app-layout>
</template>
<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import { router  } from "@inertiajs/vue3";
import UpdateLocationInformation from "@/Pages/Location/Partials/Edit/UpdateLocationInformation.vue";
import UpdateLocationImages from "@/Pages/Location/Partials/Edit/UpdateLocationImages.vue";
import UpdateLocationDocuments from "@/Pages/Location/Partials/Edit/UpdateLocationDocuments.vue";
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
    name: "User Locations",
    link: "locations.index",
  },
  {
    name: "Location-Edit",
    link: "locations.edit",
  },
];
</script>
