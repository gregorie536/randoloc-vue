<template>
    <MainLayout>
        <div class="flex justify-center items-center">
            <div>
                <h1>{{ titre }}</h1>
            </div>
        </div>
        <div class="flex justify-center items-center">
            <div class="content">
                <p class="font-bold">Présidente de l'association :</p>
                <ul>
                    <li>Raymonde BELLEC</li>
                    <li>06 64 88 60 50</li>
                    <li>raymondebellec@aol.com</li>
                </ul>
                <p class="font-bold">Adresse du site de l'association :</p>
                <ul>
                    <li>**À définir**</li>
                </ul>
                <p class="font-bold">Contact pour le site :</p>
                <ul>
                    <li>Dominique VINCENT</li>
                    <li>06 79 58 36 50</li>
                    <li>dominik.vincent@orange.fr</li>
                </ul>
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
    name: "Contact",
    data() {
        return {
            titre: "Contact",
        };
    },
};
</script>

<style scoped lang="scss">
@import "../../css/style.scss";
</style>
