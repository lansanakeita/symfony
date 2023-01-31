<template>
  <div>
    <input v-model="search" />
    <div>fdshrgfygsqjfkfgrhghjq</div>

    <div class="row">
      <a v-for="uxPackage in words">
        <h4>{{ uxPackage.name }}</h4>
      </a>
    </div>
  </div>
</template>

<script setup>
import { computed, ref } from 'vue';

const props = defineProps({
  words: Array,
});

const search = ref('');

</script>
