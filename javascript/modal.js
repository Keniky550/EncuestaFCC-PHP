const btnEnviar = document.querySelector('#abrir-modal');
const btnCerrar = document.querySelector('#cerrar-modal');
const modal = document.querySelector('#modal');

btnEnviar.addEventListener('click',()=>{
    modal.showModal();
});
