<template>
    <AuthenticatedLayout>
        <div class="bg-main-bg-color p-8 rounded-md shadow-lg">
            <h1 class="text-xl font-semibold text-main-text-color mb-4">
                Modifier une Catégorie
            </h1>
            <form @submit.prevent="submitForm" class="space-y-6">
                <div class="border-b-2 border-aliceblue pb-6 mb-6">
                    <div class="flex flex-col mb-4">
                        <label for="categoryName" class="text-main-text-color mb-1">Nom de la catégorie :</label>
                        <input id="categoryName" v-model="form.name" type="text" class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color" />
                    </div>
                </div>

                <button type="submit" class="bg-nav-bg-color text-white py-2 px-6 rounded-md hover:bg-opacity-90 focus:outline-none">
                    Enregistrer les modifications
                </button>
                
                <button type="button" class="bg-nav-bg-color text-white py-2 px-6 rounded-md hover:bg-opacity-90 focus:outline-none" @click="goToDashboard">
                    Retour au tableau de bord
                </button>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import { ref, onMounted } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
    components: {
        AuthenticatedLayout,
    },
    props: {
        category: Object, // Recevoir les données de la catégorie à modifier
    },
    setup(props) {
        const form = ref({
            name: props.category.name || '',
            // Ajouter d'autres champs si nécessaire
        });

        function submitForm() {
            Inertia.put(`/categories/${props.category.id}`, form.value); // Assurez-vous que cette URL est correcte
        }

        function goToDashboard() {
            Inertia.get('/dashboard');
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
