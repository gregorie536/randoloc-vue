<template>
    <AuthenticatedLayout>
        <div class="bg-main-bg-color p-8 rounded-md shadow-lg">
            <h1 class="text-xl font-semibold text-main-text-color mb-4">
                Modifier l'image
            </h1>
            <form @submit.prevent="submitForm">
                <div class="flex flex-col mb-4">
                    <label for="image" class="text-main-text-color mb-1">Nouvelle image :</label>
                    <input type="file" id="image" ref="image" @change="handleImageUpload" class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color" />
                </div>
                <div class="flex flex-col mb-4">
                    <label for="comment" class="text-main-text-color mb-1">Commentaire :</label>
                    <textarea id="comment" v-model="form.comment" class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color"></textarea>
                </div>
                <button type="submit" class="bg-nav-bg-color text-white py-2 px-6 rounded-md hover:bg-opacity-90 focus:outline-none">Mettre à jour</button>
            </form>
        </div>
    </AuthenticatedLayout>
</template>

<script>
import { ref } from 'vue';
import { Inertia } from '@inertiajs/inertia';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';

export default {
    components: {
        AuthenticatedLayout,
    },
    props: {
        gallery: Object,
    },
    setup(props) {
        const form = ref({
            comment: props.gallery.comment,
            image: null,
        });

        const handleImageUpload = (event) => {
            form.value.image = event.target.files[0];
        };

        const submitForm = () => {
            let formData = new FormData();
            if (form.value.image) {
                formData.append('image', form.value.image);
            }
            formData.append('comment', form.value.comment);
            formData.append('_method', 'PUT');

            Inertia.post(route('gallery.update', props.gallery.id), formData, {
                onSuccess: () => {
                    form.value.image = null;
                },
            });
        };

        return {
            form,
            submitForm,
            handleImageUpload,
        };
    },
};
</script>

<style lang="scss" scoped>
@import '../../../css/style.scss';
@include stylesMixin;
</style>
