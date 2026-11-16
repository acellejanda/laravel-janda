import React, { useState } from 'react';
import { createPost } from '../../services/api';

function PostForm({ onPostCreated }) {
  const [message, setMessage] = useState('');
  const [status, setStatus] = useState('');
  const [submitting, setSubmitting] = useState(false);

  async function handleSubmit(event) {
    event.preventDefault();
    const text = message.trim();
    if (!text || submitting) return;

    setSubmitting(true);
    setStatus('');
    const optimisticPost = {
      id: `pending-${Date.now()}`,
      message: text,
      created_at: new Date().toISOString(),
      author: 'Guest User',
    };
    onPostCreated(optimisticPost);
    setMessage('');

    try {
      const { data } = await createPost(text);
      onPostCreated(data.data || data, optimisticPost.id);
    } catch (error) {
      setStatus(error.response?.data?.message || 'Post is shown below but could not be saved. Check the Laravel server.');
    } finally {
      setSubmitting(false);
    }
  }

  return (
    <form className="simple-post-form" onSubmit={handleSubmit}>
      <textarea
        value={message}
        onChange={(event) => setMessage(event.target.value)}
        placeholder="What is happening?"
        aria-label="Post message"
        maxLength={5000}
        required
      />
      <div className="simple-post-form__footer">
        <button type="submit" disabled={!message.trim() || submitting}>
          {submitting ? 'Posting...' : 'Post'}
        </button>
      </div>
      <p className="post-status" role="status" aria-live="polite">{status}</p>
    </form>
  );
}

export default PostForm;
