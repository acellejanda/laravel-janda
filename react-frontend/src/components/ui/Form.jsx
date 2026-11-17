import { useState } from "react";

export default function Form({ initialName = '' }) {
  const [name, setName] = useState(initialName);

  function handleSubmit(e) {
    e.preventDefault();
    window.alert(`Submitted name: ${name}`);
  }

  return (
    <form method="POST" onSubmit={handleSubmit}>
      <input
        value={name}
        onChange={(e) => setName(e.target.value)}
        placeholder="Input your name"
      />
      <button>Submit</button>
    </form>
  );
}
