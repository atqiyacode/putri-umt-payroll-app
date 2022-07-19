<script setup>
import Button from "@/Components/Button.vue";
import GuestLayout from "@/Layouts/Guest.vue";
import Input from "@/Components/Input.vue";
import Label from "@/Components/Label.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";
import { Link, Head, useForm } from "@inertiajs/inertia-vue3";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

defineProps({
  status: String,
  errors: String,
});

const form = useForm({
  email: "",
});

const submit = () => {
  form.post(route("password.email"));
};
</script>

<template>
  <GuestLayout>
    <Head title="Forgot Password" />

    <div class="authincation-content">
      <div class="row no-gutters">
        <div class="col-xl-12">
          <div class="auth-form">
            <div class="text-center mb-3">
              <Link :href="route('dashboard')">
                <ApplicationLogo />
              </Link>
            </div>
            <h4 class="text-success text-center mb-4" v-if="status">
              {{ status }}
            </h4>
            <h4 class="text-center mb-4" v-else>Forgot Password</h4>

            <p class="text-muted mb-4 mt-3">
              Forgot your password? No problem. Just let us know your email
              address and we will email you a password reset link that will
              allow you to choose a new one.
            </p>
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

              <div class="text-center">
                <button
                  class="btn btn-primary btn-block"
                  type="submit"
                  :disabled="form.processing"
                >
                  <span v-if="form.processing">Processing...</span>
                  <span v-else>Reset Password</span>
                </button>
              </div>
            </form>
            <div class="new-account mt-3">
              <p class="mb-0 mb-sm-3">
                Back to
                <Link :href="route('login')" class="text-primary">Log In</Link>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </GuestLayout>
</template>
