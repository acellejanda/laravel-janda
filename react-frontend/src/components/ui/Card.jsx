function Card({ title, name, description, image, children, className = '' }) {
  const heading = title || name;

  return (
    <article className={`card ${className}`.trim()}>
      {image && <img className="card__image" src={image} alt="" />}
      <div className="card__content">
        {heading && <h2 className="card__title">{heading}</h2>}
        {description && <p className="card__description">{description}</p>}
        {children}
      </div>
    </article>
  );
}

export default Card;
