<?php include("../../inicioContenido.php"); ?>
<h1>Contacto</h1>
<?php 
if ($_GET['paso'] == 1)
{ 
	
?> 
  
<p>
  Ponemos a su disposición un formulario de consultas, quejas, sugerencias... Intentaremos darle respuesta en la mayor brevedad.
</p>
<?php include("/home/mikelo/domains/latiendadelosarreglos.es/public_html/contenido/contacto/formulario.html"); ?>
<?php
}
else
{
  $errorFormulario = false;
  
  // Validamos el formulario
  if (empty($_POST['nombre']))
  {
    $errorFormulario = true;
  }
  if (empty($_POST['correo']))
  {
    $errorFormulario = true;
  }
  if (empty($_POST['mensaje']))
  {
    $errorFormulario = true;
  }
    
  if (!$errorFormulario)
  {

    // Rellenamos el cuerpo del correo
    $cuerpo = "Formulario enviado desde latiendadelosarreglos.es\n";
    $cuerpo .= "Nombre: " . $_POST['nombre'] . "\n";
    $cuerpo .= "Correo electronico: " . $_POST['correo'] . "\n";
    $cuerpo .= "Mensaje: " . $_POST['mensaje'] . "\n";

    // Mandamos el correo
    mail("latiendadelosarreglos@gmail.com", "La Tienda de los Arreglos: Formulario de contacto", $cuerpo);
    
    // Damos las gracias por el envío
    echo "Sus datos se han enviado correctamente. Intentaremos darle respuesta en la mayor brevedad.";
  }
  
  else
  {
    echo "<p class=\"textoRojo\"><strong>Ha habido un ERROR en el formulario. Por favor, rellene todos los campos correctamente:</strong></p>";
    include("formulario.html");
  }
  
}
  ?>
    
  <?php include("../../finContenido.php"); ?>