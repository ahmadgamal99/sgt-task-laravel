<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});
</script>

<template>
    <Head title="Welcome" />

    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">

        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center pt-8 sm:justify-start sm:pt-0">

                <div v-if="canLogin" class="px-6 py-4 sm:block">
                    <Link
                        v-if="$page.props.auth.user"
                        :href="route('dashboard')"
                        class="text-sm text-gray-700 dark:text-gray-500 underline"
                    >Dashboard</Link
                    >

                    <template v-else>
                        <Link :href="route('login')" class="text-gray-700 dark:text-gray-500 p-10" style="font-size: 50px">
                            <h3>Log into dashboard</h3>
                        </Link>
                    </template>
                </div>

            </div>

        </div>
    </div>
</template>
