<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        Quel page souhaite-vous modifier
                    </div>
                </div>
                <div v-if="successMessage" class="alert alert-success">
                    {{ successMessage }}
                </div>
            </div>
        </div>

        <div class="min-h-screen flex flex-col bg-gray-100">
            <!-- Barre latérale -->
            <div class="bg-white w-64 px-8 py-4 shadow-md">
                <ul>
                    <li class="mb-2">
                        <a
                            href="/page1"
                            class="flex items-center text-gray-700 hover:bg-gray-200 p-2 rounded"
                        >
                            <i class="fas fa-folder mr-2"></i>
                            Sorties et séjours
                        </a>
                    </li>
                    <li class="mb-2">
                        <a
                            href="/page2"
                            class="flex items-center text-gray-700 hover:bg-gray-200 p-2 rounded"
                        >
                            <i class="fas fa-file-alt mr-2"></i>
                            L'info du moment
                        </a>
                    </li>
                    <li class="mb-2">
                        <a
                            href="/page2"
                            class="flex items-center text-gray-700 hover:bg-gray-200 p-2 rounded"
                        >
                            <i class="fas fa-file-alt mr-2"></i>
                            Association
                        </a>
                    </li>
                    <li class="mb-2">
                        <a
                            href="/guideline/edit"
                            class="flex items-center text-gray-700 hover:bg-gray-200 p-2 rounded"
                        >
                            <i class="fas fa-file-alt mr-2"></i>
                            Règles et organisation
                        </a>
                    </li>
                    <li class="mb-2">
                        <a
                            href="/gallery/create"
                            class="flex items-center text-gray-700 hover:bg-gray-200 p-2 rounded"
                        >
                            <i class="fas fa-file-alt mr-2"></i>
                            Galerie photos
                        </a>
                    </li>
                    <li class="mb-2">
                        <a
                            href="/contact/edit"
                            class="flex items-center text-gray-700 hover:bg-gray-200 p-2 rounded"
                        >
                            <i class="fas fa-file-alt mr-2"></i>
                            Contact
                        </a>
                    </li>

                    <!-- Ajoutez autant d'éléments de liste que nécessaire pour vos pages -->
                </ul>
            </div>
            <!-- Contenu principal -->
            <div class="flex-1 bg-gray-100 p-8">
                <!-- Votre contenu principal ira ici -->
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script>
export default {
    props: {
        successMessage: String,
        default: null,
    },
};
</script>
