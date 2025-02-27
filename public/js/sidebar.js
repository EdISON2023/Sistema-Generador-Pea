const elemento=document.getElementById('sidebar')
const imagentoggle=document.getElementById('imagen-toggle')

document.getElementById('botonSidebar').addEventListener('click',()=>{
    elemento.classList.toggle('toggel');
    imagentoggle.classList.toggle('rotar-imagen');
})