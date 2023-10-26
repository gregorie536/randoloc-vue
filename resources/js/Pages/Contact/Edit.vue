<template>
    <div class="bg-main-bg-color p-8 rounded-md shadow-lg">
        <form @submit.prevent="submitForm" class="space-y-6">
            <div v-for="(contact, index) in contacts" :key="contact.id" class="border-b-2 border-aliceblue pb-6 mb-6">
                <h2 class="text-xl font-semibold text-main-text-color mb-4">Contact {{ index + 1 }} : {{ contact.type }}</h2>
                
                <div class="flex flex-col mb-4">
                    <label :for="'name' + index" class="text-main-text-color mb-1">Nom et prénom :</label>
                    <input :id="'name' + index" v-model="contact.name" class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color">
                </div>

                <div class="flex flex-col mb-4">
                    <label :for="'phone_number' + index" class="text-main-text-color mb-1">Numéro de téléphone :</label>
                    <input :id="'phone_number' + index" v-model="contact.phone_number" class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color">
                </div>

                <div class="flex flex-col mb-4">
                    <label :for="'email' + index" class="text-main-text-color mb-1">E-mail :</label>
                    <input type="email" :id="'email' + index" v-model="contact.email" class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color">
                </div>
            </div>

            <button type="submit" class="bg-nav-bg-color text-white py-2 px-6 rounded-md hover:bg-opacity-90 focus:outline-none">Mettre à jour</button>
        </form>
    </div>
</template>

<script>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';

export default {
    props: {
        contacts: Array,
    },

    setup(props) {
        const contacts = ref(props.contacts);

        function submitForm() {
            const updatedContacts = contacts.value.map(contact => {
                return {
                    id: contact.id,
                    name: contact.name,
                    phone_number: contact.phone_number,
                    email: contact.email,
                };
            });

            Inertia.post('/contacts/update', { contacts: updatedContacts });
        }

        return {
            submitForm,
        };
    }
}
</script>

<style scoped>

.bg-main-bg-color {
    background-color: rgba(200, 173, 127, 0.7);
}

.text-main-text-color {
    color: #223663;
}

.border-aliceblue {
    border-color: #F0F8FF;
}

.bg-nav-bg-color {
    background-color: #C8AD7F;
}

/* Ajoutez ici vos autres styles si nécessaire */
</style>
