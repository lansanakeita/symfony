<template>
  <div> Hello forum {{ nom }} </div>
</template>

<script>
export default {
  name: "Home",

  props: {
    nom: {
      type: String,
      required: true
    }
  }
}
</script>

<style scoped>

</style>