<template>
    <MainLayout>
        <div class="flex justify-center items-center">
            <div>
                <h1>{{ titre }}</h1>
            </div>
        </div>
        <div class="flex justify-center items-center">
            <div class="content">
                <p class="font-bold">Président(e) de l'association :</p>
                <ul>
                    <li>{{ presidentContact.firstname }} {{ presidentContact.lastname }}</li>
                    <li>{{ formattedPresidentPhoneNumber }}</li>
                    <li>{{ presidentContact.email }}</li>
                </ul>
                <p class="font-bold">Adresse du site de l'association :</p>
                <ul>
                    <li>À définir</li>
                </ul>
                <p class="font-bold">Contact pour le site :</p>
                <ul>
                    <li>{{ siteContact.firstname }} {{ siteContact.lastname }}</li>
                    <li>{{ formattedSitePhoneNumber }}</li>
                    <li>{{ siteContact.email }}</li>
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
    props: {
        presidentContact: Object,
        siteContact: Object,
    },
    data() {
        return {
            titre: "Contact",
        };
    },
    computed: {
        formattedPresidentPhoneNumber() {
            return this.formatPhoneNumber(this.presidentContact.phone_number);
        },
        formattedSitePhoneNumber() {
            return this.formatPhoneNumber(this.siteContact.phone_number);
        }
    },
    methods: {
        formatPhoneNumber(phoneNumber) {
            if (!phoneNumber) return '';
            return phoneNumber.replace(/\D/g, '').substring(0, 10).replace(/(\d{2})(?=\d)/g, '$1 ');
        }
    }
};
</script>


<style scoped lang="scss">
@import "../../css/style.scss";
</style>
