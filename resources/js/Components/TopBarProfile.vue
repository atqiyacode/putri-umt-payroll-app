<template>
  <li class="dropdown notification-list topbar-dropdown">
    <a
      class="nav-link dropdown-toggle nav-user me-0 waves-effect waves-light"
      data-bs-toggle="dropdown"
      href="#"
      role="button"
      aria-haspopup="false"
      aria-expanded="false"
    >
      <img
        src="assets/images/users/avatar-1.jpg"
        alt="user-image"
        class="rounded-circle"
      />
      <span class="pro-user-name ms-1">
        {{ $page.props.auth.user.name }}
        <i class="mdi mdi-chevron-down"></i>
      </span>
    </a>
    <div class="dropdown-menu dropdown-menu-end profile-dropdown">
      <div class="dropdown-header noti-title">
        <h6 class="text-overflow m-0">Welcome !</h6>
      </div>

      <a href="javascript:void(0);" class="dropdown-item notify-item">
        <i class="ri-account-circle-line"></i>
        <span>My Account</span>
      </a>

      <a href="javascript:void(0);" class="dropdown-item notify-item">
        <i class="ri-settings-3-line"></i>
        <span>Settings</span>
      </a>

      <a href="javascript:void(0);" class="dropdown-item notify-item">
        <i class="ri-wallet-line"></i>
        <span
          >My Wallet <span class="badge bg-success float-end">3</span>
        </span>
      </a>

      <a href="javascript:void(0);" class="dropdown-item notify-item">
        <i class="ri-lock-line"></i>
        <span>Lock Screen</span>
      </a>

      <div class="dropdown-divider"></div>

      <Link
        :href="route('logout')"
        method="post"
        as="button"
        class="dropdown-item notify-item"
        style="cursor: pointer"
      >
        <i class="ri-logout-box-line"></i>
        <span>Logout</span>
      </Link>
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
