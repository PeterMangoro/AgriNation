<template>
  <app-layout title="Chemicals">
    <template #header>
      <h2 class="text-xl font-semibold leading-tight text-sky-500">
        Shop Dashboard
      </h2>
    </template>
    <!-- <bread-crumb :routes="routes" /> -->

    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
      <!-- Table -->
      <div class="flex flex-wrap justify-between pb-2">
        <search-table
          class="pb-2"
          route-name="chemicals.index"
          placeholder="Search chemicals..."
          :searchValue="data.filters.search"
          show_per_page="true"
        />
        <span class="my-auto">
          <!-- <button-link
              :link="route('chemicals.trashed.index')"
              class=" bg-slate-600"
              >Deleted Chemicals</button-link
            > -->
        </span>
      </div>

      <Table
        heading="Chemical Table"
        :pagination="data.chemicals.links"
        path="chemicals.create"
        button="Add new Chemical"
      >
        <template #tableHead>
          <TableHead class="cursor-pointer" @click="sort('title')" name="title"
            >Title</TableHead
          >
          <TableHead class="hidden sm:table-cell">Quantity</TableHead>
          <TableHead class="hidden sm:table-cell">Description</TableHead>
          <!-- <TableHead class="hidden sm:table-cell">Preview</TableHead> -->
          <TableHead
            class="cursor-pointer hidden sm:table-cell"
            @click="sort('price')"
            name="price"
            >Price</TableHead
          >
          <!-- <TableHead
              class="cursor-pointer"
              @click="sort('sale_status')"
              name="sale_status"
              >Status</TableHead
            > -->

          <TableHead class="text-center"></TableHead>
        </template>

        <TableRow
          v-for="chemical in data.chemicals.data"
          :key="chemical.id"
        >
          <TableData>{{ chemical.title }}</TableData>
          <TableData class="hidden sm:table-cell">{{
            chemical.quantity
          }}</TableData>
          <TableData class="w-auto hidden sm:table-cell">
            <p
              v-for="(point, index) in chemical.detail"
              :key="index"
              class="flex gap-1 line-clamp-1"
            >
              <span v-if="index < 3"> - {{ point }} </span>
            </p></TableData
          >
          <!-- <TableData class="hidden sm:table-cell"
              ><img class="w-20 h-20 rounded" :src="chemical.latest_image"
            /></TableData> -->

          <TableData class="hidden sm:table-cell">
            {{ chemical.price }} <br>
            <span v-if="chemical.usd_equivalent" class="font-bold"> ({{ chemical.usd_equivalent }})</span>

          </TableData>
          <!-- <TableData class="hidden sm:table-cell">
              <span v-if="chemical.status == 'For Sale'">Available</span>
              <span class="text-red-500" v-else>Not Available</span>
            </TableData> -->
          <TableData>
            <div class="flex space-x-1">
              <ButtonLink
                class=""
                :link="route('chemicals.edit', chemical.id)"
                >View</ButtonLink
              >
              <Button
                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                @click="show_delete_confirmation(chemical.id)"
                as="button"
                type="button"
                >Suspend</Button
              >
            </div>
          </TableData>
        </TableRow>
      </Table>
      <span class="w-full" v-if="data.chemicals.data.length == 0">
        <no-result-display />
      </span>

      <!-- table End -->
    </div>

    <div v-if="show">
      <delete-confirmation
        :message="message"
        path="chemicals.destroy"
        :item="chemical_to_be_deleted"
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
  "Are you sure you want to delete this chemical. Deleted chemicals will not be seen by customers, but can be found in the trash if you want to restore them";

const show = ref(false);
const chemical_to_be_deleted = ref(null);

function show_delete_confirmation(chemical) {
  show.value = true;
  chemical_to_be_deleted.value = chemical;
}

function sort(column) {
  useSort(column, "chemicals.index");
}
</script>
    