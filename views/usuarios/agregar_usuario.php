<h1>Agregar Usuario</h1>
<?php if (isset($_SESSION['register'])&& $_SESSION['register']=='complete'):?>
    <strong class="alert_green">Registro completado correctado</strong>
    <?php else :?>
        <strong class="alert_red">Registro fallido</strong>
    <?php endif;?>
    <?php utils::eliminarSesion('register');?>
<form action="index.php?controller=usuario&action=guardar_usuario" method="POST">
    <label for="nombre">nombre:</label>
    <input type="text" name="nombre" required/>
    <label for="apellido_paterno">apellido paterno:</label>
    <input type="text" name="apellido_paterno"required/>
    <label for="apellido_materno">apellido materno</label>
    <input type="text" name="apellido_materno"required/>
    <label for="email">correo electronico</label>
    <input type="email" name="email" required/>
    <label for="contraseña">contraseña</label>
    <input type="password" name="contraseña" required/>
    <label for="imagen">cargar imagen de perfil</label>
    <input type="file" name="imagen"/>
    <button type="submit">Guardar usuario</button>
    <button type="reset">limpiar</button>
</form>