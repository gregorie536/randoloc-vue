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
                    <!-- Titre -->
                    <div class="flex flex-col mb-4">
                        <label :for="'title' + index" class="text-main-text-color mb-1">Titre :</label>
                        <input :id="'title' + index" v-model="homepageFeature.title"
                               class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color" />
                    </div>

                    <!-- Image -->
                    <div class="flex flex-col mb-4">
                        <label :for="'image' + index" class="text-main-text-color mb-1">Image :</label>
                        <input type="file" :id="'image' + index"
                               @change="handleImageChange(index, $event)"
                               class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color" />
                        <!-- Afficher un aperçu de l'image si disponible -->
                        <div v-if="homepageFeature.imagePreview" class="mt-2">
                            <img :src="homepageFeature.imagePreview" class="max-w-xs h-auto" />
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="flex flex-col mb-4">
                        <label :for="'description' + index" class="text-main-text-color mb-1">Description :</label>
                        <textarea :id="'description' + index" v-model="homepageFeature.description"
                                  class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color"></textarea>
                    </div>

                    <!-- Lieu -->
                    <div class="flex flex-col mb-4">
                        <label :for="'location' + index" class="text-main-text-color mb-1">Lieu :</label>
                        <input :id="'location' + index" v-model="homepageFeature.location"
                               class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color" />
                    </div>

                    <!-- Date -->
                    <div class="flex flex-col mb-4">
                        <label :for="'feature_date' + index" class="text-main-text-color mb-1">Date :</label>
                        <input :id="'feature_date' + index" v-model="homepageFeature.feature_date"
                               type="date"
                               class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color" />
                    </div>
                </div>

                <!-- Boutons -->
                <div class="flex justify-between">
                    <button type="submit"
                            class="bg-nav-bg-color text-white py-2 px-6 rounded-md hover:bg-opacity-90 focus:outline-none">
                        Mettre à jour
                    </button>
                    <button type="button"
                            @click="goToDashboard"
                            class="bg-gray-500 text-white py-2 px-6 rounded-md hover:bg-opacity-90 focus:outline-none">
                        Retour au tableau de bord
                    </button>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

export default {
    components: {
        AuthenticatedLayout,
    },
    props: {
        homepageFeatures: Array,
    },
    setup(props) {
        const homepageFeatures = ref(props.homepageFeatures.map(feature => ({
            ...feature,
            imagePreview: feature.image ? '/storage/' + feature.image : null,
            imageFile: null
        })));

        function handleImageChange(index, event) {
            const file = event.target.files[0];
            if (file) {
                homepageFeatures.value[index].imageFile = file;
                homepageFeatures.value[index].imagePreview = URL.createObjectURL(file);
            }
        }

        function submitForm() {
            const formData = new FormData();
            homepageFeatures.value.forEach((feature, index) => {
                formData.append(`homepageFeatures[${index}][id]`, feature.id);
                formData.append(`homepageFeatures[${index}][title]`, feature.title);
                formData.append(`homepageFeatures[${index}][description]`, feature.description);
                formData.append(`homepageFeatures[${index}][location]`, feature.location);
                formData.append(`homepageFeatures[${index}][feature_date]`, feature.feature_date);

                if (feature.imageFile) {
                    formData.append(`homepageFeatures[${index}][image]`, feature.imageFile);
                }
            });

            Inertia.post("/homepage_features/update", formData, {
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
};
</script>

<style lang="scss" scoped>
@import "../../../css/style.scss";
@include stylesMixin;
</style>

