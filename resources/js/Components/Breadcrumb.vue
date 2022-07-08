<template>
  <div class="page-title-box">
    <h4 class="page-title">
      <slot name="header" />
    </h4>
    <div class="page-title-right">
      <slot name="content" />
    </div>
  </div>
</template>

<script>
export default {
  setup() {
    //
  },
  props: {
    pageTitle: String,
  },
};
</script>
