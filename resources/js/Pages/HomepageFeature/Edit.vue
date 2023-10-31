<template>
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
                    <input
                        :id="'image' + index"
                        v-model="homepageFeature.image"
                        class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color"
                    />
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
        </form>
    </div>
</template>

<script>
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";

export default {
    props: {
        homepageFeatures: Array,
    },

    setup(props) {
        const homepageFeatures = ref(props.homepageFeatures);

        function submitForm() {
            const updatedHomepageFeatures = homepageFeatures.value.map(
                (homepageFeature) => {
                    return {
                        id: homepageFeature.id,
                        title: homepageFeature.title,
                        image: homepageFeature.image,
                        description: homepageFeature.description,
                        location: homepageFeature.location,
                        feature_date: homepageFeature.feature_date,
                    };
                }
            );

            Inertia.post("/homepage_features/update", {
                homepageFeatures: updatedHomepageFeatures,
            });
        }

        return {
            submitForm,
        };
    },
};
</script>

<style lang="scss" scoped>
@import "../../../css/style.scss";
@include stylesMixin;
</style>
