<script setup>
import { onMounted, ref } from 'vue';
import api from '../../api';

const message = ref('');

const fetchData = async () => {
    try {
        const response = await api.getEvents()
        console.log('Data fetched successfully:', response);
        return response.data;
    } catch (error) {
        console.error('Error fetching data:', error);
        return { message: 'Error fetching data' };
    }
}

onMounted(async () => {
    const data = await fetchData();
    message.value = data.message || 'No message available';
});


</script>

<template>
    <div>
        <h1>{{ message }}</h1>
        <p>This is a test page.</p>
    </div>
</template>

