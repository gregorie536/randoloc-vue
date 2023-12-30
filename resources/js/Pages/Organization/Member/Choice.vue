<template>
    <AuthenticatedLayout>
        <div class="bg-main-bg-color p-8 rounded-md shadow-lg">
            <h1 class="text-xl font-semibold text-main-text-color mb-4">
                Administration des membres
            </h1>
            <div class="space-y-6">
                <InertiaLink
                    :href="route('organization.members.create')"
                    class="bg-nav-bg-color text-white py-2 px-6 rounded-md hover:bg-opacity-90 focus:outline-none"
                >
                    Créer un membre
                </InertiaLink>

                <InertiaLink
                    :href="route('organization.members.manage')"
                    class="bg-nav-bg-color text-white py-2 px-6 rounded-md hover:bg-opacity-90 focus:outline-none"
                >
                    Gestion des membres
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
@import "../../../../css/style.scss";
@include stylesMixin;

.space-y-6 {
    display: flex;
    flex-direction: column;
}
</style>
