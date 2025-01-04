<template>
   <Navigation :menuItems="menuItems" />
  <div class="flex flex-col px-20 bg-slate-100 min-h-lvh py-10">
   
    <NuxtPage />
  </div>
</template>

<script setup>
import { ref, onMounted, watch } from 'vue';
import { useQuery } from '@vue/apollo-composable';
import { GET_MENU_QUERY } from '@/services/graphqlService';

const MENU_ITEMS_STORAGE_KEY = 'menuItems';
const menuItems = ref([]);

const { result, loading, error } = useQuery(GET_MENU_QUERY, {
  location: 'PRIMARY',
});

const saveMenuItemsToLocalStorage = () => {
  localStorage.setItem(MENU_ITEMS_STORAGE_KEY, JSON.stringify(menuItems.value));
};

const loadMenuItemsFromLocalStorage = () => {
  const storedItems = localStorage.getItem(MENU_ITEMS_STORAGE_KEY);
  if (storedItems) {
    menuItems.value = JSON.parse(storedItems);
  }
};

onMounted(() => {
  loadMenuItemsFromLocalStorage();

  if (!menuItems.value.length && !loading.value && result.value && result.value.data) {
    menuItems.value = result.value.data.menuItems.nodes;
    saveMenuItemsToLocalStorage();
  }
});

watch(menuItems, () => {
  saveMenuItemsToLocalStorage();
});
</script>
