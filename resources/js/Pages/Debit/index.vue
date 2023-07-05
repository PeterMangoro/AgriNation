<template>
  <app-layout title="Debits">
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
          route-name="debits.index"
          placeholder="Search debits..."
          :searchValue="data.filters.search"
          show_per_page="true"
        />
        <span class="my-auto">
          <!-- <button-link
              :link="route('debits.trashed.index')"
              class=" bg-slate-600"
              >Deleted Debits</button-link
            > -->
        </span>
      </div>

      <Table
        heading="Debit (Vakandikwereta) Table"
        :pagination="data.debits.links"
        path="debits.create"
        button="Add new Debit"
      >
        <template #tableHead>
          <TableHead class="cursor-pointer" 
            >Date</TableHead
          >
          <TableHead class="cursor-pointer" 
            >Source</TableHead
          >
          
          <TableHead class="hidden sm:table-cell">Description</TableHead>
          <!-- <TableHead class="hidden sm:table-cell">Preview</TableHead> -->
          <TableHead
            class="cursor-pointer hidden sm:table-cell"
            @click="sort('price')"
            name="price"
            >Price</TableHead
          >
         
          <TableHead class="text-center"></TableHead>
        </template>

        <TableRow
          v-for="debit in data.debits.data"
          :key="debit.id"
        >
        <TableData>{{ debit.date }}</TableData>
          <TableData>{{ debit.source }}</TableData>
        
          <TableData class="w-auto hidden sm:table-cell">
            <p
              v-for="(point, index) in debit.detail"
              :key="index"
              class="flex gap-1 line-clamp-1"
            >
              <span v-if="index < 3"> - {{ point }} </span>
            </p></TableData
          >
       

          <TableData class="hidden sm:table-cell">
            {{ debit.price }} <br>
            <span v-if="debit.usd_equivalent" class="font-bold"> ({{ debit.usd_equivalent }})</span>

          </TableData>
          <!-- <TableData class="hidden sm:table-cell">
              <span v-if="debit.status == 'For Sale'">Available</span>
              <span class="text-red-500" v-else>Not Available</span>
            </TableData> -->
          <TableData>
            <div class="flex space-x-1">
              <ButtonLink
                class=""
                :link="route('debits.edit', debit.id)"
                >View</ButtonLink
              >
              <Button
                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-red-600 border border-transparent rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                @click="show_delete_confirmation(debit.id)"
                as="button"
                type="button"
                >Paid</Button
              >
            </div>
          </TableData>
        </TableRow>
      </Table>
      <span class="w-full" v-if="data.debits.data.length == 0">
        <no-result-display />
      </span>

      <!-- table End -->
    </div>

    <div v-if="show">
      <delete-confirmation
        :message="message"
        button_message="Yes, Its Paid"
        path="debits.destroy"
        :item="debit_to_be_deleted"
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
  "Are you sure you this debt has been paid";

const show = ref(false);
const debit_to_be_deleted = ref(null);

function show_delete_confirmation(debit) {
  show.value = true;
  debit_to_be_deleted.value = debit;
}

function sort(column) {
  useSort(column, "debits.index");
}
</script>
    