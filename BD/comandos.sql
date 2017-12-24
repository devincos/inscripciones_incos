-- Creando una base de datos
create user incos_user with password 'incos_pass';
-- asigando los permisos de super usuario
alter role incos_user with superuser;
-- Creando la base de datos de incos_db, donde el propietario sera: incos_user;
create database incos_db with owner incos_user;