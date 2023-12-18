<template>
    <AuthenticatedLayout>
        <div class="bg-main-bg-color p-8 rounded-md shadow-lg">
            <h1 class="text-xl font-semibold text-main-text-color mb-4">
                Administration des sorties et séjours
            </h1>
            <div class="space-y-6">
                <InertiaLink
                    :href="route('events.create')"
                    class="bg-nav-bg-color text-white py-2 px-6 rounded-md hover:bg-opacity-90 focus:outline-none"
                >
                    Créer un événement
                </InertiaLink>

                <InertiaLink
                    :href="route('events.manage')"
                    class="bg-nav-bg-color text-white py-2 px-6 rounded-md hover:bg-opacity-90 focus:outline-none"
                >
                    Gestion des événements
                </InertiaLink>

                <hr />

                <InertiaLink
                    :href="route('categories.create')"
                    class="bg-nav-bg-color text-white py-2 px-6 rounded-md hover:bg-opacity-90 focus:outline-none"
                >
                    Créer une catégories
                </InertiaLink>

                <InertiaLink
                    :href="route('categories.manage')"
                    class="bg-nav-bg-color text-white py-2 px-6 rounded-md hover:bg-opacity-90 focus:outline-none"
                >
                    Gestion des catégories
                </InertiaLink>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import { InertiaLink } from "@inertiajs/inertia-vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

export default {
    components: {
        AuthenticatedLayout,
        InertiaLink,
    },
};
</script>

<style lang="scss" scoped>
@import "../../../css/style.scss";
@include stylesMixin;

.space-y-6 {
    display: flex;
    flex-direction: column;
}
</style>
