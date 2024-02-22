<template>
    <AuthenticatedLayout>
        <div class="bg-main-bg-color p-8 rounded-md shadow-lg">
            <h1 class="text-xl font-semibold text-main-text-color mb-4">
                Modifier la commission
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
                        <div v-for="member in members" :key="member.id" class="flex items-center mb-2">
                            <input type="checkbox" :id="'member-' + member.id" :value="member.id"
                                :checked="form.member_ids.includes(member.id)" @change="toggleMemberSelection(member.id)"
                                class="mr-2">


                            <label :for="'member-' + member.id">{{ member.firstname }} {{ member.lastname }}</label>
                        </div>

                    </div>
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
        </div>
    </AuthenticatedLayout>
</template>


<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { ref, onMounted } from "vue";
import { Inertia } from "@inertiajs/inertia";
import ValidationErrors from "@/Components/ValidationErrors.vue";

export default {
    components: {
        AuthenticatedLayout,
        ValidationErrors,
    },
    // props: ['committee', 'members', 'selectedMemberIds'],
    props: {
        committee: Object,
        members: Array,
        selectedMemberIds: Array,
        errors: Object,
    },
    setup(props) {
        console.log("Membres sélectionnés initiaux:", props.committee.member_ids);
        const form = ref({
            name: props.committee.name,
            // member_ids: props.committee.member_ids || [],
            member_ids: props.selectedMemberIds || [],
        });

        function toggleMemberSelection(memberId) {
            if (form.value.member_ids.includes(memberId)) {
                form.value.member_ids = form.value.member_ids.filter(id => id !== memberId);
            } else {
                form.value.member_ids = [...form.value.member_ids, memberId];
            }
        }


        function submitForm() {
            Inertia.put(route('organization.committees.update', props.committee.id), form.value);
        }

        function goToDashboard() {
            Inertia.get(route('dashboard'));
        }

        return {
            form,
            submitForm,
            goToDashboard,
            toggleMemberSelection,
        };
    },
};
</script>


<style lang="scss" scoped>
@import "../../../../css/style.scss";
@include stylesMixin;
</style>
