<template>
    <div class="fixed z-10 inset-0 overflow-y-auto" v-if="show">
      <div class="flex items-center justify-center min-h-screen px-4">
        <div class="fixed inset-0 transition-opacity">
          <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
          <div class="px-4 py-5 sm:p-6">
            <slot></slot>
            <button @click="$emit('close')" class="mt-4 w-full py-2 px-4 bg-red-600 text-white rounded-md">Close</button>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      show: {
        type: Boolean,
        default: false
      }
    }
  };
  </script>
  