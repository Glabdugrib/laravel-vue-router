<template>
   <div>
      Slug: {{ $route.params.slug }}
      <h1 v-if="post">{{ post.title }}</h1>
   </div>
</template>

<script>
	export default {
	
		data() {
			return {
            post: null,
            loading: true
         }
		},
      methods: {
         fetchPost() {
            axios.get(`/api/posts/${ this.$route.params.slug }`)
            .then( res => {
               const { post } = res.data
               this.post = post
               this.loading = false
            })
            .catch( err => {
               console.warn( err )

               // Redirect
               this.$router.push('/404')
            })
         }
      },
		beforeMount() {
			this.fetchPost()
		}
	}
</script>
   
<style>

</style>