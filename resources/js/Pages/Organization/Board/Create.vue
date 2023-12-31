<template>
    <AuthenticatedLayout>
        <div class="bg-main-bg-color p-8 rounded-md shadow-lg">
            <h1 class="text-xl font-semibold text-main-text-color mb-4">
                Créer un rôle dans le bureau
            </h1>
            <form @submit.prevent="submitForm" class="space-y-6">
                <ValidationErrors :errors="errors" />

                <div class="border-b-2 border-aliceblue pb-6 mb-6">
                    <div class="flex flex-col mb-4">
                        <label for="member" class="text-main-text-color mb-1">Membre :</label>
                        <select id="member" v-model="form.member_id"
                            class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color">
                            <option v-for="member in members" :key="member.id" :value="member.id">{{ member.firstname }} {{
                                member.lastname }}</option>
                        </select>
                    </div>

                    <div class="flex flex-col mb-4">
                        <label for="role" class="text-main-text-color mb-1">Rôle :</label>
                        <select id="role" v-model="form.role"
                            class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color">
                            <option v-for="role in roles" :key="role" :value="role" :disabled="takenRoles.includes(role)">
                                {{ role }}
                            </option>
                        </select>
                    </div>

                </div>

                <button type="submit"
                    class="bg-nav-bg-color text-white py-2 px-6 rounded-md hover:bg-opacity-90 focus:outline-none">
                    Créer
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
import { ref, computed } from "vue";
import { Inertia } from "@inertiajs/inertia";
import ValidationErrors from "@/Components/ValidationErrors.vue";

export default {
    components: {
        AuthenticatedLayout,
        ValidationErrors,
    },
    props: {
        members: Array,
        boards: Array,
        errors: Object,
    },
    setup(props) {
        const form = ref({
            member_id: '',
            role: ''
        });

        const roles = [
            'Présidence',
            'Vice-présidence',
            'Secrétariat',
            'Secrétariat adjoint',
            'Trésorerie',
            'Trésorerie adjointe'
        ];

        const takenRoles = computed(() => props.boards.map(board => board.role));

        function submitForm() {
            Inertia.post(route('organization.boards.store'), form.value);
        }

        function goToDashboard() {
            Inertia.get(route('dashboard'));
        }

        return {
            form,
            submitForm,
            goToDashboard,
            roles,
            takenRoles,
        };
    }
};
</script>

<style lang="scss" scoped>
@import "../../../../css/style.scss";
@include stylesMixin;
</style>
