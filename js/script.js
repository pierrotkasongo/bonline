let menu = document.querySelector('#menu-bar');
let navbar = document.querySelector('.navbar');

menu.onclick = () =>{
  menu.classList.toggle('fa-times');
  navbar.classList.toggle('active');
}

window.onscroll = () =>{
  menu.classList.remove('fa-times');
  navbar.classList.remove('active');
}

let slides = document.querySelectorAll('.slide-container');
let index = 0;

function next(){
  slides[index].classList.remove('active');
  index = (index + 1) % slides.length;
  slides[index].classList.add('active');
}

function prev(){
  slides[index].classList.remove('active');
  index = (index - 1 + slides.length) % slides.length;
  slides[index].classList.add('active');
}

document.querySelectorAll('.featured-image-1').forEach(image_1 =>{
  image_1.addEventListener('click', () =>{
    var src = image_1.getAttribute('src');
    document.querySelector('.big-image-1').src = src;
  });
});

document.querySelectorAll('.featured-image-2').forEach(image_2 =>{
  image_2.addEventListener('click', () =>{
    var src = image_2.getAttribute('src');
    document.querySelector('.big-image-2').src = src;
  });
});

document.querySelectorAll('.featured-image-3').forEach(image_3 =>{
  image_3.addEventListener('click', () =>{
    var src = image_3.getAttribute('src');
    document.querySelector('.big-image-3').src = src;
  });
});

// login
const signUp = document.querySelector("#signUp");
const signIn = document.querySelector("#signIn");
const passwordIcon = document.querySelectorAll('.password__icon')
const authPassword = document.querySelectorAll('.auth__password')

// when click sign up button
signUp.addEventListener('click', () => {
  document.querySelector('.login__form').classList.remove('active')
  document.querySelector('.register__form').classList.add('active')
  document.querySelector('.ball').classList.add('register')
  document.querySelector('.ball').classList.remove('login')
});

// when click sign in button
signIn.addEventListener('click', () => {
  document.querySelector('.login__form').classList.add('active')
  document.querySelector('.register__form').classList.remove('active')
  document.querySelector('.ball').classList.add('login')
  document.querySelector('.ball').classList.remove('register')
});

// change hidden password to visible password
for (var i = 0; i < passwordIcon.length; ++i) {
  passwordIcon[i].addEventListener('click', (i) => {
    const lastArray = i.target.classList.length - 1
    if (i.target.classList[lastArray] == 'bi-eye-slash') {
      i.target.classList.remove('bi-eye-slash')
      i.target.classList.add('bi-eye')
      i.currentTarget.parentNode.querySelector('input').type = 'text'
    } else {
      i.target.classList.add('bi-eye-slash')
      i.target.classList.remove('bi-eye')
      i.currentTarget.parentNode.querySelector('input').type = 'password'
    }
  });
}