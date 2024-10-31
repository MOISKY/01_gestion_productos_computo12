<?php if(!isset($_SESSION['identity'])):?>
<h1>Iniciar sesion</h1>
<form action="usuarios/iniciar_sesion" method="POST">
    <label for="email">email: </label>
    <input type="text" name="email"/>
    <label for="contraseña">contraseña: </label>
    <input type="contraseña" name="contraseña"/>
    <button type="submit">Iniciar sesion</button>
</form>
<?php else:?>
    <h1><?$_SESSION['identity']->nombre?><?=$_SESSION['identity']->apellido_paterno?><?$_SESSION['identity']->apellido_materno?></h1>
<?php endif;?>