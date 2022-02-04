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
      <posts-list v-else :posts="posts"> </posts-list>

      <ul class="pagination d-flex justify-content-center mt-4" v-if="!loading">
        <li
          class="page-item page-link text-secondary"
          @click="prevPage()"
          v-if="meta.current_page > 1"
        >
          Prev
        </li>
        <li
          class="page-item page-link"
          v-for="(page, i) in meta.last_page"
          :key="i"
          :class="page === meta.current_page ? 'underline' : ''"
          @click="goToPage(page)"
        >
          {{ page }}
        </li>
        <li
          class="page-item page-link text-secondary"
          @click="nextPage()"
          v-if="meta.current_page != meta.last_page"
        >
          Next
        </li>
      </ul>
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
      meta: null,
      links: null,
    };
  },
  methods: {
    fetchPosts(url) {
      axios.get(url).then((response) => {
        this.posts = response.data.data;
        this.loading = false;
        this.meta = response.data.meta;
        this.links = response.data.links;
      });
    },
    nextPage() {
      console.log("Next");
      this.fetchPosts(this.links.next);
    },
    prevPage() {
      console.log("Prev");
      this.fetchPosts(this.links.prev);
    },
    goToPage(page_number) {
      this.fetchPosts("api/posts?page=" + page_number);
    },
  },
  mounted() {
    this.fetchPosts("api/posts");
  },
};
</script>

<style>
.page-link {
  cursor: pointer;
}

.underline {
  text-decoration: underline;
}
</style>