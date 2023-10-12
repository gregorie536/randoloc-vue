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
    name: "CardBottom",
    data() {
        return {
            cardName: [
                {
                    name: "Règles et organisations",
                    link: "/guideline",
                    image: "/images/page-home/guideline.jpg",
                    alt: "Règles et organisations",
                },
                {
                    name: "Galerie photos",
                    link: "/gallery-photos",
                    image: "/images/page-home/gallery.jpg",
                    alt: "Galerie photos",
                },
                {
                    name: "Contact",
                    link: "/contact",
                    image: "/images/page-home/contact.jpg",
                    alt: "Contact",
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
