<template>
    <AuthenticatedLayout>
        <div class="bg-main-bg-color p-8 rounded-md shadow-lg">
            <h1 class="text-xl font-semibold text-main-text-color mb-4">
                Modifier l'info du moment
            </h1>

            <form @submit.prevent="submitForm" class="space-y-6">
                <div
                    v-for="(homepageFeature, index) in homepageFeatures"
                    :key="homepageFeature.id"
                    class="border-b-2 border-aliceblue pb-6 mb-6"
                >
                    <div class="flex flex-col mb-4">
                        <label
                            :for="'title' + index"
                            class="text-main-text-color mb-1"
                            >Titre :</label
                        >
                        <input
                            :id="'title' + index"
                            v-model="homepageFeature.title"
                            class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color"
                        />
                    </div>

                    <div class="flex flex-col mb-4">
                        <label
                            :for="'image' + index"
                            class="text-main-text-color mb-1"
                            >Image :</label
                        >
                        <!-- <input
                            :id="'image' + index"
                            v-model="homepageFeature.image"
                            class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color"
                        /> -->
                        <!-- <input
                            type="file"
                            :id="'image' + index"
                            @change="handleImageChange(homepageFeature, $event)"
                            class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color"
                        /> -->
                    </div>

                    <div class="flex flex-col mb-4">
                        <label
                            :for="'description' + index"
                            class="text-main-text-color mb-1"
                            >Description :</label
                        >
                        <input
                            :id="'description' + index"
                            v-model="homepageFeature.description"
                            class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color"
                        />
                    </div>

                    <div class="flex flex-col mb-4">
                        <label
                            :for="'location' + index"
                            class="text-main-text-color mb-1"
                            >Lieu :</label
                        >
                        <input
                            :id="'location' + index"
                            v-model="homepageFeature.location"
                            class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color"
                        />
                    </div>

                    <div class="flex flex-col mb-4">
                        <label
                            :for="'feature_date' + index"
                            class="text-main-text-color mb-1"
                            >Date :</label
                        >
                        <input
                            :id="'feature_date' + index"
                            v-model="homepageFeature.feature_date"
                            class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color"
                        />
                    </div>
                </div>

                <button
                    type="submit"
                    class="bg-nav-bg-color text-white py-2 px-6 rounded-md hover:bg-opacity-90 focus:outline-none"
                >
                    Mettre à jour
                </button>
                <!--  -->
                <button
                    type="button"
                    class="bg-nav-bg-color text-white py-2 px-6 rounded-md hover:bg-opacity-90 focus:outline-none"
                    @click="goToDashboard"
                >
                    Retour au tableau de bord
                </button>
                <!--  -->
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

export default {
    props: {
        homepageFeatures: Array,
    },

    setup(props) {
        const homepageFeatures = ref(props.homepageFeatures);

        // Méthode pour gérer le changement d'image
        function handleImageChange(feature, event) {
            const file = event.target.files[0];
            feature.image = file; // Stocker le fichier sélectionné
        }

        function submitForm() {
            const formData = new FormData();

            homepageFeatures.value.forEach((feature, index) => {
                formData.append(`homepageFeatures[${index}][id]`, feature.id);
                formData.append(
                    `homepageFeatures[${index}][title]`,
                    feature.title
                );
                formData.append(
                    `homepageFeatures[${index}][description]`,
                    feature.description
                );
                formData.append(
                    `homepageFeatures[${index}][location]`,
                    feature.location
                );
                formData.append(
                    `homepageFeatures[${index}][feature_date]`,
                    feature.feature_date
                );

                // Ajouter l'image s'il y en a une
                if (feature.image) {
                    formData.append(
                        `homepageFeatures[${index}][image]`,
                        feature.image
                    );
                }
            });

            Inertia.post("/homepage_features/update", formData, {
                // Ajoutez des options nécessaires pour traiter les fichiers
                onBefore: (visit) => {
                    visit.headers["Content-Type"] = "multipart/form-data";
                },
            });
        }
        function goToDashboard() {
            Inertia.get("/dashboard");
        }

        return {
            homepageFeatures,
            handleImageChange,
            submitForm,
            goToDashboard,
        };
    },
    components: {
        AuthenticatedLayout,
    },
};
</script>

<style lang="scss" scoped>
@import "../../../css/style.scss";
@include stylesMixin;
</style>
