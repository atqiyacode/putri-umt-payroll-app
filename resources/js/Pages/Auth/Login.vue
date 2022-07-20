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
    <div class="bg-white rounded10 shadow-lg">
      <div class="content-top-agile p-20 pb-0">
        <h2 class="text-primary fw-600">Sign in your account</h2>
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
              <Link :href="route('password.request')" class="text-muted ms-1"
                >Forgot Password?</Link
              >
            </div>
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
                <span v-else>Log In</span>
              </button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <div class="text-center">
          <p class="mt-15 mb-0 text-fade" v-if="canRegister">
            Don't have an account?
            <Link :href="route('register')" class="text-primary">Sign Up</Link>
          </p>
        </div>
      </div>
    </div>
  </GuestLayout>
</template>
