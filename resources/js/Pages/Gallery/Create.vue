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
                        v-on:change="handleImageUpload"
                        class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color"
                    />
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
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
export default {
    data() {
        return {
            image: null,
            comment: "",
            errors: [],
        };
    },
    methods: {
        handleImageUpload() {
            this.image = this.$refs.image.files[0];
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
    },
    components: {
        AuthenticatedLayout,
    },
};
</script>

<style lang="scss" scoped>
@import "../../../css/style.scss";
@include stylesMixin;
</style>
