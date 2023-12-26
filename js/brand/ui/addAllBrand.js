import { getAllBrand } from "../utils/getAllBrand.js";

const addAllBrand = (addBrandCards, popUp) => {

    const allBrandButton = document.querySelector('#allCases');

    allBrandButton.addEventListener('click', async () => {

        const allBrands = await getAllBrand();
        const brandsContain = document.querySelector('.contentAsideCardsContain');

        brandsContain.innerHTML = '';
        
        for(let index = 0; index < allBrands.length; index++) {

            brandsContain.innerHTML += renderBrand(allBrands[index]);

        }

        addBrandCards(popUp);

    })

}

export {

    addAllBrand

}

const renderBrand = (brand) => {

    return `<a style="background-image: url(${brand.img_href});" data-brand-id="${brand.brand_id}"></a>`;

}