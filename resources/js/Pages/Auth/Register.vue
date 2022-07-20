<script>
import Checkbox from "@/Components/Checkbox.vue";
import GuestLayout from "@/Layouts/Guest.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
export default {
  components: {
    Checkbox,
    GuestLayout,
    Head,
    Link,
  },
  props: {
    errors: Object,
  },
  setup() {
    const form = useForm({
      name: "",
      email: "",
      password: "",
      password_confirmation: "",
      terms: false,
    });

    const submit = () => {
      form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
      });
    };

    return {
      form,
      submit,
    };
  },
  data() {
    return {
      showPassword: false,
    };
  },
  methods: {
    togglePassword() {
      const password = document.querySelector("#password");
      const type =
        password.getAttribute("type") === "password" ? "text" : "password";
      password.setAttribute("type", type);
      this.showPassword = type === "password" ? false : true;
    },
  },
};
</script>

<template>
  <GuestLayout>
    <Head title="Register" />
    <div class="bg-white rounded10 shadow-lg">
      <div class="content-top-agile p-20 pb-0">
        <h2 class="text-primary fw-600">Register New account</h2>
      </div>
      <div class="p-40">
        <form @submit.prevent="submit">
          <div class="mb-3">
            <label class="mb-1"><strong>Full Name</strong></label>
            <input
              class="form-control"
              type="text"
              id="fullName"
              placeholder="Enter your full name"
              v-model="form.name"
              :class="{ 'is-invalid': errors.name }"
            />
            <div class="invalid-feedback">
              {{ errors.name }}
            </div>
          </div>
          <div class="mb-3">
            <label class="mb-1"><strong>Email</strong></label>
            <input
              class="form-control"
              type="email"
              id="emailaddress"
              placeholder="Enter your email"
              v-model="form.email"
              :class="{ 'is-invalid': errors.email }"
            />
            <div class="invalid-feedback">
              {{ errors.email }}
            </div>
          </div>
          <div class="mb-3">
            <label class="mb-1"><strong>Password</strong></label>
            <div class="input-group input-group-merge">
              <input
                type="password"
                id="password"
                class="form-control"
                placeholder="Enter your password"
                v-model="form.password"
                :class="{ 'is-invalid': errors.password }"
              />

              <div
                class="input-group-text"
                @click="togglePassword"
                id="togglePassword"
              >
                <span class="fa fa-eye-slash" v-if="showPassword"></span>
                <span class="fa fa-eye" v-else></span>
              </div>
            </div>
            <small class="text-danger">
              {{ errors.password }}
            </small>
          </div>
          <div class="mb-3">
            <label class="mb-1"><strong>Password Confirmation</strong></label>
            <div class="input-group input-group-merge">
              <input
                type="password"
                id="passwordConfirmation"
                class="form-control"
                placeholder="Enter your password confirmation"
                v-model="form.password_confirmation"
                :class="{ 'is-invalid': errors.password_confirmation }"
              />

              <div
                class="input-group-text"
                @click="togglePassword"
                id="togglePassword"
              >
                <span class="fa fa-eye-slash" v-if="showPassword"></span>
                <span class="fa fa-eye" v-else></span>
              </div>
            </div>
            <small class="text-danger">
              {{ errors.password_confirmation }}
            </small>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-12 text-center">
              <button
                class="btn btn-primary w-p100 mt-10"
                type="submit"
                :disabled="form.processing"
              >
                <span v-if="form.processing">Processing...</span>
                <span v-else>Sign Up</span>
              </button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <div class="text-center">
          <p class="mt-15 mb-0 text-fade">
            Already have an account?
            <Link :href="route('login')" class="text-primary">Sign In</Link>
          </p>
        </div>
      </div>
    </div>
  </GuestLayout>
</template>
