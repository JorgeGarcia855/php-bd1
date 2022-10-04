create table tipo_documento (
    id serial primary key,
    descripcion varchar(80) not null,
    estado bool not null
);

create table naturaleza_judirica (
    id serial primary key,
    descripcion varchar(80) not null ,
    estado bool not null
);

create table tipo_acto (
    id serial primary key,
    descripcion varchar(80) not null,
    estado bool not null
);

create table enc_nomina (
    id serial primary key,
    tpo_doc_aportante int not null,
    num_doc_aportante varchar(20) not null,
    razon_social varchar(40) not null,
    tpo_naturaleza_judirica int not null,
    id_expediente varchar(40) not null,
    tpo_acto int not null,
    fecha_sanciones date not null,
    estado bool not null,
    foreign key (tpo_doc_aportante) references tipo_documento(id),
    foreign key (tpo_naturaleza_judirica) references naturaleza_judirica(id),
    foreign key (tpo_acto) references tipo_acto(id)
);

create index index_enc_nomina on enc_nomina(tpo_doc_aportante, tpo_naturaleza_judirica, tpo_acto);

create table tipo_cotizante (
    id serial primary key,
    descripcion varchar(80) not null,
    estado bool not null
);

create table subtipo_cotizante (
    id serial primary key,
    id_cot int not null,
    descripcion varchar(80) not null,
    estado bool not null,
    foreign key (id_cot) references tipo_cotizante(id)
);

create table cargo_empleado (
    id serial primary key,
    descripcion varchar(80) not null,
    estado bool not null
);

create table periodo (
    id serial primary key,
    anio int not null,
    mes int not null
);

create table empleado (
    id serial,
    tpo_documento int not null,
    documento_cotizante varchar(20) not null,
    nombre_cotizante varchar(60) not null,
    id_cargo int not null,
    salario_basico int not null,
    primary key (id, tpo_documento, documento_cotizante),
    foreign key (tpo_documento) references tipo_documento(id),
    foreign key (id_cargo) references cargo_empleado(id),
    unique (id)
);

create table salarios_minimos (
    id serial primary key,
    valor int not null,
    estado bool not null
);

create table tipo_novedad (
    id serial primary key,
    descripcion varchar(80) not null,
    estado bool not null
);

create table porcentaje_salud (
    id serial primary key,
    valor int not null,
    estado bool not null
);

create table porcentaje_pension (
    id serial primary key,
    valor int not null,
    estado bool not null
);

create table detalle_nomina (
    id serial primary key,
    id_tpo_cotizante int not null,
    id_subtpo_cotizante int not null,
    id_emp int not null,
    id_periodo int not null,
    num_dias_trabajados int not null,
    num_dias_incapacidad int not null,
    num_dias_licencia int not null,
    num_dias_permisos_renumerados int not null,
    num_dias_permisos_no_renumerados int not null,
    num_dias_vacaciones int not null,
    num_dias_huelga int not null,
    id_porcentaje_salud int not null,
    id_porcentaje_pension int not null,
    foreign key (id_tpo_cotizante) references tipo_cotizante(id),
    foreign key (id_subtpo_cotizante) references subtipo_cotizante(id),
    foreign key (id_emp) references empleado(id),
    foreign key (id_periodo) references periodo(id),
    foreign key (id_porcentaje_salud) references porcentaje_salud(id),
    foreign key (id_porcentaje_pension) references porcentaje_pension(id)
);

create index index_detalle_nomina on detalle_nomina(id_tpo_cotizante, id_emp, id_periodo);

create table relacion_detalle_nomina_novedad(
    id serial not null ,
    id_detalle int not null,
    id_novedad int not null,
    estado bool not null,
    primary key (id, id_detalle, id_novedad),
    foreign key (id_detalle) references detalle_nomina(id),
    foreign key (id_novedad) references tipo_novedad(id)
);


create table relacion_nomina (
    id_enc_nomina int not null,
    id_detalle_nomina int not null,
    primary key (id_enc_nomina, id_detalle_nomina),
    foreign key (id_enc_nomina) references enc_nomina(id),
    foreign key (id_detalle_nomina) references  detalle_nomina(id)
);



insert into tipo_documento values (default, 'CC', true);
insert into tipo_documento values (default, 'CE', true);
insert into tipo_documento values (default, 'PA', true);
insert into tipo_documento values (default, 'NI', true);

insert into naturaleza_judirica values (default, 'PERSONA NATURAL', true);
insert into naturaleza_judirica values (default, 'PERSONA JUDIRICA', true);

insert into tipo_acto values (default, 'REQUERIMIENTO', true);
insert into tipo_acto values (default, 'LIQUIDACION', true);
insert into tipo_acto values (default, 'AMPLIACION', true);
insert into tipo_acto values (default, 'RECURSO', true);

insert into enc_nomina values (default, 4, '999997876', 'EMPRESA ACME', 2, '20181520058002407', 1, '2021-09-30', true);