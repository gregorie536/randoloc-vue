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
                <!-- <ul>
                    <li>{{ contact.name }}</li>
                    <li>{{ contact.phone_number }}</li>
                    <li>{{ contact.email }}</li>
                </ul> -->
                <ul>
                    <li>{{ presidentContact.name }}</li>
                    <li>{{ presidentContact.phone_number }}</li>
                    <li>{{ presidentContact.email }}</li>
                </ul>
                <p class="font-bold">Adresse du site de l'association :</p>
                <ul>
                    <li>À définir</li>
                </ul>
                <p class="font-bold">Contact pour le site :</p>
                <!-- <ul>
                    <li>{{ contact.name }}</li>
                    <li>{{ contact.phone_number }}</li>
                    <li>{{ contact.email }}</li>
                </ul> -->
                <ul>
                    <li>{{ siteContact.name }}</li>
                    <li>{{ siteContact.phone_number }}</li>
                    <li>{{ siteContact.email }}</li>
                </ul>
                <!-- <div>{{ contact }}</div> -->
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
    props: {
        // contact: Object,
        presidentContact: Object,
        siteContact: Object,
    },
    data() {
        return {
            titre: "Contact",
            // presidente: {
            //     nom: "Raymonde BELLEC",
            //     telephone: "06 64 88 60 50",
            //     email: "raymondebellec@aol.com",
            // },
            // adresse: "**À définir**",
            // contactSite: {
            //     nom: "Dominique VINCENT",
            //     telephone: "06 79 58 36 50",
            //     email: "dominik.vincent@orange.fr",
            // },
        };
    },
};
</script>

<style scoped lang="scss">
@import "../../css/style.scss";
</style>
