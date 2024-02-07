<template>
    <AuthenticatedLayout>
        <div class="bg-main-bg-color p-8 rounded-md shadow-lg">
            <h1 class="text-xl font-semibold text-main-text-color mb-4">
                Modifier les prix
            </h1>
            <form @submit.prevent="submitForm" class="space-y-6">
                <ValidationErrors :errors="errors" />
                <div v-for="(guideline, index) in guidelines" :key="guideline.id"
                    class="border-b-2 border-aliceblue pb-6 mb-6">
                    <h2 class="text-xl font-semibold text-main-text-color mb-4">
                        Prix {{ index + 1 }} :
                        {{ formatGuidelineType(guideline.type) }}
                    </h2>
                    <div class="flex flex-col mb-4">
                        <input :id="'price' + index" v-model="guideline.price"
                            class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color" />
                        <p>Prix affiché: {{ guideline.formattedPrice }}</p>
                    </div>
                </div>

                <div class="flex flex-col mb-4">
                    <h2 class="text-xl font-semibold text-main-text-color mb-4">
                        Année de saison :
                    </h2>
                    <input id="season_year" v-model="seasonYear"
                        class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color" />
                </div>

                <button type="submit"
                    class="bg-nav-bg-color text-white py-2 px-6 rounded-md hover:bg-opacity-90 focus:outline-none">
                    Mettre à jour
                </button>
                <button type="button"
                    class="bg-gray-300 text-black py-2 px-6 rounded-md hover:bg-gray-400 focus:outline-none"
                    @click="goToDashboard">
                    Annuler
                </button>
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
    props: {
        guidelines: Array,
        seasonYear: Date,
        errors: Object,
    },

    setup(props) {
        const guidelines = ref(props.guidelines);
        const seasonYear = ref(props.seasonYear);

        function submitForm() {
            const updatedGuidelines = guidelines.value.map(guideline => {
                const formattedPrice = validatePrice(guideline.price);
                return {
                    ...guideline,
                    price: formattedPrice
                };
            });

            if (updatedGuidelines.every(guide => guide.price !== "0,00")) {
                Inertia.post("/guidelines/update", {
                    guidelines: updatedGuidelines,
                });
            } else {
            }
        }

        function validatePrice(price) {

            if (typeof price !== 'string') {
                price = String(price);
            }
            let cleanPrice = price.trim().replace(',', '.');
            let floatPrice = parseFloat(cleanPrice);

            if (isNaN(floatPrice) || floatPrice < 0) return "0,00";

            if (floatPrice > 99.99) floatPrice = 99.99;

            let formattedPrice = floatPrice.toFixed(2);

            if (formattedPrice.endsWith('.00')) {
                return formattedPrice.substring(0, formattedPrice.length - 3);
            }

            return formattedPrice.replace('.', ',');
        }

        function goToDashboard() {
            Inertia.get("/dashboard");
        }

        return {
            submitForm,
            seasonYear,
            goToDashboard,
        };
    },
    components: {
        AuthenticatedLayout,
        ValidationErrors,
    },
    methods: {
        formatGuidelineType(type) {
            return type.replace(/_/g, " ");
        },
    },
};
</script>

<style lang="scss" scoped>
@import "../../../css/style.scss";
@include stylesMixin;
</style>
