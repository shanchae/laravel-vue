<script setup>
import { onMounted, ref } from 'vue';
import api from '../../api';
import Button from 'primevue/button';
import InputText from 'primevue/inputtext';
import Toast from 'primevue/toast'
import DatePicker from 'primevue/datepicker';
import Textarea from 'primevue/textarea';
import { useToast } from 'primevue/usetoast';

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


const toast = useToast();

const resolver = ({ values }) => {
    const errors = {};

    if (!values.username) {
        errors.username = [{ message: 'Username is required.' }];
    }

    if (!values.name) {
        errors.firstName = [{ message: 'First name is required.' }];
    }

    if (!values.surname) {
        errors.lastName = [{ message: 'Last name is required.' }];
    }

    return {
        errors
    };
};

const eventForm = ref({
    event: '',
    description: '',
    venue: '',
    start_time: null,
    end_time: null
});

const onFormSubmit = async () => {
    try {
        const formData = {
            name: eventForm.value.event,
            description: eventForm.value.description,
            venue_id: eventForm.value.venue,
            organizer_id: 1, // Assuming a static organizer ID for this example
            start_time: eventForm.value.start_time,
            end_time: eventForm.value.end_time,
            banner_img: 'test' // Assuming no banner image for this example
        };

        const response = await api.createEvent(formData);
        console.log('Form submitted successfully:', response);


    } catch (error) {
        console.error('Error during form submission:', error);
        toast.add({ severity: 'error', summary: 'Error', detail: 'Form submission failed', life: 3000 });
    }
}


</script>

<template>
    <div>
        <h1>{{ message }}</h1>
        <p>This is a test page.</p>
    </div>
    <Toast />
    <div>

        <form @submit.prevent="onFormSubmit" class="flex flex-col gap-4 w-full sm:w-56">
            <div class="flex flex-col gap-1">
                <InputText v-model="eventForm.event" name="event" type="text" placeholder="Name of Event" />
                <!-- <Message v-if="!initialValues.username" severity="error" size="small" variant="simple">
                </Message> -->
            </div>
            <div class="flex flex-col gap-1">
                <Textarea v-model="eventForm.description" placeholder="Description of Event" />
            </div>
            <div class="flex flex-col gap-1">
                <InputText v-model="eventForm.venue" name="venue" type="number" placeholder="Venue" />
            </div>
            <div class="flex flex-col gap-1">
                <DatePicker v-model="eventForm.start_time" name="start_time" placeholder="Start Time" />
            </div>
            <div class="flex flex-col gap-1">
                <DatePicker v-model="eventForm.end_time" name="end_time" placeholder="End Time" />
            </div>
            
            <Button type="submit" severity="secondary" label="Submit" />
        </form>
    </div>
</template>
  

