<template>
  <div>
    <HeaderSection v-if="component.title === 'home-page-section-1'" :data="component" />
    <StatisticsSection v-else-if="component.title === 'about-page-section-1'" :data="component" />
    <BlogDetailsSection v-else-if="component.__typename === 'newsBlog_Entry'" :data="component" />
    <div v-else>
      <h2 class="text-4xl font-bold text-black">{{ component.title }}</h2>
      <p class="mt-6 text-lg text-gray-900">{{ component.description }}</p>
    </div>
  </div>
</template>

<script setup>
import HeaderSection from '@/components/HeaderSection.vue';
import StatisticsSection from '@/components/StatisticsSection.vue';
import BlogDetailsSection from '@/components/BlogDetailsSection.vue';

const props = defineProps({
  component: Object
});
</script>
