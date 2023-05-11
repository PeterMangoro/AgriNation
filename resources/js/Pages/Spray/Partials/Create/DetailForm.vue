
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
        <div class="flex">
          <div>
            <input-label for="currency" value="Currency" />
            <select
              class="inline-flex items-center px-auto py-2.5 mt-1 text-sm text-gray-500 bg-white border border-gray-300 shadow-sm rounded-l-md focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
              name="rate"
              id="rate"
              v-model="currency"
            >
              <option value="usd">USD</option>
              <option value="rand">RAND</option>
              <option value="bond">BOND</option>
              <option value="rtgs">RTGS</option>
            </select>
          </div>

          <div :class="{ [`hidden`]: currency == 'usd' }">
            <input-label for="rate" value="Rate" />
            <text-input
              id="rate"
              ref="priceRate"
              v-model="rate"
              type="number"
              step="0.01"
              class="block w-full mt-1 rounded-none"
              autocomplete="rate"
            />
          </div>

          <div>
            <input-label for="price" value="Price" />

            <text-input
              id="price"
              ref="productPrice"
              v-model="price"
              type="number"
              step="0.01"
              class="block w-full mt-1 rounded-none rounded-r-md"
              autocomplete="price"
            />
          </div>
        </div>
        <p
          class="pt-1 dark:text-orange-500 text-sm"
          :class="{ [`hidden`]: currency == 'usd' }"
        >
          <span>USD Equivalent:</span>
          <span class="italic">{{ usdEquivalent() }}</span>
        </p>
      </div>
      <div></div>
      <div class="col-span-6 sm:col-span-2">
        <InputLabel for="quantity" value="Quantity" />
        <TextInput
          id="quantity"
          v-model="quantity"
          type="number"
          step="0.001"
          min="0"
          class="block w-full mt-1"
          autofocus
          autocomplete="quantity"
        />
        <InputError class="mt-2" :message="form.errors.quantity" />
      </div>

      <div class="col-span-6 sm:col-span-2">
        <InputLabel for="units" value="Units" />
        <TextInput
          id="units"
          v-model="units"
          type="text"
          class="block w-full mt-1"
          autofocus
          autocomplete="units"
        />
        <InputError class="mt-2" :message="form.errors.units" />
      </div>

      <div class="col-span-6 sm:col-span-4">
        <InputLabel for="shop" value="Shop" />
        <TextInput
          id="shop"
          v-model="shop"
          type="text"
          class="block w-full mt-1"
          required
          autofocus
          autocomplete="shop"
        />
        <InputError class="mt-2" :message="form.errors.shop" />
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

let date = useStorage("date", null);
let title = useStorage("title", null);
let quantity = useStorage("quantity", null);
let units = useStorage("units", null);
let price = useStorage("price", null);
let detail = useStorage("detail", null);
let shop = useStorage("shop", null);
let currency = useStorage("currency", "usd");
let rate = useStorage("rate", 1);

function usdEquivalent() {
  if (price.value == 0) {
    return "$0.00";
  }
  return "$" + (price.value / rate.value).toFixed(2);
}

const form = useForm({
  date: date.value,
  title: title.value,
  quantity: quantity.value,
  units: units.value,
  price: price.value,
  detail: detail.value,
  shop: shop.value,
  currency: currency.value,
  rate: rate.value,
  remember: true,
});

function createSpray() {
  form.post(route("sprays.store"), {
    errorBag: "createSpray",
    preserveScroll: true,
    onSuccess: () => {
      localStorage.removeItem("date");
      localStorage.removeItem("title");
      localStorage.removeItem("currency");
      localStorage.removeItem("rate");
      localStorage.removeItem("quantity");
      localStorage.removeItem("units");
      localStorage.removeItem("price");
      localStorage.removeItem("detail");
      localStorage.removeItem("shop");
    },
  });
}
</script>
