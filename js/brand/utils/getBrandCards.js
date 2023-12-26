const getBrandCards = async (brand) => {

    return fetch(`/api/brand.php?brand=${brand}`)
        .then(responce => responce.json())

}

export {

    getBrandCards

}