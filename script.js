// script.js
window.addEventListener('load', adjustCardHeight);
window.addEventListener('resize', adjustCardHeight);

function adjustCardHeight() {
  const cards = document.querySelectorAll('.card');
  const rowHeight = 10; // Sesuai dengan grid-auto-rows CSS

  cards.forEach(card => {
    const contentHeight = card.querySelector('img').offsetHeight + card.querySelector('p').offsetHeight;
    const rowSpan = Math.ceil(contentHeight / rowHeight);
    card.style.gridRowEnd = `span ${rowSpan}`;
  });
}
