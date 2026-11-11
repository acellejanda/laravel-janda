import api from '../api/axios';

export const getPosts = () => api.get('/posts');

export const createPost = (message) => api.post('/posts', {
  message: typeof message === 'string' ? message : message.message,
});

export const getPost = (id) => api.get(`/posts/${id}`);

export const updatePost = (id, message) => api.put(`/posts/${id}`, { message });

export const deletePost = (id) => api.delete(`/posts/${id}`);

const postApi = { getPosts, createPost, getPost, updatePost, deletePost };
export default postApi;
