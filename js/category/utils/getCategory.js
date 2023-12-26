const getCategory = async (category) => {

    let formData = new FormData();

    for(let index = 0; index < category.length; index++) {
        formData.append('category[]', category[index]);
    }

    return fetch(`/api/category.php`, {
        method: 'POST',
        body: formData
    })
    .then(responce => responce.json())

}

export {

    getCategory

}