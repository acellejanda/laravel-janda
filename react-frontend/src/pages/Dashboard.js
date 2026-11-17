import React, { useEffect, useState } from 'react';
import PostForm from '../components/ui/PostForm';
import PostList from '../components/ui/PostList';
import { getPosts } from '../services/api';
import '../components/ui/style/post.css';

function Dashboard() {
  const [posts, setPosts] = useState([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    getPosts()
      .then(({ data }) => {
        const items = Array.isArray(data) ? data : data.data || data.posts || [];
        setPosts(items);
      })
      .catch(() => setPosts([]))
      .finally(() => setLoading(false));
  }, []);

  function addPost(post, pendingId) {
    setPosts((currentPosts) => {
      if (pendingId) return currentPosts.map((current) => current.id === pendingId ? { ...post, author: post.author || 'Guest User' } : current);
      return [post, ...currentPosts];
    });
  }

  return (
    <main className="simple-post-page">
      <PostForm onPostCreated={addPost} />
      <PostList posts={posts} loading={loading} />
    </main>
  );
}

export default Dashboard;
