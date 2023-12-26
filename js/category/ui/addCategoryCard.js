import { getCategory } from "../utils/getCategory.js";
import { getAllCategory } from "../utils/getAllCategory.js";
import { addNewCurrentCategory, deleteCurrentCategory, getCurrentCategory } from "../state/category.js";

const addCategoryCard = () => {

    const categoryButtons = document.querySelectorAll('.category__tab-item');

    for(let index = 0; index < categoryButtons.length; index++) {

        categoryButtons[index].addEventListener('click', async () => {

            const selectCategoryId = categoryButtons[index].getAttribute('data-category-id');

            if(!categoryButtons[index].classList.contains('active')) {
                
                addNewCurrentCategory(selectCategoryId);
                categoryButtons[index].classList.add('active');

            }
            else {

                categoryButtons[index].classList.remove('active');
                deleteCurrentCategory(selectCategoryId);
            
            }

            const currentCategory = getCurrentCategory();

            const itemsContain = document.querySelector('.cart__list');
            itemsContain.innerHTML = '';

            if(currentCategory.length > 0) {

                const searchItems = await getCategory(currentCategory);

                for(let index = 0; index < searchItems.length; index++) {

                    itemsContain.innerHTML += renderCard(searchItems[index]);

                }

            }
            else {

                const searchItems = await getAllCategory();

                for(let index = 0; index < searchItems.length; index++) {

                    itemsContain.innerHTML += renderCard(searchItems[index]);

                }

            }

        })

    }

}

export {

    addCategoryCard

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