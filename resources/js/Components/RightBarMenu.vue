<template>
  <div class="right-bar">
    <div data-simplebar class="h-100">
      <!-- Nav tabs -->
      <ul class="nav nav-tabs nav-bordered nav-justified" role="tablist">
        <li class="nav-item">
          <a
            class="nav-link py-2 active"
            data-bs-toggle="tab"
            href="#settings-tab"
            role="tab"
          >
            <i class="mdi mdi-cog-outline d-block font-22 my-1"></i>
          </a>
        </li>
      </ul>

      <!-- Tab panes -->
      <div class="tab-content pt-0">
        <div class="tab-pane active" id="settings-tab" role="tabpanel">
          <h6 class="fw-medium px-3 m-0 py-2 font-13 text-uppercase bg-light">
            <span class="d-block py-1">Theme Settings</span>
          </h6>
          <div class="p-3">
            <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Color Scheme</h6>
            <div class="form-check form-switch mb-1">
              <input
                class="form-check-input"
                type="radio"
                name="color-scheme-mode"
                value="light"
                id="light-mode-check"
                v-model="dataLayout.mode"
                @input="onThemeChange($event.target.value)"
              />
              <label class="form-check-label" for="light-mode-check"
                >Light Mode</label
              >
            </div>

            <div class="form-check form-switch mb-1">
              <input
                class="form-check-input"
                type="radio"
                name="color-scheme-mode"
                value="dark"
                id="dark-mode-check"
                v-model="dataLayout.mode"
                @input="onThemeChange($event.target.value)"
              />
              <label class="form-check-label" for="dark-mode-check"
                >Dark Mode</label
              >
            </div>

            <!-- Width -->
            <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Width</h6>
            <div class="form-check form-switch mb-1">
              <input
                class="form-check-input"
                type="radio"
                name="width"
                value="fluid"
                id="fluid-check"
                v-model="dataLayout.width"
                @input="onWidthChange($event.target.value)"
              />
              <label class="form-check-label" for="fluid-check">Fluid</label>
            </div>

            <div class="form-check form-switch mb-1">
              <input
                class="form-check-input"
                type="radio"
                name="width"
                value="boxed"
                id="boxed-check"
                v-model="dataLayout.width"
                @input="onWidthChange($event.target.value)"
              />
              <label class="form-check-label" for="boxed-check">Boxed</label>
            </div>

            <!-- Topbar -->
            <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Topbar</h6>
            <div class="form-check form-switch mb-1">
              <input
                class="form-check-input"
                type="radio"
                name="topbar-color"
                value="dark"
                id="darktopbar-check"
                v-model="dataLayout.topbar.color"
                @input="onTopBarColorChange($event.target.value)"
              />
              <label class="form-check-label" for="darktopbar-check"
                >Dark</label
              >
            </div>

            <div class="form-check form-switch mb-1">
              <input
                class="form-check-input"
                type="radio"
                name="topbar-color"
                value="light"
                id="lighttopbar-check"
                v-model="dataLayout.topbar.color"
                @input="onTopBarColorChange($event.target.value)"
              />
              <label class="form-check-label" for="lighttopbar-check"
                >Light</label
              >
            </div>

            <!-- Menu positions -->
            <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">
              Menus Positon <small>(Leftsidebar and Topbar)</small>
            </h6>
            <div class="form-check form-switch mb-1">
              <input
                class="form-check-input"
                type="radio"
                name="menus-position"
                value="fixed"
                id="fixed-check"
                v-model="dataLayout.menuPosition"
                @input="onTopBarMenuChange($event.target.value)"
              />
              <label class="form-check-label" for="fixed-check">Fixed</label>
            </div>

            <div class="form-check form-switch mb-1">
              <input
                class="form-check-input"
                type="radio"
                name="menus-position"
                value="scrollable"
                id="scrollable-check"
                v-model="dataLayout.menuPosition"
                @input="onTopBarMenuChange($event.target.value)"
              />
              <label class="form-check-label" for="scrollable-check"
                >Scrollable</label
              >
            </div>

            <!-- Left Sidebar-->
            <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Left Sidebar Color</h6>
            <div class="form-check form-switch mb-1">
              <input
                class="form-check-input"
                type="radio"
                name="leftsidebar-color"
                value="light"
                id="light-check"
                v-model="dataLayout.sidebar.color"
                @input="onLeftSidebarChange($event.target.value)"
              />
              <label class="form-check-label" for="light-check">Light</label>
            </div>

            <div class="form-check form-switch mb-1">
              <input
                class="form-check-input"
                type="radio"
                name="leftsidebar-color"
                value="dark"
                id="dark-check"
                v-model="dataLayout.sidebar.color"
                @input="onLeftSidebarChange($event.target.value)"
              />
              <label class="form-check-label" for="dark-check">Dark</label>
            </div>

            <div class="form-check form-switch mb-1">
              <input
                class="form-check-input"
                type="radio"
                name="leftsidebar-color"
                value="brand"
                id="brand-check"
                v-model="dataLayout.sidebar.color"
                @input="onLeftSidebarChange($event.target.value)"
              />
              <label class="form-check-label" for="brand-check">Brand</label>
            </div>

            <div class="form-check form-switch mb-1">
              <input
                class="form-check-input"
                type="radio"
                name="leftsidebar-color"
                value="gradient"
                id="gradient-check"
                v-model="dataLayout.sidebar.color"
                @input="onLeftSidebarChange($event.target.value)"
              />
              <label class="form-check-label" for="gradient-check"
                >Gradient</label
              >
            </div>

            <!-- size -->
            <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Left Sidebar Size</h6>
            <div class="form-check form-switch mb-1">
              <input
                class="form-check-input"
                type="radio"
                name="leftsidebar-size"
                value="default"
                id="default-size-check"
                v-model="dataLayout.sidebar.size"
                @input="onSidebarChange($event.target.value)"
              />
              <label class="form-check-label" for="default-size-check"
                >Default</label
              >
            </div>

            <div class="form-check form-switch mb-1">
              <input
                class="form-check-input"
                type="radio"
                name="leftsidebar-size"
                value="condensed"
                id="condensed-check"
                v-model="dataLayout.sidebar.size"
                @input="onSidebarChange($event.target.value)"
              />
              <label class="form-check-label" for="condensed-check"
                >Condensed <small>(Extra Small size)</small></label
              >
            </div>

            <div class="form-check form-switch mb-1">
              <input
                class="form-check-input"
                type="radio"
                name="leftsidebar-size"
                value="compact"
                id="compact-check"
                v-model="dataLayout.sidebar.size"
                @input="onSidebarChange($event.target.value)"
              />
              <label class="form-check-label" for="compact-check"
                >Compact <small>(Small size)</small></label
              >
            </div>

            <!-- User info -->
            <h6 class="fw-medium font-14 mt-4 mb-2 pb-1">Sidebar User Info</h6>
            <div class="form-check form-switch mb-1">
              <input
                class="form-check-input"
                type="checkbox"
                name="leftsidebar-user"
                value="fixed"
                id="sidebaruser-check"
                v-model="dataLayout.sidebar.showuser"
                @input="onShowUserSidebarChange()"
              />
              <label class="form-check-label" for="sidebaruser-check"
                >Enable</label
              >
            </div>

            <div class="d-grid mt-4">
              <button class="btn btn-primary" @click="onResetDefault()">
                Reset to Default
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end slimscroll-menu-->
  </div>
</template>

<script>
export default {
  data() {
    return {
      sidebarSize: "default",
      dataLayout: JSON.parse(localStorage.getItem("dataLayout")) || null,
    };
  },
  created() {
    if (!localStorage.getItem("dataLayout")) {
      this.onResetDefault();
    }
  },
  methods: {
    onResetDefault() {
      let data = {
        mode: "light",
        width: "fluid",
        menuPosition: "fixed",
        sidebar: { color: "light", size: "default", showuser: false },
        topbar: { color: "dark" },
        showRightSidebarOnPageLoad: true,
      };
      localStorage.setItem("dataLayout", JSON.stringify(data));
      setTimeout(() => {
        this.setDataLayout();
      }, 200);
    },

    setDataLayout() {
      let currentDataLayout = JSON.parse(localStorage.getItem("dataLayout"));
      // set sidebar-size
      document.body.setAttribute(
        "data-sidebar-size",
        currentDataLayout.sidebar.size
      );
      // set sidebar-color
      document.body.setAttribute(
        "data-sidebar-color",
        currentDataLayout.sidebar.color
      );
      // set layout-width
      document.body.setAttribute("data-layout-width", currentDataLayout.width);
      // set topbar-color
      document.body.setAttribute(
        "data-topbar-color",
        currentDataLayout.topbar.color
      );
      // set menu-position
      document.body.setAttribute(
        "data-layout-menu-position",
        currentDataLayout.menuPosition
      );
      //   show user profile
      document.body.setAttribute(
        "data-sidebar-showuser",
        currentDataLayout.sidebar.showuser
      );
      // set active theme
      this.updateThemeActive(currentDataLayout.mode);
    },

    // sidebar
    onSidebarChange(size) {
      let currentDataLayout = JSON.parse(localStorage.getItem("dataLayout"));
      currentDataLayout.sidebar.size = size;
      localStorage.setItem("dataLayout", JSON.stringify(currentDataLayout));
      document.body.setAttribute("data-sidebar-size", size);
    },

    // theme dark or light
    onThemeChange(color) {
      let currentDataLayout = JSON.parse(localStorage.getItem("dataLayout"));
      currentDataLayout.sidebar.color = color;
      currentDataLayout.mode = color;
      document.body.setAttribute("data-sidebar-color", color);
      localStorage.setItem("dataLayout", JSON.stringify(currentDataLayout));
      //   do updated theme
      this.updateThemeActive(color);
    },

    // theme dark or light
    onWidthChange(width) {
      let currentDataLayout = JSON.parse(localStorage.getItem("dataLayout"));
      currentDataLayout.width = width;
      document.body.setAttribute("data-layout-width", width);
      localStorage.setItem("dataLayout", JSON.stringify(currentDataLayout));
      if (width === "boxed") {
        this.onSidebarChange("condensed");
      }
    },

    // topbar dark or light
    onTopBarColorChange(color) {
      let currentDataLayout = JSON.parse(localStorage.getItem("dataLayout"));
      currentDataLayout.topbar.color = color;
      document.body.setAttribute("data-topbar-color", color);
      localStorage.setItem("dataLayout", JSON.stringify(currentDataLayout));
    },

    // menu position
    onTopBarMenuChange(position) {
      let currentDataLayout = JSON.parse(localStorage.getItem("dataLayout"));
      currentDataLayout.menuPosition = position;
      document.body.setAttribute("data-layout-menu-position", position);
      localStorage.setItem("dataLayout", JSON.stringify(currentDataLayout));
    },

    // sidebar color
    onLeftSidebarChange(color) {
      let currentDataLayout = JSON.parse(localStorage.getItem("dataLayout"));
      currentDataLayout.sidebar.color = color;
      document.body.setAttribute("data-sidebar-color", color);
      localStorage.setItem("dataLayout", JSON.stringify(currentDataLayout));
    },

    // sidebar color
    onShowUserSidebarChange() {
      let currentDataLayout = JSON.parse(localStorage.getItem("dataLayout"));
      currentDataLayout.sidebar.showuser = !currentDataLayout.sidebar.showuser;
      document.body.setAttribute(
        "data-sidebar-showuser",
        currentDataLayout.sidebar.showuser
      );
      localStorage.setItem("dataLayout", JSON.stringify(currentDataLayout));
    },

    // run updated theme
    updateThemeActive(color) {
      //   document.body.style.display = "none";
      var defaultBSStyle = document.getElementById("bs-stylesheet");
      var defaultAppStyle = document.getElementById("app-stylesheet");
      setTimeout(() => {
        if (color !== "dark") {
          defaultBSStyle.setAttribute(
            "href",
            location.origin + "/assets/css/bootstrap.min.css"
          );
          defaultAppStyle.setAttribute(
            "href",
            location.origin + "/assets/css/app.min.css"
          );
        } else {
          defaultBSStyle.setAttribute(
            "href",
            location.origin + "/assets/css/bootstrap-dark.min.css"
          );
          defaultAppStyle.setAttribute(
            "href",
            location.origin + "/assets/css/app-dark.min.css"
          );
        }
        // document.body.style.display = "";
      }, 250);
    },
  },
};
</script>
