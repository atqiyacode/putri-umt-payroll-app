

<template>
  <Head title="Unit" />
  <TopBar name="Unit" :canBack="true" :url="route('master.data')"></TopBar>
  <BreezeAuthenticatedLayout>
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
                  <i class="bi bi-x-circle"></i>
                  Cancel
                </button>
                <button
                  v-if="form.id"
                  type="button"
                  class="btn btn-sm waves-effect waves-light"
                  v-tooltip.top="submitLabel"
                  @click="updateData"
                  :disabled="v$.form.$invalid"
                  :class="v$.form.$invalid ? 'btn-danger' : 'btn-info'"
                >
                  <i
                    :class="v$.form.$invalid ? 'bi bi-x' : 'bi bi-check-circle'"
                  ></i>
                  {{ submitLabel }}
                </button>
                <button
                  v-else
                  type="button"
                  class="btn btn-sm waves-effect waves-light"
                  v-tooltip.top="submitLabel"
                  @click="saveData"
                  :disabled="v$.form.$invalid"
                  :class="v$.form.$invalid ? 'btn-danger' : 'btn-success'"
                >
                  <i
                    :class="v$.form.$invalid ? 'bi bi-x' : 'bi bi-check-circle'"
                  ></i>
                  {{ submitLabel }}
                </button>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="mb-2">
              <label for="code" class="form-label">Code</label>
              <div class="p-fluid">
                <p-input-text
                  type="text"
                  id="code"
                  placeholder="code"
                  v-model="form.code"
                  @blur="v$.form.code.$touch"
                  :class="
                    v$.form.code.$error ? 'p-invalid is-invalid' : 'p-valid'
                  "
                />
              </div>
              <div class="invalid-feedback" v-if="errors.code">
                {{ errors.code[0] }}
              </div>
            </div>
            <div class="mb-2">
              <label for="name" class="form-label">Name</label>
              <div class="p-fluid">
                <p-input-text
                  type="text"
                  id="name"
                  placeholder="Name"
                  v-model="form.name"
                  @blur="v$.form.name.$touch"
                  :class="
                    v$.form.name.$error ? 'p-invalid is-invalid' : 'p-valid'
                  "
                />
              </div>
              <div class="invalid-feedback" v-if="errors.name">
                {{ errors.name[0] }}
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
                  class="bi bi-times"
                  v-if="keyword"
                  style="cursor: pointer"
                  @click="resetData"
                />
                <i class="bi bi-search" v-else />
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
                <i class="bi bi-plus-circle"></i>
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
                      <th>Code</th>
                      <th>Name</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(item, index) in data.data" :key="index">
                      <th scope="row">{{ index + 1 }}</th>
                      <td>{{ item.code }}</td>
                      <td>{{ item.name }}</td>
                      <td>
                        <div class="btn-group">
                          <button
                            type="button"
                            class="btn btn-sm btn-info waves-effect waves-light"
                            @click="editData(item)"
                            v-tooltip.top="'Edit'"
                          >
                            <i class="bi bi-pencil"></i>
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
                            <i class="bi bi-trash"></i>
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
import TopBar from "@/Components/TopBar.vue";
import useVuelidate from "@vuelidate/core";
import { required } from "@vuelidate/validators";
export default {
  setup() {
    return {
      v$: useVuelidate(),
    };
  },
  validations() {
    return {
      form: {
        code: { required },
        name: { required },
      },
    };
  },
  components: {
    BreezeAuthenticatedLayout,
    Head,
    TopBar,
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
        code: "",
        name: "",
      },
      errors: {
        code: null,
        name: null,
      },
    };
  },

  beforeMount() {
    this.loadPage(this.page, this.perPage, this.keyword);
  },
  methods: {
    async loadPage(page, perPage) {
      await axios
        .get(route("unit.index"), {
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
      this.resetForm();
    },
    editData(item) {
      this.formlabel = "Update Data";
      this.submitLabel = "Update";
      this.showForm = true;
      this.form = {
        id: item.id,
        code: item.code,
        name: item.name,
      };
    },
    resetData() {
      this.keyword = "";
      this.formlabel = "";
      this.submitLabel = "";
      this.showForm = false;
      this.resetForm();
      this.loadPage(this.page, this.perPage, this.keyword);
    },

    resetForm() {
      this.errors = {
        code: null,
        name: null,
      };
      this.form = {
        id: "",
        code: "",
        name: "",
      };
    },

    saveData() {
      this.v$.$validate();
      if (!this.v$.$error) {
        axios
          .post(route("unit.store"), this.form)
          .then((result) => {
            this.$toast.add({
              severity: "success",
              summary: "Success",
              detail: "Data Saved",
              life: 3000,
            });
            this.resetData();
          })
          .catch((err) => {
            this.errors = err.response.data.errors;
          });
      } else {
        this.$toast.add({
          severity: "error",
          summary: "Error",
          detail: `${this.v$.$errors[0].$property.toLowerCase()} ${this.v$.$errors[0].$message.toLowerCase()}`,
          life: 3000,
        });
      }
    },

    updateData() {
      axios
        .put(route("unit.update", this.form.id), this.form)
        .then((result) => {
          this.$toast.add({
            severity: "success",
            summary: "Success",
            detail: "Data Updated",
            life: 3000,
          });
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
        icon: "bi bi-exclamation-triangle",
        acceptClass: "p-button-danger",
        accept: () => {
          axios
            .delete(route("unit.destroy", id))
            .then((result) => {
              this.$toast.add({
                severity: "success",
                summary: "Success",
                detail: "Data Deleted",
                life: 3000,
              });
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
