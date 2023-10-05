
<template>
    <MainLayout>
        <div class="flex justify-center items-center">
            <div>
                <h1>{{ titre }}</h1>
            </div>
        </div>
        
    </MainLayout>
</template>

<script>
import MainLayout from '@/Layouts/MainLayout.vue';
export default {
    components: {
        MainLayout,
    },
    name: "GalleryPhotos",
    data() {
        return {
            titre: "Galerie photos",
        };
    },
};
</script>

<style scoped lang="scss">
@import "../../css/style.scss";
</style>
