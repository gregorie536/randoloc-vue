<template>
    <AuthenticatedLayout>
        <div class="bg-main-bg-color p-8 rounded-md shadow-lg">
            <h1 class="text-xl font-semibold text-main-text-color mb-4">Modifier les Membres du Conseil</h1>
            <form @submit.prevent="submitForm" v-if="members.length > 0">
                <div v-for="member in members" :key="member.id" class="flex items-center mb-2">
                    <input type="checkbox" :id="'member-' + member.id" :value="member.id" v-model="selectedMembers">
                    <label :for="'member-' + member.id">{{ member.firstname }} {{ member.lastname }}</label>
                </div>
                <button type="submit"
                    class="bg-nav-bg-color text-white py-2 px-6 rounded-md hover:bg-opacity-90 focus:outline-none">
                    Enregistrer les modifications
                </button>
                <button type="button"
                    class="bg-gray-300 text-black py-2 px-6 rounded-md hover:bg-gray-400 focus:outline-none"
                    @click="goToDashboard">
                    Annuler
                </button>
            </form>

            <div v-else>
                Aucun membre à afficher.
            </div>
        </div>
    </AuthenticatedLayout>
</template>

  
<script>
import { ref } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Inertia } from '@inertiajs/inertia';

export default {
    components: {
        AuthenticatedLayout,

    },
    props: {
        members: Array,
        currentBoardMemberIds: Array,
        errors: Object,
    },
    setup(props) {
        const selectedMembers = ref(props.currentBoardMemberIds);

        const submitForm = () => {
            Inertia.post('/organization/boards/update-members', { member_ids: selectedMembers.value });
        };

        function goToDashboard() {
            Inertia.get("/dashboard");
        }

        return {
            selectedMembers,
            submitForm,
            goToDashboard
        };
    },
};
</script>
  
<style lang="scss" scoped>
@import "../../../../css/style.scss";
@include stylesMixin;
</style>