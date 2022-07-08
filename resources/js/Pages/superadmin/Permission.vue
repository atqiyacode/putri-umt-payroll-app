<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
export default {
  setup() {
    //
  },
  components: {
    BreezeAuthenticatedLayout,
    Head,
  },
  props: {
    data: Object,
  },
  data() {
    return {
      //
    };
  },
};
</script>

<template>
  <Head title="Permission" />

  <BreezeAuthenticatedLayout>
    <div class="row">
      <div class="col-12">
        <a-breadcrumb>
          <template #header> Permission </template>
          <template #content>
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item">
                <a href="javascript: void(0);">Payroll App</a>
              </li>
              <li class="breadcrumb-item active">Permission</li>
            </ol>
          </template>
        </a-breadcrumb>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <p-datatable :value="data.data" responsiveLayout="scroll">
            <p-column header="ID">
              <template #body="{ data }">
                {{ data.id }}
              </template>
            </p-column>
            <p-column header="Name">
              <template #body="{ data }">
                {{ data.name }}
              </template>
            </p-column>
            <p-column header="Guard">
              <template #body="{ data }">
                {{ data.guard_name }}
              </template>
            </p-column>
          </p-datatable>
        </div>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>
