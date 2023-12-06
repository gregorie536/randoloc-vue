<template>
    <MainLayout>
        <div class="container mx-auto p-4">
            <div class="bg-main-bg-color rounded shadow-lg p-6 mb-6">
                <h2 class="text-2xl font-bold mb-4 text-main-text-color">
                    {{ category.name }}
                </h2>
            </div>

            <div class="bg-main-bg-color rounded shadow-lg p-6">
                <h3 class="text-xl font-bold mb-4 text-main-text-color">
                    Événements de cette Catégorie
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div
                        v-for="event in categoryEvents"
                        :key="event.id"
                        class="event-card bg-white p-4 rounded shadow"
                        @click="viewEventDetail(event.id)"
                    >
                        <h4 class="text-lg font-semibold">{{ event.name }}</h4>
                        <p>{{ event.description }}</p>
                    </div>
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
        category: Object,
        categoryEvents: Array,
    },
    methods: {
        viewEventDetail(eventId) {
            Inertia.get(this.route("eventDetail", eventId));
        },
        // goBack() {
        //     Inertia.visit(document.referrer);
        // },
        goBack() {
            Inertia.get(this.route("event"));
        },
    },
};
</script>

<style scoped lang="scss">
@import "../../css/style.scss";

.bg-main-bg-color {
    background-color: $content-bg-color;
    h2,
    h3,
    h4,
    p {
        color: $main-text-color;
    }
}

.event-card {
    background-color: white;
    border-radius: 0.5rem;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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
