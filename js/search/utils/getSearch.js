const getSearch = async (search) => {

    return fetch(`/api/search.php?search=${search}`)
        .then(responce => responce.json())

}

export {

    getSearch

}