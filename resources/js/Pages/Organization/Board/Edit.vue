<template>
    <AuthenticatedLayout>
        <div class="bg-main-bg-color p-8 rounded-md shadow-lg">
            <h1 class="text-xl font-semibold text-main-text-color mb-4">
                Modifier le membre du bureau
            </h1>
            <form @submit.prevent="submitForm" class="space-y-6">
                <ValidationErrors :errors="errors" />

                <div class="border-b-2 border-aliceblue pb-6 mb-6">
                    <div class="flex flex-col mb-4">
                        <label for="member" class="text-main-text-color mb-1">Membre pour le rôle de {{ board.role }} :</label>
                        <select id="member" v-model="form.member_id" class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color">
                            <option v-for="member in members" :key="member.id" :value="member.id">
                                {{ member.firstname }} {{ member.lastname }}
                            </option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="bg-nav-bg-color text-white py-2 px-6 rounded-md hover:bg-opacity-90 focus:outline-none">
                    Enregistrer les modifications
                </button>
                <button type="button" class="bg-gray-300 text-black py-2 px-6 rounded-md hover:bg-gray-400 focus:outline-none" @click="goToDashboard">
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
        board: Object,
        members: Array,
        errors: Object,
    },
    setup(props) {
        const form = ref({
            member_id: props.board.member_id,
        });

        function submitForm() {
            Inertia.put(route('organization.boards.update', props.board.id), form.value);
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
@include stylesMixin;
</style>
