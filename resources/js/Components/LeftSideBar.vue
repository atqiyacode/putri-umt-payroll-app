<template>
  <div class="left-side-menu">
    <logo-box></logo-box>

    <div class="h-100" data-simplebar>
      <user-box></user-box>

      <div id="sidebar-menu">
        <ul id="side-menu">
          <li class="menu-title">Navigation</li>

          <li :class="{ 'menuitem-active': route().current('dashboard') }">
            <Link :href="route('dashboard')">
              <i class="ri-dashboard-line"></i>
              <span> Dashboard </span>
            </Link>
          </li>

          <li>
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
        </ul>
      </div>

      <div class="clearfix"></div>
    </div>
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
import UserBox from "@/Components/UserBox.vue";
import LogoBox from "@/Components/LogoBox.vue";
</script>
