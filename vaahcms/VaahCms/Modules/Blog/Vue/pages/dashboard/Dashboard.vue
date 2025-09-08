<script  setup>
import { onMounted } from 'vue';
import { useBlogStore } from '../../stores/store-blogs.js';
import { useCategoryStore } from '../../stores/store-categories.js';
import Card from 'primevue/card';
import Divider from 'primevue/divider';
import { useRoute } from 'vue-router';

document.title = 'Blog';

const blogStore = useBlogStore();
const route = useRoute()
// const categoryStore = useCategoryStore();

onMounted(() => {
  blogStore.onLoad(route)
  blogStore.getAssets();
});

</script>
<template  >


  <div class="items-center justify-center min-h-[60vh]" style="margin-top: 8px;">
    <h1 class="text-4xl mb-4">Dashboard</h1>
    <Divider />
    <div class="w-full flex max-w-3xl gap-2 justify-items-center">
      <Card class="w-full">
        <template #title>Total Blogs</template>
        <template #content>
          <span class="text-3xl font-bold">{{ blogStore.assets?.blogs?.length || 0 }}</span>
        </template>
      </Card>
      <Card class="w-full">
        <template #title>Published Blogs</template>
        <template #content>
          <span class="text-3xl font-bold">{{ blogStore.assets?.published_blogs?.length || 0 }}</span>
        </template>
      </Card>
      <Card class="w-full">
        <template #title>Total Categories</template>
        <template #content>
          <span class="text-3xl font-bold">{{ blogStore.assets?.bl_category?.length || 0 }}</span>
        </template>
      </Card>
    </div>
  </div>

</template>


