<template>
  <div class="flex space-x-2  pt-1">
    <label for="search" class="hidden">Search</label>
    <jet-input
      id="search"     
      v-model="search"
      :class="{ 'transition-border': search }"
      autocomplete="off"
      name="search"
      :placeholder="placeholder"
      type="search"
      @keyup.esc="search = null"
    />

  </div>
</template>

<script setup>

import JetInput from "@/Components/TextInput.vue";
// import PerPage from "@/Components/Shared/Table/PerPage.vue";
import {ref,watch} from 'vue'
import {router} from '@inertiajs/vue3'
import DebouncedRef from '@/Composables/DebouncedRef'



const props = defineProps({
    routeName:String,
    placeholder:String,
    searchValue:String
})

let search = DebouncedRef(props.searchValue, 400);

watch(search, (value) => {
  router.get(
    route(props.routeName),
    { search: value },
    {
      preserveState: true,
    }
  );
}); 
</script>
