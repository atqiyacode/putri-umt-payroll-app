<template>
  <GuestLayout>
    <Head title="Log in" />
    <!-- Login Wrapper Area -->
    <div class="login-wrapper d-flex align-items-center justify-content-center">
      <div class="custom-container">
        <div class="text-center px-4">
          <img
            class="login-intro-img"
            :src="'mobile/img/bg-img/36.png'"
            alt=""
          />
        </div>
        <!-- Register Form -->
        <div class="register-form mt-4">
          <h6 class="mb-3 text-center">Log in</h6>
          <form @submit.stop.prevent="submit">
            <div class="form-group">
              <div class="p-fluid">
                <p-input-text
                  type="email"
                  placeholder="Enter your email"
                  v-model="form.email"
                  @blur="v$.form.email.$touch"
                  :class="v$.form.email.$error ? 'p-invalid' : 'p-valid'"
                />
              </div>
            </div>

            <div class="form-group position-relative">
              <div class="p-fluid">
                <p-input-text
                  type="password"
                  id="password"
                  placeholder="Enter your password"
                  v-model="form.password"
                  @blur="v$.form.password.$touch"
                  :class="v$.form.password.$error ? 'p-invalid' : 'p-valid'"
                />
                <div
                  class="position-absolute"
                  id="password-visibility"
                  @click="togglePassword"
                >
                  <i class="bi bi-eye" v-if="showPassword"></i>
                  <i class="bi bi-eye-slash-fill" v-else></i>
                </div>
              </div>
            </div>

            <div class="mb-3">
              <div class="form-check">
                <Checkbox
                  id="checkbox-signin"
                  class="form-check-input"
                  name="remember"
                  v-model:checked="form.remember"
                />
                <label class="form-check-label" for="checkbox-signin">
                  Remember me
                </label>
              </div>
            </div>

            <div class="d-grid mb-0 text-center">
              <button
                class="btn"
                type="submit"
                :disabled="form.processing || v$.form.$invalid"
                :class="v$.form.$invalid ? 'btn-danger' : 'btn-primary'"
              >
                <span v-if="form.processing">Processing...</span>
                <span v-else>Log In</span>
              </button>
            </div>
          </form>
        </div>
        <!-- Login Meta -->
        <div class="login-meta-data text-center">
          <template v-if="canResetPassword">
            <Link
              :href="route('password.request')"
              class="stretched-link forgot-password d-block mt-3 mb-1"
              >Forgot your password?</Link
            >
          </template>
          <p class="mb-0" v-if="canRegister">
            Don't have an account?
            <Link :href="route('register')" class="stretched-link"
              >Sign Up</Link
            >
          </p>
        </div>
      </div>
    </div>
  </GuestLayout>
</template>
<script>
import Button from "@/Components/Button.vue";
import Checkbox from "@/Components/Checkbox.vue";
import GuestLayout from "@/Layouts/Guest.vue";
import Input from "@/Components/Input.vue";
import Label from "@/Components/Label.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import useVuelidate from "@vuelidate/core";
import { required, email } from "@vuelidate/validators";
export default {
  components: {
    Button,
    Checkbox,
    GuestLayout,
    Input,
    Label,
    Head,
    Link,
  },
  props: {
    canRegister: Boolean,
    canResetPassword: Boolean,
    status: String,
  },
  setup() {
    const form = useForm({
      email: "",
      password: "",
      remember: false,
    });

    return {
      v$: useVuelidate(),
      form,
    };
  },
  validations() {
    return {
      form: {
        email: { required, email },
        password: { required },
      },
    };
  },
  data() {
    return {
      showPassword: false,
    };
  },
  methods: {
    submit() {
      this.v$.$validate();
      if (!this.v$.$error) {
        this.form.post(route("login"), {
          onFinish: () => this.form.reset("password"),
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
