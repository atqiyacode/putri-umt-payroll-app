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
import NavHeader from "@/Components/NavHeader.vue";

const showingNavigationDropdown = ref(false);
</script>

<template>
  <p-toast />
  <p-confirm-popup></p-confirm-popup>
  <div id="main-wrapper">
    <!-- Topbar Start -->
    <NavHeader></NavHeader>
    <!-- end Topbar -->

    <!-- Topbar Start -->
    <TopBar></TopBar>
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
    <LeftSideBar></LeftSideBar>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-body">
      <div class="container-fluid">
        <slot />
      </div>
    </div>

    <Footer></Footer>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
  </div>
</template>
