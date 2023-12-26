let countElement = 0;

const addTitleButton = document.querySelector('#addTitle');
const addTextButton = document.querySelector('#addText');
const addImgButton = document.querySelector('#addImg');
const addHrefButton = document.querySelector('#addHref');

const newPageForm = document.querySelector('#newPageForm');

addTitleButton.addEventListener('click', () => {

    const newSpan = document.createElement('span');
    newSpan.textContent = `Элемент ${countElement} | Заголовок`;

    const newInput1 = document.createElement('input');
    newInput1.type = 'text';
    newInput1.name = `element${countElement}`;

    const newInput2 = document.createElement('input');
    newInput2.type = 'hidden';
    newInput2.value = 'title';
    newInput2.name = `type${countElement}`;

    newPageForm.appendChild(newSpan);
    newPageForm.appendChild(newInput1);
    newPageForm.appendChild(newInput2);

    countElement++;
});

addTextButton.addEventListener('click', () => {

    const newSpan = document.createElement('span');
    newSpan.textContent = `Элемент ${countElement} | Текст`;

    const newTextarea = document.createElement('textarea');
    newTextarea.name = `element${countElement}`;

    const newInput = document.createElement('input');
    newInput.type = 'hidden';
    newInput.value = 'text';
    newInput.name = `type${countElement}`;

    newPageForm.appendChild(newSpan);
    newPageForm.appendChild(newTextarea);
    newPageForm.appendChild(newInput);

    countElement++;
});


addImgButton.addEventListener('click', () => {

    const newSpan = document.createElement('span');
    newSpan.textContent = `Элемент ${countElement} | Картинка`;

    const newInputFile = document.createElement('input');
    newInputFile.type = 'file';
    newInputFile.name = `element${countElement}`;

    const newInput = document.createElement('input');
    newInput.type = 'hidden';
    newInput.value = 'img';
    newInput.name = `type${countElement}`;

    newPageForm.appendChild(newSpan);
    newPageForm.appendChild(newInputFile);
    newPageForm.appendChild(newInput);

    countElement++;
});


addHrefButton.addEventListener('click', () => {

    const newSpan = document.createElement('span');
    newSpan.textContent = `Элемент ${countElement} | Кнопка`;

    const newInputTitle = document.createElement('input');
    newInputTitle.type = 'text';
    newInputTitle.placeholder = 'Заголовок';
    newInputTitle.name = `element${countElement}`;

    const newInputHref = document.createElement('input');
    newInputHref.type = 'text';
    newInputHref.placeholder = 'Ссылка';
    newInputHref.name = `href${countElement}`;

    const newInput = document.createElement('input');
    newInput.type = 'hidden';
    newInput.value = 'href';
    newInput.name = `type${countElement}`;

    newPageForm.appendChild(newSpan);
    newPageForm.appendChild(newInputTitle);
    newPageForm.appendChild(newInputHref);
    newPageForm.appendChild(newInput);

    countElement++;
});


