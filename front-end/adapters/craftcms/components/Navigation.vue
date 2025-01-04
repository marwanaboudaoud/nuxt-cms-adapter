<template>
  <Disclosure as="nav" class="bg-gray-800">
    <template #default="{ open }">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
          <div class="flex items-center">
            <div class="flex-shrink-0">
              <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                alt="Your Company" />
            </div>
            <div class="hidden sm:ml-6 sm:block">
              <div class="flex space-x-4">
                <div v-for="navItem in headerLinks" :key="navItem.name">
                  <a class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white"
                    :href="navItem.href">
                    {{ navItem.name }}
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="-mr-2 flex sm:hidden">
            <!-- Mobile menu button -->
            <DisclosureButton class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700
               hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
              <span class="absolute -inset-0.5" />
              <span class="sr-only">Open main menu</span>
              <Bars3Icon v-if="!open" class="block h-6 w-6" aria-hidden="true" />
              <XMarkIcon v-else class="block h-6 w-6" aria-hidden="true" />
            </DisclosureButton>
          </div>
        </div>
      </div>
    </template>
  </Disclosure>
</template>

<script setup>
import { Disclosure, DisclosureButton } from '@headlessui/vue';
import { Bars3Icon, XMarkIcon } from '@heroicons/vue/24/outline';
import { useQuery } from '@vue/apollo-composable';
import { GET_NAV_ITEMS } from '@/services/graphqlService';
import { ref, watch } from 'vue';

const { result: navResult, loading, onError } = useQuery(GET_NAV_ITEMS, {}, {
  fetchPolicy: 'cache-first',
});

const headerLinks = ref([]);

watch(navResult, () => {
  if (navResult.value && navResult.value.navigation) {
    headerLinks.value = navResult.value.navigation.headerLinks;
  }
});

onError((error) => {
  console.error('GraphQL query error:', error);
});

</script>