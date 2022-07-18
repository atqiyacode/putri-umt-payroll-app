<script setup>
import { Link } from "@inertiajs/inertia-vue3";
</script>

<template>
  <Link class="affan-page-item" :href="route('user.data')">
    <div class="icon-wrapper">
      <i class="bi bi-people"></i>
    </div>
    User Data
  </Link>
  <Link class="affan-page-item" :href="route('division.data')">
    <div class="icon-wrapper">
      <i class="bi bi-card-list"></i>
    </div>
    Division Data
  </Link>
  <Link class="affan-page-item" :href="route('group.data')">
    <div class="icon-wrapper">
      <i class="bi bi-card-list"></i>
    </div>
    Group Data
  </Link>
  <Link class="affan-page-item" :href="route('unit.data')">
    <div class="icon-wrapper">
      <i class="bi bi-card-list"></i>
    </div>
    Unit Data
  </Link>
  <Link class="affan-page-item" :href="route('tagCode.data')">
    <div class="icon-wrapper">
      <i class="bi bi-card-list"></i>
    </div>
    Tag Code Data
  </Link>
  <Link class="affan-page-item" :href="route('duration.data')">
    <div class="icon-wrapper">
      <i class="bi bi-clock"></i>
    </div>
    Duration Data
  </Link>
</template>


