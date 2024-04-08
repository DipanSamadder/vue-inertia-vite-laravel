import axios from 'axios';

export async function getImageUrlByID(id) {
    try {
        const response = await axios.get(`/get-image/${id}`);
        var result = response.data.data;
        return result;
    } catch (error) {
        console.error(error);
        return null;
    }
   
}