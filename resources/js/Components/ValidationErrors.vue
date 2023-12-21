<template>
    <div v-if="Object.keys(errors).length > 0" class="error-messages">
        <ul>
            <li v-for="(messages, field) in errors" :key="field">
                <strong v-if="humanizeFieldName(field)"
                    >{{ humanizeFieldName(field) }} :</strong
                >
                <ul>
                    <li
                        v-for="message in Array.isArray(messages)
                            ? messages
                            : [messages]"
                        :key="message"
                    >
                        {{ message }}
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: {
        errors: {
            type: Object,
            default: () => ({}),
        },
    },
    methods: {
        humanizeFieldName(fieldName) {
            const fieldNames = {
                phone_number: "Numéro de téléphone",
                name: "Nom",
                email: "Email",
                description: "Description",
                supervisor: "Meneur",
                day: "Jour",
                date: "Date",
                number_km: "Nombre de Km",
                location: "Lieu",
                category_id: "Catégorie",
                image: "Image",
                comment: "Commentaire",
                price: "Prix",
                type: "Type",
                season_year: "Année de saison",
                title: "Titre",
                feature_date: "Date de l'événement",
            };
            return fieldNames[fieldName] || fieldName;
        },
    },
};
</script>

<style scoped lang="scss">
@import "../../css/style.scss";
.error-messages {
    color: $error;
    margin-bottom: 1rem;
    padding: 1rem;
    border: $border-error;
    background-color: $background-color-error;
    border-radius: 5px;
}

.error-messages ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.error-messages li {
    margin-bottom: 0.5rem;
}
</style>
