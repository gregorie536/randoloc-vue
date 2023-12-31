<template>
    <AuthenticatedLayout>
        <div class="bg-main-bg-color p-4 md:p-8 rounded-md shadow-lg">
            <h1 class="text-xl font-semibold text-main-text-color mb-4">
                Gestion des commissions
            </h1>
            <div class="space-y-4">
                <div v-for="committee in committees" :key="committee.id" class="border-b-2 border-aliceblue pb-4 mb-4 md:pb-6 md:mb-6">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <span class="text-lg mb-2 md:mb-0">{{ committee.name }}</span>
                        <div>
                            <InertiaLink :href="route('organization.committees.edit', committee.id)" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded text-sm md:text-base mr-2">
                                Modifier
                            </InertiaLink>
                            <button @click="confirmDeletion(committee.id)" class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded text-sm md:text-base">
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
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { InertiaLink } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import { ref } from "vue";

export default {
    components: {
        AuthenticatedLayout,
        InertiaLink,
    },
    props: {
        committees: Array,
    },
    setup() {
        function confirmDeletion(committeeId) {
            if (confirm("Êtes-vous sûr de vouloir supprimer cette commission ?")) {
                Inertia.delete(route('organization.committees.destroy', committeeId));
            }
        }

        return {
            confirmDeletion,
        };
    },
};
</script>


<style lang="scss" scoped>
@import "../../../../css/style.scss";
@include stylesMixin;
</style>
