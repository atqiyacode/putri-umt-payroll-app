

<template>
  <GuestLayout>
    <Head title="Forgot Password" />
    <div class="login-back-button">
      <Link :href="route('login')">
        <svg
          class="bi bi-arrow-left-short"
          width="32"
          height="32"
          viewBox="0 0 16 16"
          fill="currentColor"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            fill-rule="evenodd"
            d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"
          ></path>
        </svg>
      </Link>
    </div>
    <div class="login-wrapper d-flex align-items-center justify-content-center">
      <div class="custom-container">
        <div class="text-center px-4">
          <img
            class="login-intro-img"
            :src="'mobile/img/bg-img/37.png'"
            alt=""
          />
        </div>
        <!-- Register Form -->
        <div class="register-form mt-4">
          <p class="text-muted mb-4 mt-3">
            Forgot your password? No problem. Just let us know your email
            address and we will email you a password reset link that will allow
            you to choose a new one.
          </p>
          <form @submit.prevent="submit">
            <div class="form-group text-start mb-3">
              <div class="p-fluid">
                <p-input-text
                  class="form-control"
                  type="email"
                  id="emailaddress"
                  required=""
                  placeholder="Enter your email"
                  v-model="form.email"
                  @blur="v$.form.email.$touch"
                  :class="v$.form.email.$error ? 'p-invalid' : 'p-valid'"
                />
              </div>
            </div>

            <div class="d-grid text-center">
              <button
                class="btn w-100"
                type="submit"
                :disabled="form.processing || v$.form.$invalid"
                :class="v$.form.$invalid ? 'btn-danger' : 'btn-primary'"
              >
                <span v-if="form.processing">Processing...</span>
                <span v-else>Reset Password</span>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </GuestLayout>
</template>

<script>
import Button from "@/Components/Button.vue";
import GuestLayout from "@/Layouts/Guest.vue";
import Input from "@/Components/Input.vue";
import Label from "@/Components/Label.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import useVuelidate from "@vuelidate/core";
import { required, email } from "@vuelidate/validators";
export default {
  components: {
    Button,
    GuestLayout,
    Input,
    Label,
    Head,
    Link,
  },
  props: {
    status: String,
  },
  setup() {
    const form = useForm({
      email: "",
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
      },
    };
  },
  data() {
    return {
      //
    };
  },
  methods: {
    submit() {
      this.v$.$validate();
      if (!this.v$.$error) {
        form.post(route("password.email"));
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
