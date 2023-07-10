const image = document.querySelector('.menuBar');
const menu = document.querySelector('.menu');
const nav = document.querySelector('nav ul');

const spanOpen = document.querySelectorAll('.open');
const spanClose = document.querySelectorAll('.closeModal');
const modal = document.querySelectorAll('dialog');

const calc = document.querySelector('.calc')
const dontshow = document.querySelector('.dontshow')
const details = document.querySelector('.detalhes')



//manipulando os modais 
modal.forEach( (item,key) => {
    spanOpen[key].addEventListener('click', () => item.showModal());
    spanClose[key].addEventListener('click', () => item.close());
});

// campos relacionados ao menubar de texto
image.addEventListener('click', () => {
    menubar = menu.classList.toggle('hide');
    if (menubar){
        menu.setAttribute('style','display:flex');
        menu.classList.add('hide');
    }else {
        menu.setAttribute('style','display:none');
        menu.classList.remove('hide');
        window.addEventListener("resize" , () => {
            menu.classList.add('hide');
            menu.setAttribute('style','display:flex');
        })
    }
})
// mostrando a memória de cálculo 

calc.addEventListener('click', () => {
        details.setAttribute('style','display:flex');
        details.classList.add('hide');
        dontshow.classList.remove('hide');
        calc.classList.add('hide');
})

dontshow.addEventListener('click', () => {
        details.setAttribute('style','display:none');
        details.classList.remove('hide');
        dontshow.classList.add('hide');
        calc.classList.remove('hide');
})


