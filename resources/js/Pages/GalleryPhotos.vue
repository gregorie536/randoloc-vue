<template>
    <MainLayout>
        <div class="flex justify-center items-center">
            <div>
                <h1>{{ titre }}</h1>
            </div>
        </div>
        <div class="flex flex-wrap">
            <div
                class="max-w-sm rounded-card overflow-hidden shadow-lg m-2"
                v-for="image in galleries"
                :key="image.id"
            >
                <div class="image-container">
                    <img
                        :src="'/storage/' + image.image"
                        :alt="image.comment"
                    />
                </div>
            </div>
        </div>
    </MainLayout>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";

export default {
    components: {
        MainLayout,
    },
    name: "GalleryPhotos",
    props: {
        galleries: Array,
    },
    data() {
        return {
            titre: "Galerie photos",
        };
    },
};
</script>

<style scoped lang="scss">
@import "../../css/style.scss";

.rounded-card {
    @include rounded-card;
}

</style>
