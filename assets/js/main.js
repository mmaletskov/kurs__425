const menuLi = document.querySelectorAll('.menu__item');
menuLi.forEach(element => {
    element.addEventListener('mouseover',()=> {
        const sub_menu = element.querySelector('.sub_menu');
        sub_menu.style.display = 'block';
    })
});
menuLi.forEach(element => {
    element.addEventListener('mouseout',()=> {
        const sub_menu = element.querySelector('.sub_menu');
        sub_menu.style.display = 'none';
    })
});

function burgerMenu(selector) {
  let menu = $(selector);
  let button = menu.find('.burger-menu_button', '.burger-menu_lines');
  let links = menu.find('.burger-menu_link');
  let overlay = menu.find('.burger-menu_overlay');
  
  button.on('click', (e) => {
    e.preventDefault();
    toggleMenu();
  });
  
  links.on('click', () => toggleMenu());
  overlay.on('click', () => toggleMenu());
  
  function toggleMenu(){
    menu.toggleClass('burger-menu_active');
    
    if (menu.hasClass('burger-menu_active')) {
      $('body').css('overlow', 'hidden');
    } else {
      $('body').css('overlow', 'visible');
    }
  }
}

burgerMenu('.burger-menu');

// const sett = document.querySelector('.setTimeout'); 

// function sayHi() {
//   sett.style.display = 'block';
// }

// setTimeout(sayHi, 1000);


// вкладки
const buttons = document.querySelectorAll('.tabs__header-button');
const tabs = document.querySelectorAll('.tabs__body');

for(let x = 0; x < buttons.length; x++){
    buttons[x].addEventListener('click',()=>{
        for(let y = 0; y < tabs.length; y++){
            if(x == y){
                tabs[y].classList.add('body__active');
                buttons[y].classList.add('button__active');
            }
            else{
                tabs[y].classList.remove('body__active');
                buttons[y].classList.remove('button__active');
            }
        }
        buttons[x].classList.add('button__active');
    })
}


// аккордион

const buttonsEl = document.querySelectorAll('.button')
const accordionsEl = document.querySelectorAll('.accordion')

buttonsEl.forEach((button, index) => {

    const accordion = accordionsEl[index]

    button.addEventListener('click', () => {
        accordion.classList.toggle('show')

        if(accordion.classList.contains('show')) {
            button.style.transform = 'rotate(90deg)'
        } else {
            button.style.transform = 'rotate(0)'
        }
    })

})
// плавное появление текста в main
document.addEventListener('DOMContentLoaded', () =>{
  const blocks = document.querySelectorAll('.block')
  const school__text = document.querySelector('.school__text')

  window.addEventListener('scroll', () => {
      const windowHeight = window.innerHeight

      const scrollPosition = window.scrollY

      const blokHeight = blocks[1].clientHeight

      const blokMidlle = blocks[1].offsetTop + blokHeight / 2

      if(scrollPosition + windowHeight >= blokMidlle){
          school__text.style.display = 'block'
      }else{
          school__text.style.display = 'none'
      }
  })
})

// слайдер
$(function(){
  $('.slider').slick({
      infinite: true,
      autoplay:true, /* Автообновление картинок */
      autoplaySpeed:2000, /* Скорость обновления картинок  */
      slidesToShow:1,
      dots:true,
      arrow:true,

      responsive: [
          {
            breakpoint: 1024,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              infinite: true,
              dots: true,
            }
          },
          {
              breakpoint: 850,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
                infinite: true,
                dots: true,
                arrow:false
              }
            },
          {
            breakpoint: 600,
            settings: {
              slidesToShow: 1,
              slidesToScroll:1,
              infinite:true,
              dots:true,
              arrow:false
            }
          },
          {
            breakpoint: 425,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1,
              arrow:false
            }
          }
      ]

    })

}) 

