function habilitarBotones() {
    //Obtiene el boton y los campos
    const botonEditar = document.getElementById("editar")
    const botonEliminar = document.getElementById("eliminar")
    const campoNombre = document.getElementById("nombre")
    const campoClave = document.getElementById("pass")
    const campoEmail = document.getElementById("correo")

    //Agrega un evento de entrada al campo nombre, el cual se activa sólo cuando escriben en el campo
    campoNombre.addEventListener(
        "input", () => {
            //Verifica si el campo esta vacio
            if (campoNombre.value === "") {
                //Desabilita el boton 
                botonEditar.disabled = true
                botonEliminar.disabled = true
            } else {
                //Habilita el boton
                botonEditar.disabled = false
            }
        }
    )

    // Función para establecer campos como de solo lectura
    function establecerSoloLectura(estado) {
        campoNombre.readOnly = estado;
        campoClave.readOnly = estado;
        campoEmail.readOnly = estado;
    }

    // Agrega un evento de entrada al campo nombre, el cual se activa sólo cuando escriben en el campo
    campoNombre.addEventListener("input", () => {
        // Verifica si el campo está vacío
        if (campoNombre.value === "") {
            // Deshabilita los botones y establece los campos como de solo lectura
            botonEditar.disabled = true;
            botonEliminar.disabled = true;
            establecerSoloLectura(true);
        } else {
            // Habilita el botón Editar y establece los campos como de escritura
            botonEditar.disabled = false;
            botonEliminar.disabled = false;
            establecerSoloLectura(false);
        }
    });

    // Inicialmente, establece los campos como de solo lectura si el nombre está vacío
    if (campoNombre.value === "") {
        botonEditar.disabled = true;
        botonEliminar.disabled = true;
        establecerSoloLectura(true);
    } else {
        botonEditar.disabled = false;
        botonEliminar.disabled = false;
        establecerSoloLectura(false);
    }
}

function confirmarOperacion(){
    //Obtenemos los botones
    const botonEditar = document.getElementById("editar")
    const botonEliminar = document.getElementById("eliminar")

    //Agregamos los eventos clic en cada boton
    botonEditar.addEventListener(
        "click", (event) => {
            mensaje = "¿Desea modificar los datos de este usuario?"
            return confirmar(mensaje, event)
        }
    )

    botonEliminar.addEventListener(
        "click", (event) => {
            mensaje = "¿Desea eliminar los datos de este usuario?"
            return confirmar(mensaje, event)
        }
    )
}

function confirmar(mensaje, evento){
    const respuesta = confirm(mensaje)

    if (!respuesta) {
        //Cancelamos el envio del formulario
        evento.preventDefault()
    }
}