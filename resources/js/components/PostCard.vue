<template>
   <div>
      <h3>{{ post.title }}</h3>
   </div>
</template>

<script>
export default {
   name: 'PostCard',
   props: {
      post: {
         type: Object,
         required: false
      }
   }
}
</script>

<style lang="scss" scoped>

</style>