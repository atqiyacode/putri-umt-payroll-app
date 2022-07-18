<script setup>
import { ref } from "vue";
import RightBarMenu from "@/Components/RightBarMenu.vue";
import TopBar from "@/Components/TopBar.vue";
import LeftSideBar from "@/Components/LeftSideBar.vue";
import Footer from "@/Components/Footer.vue";

import ApplicationLogo from "@/Components/ApplicationLogo.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import { Link } from "@inertiajs/inertia-vue3";
import SidebarMenu from "@/Components/SidebarMenu.vue";

const showingNavigationDropdown = ref(false);
</script>

<template>
  <p-toast position="top-center" />
  <p-confirm-popup></p-confirm-popup>

  <div class="page-content-wrapper py-3">
    <div class="container">
      <slot />
    </div>
  </div>

  <Footer></Footer>
</template>
