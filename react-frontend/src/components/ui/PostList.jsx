import React from 'react';

function PostList({ posts, loading }) {
  if (loading) return <p className="post-list-message">Loading posts...</p>;
  if (!posts.length) return <p className="post-list-message">No posts shared yet.</p>;

  return (
    <section className="simple-post-list" aria-label="Posts">
      {posts.map((post) => (
        <article className="simple-post-item" key={post.id}>
          <div className="simple-post-item__meta">
            <strong>{post.author || post.user?.name || 'Guest User'}</strong>
            <time dateTime={post.created_at || undefined}>
              {post.created_at ? new Date(post.created_at).toLocaleString() : ''}
            </time>
          </div>
          <p>{post.message || post.body || post.content}</p>
        </article>
      ))}
    </section>
  );
}

export default PostList;
