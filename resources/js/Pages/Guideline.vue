
<template>
    <MainLayout>
        <div class="flex justify-center items-center">
            <div>
                <h1>{{ titre }}</h1>
            </div>
        </div>
        <div class="flex justify-center items-center">
            <div class="content">
                
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
    name: "Guideline",
    data() {
        return {
            titre: "Règles et organisations",
        };
    },
};
</script>

<style scoped lang="scss">
@import "../../css/style.scss";
</style>
