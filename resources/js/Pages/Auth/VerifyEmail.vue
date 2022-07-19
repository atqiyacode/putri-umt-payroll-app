<script setup>
import { computed } from "vue";
import Button from "@/Components/Button.vue";
import GuestLayout from "@/Layouts/Guest.vue";
import { Head, Link, useForm } from "@inertiajs/inertia-vue3";
import ApplicationLogo from "@/Components/ApplicationLogo.vue";

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
  <GuestLayout>
    <Head title="Email Verification" />
    <div class="authincation-content">
      <div class="row no-gutters">
        <div class="col-xl-12">
          <div class="auth-form">
            <div class="text-center mb-3">
              <Link :href="route('dashboard')">
                <ApplicationLogo />
              </Link>
            </div>
            <h4 class="text-center mb-4">Thanks for register!</h4>
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
              <span class="fw-bold"> {{ email }} </span>. Before getting
              started, could you verify your email address by clicking on the
              link we just emailed to you? If you didn't receive the email, we
              will gladly send you another.
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
              <p class="text-muted mt-3">
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
      </div>
    </div>
  </GuestLayout>
</template>
