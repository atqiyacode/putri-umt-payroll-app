<script setup>
import BreezeButton from "@/Components/Button.vue";
import BreezeGuestLayout from "@/Layouts/Guest.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";
import { Head, useForm, Link } from "@inertiajs/inertia-vue3";

const form = useForm({
  password: "",
});

const submit = () => {
  form.post(route("password.confirm"), {
    onFinish: () => form.reset(),
  });
};
</script>

<template>
  <BreezeGuestLayout>
    <Head title="Confirm Password" />

    <div class="card">
      <div class="card-body p-4">
        <div class="text-center w-50 m-auto">
          <div class="auth-logo">
            <Link :href="route('dashboard')" class="logo logo-dark text-center">
              <span class="logo-lg">
                <img src="assets/images/logo-dark.png" alt="" height="22" />
              </span>
            </Link>

            <a :href="route('dashboard')" class="logo logo-light text-center">
              <span class="logo-lg">
                <img src="assets/images/logo-light.png" alt="" height="22" />
              </span>
            </a>
          </div>
          <p class="text-muted mb-4 mt-3">
            This is a secure area of the application. Please confirm your
            password before continuing.
          </p>
        </div>

        <form @submit.prevent="submit">
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

          <div class="d-grid mb-0 text-center">
            <button
              class="btn btn-primary"
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
  </BreezeGuestLayout>
</template>
