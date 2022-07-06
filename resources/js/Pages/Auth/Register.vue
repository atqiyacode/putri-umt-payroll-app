<script>
import BreezeButton from "@/Components/Button.vue";
import BreezeCheckbox from "@/Components/Checkbox.vue";
import BreezeGuestLayout from "@/Layouts/Guest.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeLabel from "@/Components/Label.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
export default {
  components: {
    BreezeButton,
    BreezeCheckbox,
    BreezeGuestLayout,
    BreezeInput,
    BreezeLabel,
    Head,
    Link,
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
  <BreezeGuestLayout>
    <Head title="Register" />
    <div class="card">
      <div class="card-body p-4">
        <div class="text-center w-50 m-auto">
          <div class="auth-logo">
            <a href="index.html" class="logo logo-dark text-center">
              <span class="logo-lg">
                <img src="assets/images/logo-dark.png" alt="" height="22" />
              </span>
            </a>

            <a href="index.html" class="logo logo-light text-center">
              <span class="logo-lg">
                <img src="assets/images/logo-light.png" alt="" height="22" />
              </span>
            </a>
          </div>
          <p class="text-muted mb-4 mt-3">
            Enter your email address and password to access admin panel.
          </p>
        </div>

        <form @submit.prevent="submit">
          <div class="mb-2">
            <label for="name" class="form-label">Full Name</label>
            <input
              class="form-control"
              type="text"
              id="name"
              required=""
              placeholder="Full name"
              v-model="form.name"
            />
          </div>

          <div class="mb-2">
            <label for="emailaddress" class="form-label">Email address</label>
            <input
              class="form-control"
              type="email"
              id="emailaddress"
              required=""
              placeholder="Enter your email"
              v-model="form.email"
            />
          </div>

          <div class="mb-2">
            <label for="password" class="form-label">Password</label>
            <div class="input-group input-group-merge">
              <input
                type="password"
                id="password"
                class="form-control"
                placeholder="Enter your password"
                v-model="form.password"
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
          </div>

          <div class="mb-2">
            <label for="password_confirmation" class="form-label"
              >Password Confirmation</label
            >
            <div class="input-group input-group-merge">
              <input
                type="password"
                id="password_confirmation"
                class="form-control"
                placeholder="Enter your password confirmation"
                v-model="form.password_confirmation"
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
          </div>

          <div class="mb-3">
            <div class="form-check">
              <BreezeCheckbox
                id="checkbox-signin"
                class="form-check-input"
                name="terms"
                v-model:checked="form.terms"
              />
              <label class="form-check-label" for="checkbox-signin">
                I accept Terms and Conditions
              </label>
            </div>
          </div>

          <div class="d-grid mb-0 text-center">
            <button
              class="btn btn-primary"
              type="submit"
              :disabled="form.processing"
            >
              <span v-if="form.processing">Processing...</span>
              <span v-else>Register</span>
            </button>
          </div>
        </form>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-12 text-center">
        <p class="text-muted">
          Already have account?
          <Link :href="route('login')" class="text-primary fw-medium ms-1"
            >Sign In</Link
          >
        </p>
      </div>
    </div>
  </BreezeGuestLayout>
</template>
