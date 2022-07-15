

<template>
  <Head title="Role" />

  <BreezeAuthenticatedLayout>
    <p-confirm-popup></p-confirm-popup>

    <div class="row">
      <div class="col-12">
        <a-breadcrumb>
          <template #header> Role </template>
          <template #content>
            <ol class="breadcrumb m-0">
              <li class="breadcrumb-item">
                <a href="javascript: void(0);">Payroll App</a>
              </li>
              <li class="breadcrumb-item active">Role</li>
            </ol>
          </template>
        </a-breadcrumb>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <!-- form data -->
        <div class="card" v-if="showForm">
          <div class="card-header">
            <div class="d-flex justify-content-between">
              <h5>{{ formlabel }}</h5>
              <div class="btn-group">
                <button
                  type="button"
                  class="btn btn-sm btn-warning waves-effect waves-light"
                  v-tooltip.top="'Cancel'"
                  @click="resetData"
                >
                  <i class="mdi mdi-cancel"></i>
                  Cancel
                </button>
                <button
                  v-if="form.id"
                  type="button"
                  class="btn btn-sm btn-info waves-effect waves-light"
                  v-tooltip.top="submitLabel"
                  @click="updateData"
                >
                  <i class="mdi mdi-check-circle"></i>
                  {{ submitLabel }}
                </button>
                <button
                  v-else
                  type="button"
                  class="btn btn-sm btn-success waves-effect waves-light"
                  v-tooltip.top="submitLabel"
                  @click="saveData"
                >
                  <i class="mdi mdi-check-circle"></i>
                  {{ submitLabel }}
                </button>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="mb-2">
              <label for="name" class="form-label">Name</label>
              <input
                type="text"
                class="form-control"
                id="name"
                placeholder="Role name"
                v-model="form.name"
                :class="{ 'is-invalid': errors.name }"
              />
              <div class="invalid-feedback" v-if="errors.name">
                {{ errors.name[0] }}
              </div>
            </div>
            <div class="mb-2">
              <label for="guard_name" class="form-label">Guard name</label>
              <select
                name="guard_name"
                id="guard_name"
                v-model="form.guard_name"
                class="form-control"
                placeholder="Select guard name"
                :class="{ 'is-invalid': errors.guard_name }"
              >
                <option value="">Select guard name</option>
                <option value="web">Web</option>
                <option value="api">Api</option>
              </select>
              <div class="invalid-feedback" v-if="errors.guard_name">
                {{ errors.guard_name[0] }}
              </div>
            </div>
          </div>
        </div>
        <!-- table data -->
        <div class="card" v-else>
          <div class="card-header">
            <div class="d-flex justify-content-between">
              <span
                :class="keyword ? 'p-input-icon-right' : 'p-input-icon-left'"
              >
                <i
                  class="pi pi-times"
                  v-if="keyword"
                  style="cursor: pointer"
                  @click="resetData"
                />
                <i class="pi pi-search" v-else />
                <p-input-text
                  type="text"
                  class="p-inputtext-sm m-0"
                  placeholder="Search"
                  v-model="keyword"
                  @input="filter"
                />
              </span>
              <button
                type="button"
                class="btn btn-sm btn-info waves-effect waves-light"
                v-tooltip.top="'Create New'"
                @click="addNewData"
              >
                <i class="mdi mdi-plus-circle-outline"></i> New Data
              </button>
            </div>
          </div>
          <template v-if="data != null">
            <div class="card-body" v-if="data.total > 0">
              <div class="table-responsive">
                <table class="table mb-2 table-hover text-center">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Name</th>
                      <th>Guard</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(item, index) in data.data" :key="index">
                      <th scope="row">{{ index + 1 }}</th>
                      <td>{{ item.name }}</td>
                      <td>{{ item.guard_name }}</td>
                      <td>
                        <div class="btn-group">
                          <button
                            type="button"
                            class="btn btn-sm btn-info waves-effect waves-light"
                            @click="editData(item)"
                            v-tooltip.top="'Edit'"
                          >
                            <i class="mdi mdi-pencil"></i>
                          </button>
                          <button
                            type="button"
                            class="
                              btn btn-sm btn-danger
                              waves-effect waves-light
                            "
                            @click="deleteData($event, item.id)"
                            v-tooltip.top="'Delete'"
                          >
                            <i class="mdi mdi-trash-can-outline"></i>
                          </button>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>

              <p-paginator
                :rows="perPage"
                :totalRecords="totalData"
                :rowsPerPageOptions="rowsPerPage"
                @page="onPage($event)"
              >
              </p-paginator>
            </div>
            <div class="card-body" v-else>
              <h3 class="text-danger text-center">No Data</h3>
            </div>
          </template>
        </div>
      </div>
    </div>
  </BreezeAuthenticatedLayout>
</template>
<script>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import { debounce } from "lodash";
import axios from "axios";
export default {
  components: {
    BreezeAuthenticatedLayout,
    Head,
  },
  data() {
    return {
      data: null,
      rowsPerPage: [10, 20, 30],
      perPage: 10,
      page: 1,
      totalData: 0,
      keyword: null,

      //   show page
      showForm: false,
      formlabel: "",
      submitLabel: "",
      form: {
        id: "",
        name: "",
        guard_name: "",
      },
      errors: {
        name: null,
        guard_name: null,
      },
    };
  },

  beforeMount() {
    this.loadPage(this.page, this.perPage, this.keyword);
  },
  methods: {
    async loadPage(page, perPage) {
      await axios
        .get(route("api-role.index"), {
          params: {
            page: this.page,
            per_page: this.perPage,
            keyword: this.keyword,
          },
        })
        .then((result) => {
          this.data = result.data;
          this.totalData = result.data.total;
          this.perPage = perPage;
          this.page = page;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    onPage(event) {
      this.page = event.page + 1;
      this.perPage = event.rows;
      this.loadPage(this.page, this.perPage, this.keyword);
    },
    filter: debounce(function (e) {
      this.loadPage(this.page, this.perPage, this.keyword);
    }, 500),

    addNewData() {
      this.formlabel = "Create New Data";
      this.submitLabel = "Save";
      this.showForm = true;
      this.resetForm;
    },
    editData(item) {
      this.formlabel = "Update Data";
      this.submitLabel = "Update";
      this.showForm = true;
      this.form = {
        id: item.id,
        name: item.name,
        guard_name: item.guard_name,
      };
    },
    resetData() {
      this.keyword = "";
      this.formlabel = "";
      this.submitLabel = "";
      this.showForm = false;
      this.resetForm;
      this.loadPage(this.page, this.perPage, this.keyword);
    },

    resetForm() {
      this.errors = {
        name: null,
        guard_name: null,
      };
      this.form = {
        id: "",
        name: "",
        guard_name: "",
      };
    },

    saveData() {
      axios
        .post(route("api-role.store"), this.form)
        .then((result) => {
          this.resetData();
        })
        .catch((err) => {
          this.errors = err.response.data.errors;
        });
    },

    updateData() {
      axios
        .put(route("api-role.update", this.form.id), this.form)
        .then((result) => {
          this.resetData();
        })
        .catch((err) => {
          this.errors = err.response.data.errors;
        });
    },

    deleteData(event, id) {
      this.$confirm.require({
        target: event.currentTarget,
        message: "Are you sure you want to proceed?",
        icon: "pi pi-exclamation-triangle",
        acceptClass: "p-button-danger",
        accept: () => {
          axios
            .delete(route("api-role.destroy", id))
            .then((result) => {
              this.resetData();
            })
            .catch((err) => {
              console.warn(err);
            });
        },
      });
    },
  },
};
</script>
