--
-- Estructura de tabla para la tabla  users 
--
CREATE TABLE  personas  (
   id  serial primary key,
   nombres  character varying(100) NOT NULL,
   apepaterno  character varying(100) NOT NULL,
   apematerno  character varying(100) NOT NULL,
   $nomcompleto character varying(300) NOT NULL,
   fecnacimiento   date  DEFAULT NULL,
   tbltipdocumento  integer DEFAULT NULL,
   numerodocumento  character varying(20) DEFAULT NULL,
   tblgenero  integer DEFAULT NULL,
   created  timestamp  DEFAULT NULL,
   modified   timestamp  DEFAULT NULL
);

CREATE TABLE users  (
   id  serial primary key,
   persona_id  integer NOT NULL,
   email  character varying(150) NOT NULL,
   username  character varying(150) DEFAULT NULL,
   password  character varying(255) DEFAULT NULL,
   passtoken  character varying(255) DEFAULT NULL,
   passtokenfecha   timestamp  DEFAULT NULL,
   fotodir  character varying(250) DEFAULT NULL,
   foto  character varying(250) DEFAULT NULL,
   activo  character varying(1) NOT NULL DEFAULT 'S',
   eliminado  character varying(1) DEFAULT 'N',
   status  integer NOT NULL DEFAULT '1',
   created   timestamp  DEFAULT NULL,
   modified   timestamp  DEFAULT NULL
);

CREATE TABLE rolusers  (
   id  serial primary key,
   user_id  integer NOT NULL,
   tabla_id  integer NOT NULL,
   activo  character varying(1) NOT NULL DEFAULT 'S',
   created   timestamp  NOT NULL,
   modified   timestamp  NOT NULL
);

CREATE TABLE tablas  (
   id  serial primary key,
   parent_id  integer DEFAULT NULL,
   tipo  integer DEFAULT NULL,
   valor  integer DEFAULT NULL,
   codigo  character varying(100) DEFAULT NULL,
   fecha   timestamp  DEFAULT NULL,
   nombre  character varying(250) DEFAULT NULL,
   descripcion  character varying(250) DEFAULT NULL,
   lft  integer DEFAULT NULL,
   rght  integer DEFAULT NULL,
   created   timestamp  DEFAULT NULL,
   modified   timestamp  DEFAULT NULL
);




INSERT INTO  personas  ( nombres ,  apepaterno ,  apematerno ,  fecnacimiento ,  tbltipdocumento ,  numerodocumento ,  tblgenero ,  created ,  modified ) VALUES
('administrador', 'del', 'sistema', '15-12-2016', 1, '23456723', 1, '05-12-2016', NULL);

INSERT INTO  users  (  persona_id ,  email ,  username ,  password ,  passtoken ,  passtokenfecha ,  fotodir ,  foto ,  activo ,  eliminado ,  status ,  created ,  modified ) VALUES
( 1, 'admin@admin.com', 'admin', '$2y$10$.5BwWje6vLYfjsrELeNPzO2IGOXY.gFVEYax8n038kAhBhC0tGoYi', NULL, NULL, 'b8d7708b-22dd-482a-8694-0481545c57b3', '20151129_154444.jpg', 'S', 'N', 1, '05-12-2016', '05-12-2016');

INSERT INTO  tablas  (parent_id ,  tipo ,  valor ,  codigo ,  fecha ,  nombre ,  descripcion ,  lft ,  rght ,  created ,  modified ) VALUES
(NULL, NULL, NULL, '', NULL, 'Tipos de documento', 'Tipos de documento de identidad Perú', 1, 10, '2016-05-12', NULL),
(1, NULL, NULL, 'DNI', NULL, 'Documento Nacional de Identidad', '', 2, 3, '2016-05-12', NULL),
(1, NULL, NULL, 'LE', NULL, 'Libreta Electoral', '', 4, 5, '2016-05-12', NULL),
(1, NULL, NULL, 'LM', NULL, 'Libreta Militar', '', 6, 7, '2016-05-12', NULL),
(1, NULL, NULL, 'PAS', NULL, 'Pasaporte', '', 8, 9, '2016-05-12', NULL),
(NULL, NULL, NULL, NULL, NULL, 'Roles', 'Roles de usuario del Sistema', 11, 16, '2016-05-12', NULL),
(6, NULL, NULL, 'admin', NULL, 'Administrador', 'Administrador del Sistema', 12, 13, '2016-05-12', NULL),
(6, NULL, NULL, 'user', NULL, 'Usuario', 'Usuario comun del Sistema', 14, 15, '2016-05-12', NULL);
