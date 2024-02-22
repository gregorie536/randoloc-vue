<template>
    <AuthenticatedLayout>
        <div class="bg-main-bg-color p-8 rounded-md shadow-lg">
            <h1 class="text-xl font-semibold text-main-text-color mb-4">
                Modifier les Contacts
            </h1>
            <form @submit.prevent="submitForm" class="space-y-6">
                <ValidationErrors :errors="errors" />
                <div v-for="(contact, index) in contacts" :key="contact.id" class="border-b-2 border-aliceblue pb-6 mb-6">
                    <h2 class="text-xl font-semibold text-main-text-color mb-4">
                        Contact {{ index + 1 }} : {{ contact.type }}
                    </h2>
                    <div class="flex flex-col mb-4">
                        <label :for="'lastname' + index" class="text-main-text-color mb-1">Nom :</label>
                        <input :id="'lastname' + index" v-model="contact.lastname" @input="formatLastName(contact)" class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color" />
                    </div>
                    <div class="flex flex-col mb-4">
                        <label :for="'firstname' + index" class="text-main-text-color mb-1">Prénom :</label>
                        <input :id="'firstname' + index" v-model="contact.firstname" @input="formatFirstName(contact)" class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color" />
                    </div>
                    <div class="flex flex-col mb-4">
                        <label :for="'phone_number' + index" class="text-main-text-color mb-1">Numéro de téléphone :</label>
                        <input :id="'phone_number' + index" v-model="contact.phone_number" @input="formatPhoneNumber(contact)" class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color" />
                    </div>
                    <div class="flex flex-col mb-4">
                        <label
                            :for="'email' + index"
                            class="text-main-text-color mb-1"
                            >E-mail :</label
                        >
                        <input
                            type="email"
                            :id="'email' + index"
                            v-model="contact.email"
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
        contacts: Array,
        errors: Object,
    },
    setup(props) {
        const contacts = ref(props.contacts);

        function formatFirstName(contact) {
            contact.firstname = contact.firstname.charAt(0).toUpperCase() + contact.firstname.slice(1);
        }

        function formatLastName(contact) {
            contact.lastname = contact.lastname.toUpperCase();
        }

        function formatPhoneNumber(contact) {
            let formatted = contact.phone_number.replace(/\D/g, "").substring(0, 10);
            contact.phone_number = formatted.replace(/(\d{2})(?=\d)/g, "$1 ");
        }

        function submitForm() {
            const updatedContacts = contacts.value.map((contact) => ({
                id: contact.id,
                lastname: contact.lastname,
                firstname: contact.firstname,
                phone_number: contact.phone_number.replace(/\s/g, ""),
                email: contact.email,
            }));

            Inertia.post("/contacts/update", { contacts: updatedContacts });
        }

        function goToDashboard() {
            Inertia.get("/dashboard");
        }

        return {
            contacts,
            submitForm,
            goToDashboard,
            formatFirstName,
            formatLastName,
            formatPhoneNumber
        };
    },
};
</script>

<style lang="scss" scoped>
@import "../../../css/style.scss";
@include stylesMixin;
</style>
