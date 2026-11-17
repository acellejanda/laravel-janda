import api from './axios';

export const getPosts = () => api.get('/posts');

export const getPost = (id) => api.get(`/posts/${id}`);

export const storePost = (message) => api.post('/posts', { message });

export const updatePost = (id, message) => api.put(`/posts/${id}`, { message });

export const deletePost = (id) => api.delete(`/posts/${id}`);
