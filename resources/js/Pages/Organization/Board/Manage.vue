<template>
    <AuthenticatedLayout>
        <div class="bg-main-bg-color p-4 md:p-8 rounded-md shadow-lg">
            <h1 class="text-xl font-semibold text-main-text-color mb-4">
                Gestion des rôles
            </h1>
            <div class="space-y-4">
                <InertiaLink :href="route('organization.boards.create')"
                    class="bg-nav-bg-color text-white py-2 px-6 rounded-md hover:bg-opacity-90 focus:outline-none">
                    Créer un rôle dans le bureau
                </InertiaLink>
                <div v-for="board in boards" :key="board.id" class="border-b-2 border-aliceblue pb-4 mb-4 md:pb-6 md:mb-6">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <span class="text-lg mb-2 md:mb-0">
                            {{ board.member.firstname }} {{ board.member.lastname }} - {{ board.role }}
                        </span>
                        <div>
                            <InertiaLink :href="route('organization.boards.edit', board.id)"
                                class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded text-sm md:text-base mr-2">
                                Modifier
                            </InertiaLink>

                            <!-- <button
                                @click="confirmDeletion(board.id)"
                                class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded text-sm md:text-base"
                            >
                                Supprimer
                            </button> -->
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
        boards: Array,
    },
    // methods: {
    //     confirmDeletion(boardId) {
    //         if (confirm("Êtes-vous sûr de vouloir supprimer ce rôle ?")) {
    //             this.deleteBoard(boardId);
    //         }
    //     },
    //     deleteBoard(boardId) {
    //         Inertia.delete(route("organization.boards.destroy", boardId));
    //     },
    // },
};
</script>

<style lang="scss" scoped>
@import "../../../../css/style.scss";
@include stylesMixin;
</style>
