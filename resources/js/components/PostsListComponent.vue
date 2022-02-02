<template>
  <div>
    <div class="games d-flex flex-wrap justify-content-center">
      <div class="post w-25 m-2" v-for="(post, i) in posts" :key="i">
        <img :src="'/storage/' + post.image" :alt="post.title" />
        <h4>{{ post.title }}</h4>
        <small class="text-muted">
          By <strong> author</strong> | Post on {{ post.created_at }}
        </small>
        <div v-for="(category, i) in post.category" :key="i">
          <span>{{ category.name }}</span>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "posts-list",
  data() {
    return {
      posts: null,
    };
  },
  mounted() {
    axios.get("api/posts").then((response) => {
      console.log(response);
      this.posts = response.data;
    });
    console.log("Component mounted.");
  },
};
</script>
