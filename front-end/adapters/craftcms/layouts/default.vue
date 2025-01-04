<template>
  <Navigation />
  <div class="flex flex-col px-20 bg-slate-100 min-h-lvh py-10">
    <keep-alive>
      <NuxtPage />
    </keep-alive>
  </div>
  <Footer /> 
</template>

<script setup></script>