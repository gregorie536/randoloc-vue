<template>
    <AuthenticatedLayout>
        <h1>Page créer une catégorie</h1>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

export default {
    components: {
        AuthenticatedLayout,
    },
};
</script>

<style lang="scss" scoped>
@import "../../../css/style.scss";
@include stylesMixin;
</style>
