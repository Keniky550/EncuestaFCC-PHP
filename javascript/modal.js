const btnEnviar = document.querySelector('#abrir-modal');
const btnCerrar = document.querySelector('#cerrar-modal');
const modal = document.querySelector('#modal');
mostrarmodal = false;


function modal(){
    btnEnviar.addEventListener('click',()=>{
        mostrarmodal = True;
    });
    
    if (mostrarmodal){
        modal.showModal();
    }
}