--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: parametros; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE parametros (
    id integer NOT NULL,
    parent_id integer,
    tipo integer,
    valor integer,
    codigo character varying(100) DEFAULT NULL::character varying,
    fecha timestamp without time zone,
    orden integer,
    nombre character varying(250) DEFAULT NULL::character varying,
    descripcion character varying(250) DEFAULT NULL::character varying,
    data text,
    lft integer,
    rght integer,
    created timestamp without time zone,
    modified timestamp without time zone
);


ALTER TABLE public.parametros OWNER TO postgres;

--
-- Name: parametros_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE parametros_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.parametros_id_seq OWNER TO postgres;

--
-- Name: parametros_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE parametros_id_seq OWNED BY parametros.id;


--
-- Name: personas; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE personas (
    id integer NOT NULL,
    nombres character varying(100) NOT NULL,
    apepaterno character varying(100) NOT NULL,
    apematerno character varying(100) NOT NULL,
    nombrecompleto character varying(300) NOT NULL,
    fechanacimiento date,
    prmtipodocumento integer,
    numerodocumento character varying(20) DEFAULT NULL::character varying,
    prmgenero integer,
    created timestamp without time zone,
    modified timestamp without time zone
);


ALTER TABLE public.personas OWNER TO postgres;

--
-- Name: personas_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE personas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.personas_id_seq OWNER TO postgres;

--
-- Name: personas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE personas_id_seq OWNED BY personas.id;


--
-- Name: rolusers; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE rolusers (
    id integer NOT NULL,
    user_id integer NOT NULL,
    prmrolusuario integer NOT NULL,
    activo character varying(1) DEFAULT 'S'::character varying NOT NULL,
    eliminado character varying(1) DEFAULT 'N'::character varying,
    created timestamp without time zone NOT NULL,
    modified timestamp without time zone NOT NULL
);


ALTER TABLE public.rolusers OWNER TO postgres;

--
-- Name: rolusers_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE rolusers_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.rolusers_id_seq OWNER TO postgres;

--
-- Name: rolusers_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE rolusers_id_seq OWNED BY rolusers.id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres; Tablespace: 
--

CREATE TABLE users (
    id integer NOT NULL,
    persona_id integer NOT NULL,
    nombrecompleto character varying(300) NOT NULL,
    email character varying(150) NOT NULL,
    username character varying(150) DEFAULT NULL::character varying,
    password character varying(255) DEFAULT NULL::character varying,
    passtoken character varying(255) DEFAULT NULL::character varying,
    passtokenfecha timestamp without time zone,
    fotodir character varying(250) DEFAULT NULL::character varying,
    foto character varying(250) DEFAULT NULL::character varying,
    activo character varying(1) DEFAULT 'S'::character varying NOT NULL,
    eliminado character varying(1) DEFAULT 'N'::character varying,
    status integer DEFAULT 1 NOT NULL,
    created timestamp without time zone,
    modified timestamp without time zone
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE users_id_seq OWNED BY users.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY parametros ALTER COLUMN id SET DEFAULT nextval('parametros_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY personas ALTER COLUMN id SET DEFAULT nextval('personas_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY rolusers ALTER COLUMN id SET DEFAULT nextval('rolusers_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY users ALTER COLUMN id SET DEFAULT nextval('users_id_seq'::regclass);


--
-- Name: parametros_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY parametros
    ADD CONSTRAINT parametros_pkey PRIMARY KEY (id);

ALTER TABLE ONLY accesos ADD CONSTRAINT accesos_pkey PRIMARY KEY (id);
--
-- Name: personas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY personas
    ADD CONSTRAINT personas_pkey PRIMARY KEY (id);


--
-- Name: rolusers_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY rolusers
    ADD CONSTRAINT rolusers_pkey PRIMARY KEY (id);


--
-- Name: users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres; Tablespace: 
--

ALTER TABLE ONLY users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

