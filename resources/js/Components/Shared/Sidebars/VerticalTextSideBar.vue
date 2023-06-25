<script setup>

</script>
<template>
    <aside id="separator-sidebar"
        class="flex items-center justify-center transition-transform h-96 -translate-x-full sm:translate-x-0"
        aria-label="Sidebar">
            <span class="-rotate-90 font-bold ">
                <slot name="text"></slot>
            </span>
    </aside>
</template>