<script setup>
import { computed } from "vue";
import GuestLayout from "@/Layouts/Guest.vue";
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
  <GuestLayout>
    <Head title="Email Verification" />
    <div class="bg-white rounded10 shadow-lg">
      <div class="content-top-agile p-20 pb-0">
        <h2 class="text-primary fw-600">Thanks for register!</h2>
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
      </div>
      <div class="p-40">
        <form @submit.prevent="submit">
          <button
            class="btn btn-primary w-p100 mt-10"
            type="submit"
            :disabled="form.processing"
          >
            <span v-if="form.processing">Processing...</span>
            <span v-else>Resend Verification Email</span>
          </button>
        </form>
        <div class="text-center">
          <p class="mt-15 mb-0 text-fade">
            has verify email address?
            <Link :href="route('login')" class="text-primary">Sign In</Link>
          </p>
        </div>
      </div>
    </div>
  </GuestLayout>
</template>
