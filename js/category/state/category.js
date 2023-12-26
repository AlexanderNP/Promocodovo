let currentCategory = [];

const getCurrentCategory = () => {

    return currentCategory;

}

const addNewCurrentCategory = (category) => {

    currentCategory.push(category);

}

const deleteCurrentCategory = (category) => {

    let newCurrentCategory = [];

    for(let index = 0; index < currentCategory.length; index++) {
        if(currentCategory[index] != category) {
            newCurrentCategory.push(currentCategory[index]);
        }
    }

    currentCategory = newCurrentCategory;

}

export {

    getCurrentCategory,
    addNewCurrentCategory,
    deleteCurrentCategory

}