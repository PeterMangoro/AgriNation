
<template>
  <form @submit.prevent="createBlog">
          <quill-editor
            theme="snow"
            :modules="modules"
            toolbar="full"
            v-model:content="form.detail"
            contentType="html"
          />

          <submit-button
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
          >
            Save
          </submit-button>
        </form>
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
import "@vueup/vue-quill/dist/vue-quill.snow.css";
import "@vueup/vue-quill/dist/vue-quill.bubble.css";
import { QuillEditor } from "@vueup/vue-quill";
import BlotFormatter from "quill-blot-formatter";

const title = useStorage("title");

const form = useForm({
  title: title.value,  
  detail: null,
  remember: true,
  
});

const modules = {
  name: "blotFormatter",
  module: BlotFormatter,
  options: {
    /* options */
  },
};

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



function createBlog() {
  form.post(route("blogs.store"), {
    errorBag: "createBlog",
    preserveScroll: true,
    onSuccess: () => {     
      localStorage.removeItem("title");
      localStorage.removeItem("type");     
      localStorage.removeItem("detail");
    },
  });
}
</script>
  