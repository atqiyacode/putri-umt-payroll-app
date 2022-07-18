<template>
  <div class="footer-nav-area" id="footerNav">
    <div class="container px-0">
      <div class="footer-nav position-relative footer-style-two shadow-sm">
        <ul
          class="h-100 d-flex align-items-center justify-content-between ps-0"
        >
          <li :class="{ active: route().current('dashboard') }">
            <Link :href="route('dashboard')">
              <i class="bi bi-house fs-5"></i>
              <span v-if="!route().current('dashboard')">Home</span>
            </Link>
          </li>

          <li :class="{ active: route().current('user.*') }">
            <Link :href="route('user.index')">
              <i class="bi bi-collection fs-5"></i>
              <span v-if="!route().current('user.*')">Data</span>
            </Link>
          </li>

          <li :class="{ active: route().current('permission.*') }">
            <Link :href="route('permission.index')">
              <i class="bi bi-plus-circle fs-5"></i>
              <span v-if="!route().current('permission.*')">Add</span>
            </Link>
          </li>

          <li :class="{ active: route().current('role.*') }">
            <Link :href="route('role.index')">
              <i class="bi bi-app-indicator fs-5"></i>
              <span v-if="!route().current('role.*')">Notifikasi</span>
            </Link>
          </li>

          <li :class="{ active: route().current('role.*') }">
            <Link :href="route('role.index')">
              <i class="bi bi-person fs-5"></i>
              <span v-if="!route().current('role.*')">Profile</span>
            </Link>
          </li>
        </ul>
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
};
</script>
