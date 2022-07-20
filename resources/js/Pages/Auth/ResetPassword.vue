<script setup>
import GuestLayout from "@/Layouts/Guest.vue";
import { Head, useForm, Link } from "@inertiajs/inertia-vue3";

const props = defineProps({
  email: String,
  token: String,
  errors: Object,
});

const form = useForm({
  token: props.token,
  email: props.email,
  password: "",
  password_confirmation: "",
});

const submit = () => {
  form.post(route("password.update"), {
    onFinish: () => form.reset("password", "password_confirmation"),
  });
};
const togglePassword = () => {
  const password = document.querySelector("#password");
  const type =
    password.getAttribute("type") === "password" ? "text" : "password";
  password.setAttribute("type", type);
  this.showPassword = type === "password" ? false : true;
};
</script>

<template>
  <GuestLayout>
    <Head title="Reset Password" />

    <div class="bg-white rounded10 shadow-lg">
      <div class="content-top-agile p-20 pb-0">
        <h2 class="text-primary fw-600">Reset Password</h2>
      </div>
      <div class="p-40">
        <form @submit.prevent="submit">
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
                <span v-else>Reset Password</span>
              </button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
    </div>
  </GuestLayout>
</template>
