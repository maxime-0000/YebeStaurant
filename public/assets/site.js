const toggle=document.querySelector('.menu-toggle');
if(toggle){const nav=document.getElementById('nav');toggle.addEventListener('click',()=>{const open=toggle.getAttribute('aria-expanded')==='true';toggle.setAttribute('aria-expanded',String(!open));nav.classList.toggle('open',!open);});}
