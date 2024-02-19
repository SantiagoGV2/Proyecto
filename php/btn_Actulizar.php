<?php
    /*== Almacenando id ==*/
    $id=limpiar_cadena($_POST['tec_cedula']);

    /*== Verificando usuario ==*/
	$check_empleado=conexion();
	$check_empleado=$check_empleado->query("SELECT * FROM tecnicos WHERE tec_cedula='$id'");

    if($check_empleado->rowCount()<=0){
    	echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El usuario no existe en el sistema
            </div>
        ';
        exit();
    }else{
    	$datos=$check_empleado->fetch();
    }
    $check_empleado=null;


    /*== Almacenando datos del administrador ==
    $admin_usuario=limpiar_cadena($_POST['administrador_usuario']);
    $admin_clave=limpiar_cadena($_POST['administrador_clave']);


    /*== Verificando campos obligatorios del administrador ==
    if($admin_usuario=="" || $admin_clave==""){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No ha llenado los campos que corresponden a su USUARIO o CLAVE
            </div>
        ';
        exit();
    }

    /*== Verificando integridad de los datos (admin) ==
    if(verificar_datos("[a-zA-Z0-9]{4,20}",$admin_usuario)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                Su USUARIO no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    if(verificar_datos("[a-zA-Z0-9$@.-]{7,100}",$admin_clave)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                Su CLAVE no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    */
    /*== Verificando el administrador en DB ==
    $check_admin=conexion();
    $check_admin=$check_admin->query("SELECT usuario_usuario,usuario_clave FROM usuario WHERE usuario_usuario='$admin_usuario' AND usuario_id='".$_SESSION['id']."'");
    if($check_admin->rowCount()==1){

    	$check_admin=$check_admin->fetch();

    	if($check_admin['usuario_usuario']!=$admin_usuario || !password_verify($admin_clave, $check_admin['usuario_clave'])){
    		echo '
	            <div class="notification is-danger is-light">
	                <strong>¡Ocurrio un error inesperado!</strong><br>
	                USUARIO o CLAVE de administrador incorrectos
	            </div>
	        ';
	        exit();
    	}

    }else{
    	echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                USUARIO o CLAVE de administrador incorrectos
            </div>
        ';
        exit();
    }
    $check_admin=null;

*/
    /*== Almacenando datos del empleado ==*/
    $cedula = limpiar_cadena($_POST['tec_cedula']);
    $nombre=limpiar_cadena($_POST['tec_nombre']);
    $primer_apellido=limpiar_cadena($_POST['tec_primer_apellido']);
    $seguno_apellido=limpiar_cadena($_POST['tec_segundo_apellido']);
    $estado=limpiar_cadena($_POST['tec_estado']);
    $cargo=limpiar_cadena($_POST['tec_cargo']);
    $celular = limpiar_cadena($_POST['tec_telefono']);

    /*== Verificando campos obligatorios del usuario ==*/
    if($cedula=="" || $nombre=="" || $primer_apellido=="" || $segundo_apellido=="" || $estado=="" || $cargo=="" || $celular==""){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No has llenado todos los campos que son obligatorios
            </div>
        ';
        exit();
    }


    /*== Verificando integridad de los datos (usuario) ==*/
    if(verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$nombre)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El NOMBRE no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    if(verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$primer_apellido)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El APELLIDO no coincide con el formato solicitado
            </div>
        ';
        exit();
    }

    if(verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$segundo_apellido)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El USUARIO no coincide con el formato solicitado
            </div>
        ';
        exit();
    }
    if(verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$estado)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El USUARIO no coincide con el formato solicitado
            </div>
        ';
        exit();
    }
    if(verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$cargo)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El USUARIO no coincide con el formato solicitado
            </div>
        ';
        exit();
    }
    if(verificar_datos("[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{3,40}",$celular)){
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                El USUARIO no coincide con el formato solicitado
            </div>
        ';
        exit();
    }


    /*== Verificando email ==
    if($email!="" && $email!=$datos['usuario_email']){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $check_email=conexion();
            $check_email=$check_email->query("SELECT usuario_email FROM usuario WHERE usuario_email='$email'");
            if($check_email->rowCount()>0){
                echo '
                    <div class="notification is-danger is-light">
                        <strong>¡Ocurrio un error inesperado!</strong><br>
                        El correo electrónico ingresado ya se encuentra registrado, por favor elija otro
                    </div>
                ';
                exit();
            }
            $check_email=null;
        }else{
            echo '
                <div class="notification is-danger is-light">
                    <strong>¡Ocurrio un error inesperado!</strong><br>
                    Ha ingresado un correo electrónico no valido
                </div>
            ';
            exit();
        } 
    }


    /*== Verificando usuario ==
    if($usuario!=$datos['usuario_usuario']){
	    $check_empleado=conexion();
	    $check_empleado=$check_empleado->query("SELECT usuario_usuario FROM usuario WHERE usuario_usuario='$usuario'");
	    if($check_empleado->rowCount()>0){
	        echo '
	            <div class="notification is-danger is-light">
	                <strong>¡Ocurrio un error inesperado!</strong><br>
	                El USUARIO ingresado ya se encuentra registrado, por favor elija otro
	            </div>
	        ';
	        exit();
	    }
	    $check_empleado=null;
    }


    /*== Verificando claves ==
    if($clave_1!="" || $clave_2!=""){
    	if(verificar_datos("[a-zA-Z0-9$@.-]{7,100}",$clave_1) || verificar_datos("[a-zA-Z0-9$@.-]{7,100}",$clave_2)){
	        echo '
	            <div class="notification is-danger is-light">
	                <strong>¡Ocurrio un error inesperado!</strong><br>
	                Las CLAVES no coinciden con el formato solicitado
	            </div>
	        ';
	        exit();
	    }else{
		    if($clave_1!=$clave_2){
		        echo '
		            <div class="notification is-danger is-light">
		                <strong>¡Ocurrio un error inesperado!</strong><br>
		                Las CLAVES que ha ingresado no coinciden
		            </div>
		        ';
		        exit();
		    }else{
		        $clave=password_hash($clave_1,PASSWORD_BCRYPT,["cost"=>10]);
		    }
	    }
    }else{
    	$clave=$datos['usuario_clave'];
    }

    */
    /*== Actualizar datos ==*/
    $actualizar_empleado=conexion();
    $actualizar_empleado=$actualizar_empleado->prepare("UPDATE tecnicos SET tec_nombre=:nombre,tec_primer_apellido=:primerapellido,tec_segundo_apellido=:segundoapellido,tec_estado=:estado,tec_cargo=:cargo,tec_telefono=:celular WHERE tec_cedula=:cedula");

    $marcadores=[
        ":nombre"=>$nombre,
        ":primerapellido"=>$primer_apellido,
        ":segundoapellido"=>$segundo_apellido,
        ":estado"=>$estado,
        ":cargo"=>$cargo,
        ":celular"=>$celular,
        ":cedula"=>$cedula
    ];

    if($actualizar_empleado->execute($marcadores)){
        echo '
            <div class="notification is-info is-light">
                <strong>¡USUARIO ACTUALIZADO!</strong><br>
                El usuario se actualizo con exito
            </div>
        ';
    }else{
        echo '
            <div class="notification is-danger is-light">
                <strong>¡Ocurrio un error inesperado!</strong><br>
                No se pudo actualizar el usuario, por favor intente nuevamente
            </div>
        ';
    }
    $actualizar_empleado=null;