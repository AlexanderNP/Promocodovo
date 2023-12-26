import { getSearch } from "../utils/getSearch.js";
import { removeActiveCategory } from "../../category/ui/removeActiveCategory.js";

const addSearchCard = () => {

    const searchInput = document.querySelector('.header__search');
    const searchButton = document.querySelector('.header__btn-search');

    searchInput.addEventListener('keypress', async (e) => {

        if(e.key == 'Enter') {

            const searchText = searchInput.value;
            const searchItems = await getSearch(searchText);

            const itemsContain = document.querySelector('.cart__list');
            itemsContain.innerHTML = '';

            for(let index = 0; index < searchItems.length; index++) {

                itemsContain.innerHTML += renderCard(searchItems[index]);

            }

            removeActiveCategory();

        }

    })

    searchButton.addEventListener('click', async (e) => {

        const searchText = searchInput.value;
        const searchItems = await getSearch(searchText);

        const itemsContain = document.querySelector('.cart__list');
        itemsContain.innerHTML = '';

        for(let index = 0; index < searchItems.length; index++) {

            itemsContain.innerHTML += renderCard(searchItems[index]);

        }

        removeActiveCategory();
        removeActiveSort();

    })

}

export {

    addSearchCard

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