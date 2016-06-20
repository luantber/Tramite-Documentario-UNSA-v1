# tramitedocumentariocs

Sistema para un Tramite Documentario ...
Mushashos ... y mushashas
los que estan haciendo las Views
deben guardar sus archivos en
Views
:3
las rutas se redirigen automaticamente alli
por ejemplo
localhost/tramitedocs/empleado/registrar
redirige a
views/empleado/registrar.php
asi que deben guardar sus archivos con extension .php
si no especificas el archivo como
en este caso
localhost/tramitedocs/empleado/
se redirige a
views/empleado/index.php
lo mismo con los controladores ...
por defecto se esta cargando un template
Template.php
este contiene la cabecera y el footer para todas las vistas
asi que .. este deberia contener el navbar
.. por esto ... en sus vistas solo debe contener el contenido del body
ah .. respecto a los controladores
localhost/tramitedocs/empleado/registrar
llamara a
Controllers/empleadoController.php y ejecuta su metodo ->  public registrar()
y si no se especficia el metodo llamara al metodo index
localhost/tramitedocs/empleado/registrar/arg
esto llamara a
Controllers/empleadoController.php y ejecuta su metodo ->  public registrar() .. y pasara " arg" como argumento de la funcion ...
m...
m...
hay un archivo config.php
en este configuraremos el nombre de nuestra carpeta .. porque puede que no todos lo tengamos con el mismo nombre ..
por defaullt ... es "tramitedocumentariocs"
ñam .. ñam ..
en cualquier momento pueden usar las variables
URL
URLM
si estan desde una vista sería
"<?php echo URLM; ?>
o
"<?php echo URL; ?>
esto devuelve la direccion
URL = "http://localhost/tucarpeta/"
URL = "http://localhost/tucarpeta/views"
* URLM = "http://localhost/tucarpeta/"
esto para que puedan acceder por ejemplo a los archivos css .. o imagenes
porque todas las rutas seran reinterpretadas como dije anteriormente
