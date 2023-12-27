<template>
    <div v-if="Object.keys(processedErrors).length > 0" class="error-messages">
        <ul>
            <li v-for="(messages, field) in processedErrors" :key="field">
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
    computed: {
        processedErrors() {
            let newErrors = {};
            let foundGuidelinePriceError = false;
            let foundGuidelineSeasonYearError = false;

            let foundHomepageFeatureTitleError = false;
            let foundHomepageFeatureDescriptionError = false;
            let foundHomepageFeatureImageError = false;
            let foundHomepageFeatureLocationError = false;
            let foundHomepageFeatureDateError = false;

            let foundContactPhoneNumberError = false;
            let foundContactFirstnameError = false;
            let foundContactLastnameError = false;
            let foundContactEmailError = false;

            for (let key in this.errors) {
                if (key.startsWith("guidelines.") && key.endsWith(".price")) {
                    if (!foundGuidelinePriceError) {
                        newErrors["Prix"] = this.errors[key];
                        foundGuidelinePriceError = true;
                    }
                } else if (
                    key.startsWith("guidelines.") &&
                    key.endsWith(".season_year")
                ) {
                    if (!foundGuidelineSeasonYearError) {
                        newErrors["Année de saison"] = this.errors[key];
                        foundGuidelineSeasonYearError = true;
                    }
                } else if (
                    key.startsWith("homepageFeatures.") &&
                    key.endsWith(".title")
                ) {
                    if (!foundHomepageFeatureTitleError) {
                        newErrors["Titre"] = this.errors[key];
                        foundHomepageFeatureTitleError = true;
                    }
                } else if (
                    key.startsWith("homepageFeatures.") &&
                    key.endsWith(".description")
                ) {
                    if (!foundHomepageFeatureDescriptionError) {
                        newErrors["Description"] = this.errors[key];
                        foundHomepageFeatureDescriptionError = true;
                    }
                } else if (
                    key.startsWith("homepageFeatures.") &&
                    key.endsWith(".image")
                ) {
                    if (!foundHomepageFeatureImageError) {
                        newErrors["Image"] = this.errors[key];
                        foundHomepageFeatureImageError = true;
                    }
                } else if (
                    key.startsWith("homepageFeatures.") &&
                    key.endsWith(".location")
                ) {
                    if (!foundHomepageFeatureLocationError) {
                        newErrors["Lieu"] = this.errors[key];
                        foundHomepageFeatureLocationError = true;
                    }
                } else if (
                    key.startsWith("homepageFeatures.") &&
                    key.endsWith(".feature_date")
                ) {
                    if (!foundHomepageFeatureDateError) {
                        newErrors["Date de l'événement"] = this.errors[key];
                        foundHomepageFeatureDateError = true;
                    }
                } else if (
                    key.startsWith("contacts.") &&
                    key.endsWith(".phone_number")
                ) {
                    if (!foundContactPhoneNumberError) {
                        newErrors["Numéro de téléphone"] = this.errors[key];
                        foundContactPhoneNumberError = true;
                    }
                } else if (
                    key.startsWith("contacts.") &&
                    key.endsWith(".firstname")
                ) {
                    if (!foundContactFirstnameError) {
                        newErrors["Prénom"] = this.errors[key];
                        foundContactFirstnameError = true;
                    }
                } else if (
                    key.startsWith("contacts.") &&
                    key.endsWith(".lastname")
                ) {
                    if (!foundContactLastnameError) {
                        newErrors["Nom"] = this.errors[key];
                        foundContactLastnameError = true;
                    }
                } else if (
                    key.startsWith("contacts.") &&
                    key.endsWith(".email")
                ) {
                    if (!foundContactEmailError) {
                        newErrors["Email"] = this.errors[key];
                        foundContactEmailError = true;
                    }
                } else {
                    newErrors[key] = this.errors[key];
                }
            }

            return newErrors;
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
            return (
                fieldNames[fieldName] ||
                fieldName.replace(/_/g, " ").charAt(0).toUpperCase() +
                    fieldName.slice(1)
            );
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
