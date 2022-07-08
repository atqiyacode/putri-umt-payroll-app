<template>
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
        >{{ $page.props.auth.user.name }}</a
      >
      <div class="dropdown-menu user-pro-dropdown">
        <a href="javascript:void(0);" class="dropdown-item notify-item">
          <i class="fe-user me-1"></i>
          <span>My Account</span>
        </a>

        <a href="javascript:void(0);" class="dropdown-item notify-item">
          <i class="fe-settings me-1"></i>
          <span>Settings</span>
        </a>

        <a href="javascript:void(0);" class="dropdown-item notify-item">
          <i class="fe-lock me-1"></i>
          <span>Lock Screen</span>
        </a>

        <a href="javascript:void(0);" class="dropdown-item notify-item">
          <i class="fe-log-out me-1"></i>
          <span>Logout</span>
        </a>
      </div>
    </div>
    <p class="text-reset">{{ $page.props.auth.user.role_name }}</p>
  </div>
</template>
<script>
export default {
  setup() {
    //
  },
};
</script>
