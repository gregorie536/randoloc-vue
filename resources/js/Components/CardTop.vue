<template>
    <div class="flex-direction-row-desktop">
        <div
            class="max-w-sm rounded-card overflow-hidden shadow-lg"
            v-for="(card, index) in cardName"
            :key="index"
        >
            <!-- @click.prevent pour L'info du moment -->
            <a
                v-if="card.name === 'L\'info du moment'"
                @click.prevent="openModal(card)"
                class="text-blue-500"
            >
                <img :src="card.image" :alt="card.alt" class="w-full" />
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2 text-center">
                        <span class="main-text-color">{{ card.name }}</span>
                    </div>
                    <div class="text-center"></div>
                </div>
            </a>
            <!-- :href pour toutes les autres cartes -->
            <a v-else :href="card.link" class="text-blue-500">
                <img :src="card.image" :alt="card.alt" class="w-full" />
                <div class="px-6 py-4">
                    <div class="font-bold text-xl mb-2 text-center">
                        <span class="main-text-color">{{ card.name }}</span>
                    </div>
                    <div class="text-center"></div>
                </div>
            </a>
        </div>
    </div>
    <modal-home
        :isModalOpen="isModalOpen"
        :modalContent="homepageFeatures[0]"
        @close="closeModal"
    />
</template>

<script>
import ModalHome from "@/Components/ModalHome.vue";
export default {
    name: "CardTop",
    props: {
        homepageFeatures: Array,
    },
    components: {
        ModalHome,
    },

    data() {
        return {
            cardName: [
                {
                    name: "Sorties et séjours",
                    link: "/event",
                    image: "/images/page-home/event.jpg",
                    alt: "Sorties et séjours",
                },
                {
                    // name: "L'info du moment",
                    // link: "/sorties-et-sejours",
                    // image: "/images/page-home/info.jpg",
                    // alt: "L'info du moment",
                    name: "L'info du moment",
                    // Ajoutez les propriétés attendues par le modal ici
                    // title: "Titre de l'info du moment",

                    description: "Description de l'info du moment",
                    location: "Lieu de l'info du moment",
                    feature_date: "Date de l'info du moment",
                    image: "/images/page-home/info.jpg",
                    alt: "L'info du moment",
                },
                {
                    name: "Association",
                    link: "/organization",
                    image: "/images/page-home/organization.jpg",
                    alt: "Association",
                },
            ],
            isModalOpen: false,
            modalContent: null,
        };
    },
    methods: {
        openModal(card) {
            // this.isModalOpen = true;
            // this.modalContent = card;
            this.isModalOpen = true;
            this.modalContent = {
                title: card.title,
                description: card.description,
                location: card.location,
                feature_date: card.feature_date,
                // image: card.image,
                image: '/storage/' + card.image,
            };
        },
        closeModal() {
            this.isModalOpen = false;
            this.modalContent = null;
        },
    },
};
</script>

<style scoped lang="scss">
@import "../../css/style.scss";

.rounded-card {
    @include rounded-card;
}

@media screen and (min-width: 1025px) {
    @include flex-and-rounded-card;
}
</style>
