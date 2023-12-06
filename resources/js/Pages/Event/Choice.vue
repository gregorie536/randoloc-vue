<template>
    <AuthenticatedLayout>
        <div class="bg-main-bg-color p-8 rounded-md shadow-lg">
            <h1 class="text-xl font-semibold text-main-text-color mb-4">
                Gestion des sorties et séjours
            </h1>
            <div class="space-y-6">
                <a
                    href="/events/create"
                    class="bg-nav-bg-color text-white py-2 px-6 rounded-md hover:bg-opacity-90 focus:outline-none"
                >
                    Créer un événement
                </a>

                <a
                    href="/events/manage"
                    class="bg-nav-bg-color text-white py-2 px-6 rounded-md hover:bg-opacity-90 focus:outline-none"
                >
                Gestion des événements
                </a>

                
                <hr />
                <a
                    href="/categories/create"
                    class="bg-nav-bg-color text-white py-2 px-6 rounded-md hover:bg-opacity-90 focus:outline-none"
                >
                    Créer une catégories
                </a>
                <a
                    href="/categories/manage"
                    class="bg-nav-bg-color text-white py-2 px-6 rounded-md hover:bg-opacity-90 focus:outline-none"
                >
                    Gestion des catégories
                </a>

                
            </div>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

export default {
    components: {
        AuthenticatedLayout,
    },
};
</script>

<style lang="scss" scoped>
@import "../../../css/style.scss";
@include stylesMixin;

.space-y-6 {
    display: flex;
    flex-direction: column;
    router-link {
        width: 40%;
    }
}
</style>
