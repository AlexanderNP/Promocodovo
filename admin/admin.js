const buttonsHeader = document.querySelectorAll('.adminHeader span');
const adminBodys = document.querySelectorAll('.adminBody');


for(let index = 0; index < buttonsHeader.length; index++) {

    buttonsHeader[index].addEventListener('click', () => {

        removeActive(adminBodys);

        adminBodys[index].classList.add('active');

    })

}

const removeActive = (elements) => {

    for(let index = 0; index < elements.length; index++) {

        if(elements[index].classList.contains('active')) {

            elements[index].classList.remove('active')

        }

    }

}