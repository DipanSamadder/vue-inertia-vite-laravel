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

export async function dsvd_static_assets(imageName) {
    const imagePath = '/public/frontend/';
    const imageUrl = (imageName) => {
        return asset(imagePath + imageName);
    };
}