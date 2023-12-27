<template>
    <div v-if="isModalOpen" class="modal-overlay">
        <div class="modal-container">
            <h2 class="modal-title">{{ modalContent.title }}</h2>

            <img
                v-if="modalContent.image"
                :src="imageUrl(modalContent.image)"
                alt="Image"
                class="modal-image"
            />

            <p class="modal-description">
                Description : {{ modalContent.description }}
            </p>

            <p class="modal-location">Lieu : {{ modalContent.location }}</p>

            <p class="modal-feature-date">

                Date : {{ formatDate(modalContent.feature_date) }}
            </p>

            <button @click="closeModal" class="modal-close-btn">Fermer</button>
        </div>
    </div>
</template>

<script>
export default {
    name: "Modal",
    props: {
        isModalOpen: {
            type: Boolean,
            default: false,
        },
        modalContent: {
            type: Object,
            default: () => ({}),
        },
    },
    methods: {
        closeModal() {
            this.$emit("close");
        },
        imageUrl(imagePath) {

            return `${window.location.origin}/storage/${imagePath}`;
        },
        formatDate(dateString) {
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            return new Date(dateString).toLocaleDateString('fr-FR', options);
        }
    },
};
</script>

<style scoped lang="scss">
@import "../../css/style.scss";

.modal-overlay {
    @apply fixed inset-0 flex justify-center items-center z-50 px-4 py-6 sm:px-0;
    background-color: rgba($main-text-color, 0.8);
}

.modal-container {
    @apply bg-white p-5 rounded-lg shadow-lg mx-4 my-8;
    max-width: $content-width;
}

.modal-title {
    @apply text-xl font-bold mb-4;
    color: $main-text-color;
}

.modal-content {
    @apply mb-4;
}

.modal-close-btn {
    @apply py-2 px-4 rounded font-bold;
    background-color: $nav-bg-color;
    color: $aliceblue;
    &:hover {
        background-color: darken($nav-bg-color, 10%);
    }
}

.modal-image {
    @apply max-w-full h-auto mb-4;
}
</style>
