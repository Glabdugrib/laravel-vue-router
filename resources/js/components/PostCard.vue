<template>
   <div class="card">
      <figure class="thumb">
         <img src="https://picsum.photos/400/200" alt="">
         <!-- <img :src="`https://picsum.photos/${ (200 + i) * 2 }/${ 200 + i }`" alt=""> -->
      </figure>
      <div class="card-body">
         <h3 class="title">{{ post.title }}</h3>
         <p class="category" v-if="post.category">{{ post.category.name }}</p>
         <ul class="tag-wrapper">
            <li class="tag" :style="`background-color: ${ tag.color }`" v-for="tag in post.tags" :key="tag.id">{{ tag.name }}</li>
         </ul>
         <router-link tag="button" :to="{ name: 'posts.show', params: { slug: post.slug } }">View</router-link>
      </div>
   </div>
</template>

<script>
export default {
   name: 'PostCard',
   props: {
      post: {
         type: Object,
         required: false
      },
      i: {
         type: Number,
         required: false
      }
   }
}
</script>

<style lang="scss" scoped>

</style>