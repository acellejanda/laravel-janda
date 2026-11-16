import React, { useState } from 'react';
import './style/post-card.css';

function Post({ post }) {
  const [liked, setLiked] = useState(false);
  const author = post.author || post.user?.name || 'Community member';
  const initials = author.split(' ').map((part) => part[0]).join('').slice(0, 2).toUpperCase();

  return (
    <article className="post-card">
      <header className="post-card__header">
        <div className="post-avatar">{initials}</div>
        <div className="post-card__author">
          <strong>{author}</strong>
          <span>{post.created_at ? new Date(post.created_at).toLocaleString() : 'Just now'}</span>
        </div>
        <button className="icon-button post-more" aria-label="More post options">···</button>
      </header>
      <div className="post-card__body">
        {post.title && <h2>{post.title}</h2>}
        <p>{post.message || post.body || post.content || post.description}</p>
        {post.image && <img className="post-card__image" src={post.image} alt="Post attachment" />}
      </div>
      <div className="post-card__stats">
        <span>♥ {Number(post.likes_count || 0) + (liked ? 1 : 0)} likes</span>
        <span>{post.comments_count || 0} comments</span>
      </div>
      <footer className="post-card__actions">
        <button className={liked ? 'post-action is-liked' : 'post-action'} onClick={() => setLiked(!liked)}>
          <span aria-hidden="true">♥</span> {liked ? 'Liked' : 'Like'}
        </button>
        <button className="post-action" onClick={() => document.getElementById(`comment-${post.id}`)?.focus()}>
          <span aria-hidden="true">▢</span> Comment
        </button>
        <input id={`comment-${post.id}`} className="comment-input" placeholder="Write a comment…" aria-label="Write a comment" />
      </footer>
    </article>
  );
}

export default Post;
