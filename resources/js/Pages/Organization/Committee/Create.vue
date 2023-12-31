<template>
    <AuthenticatedLayout>
        <div class="bg-main-bg-color p-8 rounded-md shadow-lg">
            <h1 class="text-xl font-semibold text-main-text-color mb-4">
                Créer une commission
            </h1>
            <form @submit.prevent="submitForm" class="space-y-6">
                <ValidationErrors :errors="errors" />

                <div class="border-b-2 border-aliceblue pb-6 mb-6">
                    <div class="flex flex-col mb-4">
                        <label for="name" class="text-main-text-color mb-1">Nom de la commission :</label>
                        <input id="name" v-model="form.name" type="text"
                            class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color">
                    </div>

                    <div class="flex flex-col mb-4">
                        <label class="text-main-text-color mb-1">Membres de la commission :</label>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-2">
                            <div v-for="member in members" :key="member.id" class="flex items-center mb-2">
                                <input type="checkbox" :id="'member-' + member.id" :value="member.id"
                                    v-model="form.member_ids" class="mr-2">
                                <label :for="'member-' + member.id">{{ member.firstname }} {{ member.lastname }}</label>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit"
                    class="bg-nav-bg-color text-white py-2 px-6 rounded-md hover:bg-opacity-90 focus:outline-none">
                    Créer la commission
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
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import ValidationErrors from "@/Components/ValidationErrors.vue";

export default {
    components: {
        AuthenticatedLayout,
        ValidationErrors,
    },
    props: {
        members: Array,
        errors: Object,
    },
    setup() {
        const form = ref({
            name: '',
            member_ids: []
        });

        function submitForm() {
            Inertia.post(route('organization.committees.store'), form.value);
        }

        function goToDashboard() {
            Inertia.get(route('dashboard'));
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
@import "../../../../css/style.scss";
@include stylesMixin;</style>