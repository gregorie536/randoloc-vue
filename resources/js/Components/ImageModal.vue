<template>
    <div v-if="image" class="modal-overlay" @click="closeModal">
        <div class="modal-content">
            <img :src="imageUrl" :alt="image.comment" />
        </div>
    </div>
</template>

<script>
export default {
    props: {
        image: Object,
    },
    computed: {
        imageUrl() {
            return this.image ? "/storage/" + this.image.image : "";
        },
    },
    methods: {
        closeModal() {
            this.$emit("close");
        },
    },
};
</script>

<style scoped>
.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.6);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

.modal-content img {
    max-height: 80vh;
    max-width: 90vw;
    object-fit: contain;
}

.modal-content {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
}
</style>
