<template>
  <div>
    <div class="games d-flex flex-wrap justify-content-center">
      <div class="post w-25 m-2" v-for="(post, i) in posts" :key="i">
        <div class="card">
          <img :src="'/storage/' + post.image" :alt="post.title" />
          <div class="card-body">
            <h5 class="d-inline">{{ post.title }}</h5>
            <small>More...</small>
            <p class="card-text">
              <small class="text-muted">
                Category:
                <strong v-if="post.category">{{ post.category.name }}</strong>
                <strong v-else>//</strong>
              </small>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    posts: Array,
  },
};
</script>
