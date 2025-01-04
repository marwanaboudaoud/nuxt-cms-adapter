<template>
    <div>
      <h2 class="text-4xl font-bold text-black">Blog Posts</h2>
      <ul>
        <li v-for="blog in data.blogLinks" :key="blog.slug">
          <nuxt-link :to="`/blog/${blog.slug}`">
            <h3 class="text-2xl">{{ blog.title }}</h3>
            <p class="text-lg">{{ blog.subtitle }}</p>
            <p class="mt-2">{{ blog.description }}</p>
          </nuxt-link>
        </li>
      </ul>
    </div>
  </template>
  
  <script setup>
  const props = defineProps({
    data: Object
  });
  </script>
  