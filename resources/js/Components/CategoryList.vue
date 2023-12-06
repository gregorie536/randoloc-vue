<template>
    <div class="category-list">
        <div
            v-for="category in categories"
            :key="category.id"
            class="category-item"
        >
            <div class="category-content">
                <h3 @click="goToCategory(category.id)" class="category-title">
                    {{ category.name }}
                </h3>
            </div>
        </div>
    </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';
export default {
    props: {
        categories: Array,
    },
    methods: {
        goToCategory(categoryId) {
            Inertia.get(this.route('categoryDetail', categoryId));
        },
    },
};
</script>

<style scoped lang="scss">
@import "../../css/style.scss";

.category-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    margin-top: 20px;
    margin: 20px;
}

.category-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    border-radius: 0.5rem;
    background-color: $content-bg-color;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;

    &:hover {
        transform: translateY(-5px);
    }

    .category-content {
        .category-title {
            margin: 0;
            font-size: 1.25rem;
            font-weight: bold;
            cursor: pointer;
            color: $main-text-color;
        }

        .category-description {
            margin-top: 0.5rem;
            color: $main-text-color;
        }
    }
}
</style>
