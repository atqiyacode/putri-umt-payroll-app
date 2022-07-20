<script>
import GuestLayout from "@/Layouts/Guest.vue";
import { Head, useForm, Link } from "@inertiajs/inertia-vue3";

export default {
  components: {
    GuestLayout,
    Head,
    Link,
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

    <div class="bg-white rounded10 shadow-lg">
      <div class="content-top-agile p-20 pb-0">
        <h2 class="text-primary fw-600">Confirm password</h2>
        <p class="text-muted mb-4 mt-3">
          This is a secure area of the application. Please confirm your password
          before continuing.
        </p>
      </div>
      <div class="p-40">
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
          <div class="row">
            <!-- /.col -->
            <div class="col-12 text-center">
              <button
                class="btn btn-primary w-p100 mt-10"
                type="submit"
                :disabled="form.processing"
              >
                <span v-if="form.processing">Processing...</span>
                <span v-else>Confirm</span>
              </button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
    </div>
  </GuestLayout>
</template>
