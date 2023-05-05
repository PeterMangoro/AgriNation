<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import DashboardCard from "@/Components/Shared/DashboardCard.vue";
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
            <dashboard-card
              title="Approx. Money Spent"
              total="12"
              add_path="expenditures.index"
              more_path="expenditures.index"
              add_tip="Click to Add a new Employee"
              more_tip="Click to view all your available employees"
            />

            <dashboard-card
              title="Total Tomatoes Grown"
              total="12"
              add_path="expenditures.index"
              more_path="expenditures.index"
              add_tip="Click to Add a new Employee"
              more_tip="Click to view all your available employees"
            />
            <dashboard-card
              title="Total Butternuts  Grown"
              total="12"
              add_path="expenditures.index"
              more_path="expenditures.index"
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
