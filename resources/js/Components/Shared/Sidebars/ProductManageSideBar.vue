<script setup>
import {
  BeakerIcon,
  BookmarkIcon,
  RectangleGroupIcon,
  CurrencyDollarIcon,
  RectangleStackIcon,
  BookOpenIcon,
} from "@heroicons/vue/24/outline";
import { Link } from "@inertiajs/vue3";

const emit = defineEmits(["showElements"]);
</script>
<template>
  <aside
    id="separator-sidebar"
    class="border-r flex justify-center h-screen fixed"
    aria-label="Sidebar"
  >
    <div class=" font-thin p-1 items-center">
      <Link
        class="border-b grid p-6 cursor-pointer"
        href="/dashboard?show=accounts"
      >
        <div class="mx-auto">Accounts</div>

        <div class="text-center place-items-center">
          <CurrencyDollarIcon class="h-6 w-6 text-orange-500 mx-auto" />
        </div>
      </Link>

      <Link
        class="border-b grid p-6 cursor-pointer"
        href="/dashboard?show=chemicals"
      >
        <div class="mx-auto">Chemicals</div>

        <div class="text-center place-items-center">
          <BeakerIcon class="h-6 w-6 text-orange-500 mx-auto" />
        </div>
      </Link>

      <Link
        class="border-b grid p-6 cursor-pointer"
        href="/dashboard?show=resources"
      >
        <div class="mx-auto">Resources</div>

        <div class="text-center place-items-center">
          <RectangleGroupIcon class="h-6 w-6 text-orange-500 mx-auto" />
        </div>
      </Link>

      <Link
        class="border-b grid p-6 cursor-pointer"
        href="/blogs"
      >
        <div class="mx-auto">Research</div>

        <div class="text-center place-items-center">
          <BookOpenIcon class="h-6 w-6 text-orange-500 mx-auto" />
        </div>
      </Link>
    </div>
  </aside>
</template>