import { getBrandCards } from "../utils/getBrandCards.js";
import { removeActiveCategory } from "../../category/ui/removeActiveCategory.js";

const addBrandCards = () => {

    const brandButtons = document.querySelectorAll('.brands__item');

    for(let index = 0; index < brandButtons.length; index++) {

        brandButtons[index].addEventListener('click', async () => {

            const brandId = brandButtons[index].getAttribute('data-brand-id');

            const items = await getBrandCards(brandId);

            const itemsContain = document.querySelector('.cart__list');

            itemsContain.innerHTML = '';

            for(let index = 0; index < items.length; index++) {

                itemsContain.innerHTML += renderCard(items[index]);

            }

            removeActiveCategory();

        })

    }

}

export {

    addBrandCards

}

const renderCard = (item) => {

    return `<li class="cart__item">
                <div class="cart__image-box">
                <img class="cart__img" src="${item.img_href}" alt="${item.title}">
                </div>
                <div class="cart__wrap">
                <p class="cart__category">${item.category}</p>
                <p class="cart__descript">${item.title}</p>
                <p class="cart__promo-works">${item.description}</p>
                <button class="cart__promo-btn button" onclick="showCode(this, '${item.code}')">
                    <img class="cart__btn-icon" src="images/main/visibility.svg" alt="visibility">
                    <span class="cart__btn-label">Показать код</span>
                </button>
                </div>
            </li>`;

}