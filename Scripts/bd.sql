CREATE DATABASE IF NOT EXISTS proyecto;
use proyecto;

drop table if exists TB_BITACORA_AUDITORIA;

drop table if exists TB_CAT_DEPARTAMENTO;

drop table if exists TB_CAT_DESTINO_SUBSIDIO;

drop table if exists TB_CAT_DILIGENCIAS;

drop table if exists TB_CAT_MUNICIPIOS;

drop table if exists TB_CAT_PROYECTOS;

drop table if exists TB_CAT_RELACION_FAMILIAR;

drop table if exists TB_DESARROLLADORES;

drop table if exists TB_DIGITALIZACION;

drop table if exists TB_EXPEDIENTE;

drop table if exists TB_EXPEDIENTE_DILIGENCIA;

drop table if exists TB_EXPEDIENTE_REQUSITOS;

drop table if exists TB_INFORMACION_PERSONAS_INVOLUCRADAS;

drop table if exists TB_TIPO_REQUISITOS;

drop table if exists TB_REQUISITOS;

drop table if exists TB_ROLES;

drop table if exists TB_TIPO_INGRESO;

drop table if exists TB_UNIDAD_TRABAJO;

drop table if exists TB_USUARIOS;

create table TB_BITACORA_AUDITORIA
(
   ID_BITACORA          int not null auto_increment,
   ID_USUARIO           int not null,
   TIPO_ACCION          varchar(20) not null,
   DATO_ENTERIOR        varchar(200) not null,
   NUEVO_DATO           varchar(200) not null,
   FECHA_ACCION         date not null,
   primary key (ID_BITACORA)
);

alter table TB_BITACORA_AUDITORIA comment 'Contiene la bitacora de auditoría de las tranasacciones hech';

create table TB_CAT_DEPARTAMENTO
(
   ID_DEPARTAMENTO      int not null auto_increment,
   DESCRIPCION_DEPARTAMENTO varchar(100) not null,
   primary key (ID_DEPARTAMENTO)
);

alter table TB_CAT_DEPARTAMENTO comment 'Catálogo de Departamentos de Guatemala';

create table TB_CAT_DESTINO_SUBSIDIO
(
   ID_TIPO_SOILCITUD_SUBSIDIO int not null auto_increment,
   DESCRIPCION          varchar(100) not null,
   primary key (ID_TIPO_SOILCITUD_SUBSIDIO)
);

alter table TB_CAT_DESTINO_SUBSIDIO comment 'Destino del subsidio (ampliación, compra terreno, construcci';

create table TB_CAT_MUNICIPIOS
(
   ID_MUNICIPIO         int not null,
 
   DESCRIPCION_MUNICIPIO varchar(100) not null,
     ID_DEPARTAMENTO      int not null,
   primary key (ID_MUNICIPIO)
);

alter table TB_CAT_MUNICIPIOS comment 'Catalogo de Municipios por Departamentos de guatemala';

create table TB_CAT_PROYECTOS
(
   ID_PROYECTO          int not null auto_increment,
   ID_MUNICIPIO_PROYECTO int not null,
   ID_DESARROLLADOR     int not null,
   NOMBRE_PROYECTO      varchar(200) not null,
   LONGITUD_PROYECTO    long not null,
   LATITUD_PROYECTO     long not null,
   MONTO_APROXIMADO_PROYECTO decimal not null,
   MONTO_SOLICITADO_PROYECTO decimal not null,
   FECHA_INICIO_TRABAJOS date not null,
   INFORMACION_ADICIONAL varchar(400) not null,
   primary key (ID_PROYECTO)
);

alter table TB_CAT_PROYECTOS comment 'Contiene los nombres y datos generales de los proyectos que ';

create table TB_CAT_RELACION_FAMILIAR
(
   ID_RELACION_FAMILIAR int not null auto_increment,
   DESCRIPCION          varchar(50) not null,
   primary key (ID_RELACION_FAMILIAR)
);

alter table TB_CAT_RELACION_FAMILIAR comment 'informacion de la relacion familiar
Solicitante
';

create table TB_DESARROLLADORES
(
   ID_DESARROLLADOR     int not null auto_increment,
   NOMBRE_DESARROLLADOR varchar(200) not null,
   NIT                  varchar(10) not null,
   DIRECCION_EMPRESA    varchar(200) not null,
   CORREO_ELECTRONICO   varchar(20) not null,
   TELEFONO             varchar(8) not null,
   primary key (ID_DESARROLLADOR)
);

alter table TB_DESARROLLADORES comment 'Catalogo de Desarrolladores que llevaran a cabo  proyectos, ';


create table TB_DIGITALIZACION
(
   ID_DOCUMENTO_DIGITALIZADO int not null auto_increment,
   ID_INFORMACION_SOLICITANTE            int not null ,
   ID_TIPO_DIGITALIZACION       int null,
   PATH_DOCUMENTO varchar(200) not null,
   primary key (ID_DOCUMENTO_DIGITALIZADO)
);


alter table TB_DIGITALIZACION comment 'lleva el control de todos los archivos que han sido digitali';

create table TB_TIPO_DIGITALIZACION
(
   ID_TIPO_DIGITALIZACION int not null auto_increment,
   DESCRIPCION   varchar(50) not null,
   primary key (ID_TIPO_DIGITALIZACION)
);


Create table TB_EXPEDIENTE
(
   ID_NUMERO_EXPEDIENTE    int not null auto_increment,
   ID_TIPO_INGRESO      int not null,
   ID_TIPO_SOILCITUD_SUBSIDIO int not null,
   CODIGO_EXPEDIENTE varchar(10) not null unique,
   FECHA_REGISTRO       date not null,
   OBSERVACIONES_EXPEDIENTE varchar(200) not null,
   MONTO_SOLICITADO     decimal not null,
   LONGITUD_PROYECTO    long not null,
   LATITUD_PROYECTO     long not null,
   ANIO int not null,
   primary key (ID_NUMERO_EXPEDIENTE)
);

alter table TB_EXPEDIENTE comment 'Tabla principal de ingreso y control de expediente, cada exp';

create table TB_EXPEDIENTE_DILIGENCIA
(
   ID_NUMERO_EXPEDIENTE    int not null,
   ID_USUARIO            int not null,
     ID_UNIDAD_TRABAJO    int not null,
   ID_DILIGENCIA_EXPEDIENTE int not null auto_increment,
   FECHA_DILIGENCIA     date not null,
   NOMBRE_ARCHIVO_DIGITALIZADO varchar(500) not null,
   ESTADO 				char(1) not null,
   primary key (ID_DILIGENCIA_EXPEDIENTE)
);

alter table TB_EXPEDIENTE_DILIGENCIA comment 'Control de todas las diligencias que se realicen al epxedien';


create table TB_EXPEDIENTE_REQUSITOS
(
   ID_EXPEDIENTE_REQUISITO int not null auto_increment,
   ID_REQUISITO         int not null,
   ID_USUARIO			int not null,
   ID_NUMERO_EXPEDIENTE    int not null,
   FECHA_PRESENTACION   date not null,
   ACEPTADO             char(1) not null,
   MOTIVO_RECHAZO       varchar(200) not null,
   primary key (ID_EXPEDIENTE_REQUISITO)
);

alter table TB_EXPEDIENTE_REQUSITOS comment 'Detalle de los requisitos por expediente, se puede chequear ';


create table TB_INFORMACION_PERSONAS_INVOLUCRADAS
(
   ID_INFORMACION_SOLICITANTE int not null auto_increment,
   ID_RELACION_FAMILIAR int null,
   ID_NUMERO_EXPEDIENTE int not null,
   NUMERO_DOCUMENTO     varchar(13) not null comment 'Entre los requisitos es ser guatemalteco, por ende, debe poseer DPI y no pasaporte u otro tipo de documento',
   NOMBRE1              varchar(50) not null,
   NOMBRE2              varchar(50) null,
   NOMBRE3				varchar(50) null,
   APELLIDO1            varchar(50) not null,
   APELLIDO2            varchar(50) null,
   APELLIDOCASADA       varchar(50) null,
   SUELDO				decimal not null,
   FECHA_NACIMIENTO     date not null,
   DIRECCION            varchar(100) not null,
   TELEFONO             varchar(8) not null,
   primary key (ID_INFORMACION_SOLICITANTE)
);

alter table TB_INFORMACION_PERSONAS_INVOLUCRADAS comment 'informacion completa de los solicitantes y adicionalmente el';

create table TB_TIPO_REQUISITOS
(
   ID_TIPO_REQUISITO         int not null auto_increment,
   DESCRIPCION_REQUISITO varchar(200) not null,
   primary key (ID_TIPO_REQUISITO)
);

alter table TB_TIPO_REQUISITOS comment 'Catálogo de requisitos necesarios en cada uno de los tipos d';


create table TB_REQUISITOS
(
   ID_REQUISITO         int not null auto_increment,
   ID_TIPO_REQUISITO	int not null comment 'aca se pone si es juridico, financiero o social',
   ID_TIPO_INGRESO      int not null comment 'individual o grupal',
   DESCRIPCION_REQUISITO varchar(200) not null,
   OBLIGATORIO          char(1) not null,
   primary key (ID_REQUISITO)
);

alter table TB_REQUISITOS comment 'Catálogo de requisitos necesarios en cada uno de los tipos d';




create table TB_ROLES
(
   ID_ROL               int not null auto_increment,
   DESCRIPCION_ROL      varchar(30) not null,
   primary key (ID_ROL)
);

alter table TB_ROLES comment 'Información de los roles por usuario, con esto se tendrá un ';


create table TB_TIPO_INGRESO
(
   ID_TIPO_INGRESO      int not null auto_increment,
   DESCRIPCION_INGRESO  varchar(100) not null,
   primary key (ID_TIPO_INGRESO)
);

alter table TB_TIPO_INGRESO comment 'Tramite personal
Tramite en grupo
Solicitud por ';


create table TB_UNIDAD_TRABAJO
(
   ID_UNIDAD_TRABAJO    int not null auto_increment,
   DESCRIPCION_UNIDAD   varchar(200) not null,
   primary key (ID_UNIDAD_TRABAJO)
);

alter table TB_UNIDAD_TRABAJO comment 'Catalogo de unidades donde trabaja el empleado:
ventan';

create table TB_USUARIOS
(
   ID_USUARIO           int not null auto_increment,
   LOGIN                varchar(25) not null unique,
   ID_ROL               int not null,
   ID_UNIDAD            int not null,
   NOMBRE               varchar(150) not null,
   APELLIDO				varchar(150) not null,   
   FECHA_NACIMIENTO		date not null,
   GENERO				char(1) not null,
   EMAIL				varchar(70) not null,
   CLAVE                varchar(150) not null,
   primary key (ID_USUARIO)
);

alter table TB_USUARIOS comment 'Catalogo de usuarios, registro de roles y unidad de trabajo
';

alter table TB_BITACORA_AUDITORIA add constraint FK_REFERENCE_24 foreign key (ID_USUARIO)
      references TB_USUARIOS (ID_USUARIO);

alter table TB_CAT_MUNICIPIOS add constraint FK_REFERENCE_20 foreign key (ID_DEPARTAMENTO)
      references TB_CAT_DEPARTAMENTO (ID_DEPARTAMENTO);

alter table TB_CAT_PROYECTOS add constraint FK_REFERENCE_21 foreign key (ID_MUNICIPIO_PROYECTO)
      references TB_CAT_MUNICIPIOS (ID_MUNICIPIO);

alter table TB_CAT_PROYECTOS add constraint FK_REFERENCE_22 foreign key (ID_DESARROLLADOR)
      references TB_DESARROLLADORES (ID_DESARROLLADOR);

alter table TB_DIGITALIZACION add constraint FK_REFERENCE_12 foreign key (ID_INFORMACION_SOLICITANTE)
      references tb_informacion_personas_involucradas (ID_INFORMACION_SOLICITANTE);


alter table TB_EXPEDIENTE add constraint FK_REFERENCE_3 foreign key (ID_TIPO_INGRESO)
      references TB_TIPO_INGRESO (ID_TIPO_INGRESO);

alter table TB_EXPEDIENTE add constraint FK_TB_EXPED_REFERENCE_TB_CAT_D2 foreign key (ID_TIPO_SOILCITUD_SUBSIDIO)
      references TB_CAT_DESTINO_SUBSIDIO (ID_TIPO_SOILCITUD_SUBSIDIO);

alter table TB_EXPEDIENTE_DILIGENCIA add constraint FK_TB_EXPED_REFERENCE_TB_EXPED23 foreign key (ID_NUMERO_EXPEDIENTE)
      references TB_EXPEDIENTE (ID_NUMERO_EXPEDIENTE);

alter table TB_EXPEDIENTE_DILIGENCIA add constraint FK_TB_EXPED_REFERENCE_TB_USUAR1 foreign key (ID_USUARIO)
      references TB_USUARIOS (ID_USUARIO);
      
alter table TB_REQUISITOS add constraint FK_REFERENCE_RQ foreign key (ID_TIPO_REQUISITO)
      references TB_TIPO_REQUISITOS (ID_TIPO_REQUISITO);

alter table TB_EXPEDIENTE_REQUSITOS add constraint FK_REFERENCE_7 foreign key (ID_REQUISITO)
      references TB_REQUISITOS (ID_REQUISITO);

alter table TB_EXPEDIENTE_REQUSITOS add constraint FK_TB_EXPED_REFERENCE_TB_USUAR2 foreign key (ID_USUARIO)
      references TB_USUARIOS (ID_USUARIO);

alter table TB_EXPEDIENTE_REQUSITOS add constraint FK_TB_EXPED_REFERENCE_TB_EXPED2 foreign key (ID_NUMERO_EXPEDIENTE)
      references TB_EXPEDIENTE (ID_NUMERO_EXPEDIENTE);

alter table TB_INFORMACION_PERSONAS_INVOLUCRADAS add constraint FK_REFERENCE_15 foreign key (ID_RELACION_FAMILIAR)
      references TB_CAT_RELACION_FAMILIAR (ID_RELACION_FAMILIAR);
      
alter table TB_INFORMACION_PERSONAS_INVOLUCRADAS add constraint FK_REFERENCE_EXPE foreign key (ID_NUMERO_EXPEDIENTE)
      references TB_EXPEDIENTE (ID_NUMERO_EXPEDIENTE);

alter table TB_REQUISITOS add constraint FK_REFERENCE_4 foreign key (ID_TIPO_INGRESO)
      references TB_TIPO_INGRESO (ID_TIPO_INGRESO);

alter table TB_USUARIOS add constraint FK_REFERENCE_1 foreign key (ID_ROL)
      references TB_ROLES (ID_ROL);

alter table TB_USUARIOS add constraint FK_REFERENCE_6 foreign key (ID_UNIDAD)
      references TB_UNIDAD_TRABAJO (ID_UNIDAD_TRABAJO);
      
      alter table TB_DIGITALIZACION add constraint FK_REFERENCE_34 foreign key (ID_TIPO_DIGITALIZACION)
      references TB_TIPO_DIGITALIZACION(ID_TIPO_DIGITALIZACION);
      
      