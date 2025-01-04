<template>
  <div v-if="loading">Loading...</div>
  <div v-else-if="error">Error: {{ error.message }}</div>
  <div v-else>
    <div v-for="component in components" :key="component.title">
      <ComponentBlock :component="component" />
    </div>

    <div v-if="blog">
      <h1 class="text-4xl font-bold">{{ blog.title }}</h1>
      <h2 class="text-2xl">{{ blog.subtitle }}</h2>
      <p>{{ blog.description }}</p>
      <div v-if="blogLinks.length">
        <h2 class="text-4xl font-bold">Blog Posts</h2>
        <ul>
          <li v-for="link in blogLinks" :key="link.slug">
            <nuxt-link :to="`/blog/${link.slug}`">{{ link.title }}</nuxt-link>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>

<script>
import { ref, computed } from 'vue';
import { useRoute } from 'vue-router';
import { useQuery } from '@vue/apollo-composable';
import { GET_BLOG_DETAIL } from '@/services/graphqlService';
import ComponentBlock from '@/components/ComponentBlock.vue';

export default {
  components: {
    ComponentBlock
  },
  setup() {
    const route = useRoute();
    const slug = ref(route.params.slug);

    const { result, loading, error } = useQuery(GET_BLOG_DETAIL, () => ({ slug: [slug.value] }), { fetchPolicy: 'cache-first' });

    const blog = computed(() => result.value?.entries[0] || null);
    const components = computed(() => blog.value?.components || []);
    const blogLinks = computed(() => blog.value?.blogLinks || []);


    const resolveImagePath = (filename) => {
      return `../../assets/images/${filename}`;
    };



    return {
      blog,
      components,
      blogLinks,
      loading,
      error,
      resolveImagePath
    };
  },
};
</script>