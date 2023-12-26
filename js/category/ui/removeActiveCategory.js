const removeActiveCategory = () => {

    const categoryButtons = document.querySelectorAll('#category .button');

    for(let index = 0; index < categoryButtons.length; index++) {

        if(categoryButtons[index].classList.contains('active')) {

            categoryButtons[index].classList.remove('active');

        }

    }

}

export {

    removeActiveCategory

}