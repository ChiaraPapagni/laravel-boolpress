<template>
  <div class="container">
    <div class="col-md-8 m-auto">
      <div class="post" v-for="(post, i) in posts" :key="i">
        <img :src="'/storage/' + post.image" :alt="post.title" />
        <h4>{{ post.title }}</h4>
        <small class="text-muted">
          By <strong> author</strong> | Post on {{ post.created_at }}
        </small>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      posts: null,
    };
  },
  mounted() {
    axios.get("api/posts").then((response) => {
      console.log(response);
      this.posts = response.data.data;
    });
    console.log("Component mounted.");
  },
};
</script>
