<template>
  <div v-if="loading">Loading...</div>
  <div v-else-if="error">Error: {{ error.message }}</div>
  <div v-else>
    <div v-for="component in components" :key="component.title">
      <ComponentBlock :component="component" />
    </div>
    <div v-if="blogLinks.length">
      <h2 class="text-4xl font-bold">Blog Posts</h2>
      <div class="mt-8 grid grid-cols-1 gap-8 sm:grid-cols-2 md:grid-cols-3">
        <div v-for="blog in blogLinks" :key="blog.slug"
          class="relative overflow-hidden rounded-lg bg-gray-900 shadow-lg">
          <NuxtImg v-if="blog.image && blog.image.length" :src="`${blog.image[0].filename}`" :alt="blog.title" class="w-full h-48 object-cover" />
          <div class="p-6">
            <h3 class="text-xl font-semibold text-white truncate">{{ blog.title }}</h3>
            <p class="mt-2 text-gray-300 text-sm truncate">{{ blog.subtitle }}</p>
          </div>
          <nuxt-link :to="`/blog/${blog.slug}`" class="absolute inset-0" />
        </div>
      </div>
    </div>
    <div v-if="route.params.slug === 'contact'">
      <h2 class="text-4xl font-bold mt-8">Contact Entries</h2>
      <button @click="showModal = true" class="mb-4 py-2 px-4 bg-green-600 text-white rounded-md">Add New Entry</button>
      <table class="min-w-full bg-white mb-8">
        <thead>
          <tr>
            <th class="py-2">Title</th>
            <th class="py-2">First Name</th>
            <th class="py-2">Last Name</th>
            <th class="py-2">Phone Number</th>
            <th class="py-2">City</th>
            <th class="py-2">Custom URI</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="entry in contactForms" :key="entry.customuri">
            <td class="border px-4 py-2">{{ entry.title }}</td>
            <td class="border px-4 py-2">{{ entry.firstName }}</td>
            <td class="border px-4 py-2">{{ entry.lastName }}</td>
            <td class="border px-4 py-2">{{ entry.phoneNumber }}</td>
            <td class="border px-4 py-2">{{ entry.city }}</td>
            <td class="border px-4 py-2">{{ entry.customuri }}</td>
          </tr>
        </tbody>
      </table>
      <Modal :show="showModal" @close="showModal = false">
        <ContactForm @formSubmitted="fetchContactForms" />
      </Modal>
    </div>
  </div>
</template>

<script>
import { ref, computed } from 'vue';
import { useRoute } from 'vue-router';
import { useQuery } from '@vue/apollo-composable';
import { GET_PAGE } from '@/services/graphqlService';
import ComponentBlock from '@/components/ComponentBlock.vue';
import ContactForm from '@/components/ContactForm.vue';
import Modal from '@/components/Modal.vue';

export default {
  components: {
    ComponentBlock,
    Modal,
    ContactForm
  },
  setup() {
    const route = useRoute();
    const slug = ref(route.params.slug);

    const { result, loading, error } = useQuery(GET_PAGE, () => ({ slug: [slug.value] }), {
      fetchPolicy: 'cache-first'
    });

    const components = computed(() => {
      if (result.value) {
        return result.value.entries[0]?.components || [];
      }
      return [];
    });

    const blogLinks = computed(() => {
      if (result.value) {
        return result.value.entries[0]?.blogLinks || [];
      }
      return [];
    });

    const showModal = ref(false);

    const contactForms = computed(() => {
      if (result.value) {
        return result.value.entries.find(entry => entry.slug === 'contact')?.contactforms || [];
      }
      return [];
    });

    const fetchContactForms = async () => {
      showModal.value = false;
    };

    return {
      components,
      blogLinks,
      contactForms,
      loading,
      error,
      showModal,
      fetchContactForms,
      route
    };
  }
};
</script>
