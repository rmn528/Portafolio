<?php
	
	//a quien(es) va dirigido el correo
	$destino="Usuario <usuario@example.com>, Otro usuario <otrousuario@example.com>";
	
	//asunto del correo
	$asunto="Saludos del Admin";
	
	//contenido del correo (puede ser texto plano o formateado con PHP o HTML)
	$contenido="<h1>ATENCION</h1>\r\neste es un\r\nmensaje enviado\r\ndesde php\r\n";
	
	
	//cabeceras para los correos (Content-Type: ;charset=iso-8859-1,MIME-Version:,Content-Transfer-Encoding:,
	//Return-path:,Subject:,From:,Envelope-to:,To:,Bcc:,Cc:,X-Mailer:,Reply-To:)
	
	//por lo menos estas son las cabeceras necesarias para que el correo pueda llevar formato HTML y que
	//no llegue a la carpeta de correo no deseado como SPAM
	$cabeceras="X-Mailer: PHP/".phpversion()."\r\n";
	$cabeceras.="MIME-Version: 1.0.\r\n";
	$cabeceras.="Content-Type: Text/HTML; charset=iso-8859-1\r\n";
	$cabeceras.="From: QuienEnvia <QuienEnvia@example.com>\r\n";
	
	//verificamos si se pudo enviar el correo
	if(mail($destino,$asunto,$contenido,$cabeceras)){
		
		//imprimimos el mensaje de exito
		echo "<p>Gracias por enviar correos con PHP</p>";
	}else{
		
		//imprimimos el mensaje de error
		echo "<p>Ha fallado el servidor de correo nuevamente intente de nuevo</p>";
	}
?>