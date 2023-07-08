const image = document.querySelector('.menuBar');
const menu = document.querySelector('.menu');

const spanOpen = document.querySelectorAll('.open');
const spanClose = document.querySelectorAll('.closeModal');
const modal = document.querySelectorAll('dialog');

const calc = document.querySelector('.calc')
const details = document.querySelector('.detalhes')



//manipulando os modais 
modal.forEach( (item,key) => {
    spanOpen[key].addEventListener('click', () => item.showModal());
    spanClose[key].addEventListener('click', () => item.close());
});

// campos relacionados as caixas de texto
image.addEventListener('click', () => {
    menubar = menu.classList.toggle('hide');
    if (menubar){
        menu.setAttribute('style','display:flex');
        menu.classList.add('hide');
    }else {
        menu.setAttribute('style','display:none');
        menu.classList.remove('hide');
    }
})
// mostrando a memória de cálculo 
calc.addEventListener('click', () => {
    calc = details.classList.toggle('hide');
    if (calc){
        details.setAttribute('style','display:flex');
        details.classList.add('hide');
    }else {
        details.setAttribute('style','display:none');
        details.classList.remove('hide');
    }
})


