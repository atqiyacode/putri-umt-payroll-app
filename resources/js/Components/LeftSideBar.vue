<template>
  <div class="left-side-menu">
    <!-- LOGO -->
    <div class="logo-box">
      <a href="index.html" class="logo logo-dark text-center">
        <span class="logo-sm">
          <img src="assets/images/logo-sm-dark.png" alt="" height="24" />
          <!-- <span class="logo-lg-text-light">Minton</span> -->
        </span>
        <span class="logo-lg">
          <img src="assets/images/logo-dark.png" alt="" height="20" />
          <!-- <span class="logo-lg-text-light">M</span> -->
        </span>
      </a>

      <a href="index.html" class="logo logo-light text-center">
        <span class="logo-sm">
          <img src="assets/images/logo-sm.png" alt="" height="24" />
        </span>
        <span class="logo-lg">
          <img src="assets/images/logo-light.png" alt="" height="20" />
        </span>
      </a>
    </div>

    <div class="h-100" data-simplebar>
      <!-- User box -->
      <div class="user-box text-center">
        <img
          src="assets/images/users/avatar-1.jpg"
          alt="user-img"
          title="Mat Helme"
          class="rounded-circle avatar-md"
        />
        <div class="dropdown">
          <a
            href="#"
            class="text-reset dropdown-toggle h5 mt-2 mb-1 d-block"
            data-bs-toggle="dropdown"
            >Nik Patel</a
          >
          <div class="dropdown-menu user-pro-dropdown">
            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
              <i class="fe-user me-1"></i>
              <span>My Account</span>
            </a>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
              <i class="fe-settings me-1"></i>
              <span>Settings</span>
            </a>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
              <i class="fe-lock me-1"></i>
              <span>Lock Screen</span>
            </a>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item">
              <i class="fe-log-out me-1"></i>
              <span>Logout</span>
            </a>
          </div>
        </div>
        <p class="text-reset">Admin Head</p>
      </div>

      <!--- Sidemenu -->
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
      <!-- End Sidebar -->

      <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
  </div>
</template>

<script setup>
import { Link } from "@inertiajs/inertia-vue3";
</script>
