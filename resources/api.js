import axios from 'axios';

const apiURL = import.meta.env.VITE_API_URL

axios.defaults.baseURL = apiURL;
axios.defaults.headers.common['Content-Type'] = 'application/json';
axios.defaults.headers.common['Accept'] = 'application/json';

class Api {

    async getEvents() {
        try {
            const response = await axios.get('/events');
            return response.data;
        } catch (error) {
            console.error('Error fetching events:', error);
            throw error;
        }
    }

    async createEvent(eventData) {
        try {
            const response = await axios.post('/events', eventData);
            return response.data;
        } catch (error) {
            console.error('Error creating event:', error);
            throw error;
        }
    }
    
}

export default new Api();