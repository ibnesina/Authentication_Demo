import axios from "axios";

const API_URL = "http://127.0.0.1:8000/api"; // Adjust based on your Laravel API

const api = axios.create({
  baseURL: API_URL,
  headers: {
    "Content-Type": "application/json",
  },
});

export default api;
