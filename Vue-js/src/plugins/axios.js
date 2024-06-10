import axios from 'axios';

const instance = axios.create({
  baseURL: 'http://127.0.0.1:8000/api/chemin/laravel_api/',
});

export default instance;
