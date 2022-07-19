<script>
import Button from "@/Components/Button.vue";
import Checkbox from "@/Components/Checkbox.vue";
import GuestLayout from "@/Layouts/Guest.vue";
import Input from "@/Components/Input.vue";
import Label from "@/Components/Label.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";
export default {
  components: {
    Button,
    Checkbox,
    GuestLayout,
    Input,
    Label,
    Head,
    Link,
    ApplicationLogo,
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
    <div class="authincation-content">
      <div class="row no-gutters">
        <div class="col-xl-12">
          <div class="auth-form">
            <div class="text-center mb-3">
              <Link :href="route('dashboard')">
                <ApplicationLogo />
              </Link>
            </div>
            <h4 class="text-center mb-4">Register</h4>
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
                <label class="mb-1"
                  ><strong>Password Confirmation</strong></label
                >
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

              <div class="text-center">
                <button
                  class="btn btn-primary btn-block"
                  type="submit"
                  :disabled="form.processing"
                >
                  <span v-if="form.processing">Processing...</span>
                  <span v-else>Sign up</span>
                </button>
              </div>
            </form>
            <div class="new-account mt-3">
              <p class="mb-0 mb-sm-3">
                Have an account?
                <Link :href="route('login')" class="text-primary">Sign In</Link>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </GuestLayout>
</template>
