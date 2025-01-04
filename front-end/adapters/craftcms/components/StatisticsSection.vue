<template>
  <div class="mx-auto max-w-7xl p-6 my-10 rounded-xl bg-white">
    <div class="mx-auto max-w-2xl lg:mx-0">
      <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ section.subtitle }}</h2>
      <p class="mt-6 text-base leading-7 text-gray-600">{{ section.description }}</p>
    </div>
    <div v-if="section.stats.length > 0" class="mx-auto mt-16 flex max-w-2xl flex-col gap-8 lg:mx-0 lg:mt-20 lg:max-w-none lg:flex-row lg:items-end">
      <div v-for="(stat, index) in section.stats" :key="stat.name" :class="getCardClass(index)">
        <p class="flex-none text-3xl font-bold tracking-tight" :class="getStatTextColor(index)">{{ stat.value }}</p>
        <div class="sm:w-80 sm:shrink lg:w-auto lg:flex-none">
          <p class="text-lg font-semibold tracking-tight" :class="getStatTextColor(index)">{{ stat.name }}</p>
          <p class="mt-2 text-base leading-7" :class="getStatDescriptionColor(index)">{{ stat.description }}</p>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref, watchEffect } from 'vue';

const props = defineProps({
  data: Object
});

const section = ref({
  subtitle: '',
  description: '',
  stats: []
});

watchEffect(() => {
  if (props.data) {
    section.value = {
      subtitle: props.data.subtitle || '',
      description: props.data.description || '',
      stats: props.data.stats || []
    };
  }
});

function getCardClass(index) {
  if (index === 0) {
    return 'flex flex-col-reverse justify-between gap-x-16 gap-y-8 rounded-2xl bg-gray-200 p-8 sm:w-3/4 sm:max-w-md sm:flex-row-reverse sm:items-end lg:w-72 lg:max-w-none lg:flex-none lg:flex-col lg:items-start';
  } else if (index === 1) {
    return 'flex flex-col-reverse justify-between gap-x-16 gap-y-8 rounded-2xl bg-gray-900 p-8 sm:flex-row-reverse sm:items-end lg:w-full lg:max-w-sm lg:flex-auto lg:flex-col lg:items-start lg:gap-y-44';
  } else if (index === 2) {
    return 'flex flex-col-reverse justify-between gap-x-16 gap-y-8 rounded-2xl bg-indigo-600 p-8 sm:w-11/12 sm:max-w-xl sm:flex-row-reverse sm:items-end lg:w-full lg:max-w-none lg:flex-auto lg:flex-col lg:items-start lg:gap-y-28';
  }
}

function getStatTextColor(index) {
  return index === 0 ? 'text-gray-900' : 'text-white';
}

function getStatDescriptionColor(index) {
  return index === 2 ? 'text-indigo-200' : 'text-gray-600';
}
</script>
