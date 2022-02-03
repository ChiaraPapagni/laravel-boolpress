<template>
  <div class="page blog">
    <div class="container">
      <div class="p-5 bg-light">
        <h1 class="display-3">Blog</h1>
        <p class="lead">
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dolore,
          voluptatem facere sint omnis dolor ab atque possimus, illo labore nemo
          esse, sunt facilis accusamus. Nemo praesentium vitae nesciunt possimus
          odit!
        </p>
      </div>
      <div class="text-center loading" v-if="loading">
        <p class="lead">Loading ...</p>
      </div>
      <posts-list v-else :posts="posts"></posts-list>
    </div>
  </div>
  <!-- /.blog -->
</template>

<script>
import PostsListComponent from "../components/PostsListComponent.vue";

export default {
  components: {
    PostsListComponent,
  },
  data() {
    return {
      posts: [],
      loading: true,
    };
  },
  mounted() {
    axios
      .get("api/posts")
      .then((response) => {
        this.posts = response.data;
        this.loading = false;
      })
      .catch((error) => {
        console.log(error);
      });
  },
};
</script>

<style>
</style>