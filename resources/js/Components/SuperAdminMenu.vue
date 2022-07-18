<script setup>
import { Link } from "@inertiajs/inertia-vue3";
</script>

<template>
  <Link class="affan-page-item" :href="route('permission.data')">
    <div class="icon-wrapper">
      <i class="bi bi-shield"></i>
    </div>
    permission Data
  </Link>
  <Link class="affan-page-item" :href="route('role.data')">
    <div class="icon-wrapper">
      <i class="bi bi-key-fill"></i>
    </div>
    role Data
  </Link>
  <Link class="affan-page-item" :href="route('statusType.data')">
    <div class="icon-wrapper">
      <i class="bi bi-app-indicator"></i>
    </div>
    Status Type
  </Link>
</template>


