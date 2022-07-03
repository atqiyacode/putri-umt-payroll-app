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
  <Head title="Role" />

  <BreezeAuthenticatedLayout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Role Data
      </h2>
    </template>

    <div class="py-3">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
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
    </div>
  </BreezeAuthenticatedLayout>
</template>
