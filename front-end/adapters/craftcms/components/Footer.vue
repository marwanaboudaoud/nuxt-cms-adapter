<template>
    <footer class="bg-gray-800">
      <div class="mx-auto overflow-hidden px-6 py-10">
        <nav class="columns-2 sm:flex sm:justify-center sm:space-x-12" aria-label="Footer">
          <div v-for="item in navigation.main" :key="item.name" class="pb-6">
            <a :href="item.href" class="text-sm leading-6 text-gray-300 hover:text-white">{{ item.name }}</a>
          </div>
        </nav>
        <p class="mt-2 text-center text-xs leading-5 text-gray-500">&copy; 2020 Your Company, Inc. All rights reserved.</p>
      </div>
    </footer>
  </template>
  
  <script setup>
  const navigation = {
    main: [
      { name: 'About', href: '#' },
      { name: 'Blog', href: '#' },
      { name: 'Jobs', href: '#' },
      { name: 'Press', href: '#' },
      { name: 'Accessibility', href: '#' },
      { name: 'Partners', href: '#' },
    ],
  }
  </script>