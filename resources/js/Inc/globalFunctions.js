import axios from 'axios';
import { usePage } from '@inertiajs/inertia-vue3';

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

export function activeNav(url, slug, option="full"){
    const baseUrl = window.location.origin;
    const fullUrl = baseUrl + url;
    if(option=='full' && (fullUrl === slug)){
       return true;
    }else if(url === slug){
        return true;
    }
    return false;
}