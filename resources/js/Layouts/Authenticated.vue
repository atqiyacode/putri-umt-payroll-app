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

const showingNavigationDropdown = ref(false);
</script>

<template>
  <div id="wrapper">
    <!-- Topbar Start -->
    <TopBar></TopBar>
    <!-- end Topbar -->

    <!-- ========== Left Sidebar Start ========== -->
    <LeftSideBar></LeftSideBar>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->

    <div class="content-page">
      <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
          <!-- start page title -->

          <slot />
          <!-- end page title -->
        </div>
        <!-- container -->
      </div>
      <!-- content -->

      <!-- Footer Start -->
      <Footer></Footer>
      <!-- end Footer -->
    </div>

    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->
  </div>
  <RightBarMenu></RightBarMenu>
</template>
