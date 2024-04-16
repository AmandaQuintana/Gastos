<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"]."/gastos/models/Usuario.php";

class UsuarioController {

    public static function ejecutarAccion(){
        //Recuperamos el campo accion (Boton Guardar)
        $accion = @$_REQUEST["accion"];
        //Validamos si la accion es Guardar
        switch ($accion) {
            case 'Guardar':
                //Invocamos el metodo Guardar
                UsuarioController::guardar();
                break;

            case 'Buscar':
                //Invocamos el metodo Buscar
                UsuarioController::buscar();
                break;
            
            case 'Editar':
                //Invocamos el metodo Buscar
                UsuarioController::editar();
                break;
            
            case 'Eliminar':
                //Invocamos el metodo Eliminar
                UsuarioController::eliminar();
                break;
            
            case 'Listar':
                //Invocamos el metodo Listar
                UsuarioController::listar();
                break;
            
            default:
                // Si no es la accion correcta, enviamos un error
                header("Location: ../view/error.php?msj=Accion no permitida");
                exit;
        }
    }

    public static function guardar(){
        //Recuperar los campos enviados por el formulario
        $cedula = @$_REQUEST['cc'];
        $clave = @$_REQUEST['pass'];
        $nombre = @$_REQUEST['nombre'];
        $email = @$_REQUEST['correo'];

        //Crear una instancia de tipo Usuario
        $u = new Usuario();

        $u->cedula = $cedula;
        $u->clave = $clave;
        $u->nombre = $nombre;
        $u->email = $email;

        //Intentar guardar el usuario en BD
        try {
            //Guardar el usuario
            $u->save();
            //Contar los usuarios guardados
            $total = @Usuario::count();
            $msj = "Usuario guardado, Total: $total";
            //Redireccionar a la pagina guardar enviandole un mensaje
            header("Location: ../view/usuarios/agregar.php?msj=$msj");
            exit;

        } catch (Exception $error) {
            //Verificar si el error es de Clave Primaria duplicada
            if (strstr($error->getMessage(), "Duplicate")) {
                $msj = "El usuario con cedula $cedula ya existe";
            }
            else {
                //Otro mensaje si no es error por usuario duplicado
                $msj = "Ocurrió un error al guardar el usuario";
            }
            //Redireccionar a la pagina guardar enviandole un mensaje de error
            header("Location: ../view/usuarios/agregar.php?msj=$msj");
            exit;
        }
    }

    public static function buscar(){
        //Recuperar los campos enviados por el formulario
        $cedula = @$_REQUEST['cc'];

        //Intentar buscar el usuario en BD
        try {
            //Buscar el usuario
            $u = @Usuario::find($cedula);

            //Colocamos el usuario en la sesion
            $_SESSION["usuario.find"] = serialize($u);
            $msj = "Usuario encontrado";
            //Redireccionar a la pagina buscar enviandole un mensaje
            header("Location: ../view/usuarios/buscar.php?msj=$msj");
            exit;

        } catch (Exception $error) {
            //Verificar si el error es de Clave Primaria no existe
            if (strstr($error->getMessage(), $cedula)) {
                $msj = "El usuario con cedula $cedula no existe";
            }
            else {
                //Otro mensaje si no es error por usuario no encontrado
                $msj = "Ocurrió un error al buscar el usuario";
            }
            //Redireccionar a la pagina guardar enviandole un mensaje de error
            $_SESSION["usuario.find"] = NULL;
            header("Location: ../view/usuarios/buscar.php?msj=$msj");
            exit;
        }
    }

    public static function editar(){
        //Recuperar los campos enviados por el formulario
        $cedula = @$_REQUEST['cc'];
        //Obtenemos el usuario consultado, lo deserializamos y convertimos en Obj de tipo Usuario
        $u = $_SESSION["usuario.find"];
        $u = unserialize($u);

        if ($u->cedula !== $cedula) {
            //Validamos que el usuario editado sea el mismo que se consultó
            $msj = "La cedula no corresponde al usuario consultado";
            //Redireccionar a la pagina buscar enviandole un mensaje
            header("Location: ../view/usuarios/buscar.php?msj=$msj");
            exit;
        }

        //Recuperamos los campos cambiados en el formulario
        $clave = @$_REQUEST['pass'];
        $nombre = @$_REQUEST['nombre'];
        $email = @$_REQUEST['correo'];
        //Los colocamos en el usuario encontrado
        $u->clave = $clave;
        $u->nombre = $nombre;
        $u->email = $email;

        //Intentar guardar los cambios del usuario en BD
        try {
            //Guardar el usuario
            $u->save();
            //Volvemos a serializar al usuario
            $_SESSION["usuario.find"] = serialize($u);
            $msj = "Usuario editado";
            //Redireccionar a la pagina buscar enviandole un mensaje
            header("Location: ../view/usuarios/buscar.php?msj=$msj");
            exit;

        } catch (Exception $error) {
            //Verificar si el error es de Clave Primaria duplicada
            if (strstr($error->getMessage(), "Duplicate")) {
                $msj = "El usuario con cedula $cedula ya existe";
            }
            else {
                //Otro mensaje si no es error por usuario duplicado
                $msj = "Ocurrió un error al guardar el usuario";
            }
            //Redireccionar a la pagina guardar enviandole un mensaje de error
            $_SESSION["usuario.find"] = NULL;
            header("Location: ../view/usuarios/agregar.php?msj=$msj");
            exit;
        }
    }

    public static function eliminar(){
        //Recuperar los campos enviados por el formulario
        $cedula = @$_REQUEST['cc'];
        //Obtenemos el usuario consultado, lo deserializamos y convertimos en Obj de tipo Usuario
        $u = $_SESSION["usuario.find"];
        $u = unserialize($u);

        if ($u->cedula !== $cedula) {
            //Validamos que el usuario editado sea el mismo que se consultó
            $msj = "La cedula no corresponde al usuario consultado";
            //Redireccionar a la pagina buscar enviandole un mensaje
            header("Location: ../view/usuarios/buscar.php?msj=$msj");
            exit;
        }

        //Intentar eliminar el usuario en la BD
        try {
            //Eliminar el usuario
            $u->delete();
            //Quitamos de la sesion al usuario consultado
            $_SESSION["usuario.find"] = null;
            //Contar los usuarios en la BD
            $total = @Usuario::count();
            $msj = "Usuario eliminado, Total: $total";
            //Redireccionar a la pagina buscar enviandole un mensaje
            header("Location: ../view/usuarios/buscar.php?msj=$msj");
            exit;

        } catch (Exception $error) {
            //Verificar si el error es de Clave Primaria duplicada
            if (strstr($error->getMessage(), "Duplicate")) {
                $msj = "El usuario con cedula $cedula ya existe";
            }
            else {
                //Otro mensaje si no es error por usuario duplicado
                $msj = "Ocurrió un error al guardar el usuario";
            }
            //Redireccionar a la pagina guardar enviandole un mensaje de error
            $_SESSION["usuario.find"] = NULL;
            header("Location: ../view/usuarios/agregar.php?msj=$msj");
            exit;
        }
    }

    public static function listar(){
        
        try {
            //Obtenemos todos los usuarios
            $usuarios = Usuario::all();

            if ($usuarios == null) {
                $_SESSION["usuarios.all"] = null;
                $msj = "Total de usuarios: 0";
            } else {
                // Si hay usuarios, contarlos y serializar la lista
                $total = count($usuarios);
                $usuarios = serialize($usuarios);
                $_SESSION["usuarios.all"] = $usuarios;
                $msj = "Total de usuarios: $total";
            }

            $msj = "Total de usuarios: $total";
            //Redireccionar a la pagina de reportes
            header("Location: ../view/usuarios/listar.php?msj=$msj");

        } catch (Exception $error) {
            //Redireccionar a la pagina guardar enviandole un mensaje de error
            $_SESSION["usuarios.all"] = NULL;
            header("Location: ../view/usuarios/listar.php?msj=Total de usuarios: 0");
            exit;
        }
    }
}

UsuarioController::ejecutarAccion();