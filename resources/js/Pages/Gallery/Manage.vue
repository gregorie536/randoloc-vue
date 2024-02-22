<template>
    <AuthenticatedLayout>
        <div class="bg-main-bg-color p-4 md:p-8 rounded-md shadow-lg">
            <h1 class="text-xl font-semibold text-main-text-color mb-4">
                Gestion des images
            </h1>
            <div class="space-y-4">
                <InertiaLink :href="route('gallery.create')"
                    class="bg-nav-bg-color text-white py-2 px-6 rounded-md hover:bg-opacity-90 focus:outline-none">
                    Ajouter une image
                </InertiaLink>
                <div v-for="gallery in galleries" :key="gallery.id"
                    class="border-b-2 border-aliceblue pb-4 mb-4 md:pb-6 md:mb-6 flex items-center">
                    <div class="flex flex-col md:flex-row justify-between items-center w-full">
                        <div class="flex flex-col items-center w-24 md:w-auto">
                            <img class="mb-2 md:mb-0 manage-img self-end" :src="'/storage/' + gallery.image"
                                :alt="gallery.comment" />
                        </div>
                        <div class="flex flex-col items-center w-full md:w-auto">
                            <p class="text-gray-700 text-sm md:text-base max-w-md">
                                {{ gallery.comment }}
                            </p>
                        </div>
                        <div>
                            <InertiaLink :href="route('gallery.edit', gallery.id)"
                                class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 text-sm md:text-base mr-2">
                                Modifier
                            </InertiaLink>
                            <button @click="confirmDeletion(gallery.id)"
                                class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600 text-sm md:text-base">
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
        galleries: Array,
    },
    methods: {
        confirmDeletion(galleryId) {
            if (confirm("Êtes-vous sûr de vouloir supprimer cette image ?")) {
                this.deleteGallery(galleryId);
            }
        },
        deleteGallery(galleryId) {
            Inertia.delete(`/gallery/${galleryId}`);
        },
    },
};
</script>

<style lang="scss" scoped>
@import "../../../css/style.scss";
@include stylesMixin;

.manage-img {
    width: 100px;
    height: auto;
}
</style>
