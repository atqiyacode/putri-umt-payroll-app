<template>
  <div class="header-area" id="headerArea">
    <div class="container">
      <!-- Header Content -->
      <div
        class="
          header-content header-style-five
          position-relative
          d-flex
          align-items-center
        "
        :class="canBack ? 'justify-content-between' : 'justify-content-center'"
      >
        <div class="back-button" v-if="canBack">
          <Link :href="url ?? $page.props.urlPrev">
            <i class="bi bi-arrow-left-short fs-2"></i>
          </Link>
        </div>
        <!-- Page Title -->
        <div class="page-heading">
          <h6 class="mb-0">{{ name }}</h6>
        </div>
        <!-- Navbar Toggler -->
        <div class="setting-wrapper">
          <div class="setting-trigger-btn">
            <i class="bi bi-person fs-5 d-none"></i>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";

export default {
  setup() {
    //
  },
  components: {
    Link,
  },
  props: {
    name: String,
    canBack: Boolean,
    url: String,
  },
};
</script>
