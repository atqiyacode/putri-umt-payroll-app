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
    canRegister: Boolean,
    canResetPassword: Boolean,
    status: String,
    errors: Object,
  },
  setup() {
    const form = useForm({
      email: "",
      password: "",
      remember: false,
    });

    const submit = () => {
      form.post(route("login"), {
        onFinish: () => form.reset("password"),
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
    <Head title="Log in" />
    <div class="authincation-content">
      <div class="row no-gutters">
        <div class="col-xl-12">
          <div class="auth-form">
            <div class="text-center mb-3">
              <Link :href="route('dashboard')">
                <ApplicationLogo />
              </Link>
            </div>
            <h4 class="text-center mb-4">Sign in your account</h4>
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
              <div class="form-row d-flex justify-content-between mt-4 mb-2">
                <div class="mb-3">
                  <div class="form-check custom-checkbox ms-0">
                    <Checkbox
                      id="checkbox-signin"
                      class="form-check-input"
                      name="remember"
                      v-model:checked="form.remember"
                    />
                    <label class="form-check-label" for="checkbox-signin"
                      >Remember my preference</label
                    >
                  </div>
                </div>
                <div class="mb-3 mt-1" v-if="canResetPassword">
                  <Link
                    :href="route('password.request')"
                    class="text-muted ms-1"
                    >Forgot Password?</Link
                  >
                </div>
              </div>
              <div class="text-center">
                <button
                  class="btn btn-primary btn-block"
                  type="submit"
                  :disabled="form.processing"
                >
                  <span v-if="form.processing">Processing...</span>
                  <span v-else>Log In</span>
                </button>
              </div>
            </form>
            <div class="new-account mt-3">
              <p class="mb-0 mb-sm-3" v-if="canRegister">
                Don't have an account?
                <Link :href="route('register')" class="text-primary"
                  >Sign Up</Link
                >
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </GuestLayout>
</template>
