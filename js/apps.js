const formulario = document.querySelector("#formulario");
//crear el evento
formulario.addEventListener( "submit", validarFormulario )
//mis funciones
function validarFormulario(e){
    e.preventDefault();
    const nombre = document.querySelector("#vnombre").value
    const apellido = document.querySelector("#vapellido").value
    const nacionalidad = document.querySelector("#vnacionalidad").value
    const respuesta = document.getElementById("respuesta");
    respuesta.textContent = `Hola ${nombre} ${apellido} tiene la nacionalidad de ${nacionalidad}`
    window.open('./tres.html','_blank');
}

//numero entre 1 y 6
//let dado = Number((Math.random() * 6).toFixed(0));
//console.log(dado)