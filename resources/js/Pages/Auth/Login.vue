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
  <BreezeGuestLayout>
    <Head title="Log in" />
    <div class="card shadow-lg">
      <div class="card-body p-4">
        <div class="text-center w-50 m-auto">
          <div class="auth-logo">
            <Link :href="route('dashboard')" class="logo logo-dark text-center">
              <span class="logo-lg">
                <img src="assets/images/logo-dark.png" alt="" height="22" />
              </span>
            </Link>

            <Link
              :href="route('dashboard')"
              class="logo logo-light text-center"
            >
              <span class="logo-lg">
                <img src="assets/images/logo-light.png" alt="" height="22" />
              </span>
            </Link>
          </div>
          <p class="text-muted mb-4 mt-3">
            Enter your email address and password to access.
          </p>
        </div>

        <form @submit.prevent="submit">
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

          <div class="mb-3">
            <div class="form-check">
              <BreezeCheckbox
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
              class="btn btn-primary"
              type="submit"
              :disabled="form.processing"
            >
              <span v-if="form.processing">Processing...</span>
              <span v-else>Log In</span>
            </button>
          </div>
        </form>
      </div>
    </div>

    <div class="row mt-3">
      <div class="col-12 text-center">
        <p v-if="canResetPassword">
          <Link :href="route('password.request')" class="text-muted ms-1"
            >Forgot your password?</Link
          >
        </p>
        <p class="text-muted" v-if="canRegister">
          Don't have an account?
          <Link :href="route('register')" class="text-primary fw-medium ms-1"
            >Sign Up</Link
          >
        </p>
      </div>
    </div>
  </BreezeGuestLayout>
</template>
