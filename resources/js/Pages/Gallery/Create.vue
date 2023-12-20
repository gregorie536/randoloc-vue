<template>
    <AuthenticatedLayout>
        <div class="bg-main-bg-color p-8 rounded-md shadow-lg">
            <h1 class="text-xl font-semibold text-main-text-color mb-4">
                Ajouter une nouvelle image
            </h1>

            <form @submit.prevent="submitForm" class="space-y-6">
                <div
                    v-if="errors.length"
                    class="border-b-2 border-aliceblue pb-6 mb-6"
                >
                    <ul class="list-disc list-inside text-red-600">
                        <li v-for="error in errors" :key="error">
                            {{ error }}
                        </li>
                    </ul>
                </div>
                <div class="flex flex-col mb-4">
                    <label for="image" class="text-main-text-color mb-1"
                        >Image :</label
                    >
                    <input
                        type="file"
                        id="image"
                        ref="image"
                        @change="handleImageUpload"
                        class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color"
                    />
                    <div v-if="imagePreview" class="mt-2">
                        <img :src="imagePreview" class="max-width" />
                    </div>
                </div>
                <div class="flex flex-col mb-4">
                    <label for="comment" class="text-main-text-color mb-1"
                        >Commentaire :</label
                    >
                    <textarea
                        id="comment"
                        v-model="comment"
                        class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color"
                    ></textarea>
                </div>

                <button
                    type="submit"
                    class="bg-nav-bg-color text-white py-2 px-6 rounded-md hover:bg-opacity-90 focus:outline-none"
                >
                    Ajouter
                </button>
                <button
                    type="button"
                    class="bg-gray-300 text-black py-2 px-6 rounded-md hover:bg-gray-400 focus:outline-none"
                    @click="goToDashboard"
                >
                    Annuler
                </button>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Inertia } from "@inertiajs/inertia";
export default {
    data() {
        return {
            image: null,
            imagePreview: null,
            comment: "",
            errors: [],
        };
    },

    methods: {
        handleImageUpload(event) {
            const file = event.target.files[0];
            if (file) {
                this.image = file;
                this.imagePreview = URL.createObjectURL(file);
            }
        },
        async submitForm() {
            const formData = new FormData();
            formData.append("image", this.image);
            formData.append("comment", this.comment);

            try {
                await this.$inertia.post("/gallery", formData);
            } catch (e) {
                if (e.response && e.response.data && e.response.data.errors) {
                    this.errors = e.response.data.errors;
                }
            }
        },
        goToDashboard() {
            Inertia.get("/dashboard");
        },
    },
    components: {
        AuthenticatedLayout,
    },
};
</script>

<style lang="scss" scoped>
@import "../../../css/style.scss";
@include stylesMixin;
.max-width {
    max-width: 10rem;
}
</style>
