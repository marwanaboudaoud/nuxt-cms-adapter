<template>
  <div v-if="page">
    <h1>{{ page.title }}</h1>
    <div v-html="page.content"></div>
  </div>
  <div v-else>
    <p>Loading...</p>
  </div>
</template>

<script setup>
import { ref, watchEffect } from 'vue';
import { useQuery } from '@vue/apollo-composable';
import { GET_PAGE_QUERY } from '@/services/graphqlService';
import { useRouter } from 'vue-router';

const router = useRouter();
const slug = router.currentRoute.value.params.slug;

const { result, loading } = useQuery(GET_PAGE_QUERY, {
  slug,
});

const page = ref(null);

// Watch for changes in the result and update page value accordingly
watchEffect(() => {
  if (result.value && result.value.pageBy) {
    page.value = result.value.pageBy;
  }
});
</script>
