<h1>Agregar Usuario</h1>
<form action="index.php?controller=usuario&action=guardar_usuario" method="POST">
    <label for="nombre">nombre:</label>
    <input type="text" name="nombre"/>
    <label for="apellido_paterno">apellido paterno:</label>
    <input type="text" name="apellido_paterno"/>
    <label for="apellido_materno">apellido materno</label>
    <input type="text" name="apellido_materno"/>
    <label for="email">correo electronico</label>
    <input type="email" name="email"/>
    <label for="contraseña">contraseña</label>
    <input type="password" name="contraseña"/>
    <label for="imagen">cargar imagen de perfil</label>
    <input type="file" name="imagen"/>
    <button type="submit">Guardar usuario</button>
    <button type="reset">limpiar</button>
</form>