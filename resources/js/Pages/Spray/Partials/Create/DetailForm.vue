
<template>
  <form-section @submitted="createSpray">
    <template #title>
      <p class="text-slate-50">Add Spray</p>
    </template>

    <template #description>
      <p class="text-slate-50">Tell us about what your Spray</p>
      <p class="text-slate-50">Prices are tagged in USD or equivalent USD</p>
      <p class="pt-2 text-slate-50">
        For points, mark at the beginning of each point with
        <span class="text-lg font-medium text-slate-50">*</span> eg
      </p>

      <p class="text-slate-50">* Fertilizer for topping</p>
      <p class="text-slate-50">* Bought from XYZ Company</p>
      <p class="text-slate-50">* Balance of $3-00 remaining</p>
    </template>

    <template #form>
      <div class="col-span-6 sm:col-span-4">
        <input-label for="date" value="Date" />
        <text-input
          id="date"
          ref="dateInput"
          v-model="date"
          type="date"
          class="block w-full mt-1"
        />

        <input-error :message="form.errors.date" class="mt-2" />
      </div>
 

      <div  class="col-span-6 sm:col-span-6">
        <InputLabel for="chemicals" value="Select Sprayed Chemical(s)" />
        <InputError class="mt-2" :message="form.errors.chemicals" />

        <span>
          <CheckBoxGroup
            v-for="chemical in chemicals"
            :key="chemical.id"
            :items="[
              {
                label: chemical.title,
                id: chemical.id,
              },
            ]"
            @on-change="onChemicalChange"
          />
        </span>
      </div>

      <div  class="col-span-6 sm:col-span-6">
        <InputLabel for="plants" value="Select Sprayed Plant(s)" />
        <InputError class="mt-2" :message="form.errors.plants" />

        <span>
          <CheckBoxGroup
            v-for="plant in plants"
            :key="plant.id"
            :items="[
              {
                label: plant.title,
                id: plant.id,
              },
            ]"
            @on-change="onPlantChange"
          />
        </span>
      </div>

      <div  class="col-span-6 sm:col-span-6">
        <InputLabel for="locations" value="Select Sprayed Location(s)" />
        <InputError class="mt-2" :message="form.errors.locations" />

        <span>
          <CheckBoxGroup
            v-for="location in locations"
            :key="location.id"
            :items="[
              {
                label: location.title,
                id: location.id,
              },
            ]"
            @on-change="onLocationChange"
          />
        </span>
      </div>

      <div class="col-span-6 sm:col-span-4">
        <input-label for="detail" value="Property Description" />
        <text-area
          id="detail"
          ref="detailInput"
          v-model="detail"
          type="text"
          class="block w-full mt-1"
          autocomplete="detail"
          rows="5"
          required
        />
      </div>
    </template>

    <template #actions>
      <action-message :on="form.recentlySuccessful" class="mr-3">
        Saved.
      </action-message>

      <submit-button
        :class="{ 'opacity-25': form.processing }"
        :disabled="form.processing"
      >
        Save
      </submit-button>
    </template>
  </form-section>
</template>
<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import ActionMessage from "@/Components/Shared/Form/ActionMessage.vue";
import SubmitButton from "@/Components/Shared/Form/SubmitButton.vue";
import FormSection from "@/Components/Shared/Form/FormSection.vue";
import TextInput from "@/Components/Shared/Form/TextInput.vue";
import TextArea from "@/Components/Shared/Form/TextArea.vue";
import InputError from "@/Components/Shared/Form/InputError.vue";
import InputLabel from "@/Components/Shared/Form/InputLabel.vue";
import { useStorage } from "@/Composables/useStorage";
import CheckBoxGroup from "@/Components/Shared/Checkbox/check-box-group.vue";

let date = useStorage("date", null);
let detail = useStorage("detail", null);

const props = defineProps({
  chemicals: Object,
  locations: Object,
  plants: Object,
});


const onChemicalChange = (val) => {
    val[0].checked === true
    ? form.chemicals.push(val[0].id)
    : form.chemicals.pop(val[0].id);
};


const onPlantChange = (val) => {
   val[0].checked === true
    ? form.plants.push(val[0].id)
    : form.plants.pop(val[0].id);
};

const onLocationChange = (val) => {
   val[0].checked === true
    ? form.locations.push(val[0].id)
    : form.locations.pop(val[0].id);
};

const form = useForm({
  date: date.value,
  chemicals:[],
  plants:[],
  locations:[],  
  detail: detail.value,  
  remember: true,
});

function createSpray() {
  form.post(route("sprays.store"), {
    errorBag: "createSpray",
    preserveScroll: true,
    onSuccess: () => {
      localStorage.removeItem("date");      
      localStorage.removeItem("detail");
     
    },
  });
}
</script>
