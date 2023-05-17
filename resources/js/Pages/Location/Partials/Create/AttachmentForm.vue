
<template>
  <form-section @submitted="createLocation">
    <template #title> <p class="text-slate-50 underline"> Upload Location Attachments</p> </template>

    <template #description>
     
      <p class="text-slate-50 mt-2">Please resize your image ,size should not Exceed 2mb.</p>
      <p class="text-slate-50 mt-2">
        Visit <a class="underline" href="https://tinypng.com/" target="_blank">tinypng.com</a> for
        free image resizing.
      </p>
      <p class="text-slate-50 mt-2">If your location has a manual, you can upload it as a document</p>
      <p class="text-slate-50 mt-2">Documents require the name of the document</p>
      <p class="text-red-500 mt-2">
        Document upload is optional and can be skipped
      </p>
      <p class="text-slate-50 mt-2">
        Categories are helpful in grouping your locations according to client
        preferences
      </p>
    </template>

    <template #form>
      <div class="col-span-6 sm:col-span-4">
        <div>
          <div
            class="
              flex
              justify-center
              px-6
              pt-5
              pb-6
              mt-1
              border-2 border-gray-300 border-dashed
              rounded-md
            "
          >
            <div class="space-y-1 text-center">
              <svg
                class="w-12 h-12 mx-auto text-black dark:text-slate-50"
                stroke="currentColor"
                fill="none"
                viewBox="0 0 48 48"
                aria-hidden="true"
              >
                <path
                  d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                  stroke-width="2"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                />
              </svg>
              <div class="flex text-sm text-black dark:text-slate-50 ">
                <label
                  for="file-upload"
                  class="
                    font-medium
                    text-indigo-600
                    bg-transparent bg-white
                    rounded-md
                    cursor-pointer
                    hover:text-indigo-500
                    focus-within:outline-none
                    focus-within:ring-2
                    focus-within:ring-offset-2
                    focus-within:ring-indigo-500
                  "
                >
                 
                  <input
                    id="images"
                    @input="form.images = $event.target.files"
                    type="file"
                    multiple                    
                    @change="onFileChange"
                  />
                </label>
              </div>
              <p class="text-xs text-black dark:text-slate-50">PNG, JPG, GIF up to 2MB</p>
              <InputError
                class="mt-2"
                v-for="(error, image) in form.errors.images"
                :key="image"
                :message="error"
              />
            </div>
          </div>
        </div>
      </div>

      <!-- Documents -->
      <div class="col-span-6 sm:col-span-4">
        <label class="block mt-3 text-sm font-medium text-black dark:text-slate-50">
          Choose A Document
        </label>
        <div
          class="
            flex
            justify-center
            px-6
            pt-2
            pb-2
            mt-1
            border-2 border-gray-300 border-dashed
            rounded-md
          "
        >
          <div class="space-y-1 text-center">
            <div class="flex justify-between">
              <InputLabel
                for="document"
                value="Document Title"
                class="m-auto"
              />
              <TextInput
                id="document_title"
                v-model="form.document_title"
                type="text"
                class="block w-8/12 mt-1"
                autofocus
                autocomplete="document_title"
              />
            </div>
            <InputError class="mt-2" :message="form.errors.document_title" />
            <div class="flex text-sm text-black dark:text-slate-50">
              <label
                for="file-upload"
                class="
                  font-medium
                  text-indigo-600
                  bg-transparent bg-white
                  rounded-md
                  cursor-pointer
                  hover:text-indigo-500
                  focus-within:outline-none
                  focus-within:ring-2
                  focus-within:ring-offset-2
                  focus-within:ring-indigo-500
                "
              >
                <input
                  id="document"
                  @input="form.document = $event.target.files[0]"
                  type="file"
                  @change="onFileChange"
                />
              </label>
            </div>
           
            <InputError class="mt-2" :message="form.errors.document" />
          </div>
        </div>
      </div>

    
    </template>

    <template #actions>
      <div class="flex justify-between w-full">
        <div
          @click="back"
          class="
            gap-2
            p-1
            px-4
            text-black 
            rounded
            bg-slate-300
            hover:bg-gray-400 hover:cursor-pointer
          "
        >
          Back
        </div>

        <submit-button
          :class="{ 'opacity-25': processing }"
          :disabled="processing"
        >
          Upload
        </submit-button>
      </div>
    </template>
  </form-section>
</template>
  <script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import SubmitButton from "@/Components/Shared/Form/SubmitButton.vue";
import FormSection from "@/Components/Shared/Form/FormSection.vue";
import TextInput from "@/Components/Shared/Form/TextInput.vue";
import InputError from "@/Components/Shared/Form/InputError.vue";
import InputLabel from "@/Components/Shared/Form/InputLabel.vue";
import { useStorage } from "@/Composables/useStorage";

const title = useStorage("title");
let detail = useStorage("detail");
let area = useStorage("area");

const form = useForm({
  title: title.value,
  images: null,
  detail: detail.value,
  area: area.value, 
  document: null,
  document_title: null,
  remember: true,
  
});

const onChange = (val) => {
  console.log(val);
  val[0].checked === true
    ? form.categories.push(val[0].id)
    : form.categories.pop(val[0].id);
};

const categoryType = ref(null);

function showCategoryType(type) {
  categoryType.value = type;
}

const emit = defineEmits(["prev"]);



const back = () => {
  emit("prev");
};



function createLocation() {
  form.post(route("locations.store"), {
    errorBag: "createLocation",
    preserveScroll: true,
    onSuccess: () => {     
      localStorage.removeItem("title");
      localStorage.removeItem("area");     
      localStorage.removeItem("detail");
    },
  });
}
</script>
  