<template>
    <AuthenticatedLayout>
        <div class="bg-main-bg-color p-4 md:p-8 rounded-md shadow-lg">
            <h1 class="text-xl font-semibold text-main-text-color mb-4">
                Gestion des membres
            </h1>
            <div class="space-y-4">
                <div
                    v-for="member in members"
                    :key="member.id"
                    class="border-b-2 border-aliceblue pb-4 mb-4 md:pb-6 md:mb-6"
                >
                    <div
                        class="flex flex-col md:flex-row justify-between items-center"
                    >
                        <span class="text-lg mb-2 md:mb-0">
                            {{ member.firstname }} {{ member.lastname }}
                        </span>
                        <div>
                            <InertiaLink
                                :href="
                                    route(
                                        'organization.members.edit',
                                        member.id
                                    )
                                "
                                class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded text-sm md:text-base mr-2"
                            >
                                Modifier
                            </InertiaLink>

                            <button
                                @click="confirmDeletion(member.id)"
                                class="bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded text-sm md:text-base"
                            >
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
        members: Array,
    },
    methods: {
        confirmDeletion(memberId) {
            if (confirm("Êtes-vous sûr de vouloir supprimer ce membre ?")) {
                this.deleteMember(memberId);
            }
        },
        deleteMember(memberId) {
            Inertia.delete(route("organization.members.destroy", memberId));
        },
    },
};
</script>

<style lang="scss" scoped>
@import "../../../../css/style.scss";
@include stylesMixin;
</style>
