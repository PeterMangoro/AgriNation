<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import DashboardCard from "@/Components/Shared/Cards/DashboardCard.vue";
import ListCard from "@/Components/Shared/Cards/ListCard.vue";

const props = defineProps({
  data:Object, 
})
</script>

<template>
  <AppLayout title="Dashboard" >
    <template #header>
      <h2
        class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
      >
        Dashboard
      </h2>
    </template>

    <div class="py-auto">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden  sm:rounded-lg p-3">
          <div class="flex flex-wrap justify-evenly gap-4">
            <list-card
            v-if="data.filters.show=='accounts'"
            class="shadow-lg shadow-green-500 rounded "
              title="Approx. Money Income"
              :total="data.income"
              add_path="incomes.create"
              more_path="incomes.index"
              add_tip="Click to Add a new Income"
              more_tip="Click to view all your Incomes"
            />

            <list-card
            v-if="data.filters.show=='accounts'"
            class="shadow-lg shadow-green-500 rounded "
              title="Approx. Money Loaned"
              total="data.debit"
              add_path="debits.create"
              more_path="debits.index"
              add_tip="Click to Add a new Loan"
              more_tip="Click to view all your Loans"
            />

            <list-card
            v-if="data.filters.show=='accounts'"
            class="shadow-lg shadow-red-500 rounded"
              title="Approx. Money Spent"
              :total="data.expenditure"
              add_path="expenditures.create"
              more_path="expenditures.index"
              add_tip="Click to Add a new Expenditure"
              more_tip="Click to view all your Expenditures"
            />

            <list-card
            v-if="data.filters.show=='accounts'"
            class="shadow-lg shadow-red-500 rounded"
              title="Approx. Money Borrowed"
              total="data.credit"
              add_path="credits.create"
              more_path="credits.index"
              add_tip="Click to Add a new Credit"
              more_tip="Click to view all your Credits"
            />

            <list-card
            v-if="data.filters.show=='resources'"
              title="Approx. Total Plants"
              :total="data.plant_total_of"
              add_path="plants.create"
              more_path="plants.index"
              add_tip="Click to Add a new Plant"
              more_tip="Click to view all your Plants"
            />


            <dashboard-card
            v-if="data.filters.show=='resources'"
              title="Total Arable Locations"
              :total="data.total_of.locations"
              add_path="locations.create"
              more_path="locations.index"
              add_tip="Click to Add a new Location"
              more_tip="Click to view all your locations"
            />
            
            <dashboard-card
            v-if="data.filters.show=='chemicals'"
              title="Total Chemical Sprays"
              :total="data.total_of.sprays"
              add_path="sprays.create"
              more_path="sprays.index"
              add_tip="Click to Add a new Spray"
              more_tip="Click to view all your sprays"
            />
            <dashboard-card
            v-if="data.filters.show=='chemicals'"
              title="Chemical Library"
              :total="data.total_of.chemicals"
              add_path="chemicals.create"
              more_path="chemicals.index"
              add_tip="Click to Add a new Chemical"
              more_tip="Click to view all your available chemicals"
            />
            <dashboard-card
            v-if="data.filters.show=='chemicals'"
              title="Fertilizer Library"
              :total="data.total_of.fertilizers"
              add_path="fertilizers.create"
              more_path="fertilizers.index"
              add_tip="Click to Add a new Fertilizer" plait 
              more_tip="Click to view all your available fertilizers"
            />
            <dashboard-card
            v-if="data.filters.show=='chemicals'"
              title="Total Fertilizer Applications"
              :total="data.total_of.fertilizations"
              add_path="fertilizations.create"
              more_path="fertilizations.index"
              add_tip="Click to Add a new Fertilization"
              more_tip="Click to view all your available Fertilizations"
            />
           
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>
