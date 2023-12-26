const getAllCategory = async () => {

    return fetch(`/api/categoryAll.php`)
    .then(responce => responce.json())

}

export {

    getAllCategory

}