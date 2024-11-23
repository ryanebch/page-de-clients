let menu = document.querySelector('#menu-btn');
let sidenav = document.querySelector('.side-nav');
menu.onclick = () => {
  menu.classList.toggle('fa-times');
  sidenav.classList.toggle('active');
}