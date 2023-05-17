
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
        <InputLabel for="area" value="Area" />
        <TextInput
          id="area"
          v-model="area"
          type="text"
          class="block w-full mt-1"
          required
          autofocus
          autocomplete="area"
        />
        <InputError class="mt-2" :message="form.errors.area" />
      </div>

     

      

      <div class="col-span-6 sm:col-span-4">
        <input-label for="detail" value="Location Description" />
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
let area = useStorage("area", null);

const form = useForm({
  title: title.value, 
  detail: detail.value, 
  area: area.value, 
  remember: true,
});

const emit = defineEmits(["next", "prev"]);

const addDetail = () => {
  emit("next");
};

</script>
