<template>
    <div class="flex-direction-row-desktop">
        <div
            class="max-w-sm rounded-card overflow-hidden shadow-lg"
            v-for="(card, index) in cardName"
            :key="index"
        >
            <a :href="card.link" class="text-blue-500">
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
</template>

<script>
export default {
    name: "CardTop",
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
                    name: "L'info du moment",
                    link: "/sorties-et-sejours",
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
        };
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
