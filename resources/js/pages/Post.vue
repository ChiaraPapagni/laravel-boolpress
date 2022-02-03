<template>
  <div class="container mt-5">
    <div class="text-center loading" v-if="loading">
      <p class="lead">Loading ...</p>
    </div>
    <div class="post row" v-else>
      <div class="col">
        <img
          :src="'/storage/' + post.image"
          :alt="post.title"
          class="img-fluid"
        />
      </div>
      <div class="col">
        <h3>{{ post.title }}</h3>
        <p>{{ post.content }}</p>
        <p>
          <small>
            Category:
            <strong v-if="post.category">{{ post.category.name }}</strong>
            <strong v-else>//</strong>
          </small>
        </p>
        <p></p>
        <p v-if="post.tags.length > 0">
          <span v-for="(tag, i) in post.tags" :key="i">
            <span class="badge bg-info me-2">{{ tag.name }}</span>
          </span>
        </p>
        <p v-else>
          <span class="badge bg-dark">Untagged</span>
        </p>
      </div>
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
        this.post = response.data.data;
        this.loading = false;
      })
      .catch((error) => {
        console.log(error);
      });
  },
};
</script>
