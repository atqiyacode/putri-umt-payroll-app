<script setup>
import GuestLayout from "@/Layouts/Guest.vue";
import { Link, Head, useForm } from "@inertiajs/inertia-vue3";

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
    <div class="bg-white rounded10 shadow-lg">
      <div class="content-top-agile p-20 pb-0">
        <h2 class="text-success text-primary fw-600" v-if="status">
          {{ status }}
        </h2>
        <h2 class="text-primary fw-600" v-else>Forgot Password</h2>
        <small class="text-muted mb-4 mt-3">
          Forgot your password? No problem. Just let us know your email address
          and we will email you a password reset link that will allow you to
          choose a new one.
        </small>
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
          <div class="row">
            <!-- /.col -->
            <div class="col-12 text-center">
              <button
                class="btn btn-primary w-p100 mt-10"
                type="submit"
                :disabled="form.processing"
              >
                <span v-if="form.processing">Processing...</span>
                <span v-else>Reset Password</span>
              </button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <div class="text-center">
          <p class="mt-15 mb-0 text-fade">
            Has remember password?
            <Link :href="route('login')" class="text-primary">Sign In</Link>
          </p>
        </div>
      </div>
    </div>
  </GuestLayout>
</template>
