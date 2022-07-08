<script setup>
import BreezeButton from "@/Components/Button.vue";
import BreezeGuestLayout from "@/Layouts/Guest.vue";
import BreezeInput from "@/Components/Input.vue";
import BreezeLabel from "@/Components/Label.vue";
import BreezeValidationErrors from "@/Components/ValidationErrors.vue";
import { Link, Head, useForm } from "@inertiajs/inertia-vue3";

defineProps({
  status: String,
});

const form = useForm({
  email: "",
});

const submit = () => {
  form.post(route("password.email"));
};
</script>

<template>
  <BreezeGuestLayout>
    <Head title="Forgot Password" />

    <div class="card">
      <div class="card-body p-4">
        <div class="text-center w-75 m-auto">
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

          <h3 class="text-success" v-if="status">{{ status }}</h3>
          <h3 class="mt-3" v-else>Forgot Password</h3>

          <p class="text-muted mb-4 mt-3">
            Forgot your password? No problem. Just let us know your email
            address and we will email you a password reset link that will allow
            you to choose a new one.
          </p>
        </div>

        <form @submit.prevent="submit">
          <div class="mb-3">
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

          <div class="d-grid text-center">
            <button
              class="btn btn-primary"
              type="submit"
              :disabled="form.processing"
            >
              <span v-if="form.processing">Processing...</span>
              <span v-else>Reset Password</span>
            </button>
          </div>
        </form>
      </div>
      <!-- end card-body -->
    </div>
    <!-- end card -->

    <div class="row mt-3">
      <div class="col-12 text-center">
        <p class="text-muted">
          Back to
          <Link :href="route('login')" class="text-primary fw-medium ms-1">
            Log in
          </Link>
        </p>
      </div>
      <!-- end col -->
    </div>
  </BreezeGuestLayout>
</template>
