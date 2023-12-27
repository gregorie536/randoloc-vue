<template>
    <AuthenticatedLayout>
        <div class="bg-main-bg-color p-8 rounded-md shadow-lg">
            <h1 class="text-xl font-semibold text-main-text-color mb-4">
                Modifier l'info du moment
            </h1>

            <form @submit.prevent="submitForm" class="space-y-6">
                <ValidationErrors :errors="errors" />
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
                        <input
                            type="file"
                            :id="'image' + index"
                            @change="handleImageChange(index, $event)"
                            class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color"
                        />
                        <div v-if="homepageFeature.imagePreview" class="mt-2">
                            <img
                                :src="homepageFeature.imagePreview"
                                class="max-widht"
                            />
                        </div>
                    </div>

                    <div class="flex flex-col mb-4">
                        <label
                            :for="'description' + index"
                            class="text-main-text-color mb-1"
                            >Description :</label
                        >
                        <textarea
                            :id="'description' + index"
                            v-model="homepageFeature.description"
                            class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color"
                        ></textarea>
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
                            type="date"
                            class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color"
                        />
                    </div>
                </div>

                <div class="flex justify-between">
                    <button
                        type="submit"
                        class="bg-nav-bg-color text-white py-2 px-6 rounded-md hover:bg-opacity-90 focus:outline-none"
                    >
                        Mettre à jour
                    </button>
                    <button
                        type="button"
                        @click="goToDashboard"
                        class="bg-gray-300 text-black py-2 px-6 rounded-md hover:bg-gray-400 focus:outline-none"
                    >
                        Annuler
                    </button>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import { ref, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";

export default {
    components: {
        AuthenticatedLayout,
        ValidationErrors,
    },
    props: {
        homepageFeatures: Array,
        errors: Object,
    },
    setup(props) {
        const homepageFeatures = ref(
            props.homepageFeatures.map((feature) => ({
                ...feature,
                imagePreview: feature.image
                    ? "/storage/" + feature.image
                    : null,
                imageFile: null,
            }))
        );

        function handleImageChange(index, event) {
            const file = event.target.files[0];
            if (file) {
                homepageFeatures.value[index].imageFile = file;
                homepageFeatures.value[index].imagePreview =
                    URL.createObjectURL(file);
            }
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

                if (feature.imageFile) {
                    formData.append(
                        `homepageFeatures[${index}][image]`,
                        feature.imageFile
                    );
                }
            });

            Inertia.post("/homepage_features/update", formData, {
                onBefore: (visit) => {
                    visit.headers["Content-Type"] = "multipart/form-data";
                },
            });
        }

        function capitalizeFirstLetter(string) {
            if (!string || typeof string !== "string") return "";
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

        homepageFeatures.value.forEach((feature, index) => {
            watch(
                () => homepageFeatures.value[index].title,
                (newValue) => {
                    homepageFeatures.value[index].title =
                        capitalizeFirstLetter(newValue);
                }
            );

            watch(
                () => homepageFeatures.value[index].description,
                (newValue) => {
                    homepageFeatures.value[index].description =
                        capitalizeFirstLetter(newValue);
                }
            );

            watch(
                () => homepageFeatures.value[index].location,
                (newValue) => {
                    homepageFeatures.value[index].location =
                        capitalizeFirstLetter(newValue);
                }
            );
        });

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
.max-widht {
    max-width: 10rem;
}
</style>
