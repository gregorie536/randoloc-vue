<template>
    <MainLayout>
        <div class="flex justify-center items-center">
            <div>
                <h1>{{ titre }}</h1>
            </div>
        </div>
        <div class="flex flex-wrap">
            <div
                class="max-w-sm rounded-card overflow-hidden"
                v-for="image in galleries"
                :key="image.id"
                @click="selectedImage = image"
            >
                <div class="image-container">
                    <img
                        :src="'/storage/' + image.image"
                        :alt="image.comment"
                    />
                </div>
                <div class="image-comment text-center">
                    {{ image.comment }}
                </div>
            </div>
        </div>
        <ImageModal :image="selectedImage" @close="selectedImage = null" />
    </MainLayout>
</template>

<script>
import MainLayout from "@/Layouts/MainLayout.vue";
import ImageModal from "@/Components/ImageModal.vue";

export default {
    components: {
        MainLayout,
        ImageModal,
    },
    name: "GalleryPhotos",
    props: {
        galleries: Array,
    },
    data() {
        return {
            titre: "Galerie photos",
            selectedImage: null,
        };
    },
};
</script>

<style scoped lang="scss">
@import "../../css/style.scss";

.rounded-card {
    @include rounded-card;
    background-color: $nav-bg-color;
}

.flex-wrap {
    justify-content: center;
}

h1 {
    margin-bottom: 20px;
}

.image-container {
    height: 200px;
    overflow: hidden;
    img {
        height: 100%;
        width: 100%;
        object-fit: cover;
    }
}

.rounded-card {
    flex: 0 0 calc(33.333% - 10px);
    margin: 5px;
}

@media (max-width: 1024px) {
    .rounded-card {
        flex: 0 0 calc(50% - 10px);
    }
}

@media (max-width: 768px) {
    .rounded-card {
        flex: 0 0 calc(100% - 10px);
    }
}

.image-comment {
    font-size: 0.9em;
    color: $main-text-color;
    padding: 8px;
    text-align: center;
}
</style>
