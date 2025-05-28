<script setup>
import { onMounted, ref } from 'vue';
import api from '../../api';
import Button from 'primevue/button';
import InputText from 'primevue/inputtext';
import Message from 'primevue/message';
import Toast from 'primevue/toast'
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

const initialValues = ref({
    username: '',
    firstName: '',
    lastName: ''
});

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

const onFormSubmit = ({ valid }) => {
    if (valid) {
        toast.add({ severity: 'success', summary: 'Success', detail: 'Form submitted successfully!' });
        console.log('Form submitted:', initialValues.value);
    } else {
        toast.add({ severity: 'error', summary: 'Error', detail: 'Please fill in all required fields.' });
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
                <InputText v-model="initialValues.username" name="username" type="text" placeholder="Username" />
                <Message v-if="!initialValues.username" severity="error" size="small" variant="simple">
                    Username is required.
                </Message>
            </div>
            <div class="flex flex-col gap-1">
                <InputText v-model="initialValues.firstName" name="firstName" type="text" placeholder="First Name" />
                <Message v-if="!initialValues.firstName" severity="error" size="small" variant="simple">
                    First name is required.
                </Message>
            </div>
            <div class="flex flex-col gap-1">
                <InputText v-model="initialValues.lastName" name="lastName" type="text" placeholder="Last Name" />
                <Message v-if="!initialValues.lastName" severity="error" size="small" variant="simple">
                    Last name is required.
                </Message>
            </div>
            <Button type="submit" severity="secondary" label="Submit" />
        </form>
    </div>
</template>
  

