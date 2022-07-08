<template>
  <div class="navbar-custom">
    <div class="container-fluid">
      <ul class="list-unstyled topnav-menu float-end mb-0">
        <!-- search -->
        <top-bar-search></top-bar-search>
        <!-- fullscreen -->
        <top-bar-full-screen></top-bar-full-screen>
        <!-- app -->
        <top-bar-app></top-bar-app>

        <!-- language -->
        <top-bar-language></top-bar-language>

        <!-- notification -->
        <top-bar-notification></top-bar-notification>

        <!-- profile -->
        <top-bar-profile></top-bar-profile>

        <!-- settings -->
        <top-bar-setting></top-bar-setting>
      </ul>

      <logo-box></logo-box>

      <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
        <li>
          <button
            class="button-menu-mobile waves-effect waves-light"
            @click="setSidebar"
          >
            <i class="fe-menu"></i>
          </button>
        </li>

        <li>
          <a
            class="navbar-toggle nav-link"
            data-bs-toggle="collapse"
            data-bs-target="#topnav-menu-content"
          >
            <div class="lines">
              <span></span>
              <span></span>
              <span></span>
            </div>
          </a>
        </li>
      </ul>
      <div class="clearfix"></div>
    </div>
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import LogoBox from "@/Components/LogoBox.vue";
import TopBarSearch from "@/Components/TopBarSearch.vue";
import TopBarApp from "@/Components/TopBarApp.vue";
import TopBarFullScreen from "@/Components/TopBarFullScreen";
import TopBarNotification from "@/Components/TopBarNotification";
import TopBarProfile from "@/Components/TopBarProfile";
import TopBarSetting from "@/Components/TopBarSetting";

export default {
  components: {
    Link,
    LogoBox,
    TopBarSearch,
    TopBarApp,
    TopBarFullScreen,
    TopBarNotification,
    TopBarProfile,
    TopBarSetting,
  },
  mounted() {
    this.setSidebar;
  },
  methods: {
    setSidebar() {
      let currentDataLayout = JSON.parse(localStorage.getItem("dataLayout"));
      var sidebarSize = document.body.getAttribute("data-sidebar-size");
      if (window.innerWidth >= 993) {
        if (sidebarSize === "condensed") {
          this.changeSize(
            currentDataLayout.sidebar.size === "condensed"
              ? "default"
              : currentDataLayout.sidebar.size
          );
        } else {
          this.changeSize("condensed");
        }
      } else {
        this.changeSize(currentDataLayout.sidebar.size);
        document.body.classList.toggle("sidebar-enable");
      }
    },

    changeSize(value) {
      let currentDataLayout = JSON.parse(localStorage.getItem("dataLayout"));
      document.body.setAttribute("data-sidebar-size", value);
      localStorage.setItem("dataLayout", JSON.stringify(currentDataLayout));
    },
  },
};
</script>
