<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>desplegable1.html</title> 
<style type="text/css">
* { padding: 0; margin: auto; text-align: center; }
#cabecera { background-color: #fff0f0; }  
h1 { font: bold 1.5em arial; padding: 0.5em; }
#navegador { background-color: #663366; padding: 0.5em; }
#navegador li { margin: 0px 5px; padding: 0.1em 1em 0.5em 1em; 
           background-color: #9933cc; width: 12%;float: left;
           list-style-type: none;   }
#navegador li:hover { background-color: #990033; }
#navegador li a:link, #navegador li a:visited { 
           color: #feffe4; text-decoration: none; }
#navegador li a:hover, #navegador li a:active { 
           color:#ffd7a9 ; text-decoration: none; }
.borrar { clear: both; }  
#principal h2 { font: bold 1.5em arial; padding: 0.5em }
#principal p { font: normal 0.9em arial; text-align: justify;
           text-indent: 3em; padding: 0.5em 2em; }
</style>
<script type="text/javascript" src="submenus.js"></script>
</head>
<body>
<div id="cabecera">
  <h1>Mi página</h1>
</div>
<div id="navegador">
  <ul>
    <li id="seccion0"><a href="#">Sección Uno</a></li>
    <li id="seccion1"><a href="#">Sección Dos</a></li>
    <li id="seccion2"><a href="#">Sección Tres</a></li>
    <li id="seccion3"><a href="#">Sección Cuatro</a></li> 
  </ul>
  <div class="borrar"></div>
</div>
<div id="principal">
  <h2>Cuerpo principal de la página</h2>
  <p>Primer Parrafo.</p>

  <p>Segundo Parrafo.</p>
</div>
</body>
</html>


