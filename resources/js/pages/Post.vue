<template>
  <div class="card">
    <div class="text-center loading" v-if="loading">
      <p class="lead">Loading ...</p>
    </div>
    <div class="post" v-else>
      <img
        :src="'/storage/' + post.image"
        :alt="post.title"
        class="img-fluid w--100"
      />
      <h3>{{ post.title }}</h3>
      <p>{{ post.content }}</p>
      <p>
        <small>
          Category:
          <strong v-if="post.category">{{ post.category.name }}</strong>
          <strong v-else>//</strong>
        </small>
      </p>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loading: true,
      post: {},
    };
  },
  mounted() {
    axios
      .get("/api/posts/" + this.$route.params.id)
      .then((response) => {
        this.game = response.data;
        this.loading = false;
      })
      .catch((error) => {
        console.log(error);
      });
  },
};
</script>
