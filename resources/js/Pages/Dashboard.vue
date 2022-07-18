<script setup>
import AuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import TopBar from "@/Components/TopBar.vue";
</script>

<template>
  <Head title="Dashboard" />
  <TopBar name="Dashboard" :canBack="false"></TopBar>
  <AuthenticatedLayout>
    <div class="card mb-2">
      <Link
        class="affan-page-item d-flex justify-content-center"
        :href="route('master.data')"
      >
        <div class="icon-wrapper">
          <i class="bi bi-star-fill"></i>
        </div>
        Master Data
      </Link>
    </div>
  </AuthenticatedLayout>
</template>
