<template>
   <div class="container">
      <div class="card-wrapper" v-if="posts">
         <PostCard v-for="post in posts" :key="post.id" :post="post" :i="post.id"/>
      </div>
      <ul class="paginate-wrapper" v-if="lastPage > 1">
         <!-- Normal pagination -->
         <!-- <li :class="[currentPage === n ? 'active' : '','page-btn']" v-for="n in lastPage" :key="n" @click="fetchPosts(n)">{{ n }}</li> -->
         
         <!-- Advanced pagination -->
         <li :class="[currentPage === 1 ? 'active' : '','page-btn']" @click="fetchPosts()">1</li>
         <li class="page-dots" v-if="currentPage - 2 > 2">...</li>
         <li class="page-btn" v-if="currentPage - 2 > 1" @click="fetchPosts(currentPage - 2)">&lt;&lt;</li>
         <li class="page-btn" v-if="currentPage - 1 > 1" @click="fetchPosts(currentPage - 1)">&lt;</li>
         <li class="page-btn active" v-if="currentPage > 1 && currentPage < lastPage" @click="fetchPosts(currentPage - 1)">{{ currentPage }}</li>
         <li class="page-btn" v-if="currentPage + 1 < lastPage" @click="fetchPosts(currentPage + 1)">&gt;</li>
         <li class="page-btn" v-if="currentPage + 2 < lastPage" @click="fetchPosts(currentPage + 2)">&gt;&gt;</li>
         <li class="page-dots"  v-if="currentPage + 2 < lastPage - 1">...</li>
         <li :class="[currentPage === lastPage ? 'active' : '','page-btn']" @click="fetchPosts(lastPage)">{{ lastPage }}</li>
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