<script setup>
import { computed } from "vue";
import BreezeButton from "@/Components/Button.vue";
import BreezeGuestLayout from "@/Layouts/Guest.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
  status: String,
  email: String,
});

const form = useForm();

const submit = () => {
  form.post(route("verification.send"));
};

const verificationLinkSent = computed(
  () => props.status === "verification-link-sent"
);
</script>

<template>
  <BreezeGuestLayout>
    <Head title="Email Verification" />
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
        </div>

        <div class="mt-3 text-center">
          <h3>Thanks for register!</h3>

          <div
            class="mb-4 font-medium text-sm text-green-600"
            v-if="verificationLinkSent"
          >
            A new verification link has been sent to the email address you
            provided during registration (<span class="fw-bold">
              {{ email }} </span
            >).
          </div>

          <p class="mt-2" v-else>
            A email has been send to
            <span class="fw-bold"> {{ email }} </span>. Before getting started,
            could you verify your email address by clicking on the link we just
            emailed to you? If you didn't receive the email, we will gladly send
            you another.
          </p>

          <div class="d-grid mb-2 text-center">
            <form @submit.prevent="submit">
              <button
                class="btn btn-primary"
                type="submit"
                :disabled="form.processing"
              >
                <span v-if="form.processing">Processing...</span>
                <span v-else>Resend Verification Email</span>
              </button>
            </form>
          </div>

          <div class="d-grid">
            <p class="text-muted">
              <Link
                :href="route('logout')"
                method="post"
                class="text-primary fw-medium ms-1"
                >Back to Home</Link
              >
            </p>
          </div>
        </div>
      </div>
      <!-- end card-body -->
    </div>
  </BreezeGuestLayout>
</template>
