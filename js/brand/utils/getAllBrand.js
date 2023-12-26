const getAllBrand = async () => {

    return fetch(`/api/brandAll.php`)
        .then(responce => responce.json())

}

export {

    getAllBrand

}