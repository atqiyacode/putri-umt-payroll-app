<script setup>
import AuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import TopBar from "@/Components/TopBar.vue";
import SuperAdminMenu from "@/Components/SuperAdminMenu.vue";
import AdminMenu from "@/Components/AdminMenu.vue";
</script>

<template>
  <Head title="Master Data" />
  <TopBar name="Master Data" :canBack="true"></TopBar>
  <AuthenticatedLayout>
    <div class="card mb-2">
      <div class="card-body p-3">
        <p class="ps-2">Superadmin</p>
        <SuperAdminMenu />
      </div>
    </div>
    <div class="card mb-2">
      <div class="card-body p-3">
        <p class="ps-2">Master Data</p>
        <AdminMenu />
      </div>
    </div>
  </AuthenticatedLayout>
</template>
