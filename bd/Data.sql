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
-- Data for Name: parametros; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO parametros (id, parent_id, tipo, valor, codigo, fecha, orden, nombre, descripcion, data, lft, rght, created, modified) VALUES (2, 1, NULL, NULL, '', NULL, NULL, 'Documento Nacional de Identidad', '', NULL, 2, 3, '2016-05-24 18:29:25', '2016-05-24 18:29:25');
INSERT INTO parametros (id, parent_id, tipo, valor, codigo, fecha, orden, nombre, descripcion, data, lft, rght, created, modified) VALUES (3, 1, NULL, NULL, '', NULL, NULL, 'Libreta Electoral', '', NULL, 4, 5, '2016-05-24 18:29:36', '2016-05-24 18:29:36');
INSERT INTO parametros (id, parent_id, tipo, valor, codigo, fecha, orden, nombre, descripcion, data, lft, rght, created, modified) VALUES (4, 1, NULL, NULL, '', NULL, NULL, 'Libreta Militar', '', NULL, 6, 7, '2016-05-24 18:29:48', '2016-05-24 18:29:48');
INSERT INTO parametros (id, parent_id, tipo, valor, codigo, fecha, orden, nombre, descripcion, data, lft, rght, created, modified) VALUES (1, NULL, NULL, NULL, '', NULL, NULL, 'Tipos de documento', '', NULL, 1, 10, '2016-05-24 18:29:08', '2016-05-24 18:29:08');
INSERT INTO parametros (id, parent_id, tipo, valor, codigo, fecha, orden, nombre, descripcion, data, lft, rght, created, modified) VALUES (5, 1, NULL, NULL, '', NULL, NULL, 'Pasaporte', '', NULL, 8, 9, '2016-05-24 18:30:01', '2016-05-24 18:30:52');
INSERT INTO parametros (id, parent_id, tipo, valor, codigo, fecha, orden, nombre, descripcion, data, lft, rght, created, modified) VALUES (7, 6, NULL, NULL, '', NULL, NULL, 'Administrador del Sistema', 'Administrador del Sistema', NULL, 12, 13, '2016-05-24 18:31:20', '2016-05-24 18:31:20');
INSERT INTO parametros (id, parent_id, tipo, valor, codigo, fecha, orden, nombre, descripcion, data, lft, rght, created, modified) VALUES (6, NULL, NULL, NULL, '', NULL, NULL, 'Roles de Usuarios del sistema', 'Roles de Usuarios del sistema', NULL, 11, 16, '2016-05-24 18:31:05', '2016-05-24 18:31:05');
INSERT INTO parametros (id, parent_id, tipo, valor, codigo, fecha, orden, nombre, descripcion, data, lft, rght, created, modified) VALUES (8, 6, NULL, NULL, '', NULL, NULL, 'Usuario del Sistema', 'Usuario del Sistema', NULL, 14, 15, '2016-05-24 18:31:35', '2016-05-24 18:31:35');


--
-- Name: parametros_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('parametros_id_seq', 1, false);


--
-- Data for Name: personas; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO personas (id, nombres, apepaterno, apematerno, nombrecompleto, fechanacimiento, prmtipodocumento, numerodocumento, prmgenero, created, modified) VALUES (1, 'administrador', 'del sistema', 'sistema', 'administrador del sistema sistema', '2016-12-15', 1, '23456723', 1, '2016-12-15 00:00:00', '2016-07-12 17:04:33');


--
-- Name: personas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('personas_id_seq', 1, false);


--
-- Data for Name: rolusers; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO rolusers (id, user_id, prmrolusuario, activo, eliminado, created, modified) VALUES (2, 1, 7, 'S', 'N', '2016-07-12 17:04:33', '2016-07-12 17:04:33');


--
-- Name: rolusers_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('rolusers_id_seq', 1, false);


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO users (id, persona_id, nombrecompleto, email, username, password, passtoken, passtokenfecha, fotodir, foto, activo, eliminado, status, created, modified) VALUES (1, 1, 'administrador del sistema sistema', 'admin@admin.com', 'admin@admin.com', '$2y$10$.5BwWje6vLYfjsrELeNPzO2IGOXY.gFVEYax8n038kAhBhC0tGoYi', NULL, NULL, 'b8d7708b-22dd-482a-8694-0481545c57b3', '20151129_154444.jpg', 'S', 'N', 1, '2016-05-12 00:00:00', '2016-07-12 17:04:33');


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('users_id_seq', 1, false);


--
-- PostgreSQL database dump complete
--

