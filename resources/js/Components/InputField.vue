<template>
    <div class="flex flex-col mb-4">
        <label :for="id" class="text-main-text-color mb-1">{{ label }}</label>
        <input :id="id" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" :type="type"
            class="p-2 rounded-md border border-aliceblue focus:outline-none focus:border-nav-bg-color" />
    </div>
</template>
  
<script>
export default {
    props: {
        label: String,
        modelValue: [String, Number],
        id: String,
        type: String,
    },
    emits: ['update:modelValue'],
};
</script>
  