<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import DashboardCard from "@/Components/Shared/Cards/DashboardCard.vue";
import ListCard from "@/Components/Shared/Cards/ListCard.vue";

const props = defineProps({
  data:Object
})
</script>

<template>
  <AppLayout title="Dashboard">
    <template #header>
      <h2
        class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
      >
        Dashboard
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-xl sm:rounded-lg p-3">
          <div class="flex flex-wrap justify-evenly gap-4">
            <list-card
              title="Approx. Money Spent"
              :total="data.expenditure"
              add_path="expenditures.create"
              more_path="expenditures.index"
              add_tip="Click to Add a new Expenditure"
              more_tip="Click to view all your Expenditures"
            />

            <list-card
              title="Approx. Total Plants"
              :total="data.plant"
              add_path="plants.create"
              more_path="plants.index"
              add_tip="Click to Add a new Plant"
              more_tip="Click to view all your Plants"
            />

            <dashboard-card
              title="Total Sprays"
              :total="data.total_of.sprays"
              add_path="sprays.create"
              more_path="sprays.index"
              add_tip="Click to Add a new Spray"
              more_tip="Click to view all your sprays"
            />
            <dashboard-card
              title="Chemical Library"
              :total="data.total_of.chemicals"
              add_path="chemicals.create"
              more_path="chemicals.index"
              add_tip="Click to Add a new Employee"
              more_tip="Click to view all your available employees"
            />
            <dashboard-card
              title="Total Potatoes Grown"
              total="12"
              add_path="expenditures.index"
              more_path="expenditures.index"
              add_tip="Click to Add a new Employee"
              more_tip="Click to view all your available employees"
            />
            <dashboard-card
              title="Approx Onion Grown"
              total="12"
              add_path="expenditures.index"
              more_path="expenditures.index"
              add_tip="Click to Add a new Employee"
              more_tip="Click to view all your available employees"
            />
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
