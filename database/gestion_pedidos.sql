-- Creación de base de datos gestión de pedidos
CREATE DATABASE gestion_pedidos;

-- Seleccionar la base de datos de gestión de pedidos
USE gestion_pedidos;

-- Tabla de los datos de información del usuario
CREATE TABLE DB_cuenta_usuario (
    id_cuenta_usuario INT PRIMARY KEY AUTO INCREMENT NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    apellido_paterno VARCHAR(50) NOT NULL,
    apellido_materno VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    imagen VARCHAR(255) NOT NULL,
    estado VARCHAR(20) NOT NULL
);

-- Tabla de los datos del cliente del sistema
CREATE TABLE DB_Cliente (
    id_cliente INT PRIMARY KEY AUTO INCREMENT NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    apellido_paterno VARCHAR(50) NOT NULL,
    apellido_materno VARCHAR(50) NOT NULL,
    numero_telefonico VARCHAR(15) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    estado VARCHAR(20) NOT NULL
);

-- Tabla de los datos del proveedor
CREATE TABLE DB_Proveedor (
    rfc INT PRIMARY KEY AUTO INCREMENT NOT NULL,
    nombre VARCHAR(50) NOT NULL,
    apellido_paterno VARCHAR(50) NOT NULL,
    apellido_materno VARCHAR(50) NOT NULL,
    numero_telefonico VARCHAR(15) NOT NULL,
    correo VARCHAR(100) NOT NULL,
    direccion VARCHAR(255) NOT NULL,
    estado VARCHAR(20) NOT NULL,
    nombre_empresa VARCHAR(100) NOT NULL
);

-- Tabla de los datos de los productos del sistema
CREATE TABLE DB_Producto (
    codigo_barras INT PRIMARY KEY AUTO INCREMENT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    tiempo_realizacion TIME NOT NULL,
    descripcion VARCHAR(255) NOT NULL,
    estado VARCHAR(20) NOT NULL,
    rfc_proveedor INT NOT NULL,
    FOREIGN KEY (rfc_proveedor) REFERENCES DB_Proveedor(rfc)
);

-- Tabla de los datos de compra del sistema
CREATE TABLE DB_Compra (
    codigo_compra INT PRIMARY KEY AUTO INCREMENT NOT NULL,
    fecha_compra DATE NOT NULL,
    hora_compra TIME NOT NULL,
    importe DECIMAL(25, 2) NOT NULL,
    cantidad_producto INT NOT NULL,
    estado VARCHAR(25) NOT NULL,
    codigo_barras INT NOT NULL,
    FOREIGN KEY (codigo_barras) REFERENCES DB_Producto(codigo_barras)
);

-- Tabla de los datos del inventario del sistema
CREATE TABLE DB_Inventario (
    codigo_inventario INT PRIMARY KEY AUTO INCREMENT NOT NULL,
    stock_minimo INT NOT NULL,
    stock_maximo INT NOT NULL,
    existencia INT NOT NULL,
    codigo_barras_producto INT NOT NULL,
    FOREIGN KEY (codigo_barras_producto) REFERENCES DB_Producto(codigo_barras)
);

-- Tabla de los datos del pedido
CREATE TABLE DB_Pedido (
    numero_pedido INT PRIMARY KEY AUTO INCREMENT NOT NULL,
    fecha_entrega DATE NOT NULL,
    hora_entrega TIME NOT NULL,
    ubicacion_actual VARCHAR(100) NOT NULL,
    ubicacion_destino VARCHAR(100) NOT NULL,
    estado VARCHAR(20) NOT NULL,
    codigo_barras INT NOT NULL,
    id_cliente INT NOT NULL,
    id_cuenta_usuario INT NOT NULL,
    FOREIGN KEY (codigo_barras) REFERENCES DB_Producto(codigo_barras),
    FOREIGN KEY (id_cliente) REFERENCES DB_Cliente(id_cliente),
    FOREIGN KEY (id_cuenta_usuario) REFERENCES DB_cuenta_usuario(id_cuenta_usuario)
);

-- Tabla de los datos de información del pedido
CREATE TABLE DB_informacion_Pedido (
    codigo_informacion_pedido INT PRIMARY KEY AUTO INCREMENT NOT NULL,
    fecha_entrega DATE NOT NULL,
    hora_entrega TIME NOT NULL,
    ubicacion_actual VARCHAR(100) NOT NULL,
    ubicacion_destino VARCHAR(100) NOT NULL,
    estado VARCHAR(25) NOT NULL,
    numero_pedido INT NOT NULL,
    codigo_barras INT NOT NULL,
    id_cliente INT NOT NULL,
    FOREIGN KEY (numero_pedido) REFERENCES DB_Pedido(numero_pedido),
    FOREIGN KEY (codigo_barras) REFERENCES DB_Producto(codigo_barras),
    FOREIGN KEY (id_cliente) REFERENCES DB_Cliente(id_cliente)
);