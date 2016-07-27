
  <style>
  body {
      position: relative;
  }
  ul.nav-pills {
      top: 70px;
      position: fixed;
  }

  #section1 {color: #fff; background-color: #FFFFFF;}
  #section2 {color: #fff; background-color: #FAEEFF;}
  #section31 {color: #fff; background-color: #FFFFFF;}
  
  #section41 {color: #fff; background-color: #FAEEFF;}
  #section42 {color: #fff; background-color: #FFFFFF;}
  #section43 {color: #fff; background-color: #FAEEFF;}
  #section44 {color: #fff; background-color: #FFFFFF;}
  #section45 {color: #fff; background-color: #FAEEFF;}
  #section46 {color: #fff; background-color: #FFFFFF;}
  #section47 {color: #fff; background-color: #FAEEFF;}
  #section48 {color: #fff; background-color: #FFFFFF;}
  #section49 {color: #fff; background-color: #FAEEFF;}
  #section491 {color: #fff; background-color: #FFFFFF;}
  #section492 {color: #fff; background-color: #FAEEFF;}
  #section493 {color: #fff; background-color: #FFFFFF;}


	IMG.centrar-imagen{
      display: block;
      margin-left: auto;
      margin-right: auto;
      border:none;
      }
  
  
  </style>

<body data-spy="scroll" data-target="#myScrollspy" data-offset="20">

<div class="container">
  <div class="row">
    <nav class="col-sm-3" id="myScrollspy">
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#section1">INTRODUCCIÓN AL STD</a></li>
        <li><a href="#section2">DESCRIPCIÓN</a></li>
        
        <li class="dropdown">
			<a class="dropdown-toggle" data-toggle="dropdown" href="#">POR PRIMERA VEZ <span class="caret"></span></a>
          	<ul class="dropdown-menu">
            	<li><a href="#section31">Iniciando Servicios</a></li>
            	<!--<li><a href="#section32">Una vista rápida</a></li>-->
          	</ul> 	
        </li>

        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">TUTORIAL <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#section41">LOGIN</a></li>
            <li><a href="#section42">Crear Área</a></li>
            <li><a href="#section43">Crear Usuario</a></li>
            <li><a href="#section44">Crear Empleado</a></li>
            <li><a href="#section45">Crear Nuevo Trámite</a></li>
            <li><a href="#section46">Ver trámites</a></li>
            <li><a href="#section47">Redireccionar trámite</a></li>
            <li><a href="#section48">Eliminar Trámite</a></li>
            <li><a href="#section49">Eliminar Trámite</a></li>
            <li><a href="#section491">Modificar Trámite</a></li>
            <li><a href="#section492">Movimientos de trámite</a></li>
            <li><a href="#section493">Gráfica de Estadísticas</a></li>
          </ul>
        </li>
      </ul>
    </nav>
    <div class="col-sm-9">
      <div id="section1">
        <h1 class="text-info">Introducción al Sistema de Trámite documentario</h1>
        <p align="justify" class="text-info"> 
        	Trámite es la gestión o diligenciamiento que se realiza para obtener un resultado, en pos de algo, 
        	o los formulismos necesarios para resolver una cosa o un asunto. 
        	Habitualmente los trámites se realizan en las administraciones públicas y en menor escala en el sector privado,
        	los mismos son de diversas índoles, el ciudadano tiene que hacer trámites en forma permanente para desenvolverse
        	en una sociedad organizada, es por ello que existen muchos organismos públicos creados a tal fin.
        	 </p>
<div>
       	<button class="btn btn-info" data-toggle="collapse" data-target="#demo">Ejemplos de Trámites</button>
			<div id="demo" class="collapse">
			<ul class="text-info">
				<li>Para inscribir un automotor.</li>
				<li>Para inscribir una propiedad.</li>
				<li>Para realizar una venta de un inmueble.</li>
				<li>Para realizar una venta de un inmueble.</li>
				<li>Para obtener un permiso de pesca.</li>
				<li>Para abonar una multa.</li>
				<li>Para denunciar un accidente laboral.</li>
				<li>Para obtener un certificado de un grado académico.</li>
				<li>Para obtener un certificado de buena conducta.</li>
				<li>Para obtener un certificado de residencia.</li>
				<li>Para realizar una denuncia en defensa del consumidor.</li>
				<li>Para inscribir un automotor.</li>
				<li>Para inscribir una empresa recién formada, en el Registro Público de Comercio y Personería Jurídica.</li>
				<li>Para inscribir a una empresa o persona física en el listado de proveedor del estado de una nación, provincia o municipio.</li>
				<li>Trámite de las personas o empresas para inscribirse en un tipo de impuesto nacional o provincial.</li>
				<li>Para obtener una copia certificada del acta de nacimiento, matrimonio o defunción en el Registro Civil.</li>
				<li>Parlamentarios, para la creación de una ley.</li>
				<li>Judiciales de distinta índole.</li>
			</ul>
</div>
		<p class="text-info" align="justify">
			En las organizaciones modernas, el ingreso, creación y envió de documentos es una tarea de ejecución diaria. 
			La administración del flujo de estos documentos y la ubicación de los mismos se ha convertido en una tarea titánica,
			si no imposible. 
			Esta situación lleva a que se dupliquen esfuerzos y se malgasten recursos generando múltiples veces
			los mismos documentos o que la imagen de la organización se deteriore al no responder a los requerimientos con
			diligencia y oportunidad
		</p>
		<p class="text-info" align="justify">
			Trámite Documentario es una aplicación que permite a las organizaciones tener el control de la ubicación física y estatus, 
      actual y pasado de la documentación que llega, fluye y se genera dentro de ellas; y en base a estos datos mostrar estadísticas 
      que permitan analizar pasos repetitivos o que no agreguen valor y los cuellos de botella para mejorar los flujos de los documentos 
      dentro de la organización.
		</p>

      </div>
      <div id="section2">
        <div class="text-info" align="justify">     	
        <h1>Descripción del Sistema de Trámite documentario</h1>
        	<p>
        		Este sistema de Tramite Documentario funciona de la siguiente manera:
        	</p>
        	<p>
        		1. Una persona se acerca a Mesa de Partes para ingresar un trámite, se le pregunta si es la primera vez que se acerca para realizar un trámite.	
        	</p>
        	<p>
        		2. En el caso que la persona sea nueva se le ingresará en el sistema a través de sus datos, caso contrario se le pedirá su número de DNI para iniciar un nuevo trámite.
        	</p>
        	<p>
        		3. De acuerdo a la información entregada en Mesa de Partes, se llenarán los requisitos del trámite (Destino, Asunto, Cantidad de Folios, Prioridad).
        	</p>
        	<p>
        		4. Una vez ingresado el trámite al sistema, la persona podrá ver el estado de este mediante su DNI, el cuál le mostrará todos sus trámites realizados: sea en espera o terminados.
        	</p>
        	<p>
        		5. Se podrá hacer un ingreso especial de trámite, dando niveles altos de prioridad.
        	</p>
        	<p>
        		6. Cuando el trámite está dentro del sistema será dirigido a cada bandeja de entrada de cada Jefe de cada área correspondiente.
        	</p>
        	<p>
        		7. Este jefe se encargará de asignar los encargados adecuados para la revisión del trámite.
        	</p>
        	<p>
        		8. Los encargados podrán dar un trámite por terminado, siendo posible ponerlo en espera por falta de documentos.
        	</p>
        	<p>
        		9. Los tramites podrán ser editados, eliminados y darlos como completados en cada caso correspondiente.
        	</p>
        	<p>
        		10. El personal de la empresa, podrá ser ingresado como persona natural, ser modificado su cargo dentro de la empresa y ser eliminado del sistema, esto será únicamente posible con una cuenta de SU.
        	</p>
        	<p>
        		11. Además será posible ver una lista completa de todos las empleados dentro del sistema con información personal.
        	</p>
        	<p>
        		12. De igual forma con las personas naturales.
        	</p>
        	<p>
        		13 .Diariamente se podrá hacer una consulta de los movimientos de trámites. Dando a entender la posibilidad de un filtro por fechas.
        	</p>

        </div>

      </div>

      <!--INICIANDO SERVICIOS PARTE 3 .1 ***************************************************************-->
      <div id="section31">
        <div class="text-info" align="justify">
        <h1>INICIANDO SERVICIOS</h1>
        	<p>Antes de empezar la explicación del sistema vamos a correrlo.</p>
        	<p>Para ello es necesario iniciar los servicios ‘Apache Web Server’ , ‘MySQL DataBase’ en XAMPP.</p>
        	<p>Abrimos XAMPP y encendemos los servidores dándole ‘start’ a cada servidor. Esperaremos hasta que se inicien.</p>
        	<img src="<?php echo URLV ?>imagenes/imagen1.PNG" class="img-thumbnail centrar-imagen" alt="Cinque Terre">
        	<p>La ventana deberá cambiar de esta forma:</p>
        	<img src="<?php echo URLV ?>imagenes/imagen2.PNG" class="centrar-imagen" >
        	<p>Accedemos a la carpeta <b>“HTDOCS”</b> correspondiente a nuestro sistema y pegamos la carpeta <b>‘tramitedocumentariocs’</b> dentro de este.</p>
        	<img src="<?php echo URLV ?>imagenes/imagen3.PNG" class="centrar-imagen" >
        	<p>Ahora tendremos que importar la base de datos.</p>
          <p>Para ello accedemos a la carpeta <b>‘tramitedocumentariocs’</b> y buscamos el archivo ‘tramite.sql’ que será importado a través de <b>‘PHPMyAdmin’</b>.</p>
          <img src="<?php echo URLV ?>imagenes/imagen9.png" class="centrar-imagen" ><br>
          <p>Nos dirigimos al navegador e introducimos el siguiente link:</p>
          <p>En <b>‘localhost/phpmyadmin’</b>. Nos debe aparecer esto:</p>
          <img src="<?php echo URLV ?>imagenes/imagen10.PNG" class="centrar-imagen" ><br>
          <p>Nos acercamos a ‘Nueva’.</p>
          <img src="<?php echo URLV ?>imagenes/imagen11.PNG" class="centrar-imagen" ><br>
          <p>Creamos una nueva base de datos con el nombre ‘tramite’.</p>
          <img src="<?php echo URLV ?>imagenes/imagen12.PNG" class="centrar-imagen" ><br>
          <p>Una vez creada tendremos que importa el archivo .sql</p>
          <img src="<?php echo URLV ?>imagenes/imagen13.PNG" class="centrar-imagen" ><br>
          <p>Seleccionamos el archivo <b>‘tramite.sql’</b> que antes buscamos y lo importamos bajando hasta el botón ‘Continuar’.</p>
          <img src="<?php echo URLV ?>imagenes/imagen14.PNG" class="centrar-imagen" ><br>
          <p>Ahora ya podremos almacenar y leer información de la Base de Datos.</p>
          <img src="<?php echo URLV ?>imagenes/imagen15.PNG" class="centrar-imagen" ><br>
          <p>Nos dirigimos al navegador y escribimos: <b>‘localhost/tramitedocumentariocs/’</b>. Nos aparecerá esta pantalla.</p>
          <img src="<?php echo URLV ?>imagenes/imagen16.PNG" class="centrar-imagen" ><br>
          <p>Nos dirigimos a <b>‘Ingresar’</b> y nos mostrará esto:</p>
          <img src="<?php echo URLV ?>imagenes/imagen17.PNG" class="centrar-imagen" ><br>
          <p>De acuerdo a la base de datos <b>‘tramite’</b> dentro de la tabla <b>‘empleados’</b> seleccionemos un DNI y contraseña de uno para iniciar sesión.</p>
          <img src="<?php echo URLV ?>imagenes/imagen18.PNG" class="centrar-imagen" ><br>
          <P>Una vez ya iniciado podremos realizar acciones de acuerdo a nuestro cargo dentro del sistema.</P>
          <P>Cada cargo maneja diferentes funciones y estas estarán disponibles una vez iniciemos con una cuenta correcta.</P>
          <p>Las funciones disponibles estarán en la barra de navegación, la cual cambiará de acuerdo al tipo de cuenta.</p>
          <P>Por ejemplo, con este perfil podremos visualizar :</P>
          <img src="<?php echo URLV ?>imagenes/imagen19.PNG" class="centrar-imagen" ><br>
          <img src="<?php echo URLV ?>imagenes/imagen20.PNG" class="centrar-imagen" ><br>
          <img src="<?php echo URLV ?>imagenes/imagen21.PNG" class="centrar-imagen" ><br>
          <P>Podremos ver los trámites disponibles. Estos podrán ser redirigidos, modificados o eliminados.</P>
          <img src="<?php echo URLV ?>imagenes/imagen22.PNG" class="centrar-imagen" ><br>
          <p>Una cuenta destinada a Mesa de Partes podrá registrar personas, crear trámites.</p>
          <img src="<?php echo URLV ?>imagenes/imagen23.PNG" class="centrar-imagen" ><br>
          <img src="<?php echo URLV ?>imagenes/imagen24.PNG" class="centrar-imagen" ><br>
          <p>De la misma forma una cuenta SU podrá crear empleados, áreas y eliminarlos.</p>
          <img src="<?php echo URLV ?>imagenes/imagen25.PNG" class="centrar-imagen" ><br>
          <img src="<?php echo URLV ?>imagenes/imagen26.PNG" class="centrar-imagen" ><br>
        </div>
      </div>

	<!--<div id="section42">-->
      <!--<div class="text-info" align="justify">
          <h1>TUTORIAL</h1>
          <br>
          <img src="<?php echo URLV ?>imagenes/imagen27.PNG" class="centrar-imagen" ><br>-->
        <!--MANUAL ****************************************************************************************-->
        <div id="section41">
         <div class="text-info" align="justify">
          <h1>LOGIN</h1>
          <p>a. Primero debemos ingresar con nuestro DNI y nuestra respectiva contraseña, de acuerdo a los datos asignados en la base de datos.</p>
          <p>b. Después podremos ver las opciones permitidas según nuestra ocupación o cargo.</p>
          <img src="<?php echo URLV ?>imagenes/imagen28.PNG" class="centrar-imagen" ><br>
         </div>
        </div>
        <div id="section42">
         <div class="text-info" align="justify">
          <h1>Crear Área</h1>
          <p>Aquí podemos crear una nueva área si es necesario.
              Entre las áreas ya incluídas están: Mesa de Partes, Gerencia, Logística, Recursos Humanos, Informática y Contabilidad. Esta opción solo la podrá realizar el Gerente
          </p>
          <img src="">
          <p>También tendremos la opción de ver las áreas mediante la opción Todos.</p>
          <img src="">
          <img src="">
          <p>Cada área podrá ser modificada o ser eliminada de acuerdo a las necesidades que se presenten. </p>
         </div>
        </div>
        <div id="section43">
         <div class="text-info" align="justify">
          <h1>Crear Usuario</h1>
          <p>Aquí se podrá crear un empleado nuevo asignando su cargo dentro del sistema. Función disponible únicamente  por un SU. 
          </p>
          <img src="">

         </div>
        </div>
        <div id="section44">
         <div class="text-info" align="justify">
          <h1>Crear Empleado</h1>
          <p>Try to scroll this section and look at the navigation list while scrolling!</p>
         </div>
        </div>
        <div id="section45">
         <div class="text-info" align="justify">
          <h1>Crear Nuevo Tramite</h1>
          <p>Aquí se podrá crear un nuevo trámite. Ingresando el DNI, o creando un nuevo usuario en ese momento. Luego se deberá ingresar el usuario para empezar a llegar los campos necesarios y el archivo adjunto del trámite.
          </p>
          <img src="">
         </div>
        </div>
        <div id="section46">
         <div class="text-info" align="justify">
          <h1>Ver Trámite</h1>
          <p>Tendremos la posibilidad de ver todos los trámites que se hicieron en la opción:</p>
          <img src="">
          <img src="">
         </div>
        </div>
        <div id="section47">
         <div class="text-info" align="justify">
          <h1>Redireccionar Trámite</h1>
          <p>Cuando veamos todos los trámites tendremos la opción de redireccionar un trámite al área donde será procesada mediante el ícono.<span class="glyphicon glyphicon-envelope"></span>
          </p>
          <img src="">
          <img src="">
         </div>
        </div>
        <div id="section491">
         <div class="text-info" align="justify">
          <h1>Movimientos Trámite</h1>
          <p>En la opción movimientos podremos observar por qué áreas pasaron cada uno de los trámites.
          </p>
          <img src="">
         </div>
        </div>
        <div id="section492">
         <div class="text-info" align="justify">
          <h1>Grafica Estadísticas</h1>
          <p>Día a día, el gerente o SU podrá visualizar un resumen de todos los trámites llegados mediante una simple gráfica que explica la cantidad de trámites recibidos por área.
          </p>
          <img src="">
         </div>
        </div>

      <!--</div>-->
  <!--</div>-->
</div>

</body>