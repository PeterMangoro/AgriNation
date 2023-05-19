
<template>
  <form-section @submitted="addDetail">
    <template #title>
      <p class="text-slate-50">Add Location</p>
    </template>

    <template #description>
      <p class="text-slate-50">Tell us about what your Location</p>
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
        <InputLabel for="title" value="Title" />
        <TextInput
          id="title"
          v-model="title"
          type="text"
          class="block w-full mt-1"
          required
          autofocus
          autocomplete="title"
        />
        <InputError class="mt-2" :message="form.errors.title" />
      </div>

      <div class="col-span-6 sm:col-span-4">
        <input-label for="type" value="Stage" />
        <select
          class="rounded-md focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
          name="stage"
          id="stage"
          v-model="stage"
        >
          <option value="nursery">Nursery</option>
          <option value="direct_planting">Direct Planting</option>
        </select>
      </div>

      <div v-if="stage=='nursery'" class="col-span-6 sm:col-span-4">
        <InputLabel for="nursery_location" value="Nursery Location" />
        <TextInput
          id="nursery_location"
          v-model="nursery_location"
          type="text"
          class="block w-full mt-1"
          required
          autofocus
          autocomplete="nursery_location"
        />
        <InputError class="mt-2" :message="form.errors.nursery_location" />
      </div>

      <div class="col-span-6 sm:col-span-4">
        <input-label for="date" value="Planting Date" />
        <text-input
          id="date"
          ref="dateInput"
          v-model="date"
          type="date"
          class="block w-full mt-1"
        />

        <input-error :message="form.errors.date" class="mt-2" />
      </div>

      <div class="col-span-6 sm:col-span-4">
        <InputLabel for="batch" value="Batch Number" />
        <TextInput
          id="batch"
          v-model="batch"
          type="text"
          class="block w-full mt-1"
          required
          autofocus
          autocomplete="batch"
        />
        <InputError class="mt-2" :message="form.errors.batch" />
      </div>

      <div class="col-span-6 sm:col-span-4">
        <InputLabel for="total_plants" value="Plant Total" />
        <TextInput
          id="total_plants"
          v-model="total_plants"
          type="text"
          class="block w-full mt-1"
          required
          autofocus
          autocomplete="total_plants"
        />
        <InputError class="mt-2" :message="form.errors.total_plants" />
      </div>

      <div class="col-span-6 sm:col-span-4">
        <input-label for="detail" value="Description" />
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
        Next
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

let title = useStorage("title", null);
let detail = useStorage("detail", null);
let stage = useStorage("stage", null);
let location = useStorage("location", null);
let date = useStorage("date", null);
let batch = useStorage("batch", null);
let nursery_location = useStorage("nursery_location", null);
let total_plants = useStorage("total_plants", null);

const form = useForm({
  title: title.value,
  detail: detail.value,
  stage: stage.value,
  location: location.value,
  date: date.value,
  batch: batch.value,
  nursery_location: nursery_location.value,
  total_plants: total_plants.value,
  remember: true,
});

const props = defineProps({
  locations: Object,
});

const emit = defineEmits(["next", "prev"]);

const addDetail = () => {
  emit("next");
};

const onChange = (val) => {
  console.log(val);
  val[0].checked === true
    ? form.locations.push(val[0].id)
    : form.locations.pop(val[0].id);
};

const locationType = ref(null);
</script>
