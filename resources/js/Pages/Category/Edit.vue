<template>
    <AuthenticatedLayout>
        <div class="bg-main-bg-color p-8 rounded-md shadow-lg">
            <h1 class="text-xl font-semibold text-main-text-color mb-4">
                Modifier une catégorie
            </h1>
            <form @submit.prevent="submitForm" class="space-y-6">
                <ValidationErrors :errors="errors" />
                <div class="border-b-2 border-aliceblue pb-6 mb-6">
                    <div class="flex flex-col mb-4">
                        <label
                            for="categoryName"
                            class="text-main-text-color mb-1"
                            >Nom de la catégorie :</label
                        >
                        <input
                            id="categoryName"
                            v-model="form.name"
                            type="text"
                            class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color"
                        />
                    </div>
                </div>

                <button
                    type="submit"
                    class="bg-nav-bg-color text-white py-2 px-6 rounded-md hover:bg-opacity-90 focus:outline-none"
                >
                    Enregistrer les modifications
                </button>

                <button
                    type="button"
                    class="bg-gray-300 text-black py-2 px-6 rounded-md hover:bg-gray-400 focus:outline-none"
                    @click="goToDashboard"
                >
                    Annuler
                </button>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import { ref, onMounted, watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";

export default {
    components: {
        AuthenticatedLayout,
        ValidationErrors,
    },
    props: {
        category: Object,
        errors: Object,
    },
    setup(props) {
        const form = ref({
            name: props.category.name || "",
        });

        function capitalizeFirstLetter(string) {
            if (!string || typeof string !== "string") return "";
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

        watch(
            () => form.value.name,
            (newValue) => {
                form.value.name = capitalizeFirstLetter(newValue);
            }
        );

        function submitForm() {
            Inertia.put(`/categories/${props.category.id}`, form.value);
        }

        function goToDashboard() {
            Inertia.get("/dashboard");
        }

        return {
            form,
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
