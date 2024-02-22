<template>
    <div class="flex flex-col mb-4">
        <label :for="id" class="text-main-text-color mb-1">{{ label }}</label>
        <select :id="id" :value="modelValue" @change="$emit('update:modelValue', $event.target.value)"
            class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color">
            <option value="" disabled>{{ placeholder }}</option>
            <option v-for="option in options" :key="option[optionKey]" :value="option[optionKey]">
                {{ option[optionText] }}
            </option>
        </select>
    </div>
</template>
  
<script>
export default {
    props: {
        label: String,
        modelValue: [String, Number],
        options: Array,
        placeholder: String,
        id: String,
        optionKey: {
            type: String,
            default: 'value'
        },
        optionText: {
            type: String,
            default: 'text'
        },
    },
    emits: ['update:modelValue'],
};
</script>
  