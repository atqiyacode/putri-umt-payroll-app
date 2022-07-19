<script>
import Button from "@/Components/Button.vue";
import GuestLayout from "@/Layouts/Guest.vue";
import Input from "@/Components/Input.vue";
import Label from "@/Components/Label.vue";
import { Head, useForm, Link } from "@inertiajs/inertia-vue3";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

export default {
  components: {
    Button,
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
      password: "",
    });

    const submit = () => {
      form.post(route("password.confirm"), {
        onFinish: () => form.reset(),
      });
    };

    return {
      form,
      submit,
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
    <Head title="Confirm Password" />

    <div class="authincation-content">
      <div class="row no-gutters">
        <div class="col-xl-12">
          <div class="auth-form">
            <div class="text-center mb-3">
              <Link :href="route('dashboard')">
                <ApplicationLogo />
              </Link>
            </div>
            <h4 class="text-center mb-4">Confirm password</h4>
            <p class="text-muted mb-4 mt-3">
              This is a secure area of the application. Please confirm your
              password before continuing.
            </p>
            <form @submit.prevent="submit">
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

              <div class="text-center">
                <button
                  class="btn btn-primary btn-block"
                  type="submit"
                  :disabled="form.processing"
                >
                  <span v-if="form.processing">Processing...</span>
                  <span v-else>Confirm</span>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </GuestLayout>
</template>
