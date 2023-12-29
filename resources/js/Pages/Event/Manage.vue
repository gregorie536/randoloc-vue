<template>
    <AuthenticatedLayout>
        <div class="bg-main-bg-color p-4 md:p-8 rounded-md shadow-lg">
            <h1 class="text-xl font-semibold text-main-text-color mb-4">
                Gestion des événements
            </h1>
            <div class="space-y-4">
                <div
                    v-for="event in events"
                    :key="event.id"
                    class="border-b-2 border-aliceblue pb-4 mb-4 md:pb-6 md:mb-6"
                >
                    <div
                        class="flex flex-col md:flex-row justify-between items-center"
                    >
                        <span class="text-lg mb-2 md:mb-0">{{
                            event.name
                        }}</span>

                        <div>
                            <InertiaLink
                                :href="route('events.edit', event.id)"
                                class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 text-sm md:text-base mr-2"
                            >
                                Modifier
                            </InertiaLink>
                            <button
                                @click="confirmDeletion(event.id)"
                                class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600 text-sm md:text-base"
                            >
                                Supprimer
                            </button>
                            <span
                                v-if="event.active"
                                class="text-green-500 ml-2"
                                >Actif</span
                            >
                            <span v-else class="text-red-500 ml-2"
                                >Inactif</span
                            >
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
        events: Array,
    },
    methods: {
        confirmDeletion(eventId) {
            if (confirm("Êtes-vous sûr de vouloir supprimer cet événement ?")) {
                this.deleteEvent(eventId);
            }
        },
        deleteEvent(eventId) {
            Inertia.delete(`/events/${eventId}`);
        },
    },
};
</script>

<style lang="scss" scoped>
@import "../../../css/style.scss";
@include stylesMixin;
</style>
