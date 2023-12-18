<template>
    <AuthenticatedLayout>
        <div class="bg-main-bg-color p-8 rounded-md shadow-lg">
            <h1 class="text-xl font-semibold text-main-text-color mb-4">
                Créer un événement
            </h1>
            <form @submit.prevent="submitForm" class="space-y-6">
                <div
                    v-for="(field, index) in textFields"
                    :key="index"
                    class="flex flex-col mb-4"
                >
                    <label :for="field.id" class="text-main-text-color mb-1">{{
                        field.label
                    }}</label>
                    <input
                        :id="field.id"
                        v-model="form[field.model]"
                        :type="field.type"
                        class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color"
                    />
                </div>

                <div class="flex flex-col mb-4">
                    <label for="eventDay" class="text-main-text-color mb-1"
                        >Jour de la semaine :</label
                    >
                    <select
                        id="eventDay"
                        v-model="form.day"
                        class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color"
                    >
                        <option value="" disabled>Sélectionnez un jour</option>
                        <option
                            v-for="day in daysOfWeek"
                            :key="day"
                            :value="day"
                        >
                            {{ day }}
                        </option>
                    </select>
                </div>

                <div class="flex flex-col mb-4">
                    <label for="eventCategory" class="text-main-text-color mb-1"
                        >Catégorie :</label
                    >
                    <select
                        id="eventCategory"
                        v-model="form.category_id"
                        class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color"
                    >
                        <option value="" disabled>
                            Sélectionnez une catégorie
                        </option>
                        <option
                            v-for="category in categories"
                            :key="category.id"
                            :value="category.id"
                        >
                            {{ category.name }}
                        </option>
                    </select>
                </div>
                <div class="flex flex-col mb-4">
                    <label for="eventActive" class="text-main-text-color mb-1"
                        >Activer l'événement :</label
                    >
                    <input
                        id="eventActive"
                        v-model="form.active"
                        type="checkbox"
                        class="rounded border-gray-400 focus:border-blue-500"
                    />
                </div>
                <div>Active: {{ form.active }}</div>


                <div class="flex justify-end">
                    <button
                        type="submit"
                        class="bg-nav-bg-color text-white py-2 px-6 rounded-md hover:bg-opacity-90 focus:outline-none mr-2"
                    >
                        Créer
                    </button>
                    <button
                        type="button"
                        @click="goToDashboard"
                        class="bg-gray-300 text-black py-2 px-6 rounded-md hover:bg-gray-400 focus:outline-none"
                    >
                        Annuler
                    </button>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { ref } from "vue";
import { Inertia } from "@inertiajs/inertia";

export default {
    components: {
        AuthenticatedLayout,
    },
    props: {
        categories: Array,
    },
    setup() {
        const textFields = [
            {
                label: "Nom de l'évènement",
                model: "name",
                id: "eventName",
                type: "text",
            },
            {
                label: "Description",
                model: "description",
                id: "eventDescription",
                type: "text",
            },
            {
                label: "Superviseur",
                model: "supervisor",
                id: "eventSupervisor",
                type: "text",
            },
            // { label: "Jour", model: "day", id: "eventDay", type: "text" },
            { label: "Date", model: "date", id: "eventDate", type: "date" },
            {
                label: "Nombre de Km",
                model: "number_km",
                id: "eventNumberKm",
                type: "number",
            },
            {
                label: "Localisation",
                model: "location",
                id: "eventLocation",
                type: "text",
            },
        ];

        const form = ref({
            name: "",
            description: "",
            supervisor: "",
            day: "",
            date: "",
            number_km: "",
            location: "",
            active: false,
            category_id: "",
        });

        const daysOfWeek = [
            "Lundi",
            "Mardi",
            "Mercredi",
            "Jeudi",
            "Vendredi",
            "Samedi",
            "Dimanche",
        ];

        function submitForm() {
            Inertia.post("/events", form.value);
        }

        function goToDashboard() {
            Inertia.get("/dashboard");
        }

        return {
            textFields,
            form,
            daysOfWeek,
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
