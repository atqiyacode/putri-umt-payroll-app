<template>
  <div class="left-side-menu">
    <logo-box></logo-box>

    <div class="h-100" data-simplebar>
      <user-box></user-box>

      <div id="sidebar-menu">
        <ul id="side-menu">
          <li class="menu-title">Navigation</li>

          <SidebarMenu></SidebarMenu>
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
import SidebarMenu from "@/Components/SidebarMenu.vue";
</script>
