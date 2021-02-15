<?php 
if(isset($_POST['submit'])){
    if(
        empty($_POST['nombre']) ||
        empty($_POST['email']) ||
        empty($_POST['mensaje'])
        )
        {
        header("Location:../contacto.html?llena-todos-los-campos");
        exit(); 
    }
    else{
        //datos del formulario a enviar
    $info['nombre'] = $_POST['nombre'];
    $info['email'] = $_POST['email'];
    $info['tel'] = $_POST['tel'];
    $info['mensaje'] = $_POST['mensaje'];
        }
        $mensaje = "
        <html>
        <body>
            <h3>tu mensaje a sido enviado</h3>
            <p><strong>Nombre:</strong>{$info['nombre']}</p>
            <p><strong>Nombre:</strong>{$info['email']}</p>
            <p><strong>Nombre:</strong>{$info['tel']}</p>
            <p><strong>Nombre:</strong>{$info['mensaje']}</p>
            
        </body>
        </html>";
        
        /** 
        Envio del formulario 
        **/
        $para = "pirlohex@gmail.com";
        $de = $para;
        $asunto = "Hola, es mi primer correo";
        //cabeceras
        $headers = "From:$de\r\n";
        $headers = "MIME-Version:1.0\r\n";
        $headers = "content-type:text/html;charset-utf-8\r\n";
        //mensaje del correo
        //enviar
        $enviar = mail($para,$asunto,$mensaje,$headers);
        if($enviar){
            header("Location:../contacto.html?success");
            exit();
        }
        
        else{
            header("Location:../contacto.html?error");
            exit();
        }




    
}
else{
    header("Location:../contacto.html?error");
}

?>
<a href="../contacto.html">Regresar</a>
