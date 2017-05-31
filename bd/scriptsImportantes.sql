-- export structure
	pg_dump --host localhost --port 5432 --username "postgres" --role "postgres" --format plain --schema-only --encoding UTF8 --file "bd/Estructura.sql" "prueba"

-- export data
	pg_dump --host localhost --port 5432 --username "postgres" --role "postgres" --format plain --section data --encoding UTF8 --column-inserts --file "bd/Data.sql" "prueba"


--CREAR BASE DE DATOS
CREATE DATABASE prueba
  WITH OWNER = postgres
       ENCODING = 'UTF8'
       TABLESPACE = pg_default
       LC_COLLATE = 'es_PE.UTF-8'
       LC_CTYPE = 'es_PE.UTF-8'
       CONNECTION LIMIT = -1;
	
	
-- setear los valores de las secuencias
/*
SELECT setval('public.cartillas_id_seq', (select max(id) from cartillas), true);
SELECT setval('public.contratoempresas_id_seq', (select max(id) from contratoempresas), true);
SELECT setval('public.contratos_id_seq', (select max(id) from contratos), true);
SELECT setval('public.detcartillas_id_seq', (select max(id) from detcartillas), true);
SELECT setval('public.empresas_id_seq', (select max(id) from empresas), true);
SELECT setval('public.groups_id_seq', (select max(id) from groups), true);
SELECT setval('public.groups_menus_id_seq', (select max(id) from groups_menus), true);
SELECT setval('public.menus_id_seq', (select max(id) from menus), true);
SELECT setval('public.minaresponsables_id_seq', (select max(id) from minaresponsables), true);
SELECT setval('public.minas_id_seq', (select max(id) from minas), true);
SELECT setval('public.personas_id_seq', (select max(id) from personas), true);
SELECT setval('public.proyectominas_id_seq', (select max(id) from proyectominas), true);
SELECT setval('public.proyectoresponsables_id_seq', (select max(id) from proyectoresponsables), true);
SELECT setval('public.proyectos_id_seq', (select max(id) from proyectos), true);
SELECT setval('public.tablas_id_seq', (select max(id) from tablas), true);
SELECT setval('public.trabajadors_id_seq', (select max(id) from trabajadors), true);
SELECT setval('public.usercontratos_id_seq', (select max(id) from usercontratos), true);
SELECT setval('public.users_id_seq', (select max(id) from users), true);
SELECT setval('public.ventas_id_seq', (select max(id) from ventas), true);*/