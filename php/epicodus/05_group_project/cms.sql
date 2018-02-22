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
-- Name: allergies; Type: TABLE; Schema: public; Owner: Guest; Tablespace: 
--

CREATE TABLE allergies (
    id integer NOT NULL,
    allergy_type character varying
);


ALTER TABLE allergies OWNER TO "Guest";

--
-- Name: allergies_clients; Type: TABLE; Schema: public; Owner: Guest; Tablespace: 
--

CREATE TABLE allergies_clients (
    id integer NOT NULL,
    allergies_id integer,
    clients_id integer
);


ALTER TABLE allergies_clients OWNER TO "Guest";

--
-- Name: allergies_clients_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE allergies_clients_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE allergies_clients_id_seq OWNER TO "Guest";

--
-- Name: allergies_clients_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE allergies_clients_id_seq OWNED BY allergies_clients.id;


--
-- Name: allergies_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE allergies_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE allergies_id_seq OWNER TO "Guest";

--
-- Name: allergies_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE allergies_id_seq OWNED BY allergies.id;


--
-- Name: clients; Type: TABLE; Schema: public; Owner: Guest; Tablespace: 
--

CREATE TABLE clients (
    id integer NOT NULL,
    last_name character varying,
    first_name character varying,
    alias character varying,
    dob date,
    gender character varying,
    race character varying,
    ethnicity character varying,
    notes text,
    admit_status character varying,
    last_assessed date
);


ALTER TABLE clients OWNER TO "Guest";

--
-- Name: clients_flags; Type: TABLE; Schema: public; Owner: Guest; Tablespace: 
--

CREATE TABLE clients_flags (
    id integer NOT NULL,
    clients_id integer,
    flags_id integer
);


ALTER TABLE clients_flags OWNER TO "Guest";

--
-- Name: clients_flags_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE clients_flags_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE clients_flags_id_seq OWNER TO "Guest";

--
-- Name: clients_flags_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE clients_flags_id_seq OWNED BY clients_flags.id;


--
-- Name: clients_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE clients_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE clients_id_seq OWNER TO "Guest";

--
-- Name: clients_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE clients_id_seq OWNED BY clients.id;


--
-- Name: clients_stays; Type: TABLE; Schema: public; Owner: Guest; Tablespace: 
--

CREATE TABLE clients_stays (
    id integer NOT NULL,
    clients_id integer,
    stays_id integer
);


ALTER TABLE clients_stays OWNER TO "Guest";

--
-- Name: clients_stays_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE clients_stays_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE clients_stays_id_seq OWNER TO "Guest";

--
-- Name: clients_stays_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE clients_stays_id_seq OWNED BY clients_stays.id;


--
-- Name: flags; Type: TABLE; Schema: public; Owner: Guest; Tablespace: 
--

CREATE TABLE flags (
    id integer NOT NULL,
    flag_type character varying
);


ALTER TABLE flags OWNER TO "Guest";

--
-- Name: flags_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE flags_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE flags_id_seq OWNER TO "Guest";

--
-- Name: flags_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE flags_id_seq OWNED BY flags.id;


--
-- Name: intake_staff; Type: TABLE; Schema: public; Owner: Guest; Tablespace: 
--

CREATE TABLE intake_staff (
    id integer NOT NULL,
    name character varying
);


ALTER TABLE intake_staff OWNER TO "Guest";

--
-- Name: intake_staff_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE intake_staff_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE intake_staff_id_seq OWNER TO "Guest";

--
-- Name: intake_staff_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE intake_staff_id_seq OWNED BY intake_staff.id;


--
-- Name: intake_staff_stays; Type: TABLE; Schema: public; Owner: Guest; Tablespace: 
--

CREATE TABLE intake_staff_stays (
    id integer NOT NULL,
    intake_staff_id integer,
    stays_id integer
);


ALTER TABLE intake_staff_stays OWNER TO "Guest";

--
-- Name: intake_staff_stays_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE intake_staff_stays_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE intake_staff_stays_id_seq OWNER TO "Guest";

--
-- Name: intake_staff_stays_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE intake_staff_stays_id_seq OWNED BY intake_staff_stays.id;


--
-- Name: meds; Type: TABLE; Schema: public; Owner: Guest; Tablespace: 
--

CREATE TABLE meds (
    id integer NOT NULL,
    med_name character varying,
    dosage character varying,
    time_of_day time without time zone,
    notes text
);


ALTER TABLE meds OWNER TO "Guest";

--
-- Name: meds_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE meds_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE meds_id_seq OWNER TO "Guest";

--
-- Name: meds_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE meds_id_seq OWNED BY meds.id;


--
-- Name: meds_stays; Type: TABLE; Schema: public; Owner: Guest; Tablespace: 
--

CREATE TABLE meds_stays (
    id integer NOT NULL,
    meds_id integer,
    stays_id integer
);


ALTER TABLE meds_stays OWNER TO "Guest";

--
-- Name: meds_stays_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE meds_stays_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE meds_stays_id_seq OWNER TO "Guest";

--
-- Name: meds_stays_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE meds_stays_id_seq OWNED BY meds_stays.id;


--
-- Name: social_workers; Type: TABLE; Schema: public; Owner: Guest; Tablespace: 
--

CREATE TABLE social_workers (
    id integer NOT NULL,
    name character varying
);


ALTER TABLE social_workers OWNER TO "Guest";

--
-- Name: social_workers_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE social_workers_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE social_workers_id_seq OWNER TO "Guest";

--
-- Name: social_workers_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE social_workers_id_seq OWNED BY social_workers.id;


--
-- Name: social_workers_stays; Type: TABLE; Schema: public; Owner: Guest; Tablespace: 
--

CREATE TABLE social_workers_stays (
    id integer NOT NULL,
    social_workers_id integer,
    stays_id integer
);


ALTER TABLE social_workers_stays OWNER TO "Guest";

--
-- Name: social_workers_stays_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE social_workers_stays_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE social_workers_stays_id_seq OWNER TO "Guest";

--
-- Name: social_workers_stays_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE social_workers_stays_id_seq OWNED BY social_workers_stays.id;


--
-- Name: stays; Type: TABLE; Schema: public; Owner: Guest; Tablespace: 
--

CREATE TABLE stays (
    id integer NOT NULL,
    intake_date_time timestamp without time zone,
    exit_date_time timestamp without time zone,
    exited_by character varying,
    destination character varying,
    lice boolean,
    run_risk boolean
);


ALTER TABLE stays OWNER TO "Guest";

--
-- Name: stays_id_seq; Type: SEQUENCE; Schema: public; Owner: Guest
--

CREATE SEQUENCE stays_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE stays_id_seq OWNER TO "Guest";

--
-- Name: stays_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: Guest
--

ALTER SEQUENCE stays_id_seq OWNED BY stays.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY allergies ALTER COLUMN id SET DEFAULT nextval('allergies_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY allergies_clients ALTER COLUMN id SET DEFAULT nextval('allergies_clients_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY clients ALTER COLUMN id SET DEFAULT nextval('clients_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY clients_flags ALTER COLUMN id SET DEFAULT nextval('clients_flags_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY clients_stays ALTER COLUMN id SET DEFAULT nextval('clients_stays_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY flags ALTER COLUMN id SET DEFAULT nextval('flags_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY intake_staff ALTER COLUMN id SET DEFAULT nextval('intake_staff_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY intake_staff_stays ALTER COLUMN id SET DEFAULT nextval('intake_staff_stays_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY meds ALTER COLUMN id SET DEFAULT nextval('meds_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY meds_stays ALTER COLUMN id SET DEFAULT nextval('meds_stays_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY social_workers ALTER COLUMN id SET DEFAULT nextval('social_workers_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY social_workers_stays ALTER COLUMN id SET DEFAULT nextval('social_workers_stays_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY stays ALTER COLUMN id SET DEFAULT nextval('stays_id_seq'::regclass);


--
-- Data for Name: allergies; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY allergies (id, allergy_type) FROM stdin;
14	Peanuts
15	Pollen
17	Gluten
18	Anteaters
19	Nickelback
\.


--
-- Data for Name: allergies_clients; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY allergies_clients (id, allergies_id, clients_id) FROM stdin;
\.


--
-- Name: allergies_clients_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('allergies_clients_id_seq', 10, true);


--
-- Name: allergies_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('allergies_id_seq', 19, true);


--
-- Data for Name: clients; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY clients (id, last_name, first_name, alias, dob, gender, race, ethnicity, notes, admit_status, last_assessed) FROM stdin;
\.


--
-- Data for Name: clients_flags; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY clients_flags (id, clients_id, flags_id) FROM stdin;
\.


--
-- Name: clients_flags_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('clients_flags_id_seq', 11, true);


--
-- Name: clients_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('clients_id_seq', 25, true);


--
-- Data for Name: clients_stays; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY clients_stays (id, clients_id, stays_id) FROM stdin;
\.


--
-- Name: clients_stays_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('clients_stays_id_seq', 3, true);


--
-- Data for Name: flags; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY flags (id, flag_type) FROM stdin;
16	Firesetting
18	Sexual Aggression
19	Self-Harm
20	Republican Sympathies
21	Assault
\.


--
-- Name: flags_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('flags_id_seq', 21, true);


--
-- Data for Name: intake_staff; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY intake_staff (id, name) FROM stdin;
1	La Toya Jackson
2	Inigo Montoya
3	J. Edgar Hoover
4	Shaq Yerba
\.


--
-- Name: intake_staff_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('intake_staff_id_seq', 4, true);


--
-- Data for Name: intake_staff_stays; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY intake_staff_stays (id, intake_staff_id, stays_id) FROM stdin;
\.


--
-- Name: intake_staff_stays_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('intake_staff_stays_id_seq', 1, false);


--
-- Data for Name: meds; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY meds (id, med_name, dosage, time_of_day, notes) FROM stdin;
\.


--
-- Name: meds_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('meds_id_seq', 1, false);


--
-- Data for Name: meds_stays; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY meds_stays (id, meds_id, stays_id) FROM stdin;
\.


--
-- Name: meds_stays_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('meds_stays_id_seq', 1, false);


--
-- Data for Name: social_workers; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY social_workers (id, name) FROM stdin;
1	Anna Karenina
2	Buckminster Fuller
3	Louis CK
\.


--
-- Name: social_workers_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('social_workers_id_seq', 3, true);


--
-- Data for Name: social_workers_stays; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY social_workers_stays (id, social_workers_id, stays_id) FROM stdin;
\.


--
-- Name: social_workers_stays_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('social_workers_stays_id_seq', 1, false);


--
-- Data for Name: stays; Type: TABLE DATA; Schema: public; Owner: Guest
--

COPY stays (id, intake_date_time, exit_date_time, exited_by, destination, lice, run_risk) FROM stdin;
1	2015-02-02 04:30:00	\N	\N	\N	t	f
2	2015-02-02 04:30:00	\N	\N	\N	t	f
3	2015-02-02 04:30:00	\N	\N	\N	t	t
\.


--
-- Name: stays_id_seq; Type: SEQUENCE SET; Schema: public; Owner: Guest
--

SELECT pg_catalog.setval('stays_id_seq', 3, true);


--
-- Name: allergies_clients_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace: 
--

ALTER TABLE ONLY allergies_clients
    ADD CONSTRAINT allergies_clients_pkey PRIMARY KEY (id);


--
-- Name: allergies_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace: 
--

ALTER TABLE ONLY allergies
    ADD CONSTRAINT allergies_pkey PRIMARY KEY (id);


--
-- Name: clients_flags_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace: 
--

ALTER TABLE ONLY clients_flags
    ADD CONSTRAINT clients_flags_pkey PRIMARY KEY (id);


--
-- Name: clients_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace: 
--

ALTER TABLE ONLY clients
    ADD CONSTRAINT clients_pkey PRIMARY KEY (id);


--
-- Name: clients_stays_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace: 
--

ALTER TABLE ONLY clients_stays
    ADD CONSTRAINT clients_stays_pkey PRIMARY KEY (id);


--
-- Name: flags_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace: 
--

ALTER TABLE ONLY flags
    ADD CONSTRAINT flags_pkey PRIMARY KEY (id);


--
-- Name: intake_staff_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace: 
--

ALTER TABLE ONLY intake_staff
    ADD CONSTRAINT intake_staff_pkey PRIMARY KEY (id);


--
-- Name: intake_staff_stays_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace: 
--

ALTER TABLE ONLY intake_staff_stays
    ADD CONSTRAINT intake_staff_stays_pkey PRIMARY KEY (id);


--
-- Name: meds_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace: 
--

ALTER TABLE ONLY meds
    ADD CONSTRAINT meds_pkey PRIMARY KEY (id);


--
-- Name: meds_stays_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace: 
--

ALTER TABLE ONLY meds_stays
    ADD CONSTRAINT meds_stays_pkey PRIMARY KEY (id);


--
-- Name: social_workers_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace: 
--

ALTER TABLE ONLY social_workers
    ADD CONSTRAINT social_workers_pkey PRIMARY KEY (id);


--
-- Name: social_workers_stays_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace: 
--

ALTER TABLE ONLY social_workers_stays
    ADD CONSTRAINT social_workers_stays_pkey PRIMARY KEY (id);


--
-- Name: stays_pkey; Type: CONSTRAINT; Schema: public; Owner: Guest; Tablespace: 
--

ALTER TABLE ONLY stays
    ADD CONSTRAINT stays_pkey PRIMARY KEY (id);


--
-- Name: allergies_clients_allergies_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY allergies_clients
    ADD CONSTRAINT allergies_clients_allergies_id_fkey FOREIGN KEY (allergies_id) REFERENCES allergies(id);


--
-- Name: allergies_clients_clients_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY allergies_clients
    ADD CONSTRAINT allergies_clients_clients_id_fkey FOREIGN KEY (clients_id) REFERENCES clients(id);


--
-- Name: clients_flags_clients_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY clients_flags
    ADD CONSTRAINT clients_flags_clients_id_fkey FOREIGN KEY (clients_id) REFERENCES clients(id);


--
-- Name: clients_flags_flags_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY clients_flags
    ADD CONSTRAINT clients_flags_flags_id_fkey FOREIGN KEY (flags_id) REFERENCES flags(id);


--
-- Name: clients_stays_clients_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY clients_stays
    ADD CONSTRAINT clients_stays_clients_id_fkey FOREIGN KEY (clients_id) REFERENCES clients(id);


--
-- Name: clients_stays_stays_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY clients_stays
    ADD CONSTRAINT clients_stays_stays_id_fkey FOREIGN KEY (stays_id) REFERENCES stays(id);


--
-- Name: intake_staff_stays_intake_staff_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY intake_staff_stays
    ADD CONSTRAINT intake_staff_stays_intake_staff_id_fkey FOREIGN KEY (intake_staff_id) REFERENCES intake_staff(id);


--
-- Name: intake_staff_stays_stays_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY intake_staff_stays
    ADD CONSTRAINT intake_staff_stays_stays_id_fkey FOREIGN KEY (stays_id) REFERENCES stays(id);


--
-- Name: meds_stays_meds_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY meds_stays
    ADD CONSTRAINT meds_stays_meds_id_fkey FOREIGN KEY (meds_id) REFERENCES meds(id);


--
-- Name: meds_stays_stays_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY meds_stays
    ADD CONSTRAINT meds_stays_stays_id_fkey FOREIGN KEY (stays_id) REFERENCES stays(id);


--
-- Name: social_workers_stays_social_workers_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY social_workers_stays
    ADD CONSTRAINT social_workers_stays_social_workers_id_fkey FOREIGN KEY (social_workers_id) REFERENCES social_workers(id);


--
-- Name: social_workers_stays_stays_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: Guest
--

ALTER TABLE ONLY social_workers_stays
    ADD CONSTRAINT social_workers_stays_stays_id_fkey FOREIGN KEY (stays_id) REFERENCES stays(id);


--
-- Name: public; Type: ACL; Schema: -; Owner: epicodus
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM epicodus;
GRANT ALL ON SCHEMA public TO epicodus;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

