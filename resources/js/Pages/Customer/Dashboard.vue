<script setup>
import AuthenticatedLayout from '@/Layouts/CustomerLayout.vue';
import { Head, usePage } from '@inertiajs/vue3';

const page = usePage();
const user = page.props.auth.user;
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h1 class="text-2xl font-bold mb-2">
                            Welcome, {{ user.name }}!
                        </h1>
                        <p class="text-gray-700">
                            You are logged in as a <span class="font-semibold">{{ user.role.charAt(0).toUpperCase() + user.role.slice(1) }}</span>.
                        </p>
                        <p class="mt-2">
                            Start using your dashboard based on your role.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
