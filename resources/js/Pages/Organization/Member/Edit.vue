<template>
    <AuthenticatedLayout>
        <div class="bg-main-bg-color p-8 rounded-md shadow-lg">
            <h1 class="text-xl font-semibold text-main-text-color mb-4">
                Modifier un Membre
            </h1>
            <form @submit.prevent="submitForm" class="space-y-6">
                <ValidationErrors :errors="errors" />
                <div class="border-b-2 border-aliceblue pb-6 mb-6">
                    <div class="flex flex-col mb-4">
                        <label for="firstName" class="text-main-text-color mb-1">Prénom :</label>
                        <input id="firstName" v-model="form.firstname" @input="formatFirstName" type="text" class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color" />
                    </div>
                    <div class="flex flex-col mb-4">
                        <label for="lastName" class="text-main-text-color mb-1">Nom :</label>
                        <input id="lastName" v-model="form.lastname" @input="formatLastName" type="text" class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color" />
                    </div>
                </div>

                <button
                    type="submit"
                    class="bg-nav-bg-color text-white py-2 px-6 rounded-md hover:bg-opacity-90 focus:outline-none"
                >
                    Mettre à jour
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
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import ValidationErrors from "@/Components/ValidationErrors.vue";

export default {
    components: {
        AuthenticatedLayout,
        ValidationErrors,
    },
    props: {
        member: Object,
        errors: Object,
    },
    setup(props) {
        const form = ref({
            firstname: props.member.firstname,
            lastname: props.member.lastname,
        });

        const formatFirstName = () => {
            form.value.firstname = form.value.firstname.charAt(0).toUpperCase() + form.value.firstname.slice(1);
        };

        const formatLastName = () => {
            form.value.lastname = form.value.lastname.toUpperCase();
        };

        function submitForm() {
            Inertia.put(route("organization.members.update", props.member.id), form.value);
        }

        function goToDashboard() {
            Inertia.get("/dashboard");
        }

        return {
            form,
            submitForm,
            goToDashboard,
            formatFirstName,
            formatLastName
        };
    },
};
</script>

<style lang="scss" scoped>
@import "../../../../css/style.scss";
@include stylesMixin;
</style>
