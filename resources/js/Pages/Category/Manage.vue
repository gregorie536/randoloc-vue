<template>
    <AuthenticatedLayout>
        <div class="bg-main-bg-color p-4 md:p-8 rounded-md shadow-lg">
            <h1 class="text-xl font-semibold text-main-text-color mb-4">
                Gestion des catégories
            </h1>
            <div class="space-y-4">
                <InertiaLink :href="route('categories.create')"
                    class="bg-nav-bg-color text-white py-2 px-6 rounded-md hover:bg-opacity-90 focus:outline-none">
                    Créer une catégories
                </InertiaLink>
                <div v-for="category in categories" :key="category.id"
                    class="border-b-2 border-aliceblue pb-4 mb-4 md:pb-6 md:mb-6">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <span class="text-lg mb-2 md:mb-0">{{
                            category.name
                        }}</span>
                        <div>
                            <InertiaLink :href="route('categories.edit', category.id)"
                                class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded text-sm md:text-base mr-2">
                                Modifier
                            </InertiaLink>

                            <button @click="confirmDeletion(category.id)"
                                class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded text-sm md:text-base">
                                Supprimer
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import { InertiaLink } from "@inertiajs/inertia-vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Inertia } from "@inertiajs/inertia";

export default {
    components: {
        AuthenticatedLayout,
        InertiaLink,
    },
    props: {
        categories: Array,
    },
    methods: {
        confirmDeletion(categoryId) {
            if (
                confirm("Êtes-vous sûr de vouloir supprimer cette catégorie ?")
            ) {
                this.deleteCategory(categoryId);
            }
        },
        deleteCategory(categoryId) {
            Inertia.delete(`/categories/${categoryId}`);
        },
    },
};
</script>

<style lang="scss" scoped>
@import "../../../css/style.scss";
@include stylesMixin;
</style>
