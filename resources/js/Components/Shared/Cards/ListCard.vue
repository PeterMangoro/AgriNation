<template>
  <div class="mb-2">
    <div class="p-6 bg-white h-56 rounded shadow-xl">
      <div class="flex mb-2">
        <h3 class="font-semibold text-gray-600">{{ title }}</h3>
        <!-- <span class="inline-block px-2 py-1 ml-auto text-xs text-gray-500 rounded-full bg-gray-50">30 Days</span> -->
      </div>
      <h2 class="mb-2 text-2xl font-bold text-orange-600">
        <span v-if="total.approx_usd_total"> {{ total.approx_usd_total }}</span>
        <span v-if="total.all_plants"> {{ total.all_plants }} total plants</span>
      </h2>
      <p class="text-sm italic flex flex-wrap justify-between space-x-2 w-72">
        <span v-if="total.usd">{{ total.usd }}</span>
        <span v-if="total.bond">{{ total.bond }}</span>
        <span v-if="total.rtgs">{{ total.rtgs }}</span>
        <span v-if="total.rand">{{ total.rand }}</span>

        <span v-if="total.active_plants">{{ total.active_plants }} current plants</span>
        <span v-if="total.currently_harvesting_plants">{{ total.currently_harvesting_plants }} currently harvesting plants</span>
        <span v-if="total.harvested_plants">{{ total.harvested_plants }}harvested_plants</span>
        <!-- <span v-if="total.rand">{{ total.rand }}</span> -->
      </p>
      <span class="flex space-x-2 justify-center p-3">
        <Link
          v-if="add_path"
          :href="route(add_path, add_parameter)"
          class="flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded-md hover:bg-blue-600"
        >
          <p>Add New</p>
          <tooltip class="ml-1" :tip="add_tip" />
        </Link>
        <Link
          v-if="more_path"
          :href="route(more_path, more_parameter)"
          class="flex items-center px-4 py-2 text-sm font-medium text-white bg-green-500 rounded-md hover:bg-green-600"
        >
          <p>View</p>
          <tooltip class="ml-1" :tip="more_tip" />
        </Link>
        <Link
          v-if="empty_path"
          :href="route(more_path)"
          class="flex items-center px-4 py-2 text-sm font-medium text-white bg-red-500 rounded-md hover:bg-red-600"
        >
          <p>Empty Trash</p>
          <tooltip class="ml-1" :tip="more_tip" />
        </Link>
      </span>
    </div>
  </div>
</template>
   
   <script setup>
import tooltip from "@/Components/Shared/Tooltip.vue";
const props = defineProps({
  title: String,
  total: Number,
  add_path: String,
  add_parameter: String,
  more_path: String,
  more_parameter: String,
  add_tip: String,
  more_tip: String,
  empty_path: String,
});
</script>
   
   <style>
</style>