<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
</script>

<template>
  <Head title="Dashboard" />

  <BreezeAuthenticatedLayout>
    <div class="row">
      <div class="col-12">
        <a-breadcrumb>
          <template #header> Dashboard </template>
          <template #content>
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item">
                <a href="javascript: void(0);">Payroll App</a>
              </li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </template>
        </a-breadcrumb>
      </div>
    </div>

    <div class="row">
      <div class="col-12">Payroll App - SKripsi UMT 2022</div>
    </div>
  </BreezeAuthenticatedLayout>
</template>
