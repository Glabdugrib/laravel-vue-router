<template>
   <div class="container">
      <div class="card-wrapper" v-if="posts">
         <PostCard v-for="post in posts" :key="post.id" :post="post" :i="post.id"/>
      </div>
      <ul class="paginate-wrapper" v-if="lastPage > 1">
         <li :class="[currentPage === n ? 'active' : '','page-btn']" v-for="n in lastPage" :key="n" @click="fetchPosts(n)">{{ n }}</li>
      </ul>
   </div>
</template>

<script>
import PostCard from '../components/PostCard.vue';

export default {
   name: 'Posts',
   components: {
      PostCard,
   },
   data() {
      return {
         posts: [],
         lastPage: 0,
         currentPage: 1,
      }
   },
   methods: {
      fetchPosts(page = 1) { //default value

         axios.get('/api/posts', {
            params: {
               page  //equivalente a page: page
            }
         })
         .then( res => {
            console.log(res.data)
            const { posts } = res.data
            const { data, last_page, current_page } = posts
            this.posts = data
            this.currentPage = current_page
            this.lastPage = last_page
         })
         .catch( err => {
            console.warn(err)
         })
      }
   },
   mounted() {
      this.fetchPosts();
   }
}
</script>

<style lang="scss" scoped>

</style>