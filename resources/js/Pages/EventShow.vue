<template>
    <MainLayout>
        <div class="container mx-auto p-4">
            <div class="background-color rounded shadow-lg p-6">
                <h2 class="text-2xl font-bold mb-4">{{ event.name }}</h2>

                <div class="mb-4">
                    <h3 class="text-xl font-semibold">Description</h3>
                    <p>{{ event.description }}</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <h3 class="text-lg font-semibold">Lieu</h3>
                        <p>{{ event.location }}</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-semibold">Date</h3>
                        <!-- <p>{{ event.date }}</p> -->
                        {{ event.day }} {{ formatDate(event.date) }}
                    </div>
                </div>

                <div class="mb-4">
                    <h3 class="text-lg font-semibold">Meneur</h3>
                    <p>{{ event.supervisor }}</p>
                </div>

                <!-- <div class="mb-4">
                    <h3 class="text-lg font-semibold">Jour de la semaine</h3>
                    <p>{{ event.day }}</p>
                </div> -->

                <div class="mb-4">
                    <h3 class="text-lg font-semibold">Nombre de km</h3>
                    <p>{{ event.number_km }} km</p>
                </div>
            </div>
        </div>
        <div class="container mx-auto p-4">
            <button
                @click="goBack"
                class="return-button py-2 px-4 rounded hover:bg-opacity-90"
            >
                Retour
            </button>
        </div>
    </MainLayout>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import { Inertia } from "@inertiajs/inertia";

export default {
    components: {
        MainLayout,
    },
    props: {
        event: Object,
    },
    methods: {
        goBack() {
            Inertia.visit(document.referrer);
        },
        formatDate(dateString) {
            const options = { year: "numeric", month: "long", day: "numeric" };
            return new Date(dateString).toLocaleDateString("fr-FR", options);
        },
    },
};
</script>

<style scoped lang="scss">
@import "../../css/style.scss";
.background-color {
    background-color: $content-bg-color;
    h2,
    h3,
    p {
        color: $main-text-color;
    }
}

.return-button {
    background-color: $main-bg-color;
    color: $main-text-color;
    transition: background-color 0.3s ease;

    &:hover {
        background-color: darken($nav-bg-color, 10%);
    }
}
</style>
