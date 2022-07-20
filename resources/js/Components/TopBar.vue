<template>
  <div class="header">
    <div class="header-content">
      <nav class="navbar navbar-expand">
        <div class="collapse navbar-collapse justify-content-between">
          <div class="header-left">
            <div class="headaer-title">
              <h1 class="font-w600 mb-0">Empty-Page</h1>
            </div>
          </div>
        </div>
      </nav>
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
