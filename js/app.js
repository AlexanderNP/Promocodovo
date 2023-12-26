function showCode(el, promo) {
  const promoCode = promo; // Ваш промокод

  const originalIcon = el.querySelector('.cart__btn-icon');
  originalIcon.style.display = 'none';
  
  const promoText = el.querySelector('.cart__btn-label');
  promoText.classList = 'cart__btn-label-after-click'

  const newIcon = document.createElement('img');
  newIcon.className = 'cart__btn-icon';
  newIcon.src = 'images/main/file-copy.svg';
  newIcon.alt = 'copy';

  el.insertBefore(newIcon, promoText);
  promoText.textContent = promoCode;

  el.className = 'cart__promo-btn-after-click';

  el.onclick = function() {
      navigator.clipboard.writeText(promoCode)
          .then(() => {
              alert('Промокод скопирован!');
          })
          .catch(err => {
              alert('Ошибка копирования', err);
          });
  }
}


document.addEventListener('DOMContentLoaded', function() {
  const showMoreButton = document.querySelector('.brands__btn-more')
  const showLessButton = document.querySelector('.brands__btn-less')
  const brandList = document.querySelector('.brands__list')

  showMoreButton.addEventListener('click', function() {
    var scrollHeight = brandList.scrollHeight;
    brandList.style.maxHeight = scrollHeight + 'px';
    brandList.classList.add('is-expanded');
    showMoreButton.classList.add('is-hidden');
    showLessButton.style.display = 'block'
  });

  showLessButton.addEventListener('click', function() {
    brandList.style.maxHeight = '22.04vw';
    brandList.classList.remove('is-expanded');
    showMoreButton.classList.remove('is-hidden');
    showLessButton.style.display = 'none'
  });
});