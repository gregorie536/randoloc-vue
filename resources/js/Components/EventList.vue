<template>
    <div class="event-list">
        <div v-for="event in events" :key="event.id" class="event-item">
            <div class="event-content">
                <h3 @click="goToEvent(event.id)" class="event-title">
                    {{ event.name }}
                </h3>
                <p class="event-description">{{ event.description }}</p>
            </div>
        </div>
    </div>
</template>

<script>
import { Inertia } from '@inertiajs/inertia';
export default {
    props: {
        events: Array,
    },
    methods: {
        goToEvent(eventId) {
            Inertia.get(this.route('eventDetail', eventId));
        },
    },
};
</script>

<style scoped lang="scss">
@import "../../css/style.scss";

.event-list {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    margin-top: 20px;
    margin: 20px;
}

.event-item {
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

    .event-image-container {
        flex-shrink: 0;
        width: 100px;
        height: 100px;
        overflow: hidden;
        border-radius: 50%;

        .event-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    }

    .event-content {
        .event-title {
            margin: 0;
            font-size: 1.25rem;
            font-weight: bold;
            cursor: pointer;
            color: $main-text-color;
        }

        .event-description {
            margin-top: 0.5rem;
            color: $main-text-color;
        }
    }
}
</style>
