
<template>
    <form-section @submitted="updateChemicalDetail">
      <template #title> 
        <p class="text-sky-500">Update Chemical</p>  </template>
  
      <template #description>
        <p class="text-slate-100 mb-2"> Ensure your Chemical is described in detail so that clients understand it
        better.</p>
        <p class="pt-2 text-slate-50">
          For points, mark at the beginning of each point with
          <span class="text-lg font-medium text-slate-50">*</span> eg
        </p>
  
        <p class="text-slate-50">* Yellow Shirt</p>
        <p class="text-slate-50">* LightWeight Breathable polyester fabric</p>
        <p class="text-slate-50">* Great for Hot Conditions</p>
      </template>
  
      <template #form>
        <div class="col-span-6 sm:col-span-4">
          <input-label for="title" value="Chemical Title" />
          <text-input
            id="title"
            ref="chemicalInput"
            v-model="form.title"
            type="text"
            class="block w-full mt-1"
            autocomplete="title"
          />
          <input-error :message="form.errors.title" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
          <input-label for="title" value="Family" />
          <text-input
            id="type"
            ref="chemicalInput"
            v-model="form.type"
            type="text"
            class="block w-full mt-1"
            autocomplete="type"
          />
          <input-error :message="form.errors.type" class="mt-2" />
        </div>
       
  
        <div class="col-span-6 sm:col-span-4">
          <input-label for="detail" value="Description" />
          <text-area
            id="detail"
            ref="detailInput"
            v-model="form.detail"
            type="password"
            class="block w-full mt-1"
            autocomplete="new-password"
            rows="3"
          />
  
          <input-error :message="form.errors.detail" class="mt-2" />
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
  import { pointConverter } from "@/Composables/pointConverter";
  
  const detailInput = ref(null);
  const chemicalInput = ref(null);
  const props = defineProps({
    chemical: Object,
  });
  const form = useForm({
    title: props.chemical.title,
    images: null,
    groups: [],
    type: props.chemical.type,
    detail: pointConverter(props.chemical.detail),    
    chemical_uuid: props.chemical.uuid,   
    remember: true,
  });
  
  function saleStatus() {
    if (form.sale_status == true) {
      return "Currently Active";
    } else return "Currently Inactive";
  }
  
  const updateChemicalDetail = () => {
    form.put(route("chemicals.update", props.chemical.uuid), {
      errorBag: "updateChemicalDetail",
      preserveScroll: true,
    });
  };
  </script>
  