<template>
  <li :class="{ 'menuitem-active': route().current('dashboard') }">
    <Link :href="route('dashboard')">
      <i class="ri-dashboard-line"></i>
      <span> Dashboard </span>
    </Link>
  </li>

  <li :class="{ 'menuitem-active': route().current('role.index') }">
    <Link :href="route('role.index')">
      <i class="ri-fingerprint-line"></i>
      Role
    </Link>
  </li>
  <li :class="{ 'menuitem-active': route().current('permission.index') }">
    <Link :href="route('permission.index')">
      <i class="ri-key-line"></i>
      Permission
    </Link>
  </li>
  <li :class="{ 'menuitem-active': route().current('user.index') }">
    <Link :href="route('user.index')">
      <i class="ri-group-line"></i>
      User
    </Link>
  </li>

  <li class="d-none">
    <a
      href="#sidebarLayouts"
      data-bs-toggle="collapse"
      aria-expanded="false"
      aria-controls="sidebarLayouts"
    >
      <i class="ri-layout-line"></i>
      <span> Layouts </span>
      <span class="menu-arrow"></span>
    </a>
    <div class="collapse" id="sidebarLayouts">
      <ul class="nav-second-level">
        <li>
          <a href="layouts-horizontal.html">Horizontal</a>
        </li>
        <li>
          <a href="layouts-detached.html">Detached</a>
        </li>
        <li>
          <a href="layouts-two-column.html">Two Column Menu</a>
        </li>
        <li>
          <a href="layouts-preloader.html">Preloader</a>
        </li>
      </ul>
    </div>
  </li>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
export default {
  components: {
    Link,
  },
  setup() {
    //
  },
};
</script>
