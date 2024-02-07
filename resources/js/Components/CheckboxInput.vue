<template>
    <div class="flex items-center mb-4">
        <input type="checkbox" :id="id" :checked="checkedValue"
            @change="$emit('update:checkedValue', $event.target.checked)"
            class="rounded border-gray-400 focus:border-blue-500 mr-2" />
        <label :for="id" class="text-main-text-color">{{ label }}</label>
    </div>
</template>
  
<script>
export default {
    props: {
        id: {
            type: String,
            required: true,
        },
        label: {
            type: String,
            required: true,
        },
        checkedValue: {
            type: Boolean,
            default: false,
        },
    },
    emits: ['update:checkedValue'],
};
</script>
  