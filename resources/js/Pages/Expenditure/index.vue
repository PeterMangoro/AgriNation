<template>
  <app-layout title="Expenditures">
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
          route-name="expenditures.index"
          placeholder="Search expenditures..."
          :searchValue="data.filters.search"
          show_per_page="true"
        />
        <span class="my-auto">
          <!-- <button-link
              :link="route('expenditures.trashed.index')"
              class=" bg-slate-600"
              >Deleted Expenditures</button-link
            > -->
        </span>
      </div>

      <Table
        heading="Expenditure Table"
        :pagination="data.expenditures.links"
        path="expenditures.create"
        button="Add new Expenditure"
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
          v-for="expenditure in data.expenditures.data"
          :key="expenditure.id"
        >
          <TableData>{{ expenditure.title }}</TableData>
          <TableData class="hidden sm:table-cell">{{
            expenditure.quantity
          }}</TableData>
          <TableData class="w-auto hidden sm:table-cell">
            <p
              v-for="(point, index) in expenditure.detail"
              :key="index"
              class="flex gap-1 line-clamp-1"
            >
              <span v-if="index < 3"> - {{ point }} </span>
            </p></TableData
          >
          <!-- <TableData class="hidden sm:table-cell"
              ><img class="w-20 h-20 rounded" :src="expenditure.latest_image"
            /></TableData> -->

          <TableData class="hidden sm:table-cell">
            {{ expenditure.price }} <br>
            <span v-if="expenditure.usd_equivalent" class="font-bold"> ({{ expenditure.usd_equivalent }})</span>

          </TableData>
          <!-- <TableData class="hidden sm:table-cell">
              <span v-if="expenditure.status == 'For Sale'">Available</span>
              <span class="text-red-500" v-else>Not Available</span>
            </TableData> -->
          <TableData>
            <div class="flex space-x-1">
              <ButtonLink
                class=""
                :link="route('expenditures.edit', expenditure.id)"
                >View</ButtonLink
              >
              <Button
                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                @click="show_delete_confirmation(expenditure.id)"
                as="button"
                type="button"
                >Suspend</Button
              >
            </div>
          </TableData>
        </TableRow>
      </Table>
      <span class="w-full" v-if="data.expenditures.data.length == 0">
        <no-result-display />
      </span>

      <!-- table End -->
    </div>

    <div v-if="show">
      <delete-confirmation
        :message="message"
        path="expenditures.destroy"
        :item="expenditure_to_be_deleted"
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
  "Are you sure you want to delete this expenditure. Deleted expenditures will not be seen by customers, but can be found in the trash if you want to restore them";

const show = ref(false);
const expenditure_to_be_deleted = ref(null);

function show_delete_confirmation(expenditure) {
  show.value = true;
  expenditure_to_be_deleted.value = expenditure;
}

function sort(column) {
  useSort(column, "expenditures.index");
}
</script>
    