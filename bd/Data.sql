--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

--
-- Data for Name: accesos; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- Name: accesos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('accesos_id_seq', 1, false);


--
-- Data for Name: parametros; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO parametros (id, parent_id, tipo, valor, codigo, fecha, orden, nombre, descripcion, data, lft, rght, created, modified) VALUES (8, 6, NULL, NULL, '', NULL, NULL, 'Usuario del Sistema', 'Usuario del Sistema', NULL, 2, 3, '2016-05-24 18:31:35', '2016-05-24 18:31:35');
INSERT INTO parametros (id, parent_id, tipo, valor, codigo, fecha, orden, nombre, descripcion, data, lft, rght, created, modified) VALUES (6, NULL, NULL, NULL, '', NULL, NULL, 'Roles de Usuarios del sistema', 'Roles de Usuarios del sistema', NULL, 1, 6, '2016-05-24 18:31:05', '2016-05-24 18:31:05');
INSERT INTO parametros (id, parent_id, tipo, valor, codigo, fecha, orden, nombre, descripcion, data, lft, rght, created, modified) VALUES (7, 6, 2, NULL, '', NULL, NULL, 'Administrador del Sistema', 'Administrador del Sistema', '', 4, 5, '2016-05-24 18:31:20', '2017-06-06 14:33:51');
INSERT INTO parametros (id, parent_id, tipo, valor, codigo, fecha, orden, nombre, descripcion, data, lft, rght, created, modified) VALUES (2, 1, NULL, NULL, 'DNI', NULL, NULL, 'Documento Nacional de Identidad', '', '', 8, 9, '2016-05-24 18:29:25', '2017-08-29 00:30:50');
INSERT INTO parametros (id, parent_id, tipo, valor, codigo, fecha, orden, nombre, descripcion, data, lft, rght, created, modified) VALUES (3, 1, NULL, NULL, '', NULL, NULL, 'Libreta Electoral', '', NULL, 10, 11, '2016-05-24 18:29:36', '2016-05-24 18:29:36');
INSERT INTO parametros (id, parent_id, tipo, valor, codigo, fecha, orden, nombre, descripcion, data, lft, rght, created, modified) VALUES (4, 1, NULL, NULL, '', NULL, NULL, 'Libreta Militar', '', NULL, 12, 13, '2016-05-24 18:29:48', '2016-05-24 18:29:48');
INSERT INTO parametros (id, parent_id, tipo, valor, codigo, fecha, orden, nombre, descripcion, data, lft, rght, created, modified) VALUES (5, 1, NULL, NULL, '', NULL, NULL, 'Pasaporte', '', NULL, 14, 15, '2016-05-24 18:30:01', '2016-05-24 18:30:52');
INSERT INTO parametros (id, parent_id, tipo, valor, codigo, fecha, orden, nombre, descripcion, data, lft, rght, created, modified) VALUES (1, NULL, NULL, NULL, '', NULL, NULL, 'Tipos de documento', 'Tipos de documentos personales', '', 7, 16, '2016-05-24 18:29:08', '2017-09-03 06:28:46');


--
-- Name: parametros_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('parametros_id_seq', 1, false);


--
-- Data for Name: personas; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO personas (id, nombres, apepaterno, apematerno, nombrecompleto, fechanacimiento, prmtipodocumento, numerodocumento, prmgenero, created, modified) VALUES (1, 'administrador', 'del sistema', 'sistema', 'administrador del sistema sistema', '1979-10-12', 1, '23456723', 1, '2016-12-15 00:00:00', '2017-12-07 04:57:12');
INSERT INTO personas (id, nombres, apepaterno, apematerno, nombrecompleto, fechanacimiento, prmtipodocumento, numerodocumento, prmgenero, created, modified) VALUES (3, 'Luis Felipe', 'Aguilar', 'Pereda', 'Luis Felipe Aguilar Pereda', '1979-10-12', NULL, NULL, NULL, '2017-10-11 03:25:09', '2017-12-07 14:51:40');


--
-- Name: personas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('personas_id_seq', 3, true);


--
-- Data for Name: rolusers; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO rolusers (id, user_id, prmrolusuario, activo, eliminado, created, modified) VALUES (16, 1, 7, 'S', 'N', '2017-12-07 04:57:12', '2017-12-07 04:57:12');
INSERT INTO rolusers (id, user_id, prmrolusuario, activo, eliminado, created, modified) VALUES (17, 2, 7, 'S', 'N', '2017-12-07 14:51:41', '2017-12-07 14:51:41');


--
-- Name: rolusers_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('rolusers_id_seq', 17, true);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO users (id, persona_id, nombrecompleto, email, username, password, passtoken, passtokenfecha, fotodir, foto, activo, eliminado, status, created, modified) VALUES (1, 1, 'administrador del sistema sistema', 'admin@admin.com', 'admin@admin.com', '$2y$10$.5BwWje6vLYfjsrELeNPzO2IGOXY.gFVEYax8n038kAhBhC0tGoYi', NULL, NULL, 'b8d7708b-22dd-482a-8694-0481545c57b3', '20151129_154444.jpg', 'S', 'N', 1, '2016-05-12 00:00:00', '2017-12-07 04:57:12');
INSERT INTO users (id, persona_id, nombrecompleto, email, username, password, passtoken, passtokenfecha, fotodir, foto, activo, eliminado, status, created, modified) VALUES (2, 3, 'Luis Felipe Aguilar Pereda', 'luis.aguilarpereda@gmail.com', 'luis.aguilarpereda@gmail.com', '$2y$10$kKDLpO9jq5lAHeWCbDzvTOVcb85q1P0NOpqftOeXX7oCQBWS5fQyS', '', '2017-11-13 20:19:11', '69efb3b7-9dc7-40f6-9dd7-2ccd3116c844', 'ricardo.jpg', 'S', 'N', 1, '2017-10-11 03:25:09', '2017-12-07 14:51:40');


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('users_id_seq', 2, true);


--
-- PostgreSQL database dump complete
--

