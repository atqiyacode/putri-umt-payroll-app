<template>
  <div class="logo-box">
    <Link :href="route('dashboard')" class="logo logo-dark text-center">
      <span class="logo-sm">
        <img
          :src="`${path}/assets/images/logo-sm-dark.png`"
          alt=""
          height="24"
        />
      </span>
      <span class="logo-lg">
        <img :src="`${path}/assets/images/logo-dark.png`" alt="" height="20" />
      </span>
    </Link>

    <Link :href="route('dashboard')" class="logo logo-light text-center">
      <span class="logo-sm">
        <img :src="`${path}/assets/images/logo-sm.png`" alt="" height="24" />
      </span>
      <span class="logo-lg">
        <img :src="`${path}/assets/images/logo-light.png`" alt="" height="20" />
      </span>
    </Link>
  </div>
</template>
<script>
export default {
  setup() {
    const path = window.location.origin;
    return { path };
  },
};
</script>
