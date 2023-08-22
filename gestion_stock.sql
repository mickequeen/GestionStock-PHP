CREATE DATABASE IF NOT EXISTS gestionStock CHARACTER SET utf8 COLLATE utf8_general_ci;
Use gestionStock;
drop table if exists BOLETAS;
drop table if exists CATEGORIAS;
drop table if exists CLIENTES;
drop table if exists PRODUCTOS;
drop table if exists SUCURSALES;
drop table if exists USUARIOS;
drop table if exists VENTAS;

/*==============================================================*/
/* Table: BOLETAS                                               */
/*==============================================================*/
create table BOLETAS 
(
   NUM_BOLETA           integer                        not null AUTO_INCREMENT,
   ID_SUCURSAL          integer                        null,
   RUT_CLTE             varchar(11)                     null,
   ID_VENTA             integer                        null,
   FECHA_BOL            timestamp                      null,
   TOTAL_BOL            float(13)                      null,
   constraint PK_BOLETAS primary key (NUM_BOLETA)
);

/*==============================================================*/
/* Index: BOLETAS_PK                                            */
/*==============================================================*/
create unique index BOLETAS_PK on BOLETAS (
NUM_BOLETA ASC
);

/*==============================================================*/
/* Index: EMITE_FK                                              */
/*==============================================================*/
create index EMITE_FK on BOLETAS (
ID_SUCURSAL ASC
);

/*==============================================================*/
/* Index: RELATIONSHIP_8_FK                                     */
/*==============================================================*/
create index RELATIONSHIP_8_FK on BOLETAS (
RUT_CLTE ASC
);

/*==============================================================*/
/* Index: RELATIONSHIP_10_FK                                    */
/*==============================================================*/
create index RELATIONSHIP_10_FK on BOLETAS (
ID_VENTA ASC
);

/*==============================================================*/
/* Table: CATEGORIAS                                            */
/*==============================================================*/
create table CATEGORIAS 
(
   ID_CATEGORIA         integer                        not null AUTO_INCREMENT,
   NOMBRE_CAT           varchar(30)                    null,
   constraint PK_CATEGORIAS primary key (ID_CATEGORIA)
);

/*==============================================================*/
/* Index: CATEGORIAS_PK                                         */
/*==============================================================*/
create unique index CATEGORIAS_PK on CATEGORIAS (
ID_CATEGORIA ASC
);

/*==============================================================*/
/* Table: CLIENTES                                              */
/*==============================================================*/
create table CLIENTES 
(
   RUT_CLTE             varchar(11)                     not null,
   NOMBRE_CLTE          varchar(20)                    null,
   APELLIDO_CLTE        varchar(20)                    null,
   MAIL_CLTE            varchar(50)                    null,
   FONO_CLTE            integer(8)                     null,
   constraint PK_CLIENTES primary key (RUT_CLTE)
);

/*==============================================================*/
/* Index: CLIENTES_PK                                           */
/*==============================================================*/
create unique index CLIENTES_PK on CLIENTES (
RUT_CLTE ASC
);

/*==============================================================*/
/* Table: PRODUCTOS                                             */
/*==============================================================*/
create table PRODUCTOS 
(
   ID_PRODUCTO          integer                        not null AUTO_INCREMENT,
   ID_CATEGORIA         integer                        null,
   RUT_USU              varchar(11)                     null,
   ID_SUCURSAL          integer                        null,
   NOMBRE_PROD          varchar(30)                    null,
   DESCRIPCION_PROD     varchar(60)                    null,
   PRECIO_VTA           integer                        null,
   STOCK_PROD           integer                        null,
   ESTADO_PROD			varchar(10)						    null,
   FECHA_CREACION_PROD  timestamp                      null,
   FECHA_ACTUALIZACION_PROD timestamp                      null,
   constraint PK_PRODUCTOS primary key (ID_PRODUCTO)
);

/*==============================================================*/
/* Index: PRODUCTOS_PK                                          */
/*==============================================================*/
create unique index PRODUCTOS_PK on PRODUCTOS (
ID_PRODUCTO ASC
);

/*==============================================================*/
/* Index: SE_DIVIDEN_EN_FK                                      */
/*==============================================================*/
create index SE_DIVIDEN_EN_FK on PRODUCTOS (
ID_CATEGORIA ASC
);

/*==============================================================*/
/* Index: ANADE_FK                                              */
/*==============================================================*/
create index ANADE_FK on PRODUCTOS (
RUT_USU ASC
);

/*==============================================================*/
/* Index: TIENEN_FK                                             */
/*==============================================================*/
create index TIENEN_FK on PRODUCTOS (
ID_SUCURSAL ASC
);

/*==============================================================*/
/* Table: SUCURSALES                                            */
/*==============================================================*/
create table SUCURSALES 
(
   ID_SUCURSAL          integer                        not null AUTO_INCREMENT,
   CIUDAD_SUC           varchar(40)                    null,
   COMUNA_SUC           varchar(40)                    null,
   DIRECCION_SUC        varchar(60)                    null,
   FONO_SUC             numeric(11)                    null,
   MAIL_SUC             varchar(60)                    null,
   constraint PK_SUCURSALES primary key (ID_SUCURSAL)
);

/*==============================================================*/
/* Index: SUCURSALES_PK                                         */
/*==============================================================*/
create unique index SUCURSALES_PK on SUCURSALES (
ID_SUCURSAL ASC
);

/*==============================================================*/
/* Table: USUARIOS                                              */
/*==============================================================*/
create table USUARIOS 
(
   RUT_USU              varchar(11)                     not null,
   NOMBRE_USU           varchar(20)                    null,
   APELLIDO_USU         varchar(20)                    null,
   MAIL_USU             varchar(60)                    null,
   CLAVE_USU            varchar(8)                     null,
   ROL_USU              varchar(20)                    null,
   constraint PK_USUARIOS primary key (RUT_USU)
);

/*==============================================================*/
/* Index: USUARIOS_PK                                           */
/*==============================================================*/
create unique index USUARIOS_PK on USUARIOS (
RUT_USU ASC
);

/*==============================================================*/
/* Table: VENTAS                                                */
/*==============================================================*/
create table VENTAS 
(
   ID_VENTA             integer                        not null AUTO_INCREMENT,
   RUT_USU              varchar(11)                     null,
   ID_PRODUCTO          integer                        null,
   NUM_BOLETA           integer                        null,
   FECHA_VTA            date                           null,
   CANT_PROD            integer                        null,
   TOTAL_VALOR_VTA      integer                        null,
   constraint PK_VENTAS primary key (ID_VENTA)
);

/*==============================================================*/
/* Index: VENTAS_PK                                             */
/*==============================================================*/
create unique index VENTAS_PK on VENTAS (
ID_VENTA ASC
);

/*==============================================================*/
/* Index: GENERAN_FK                                            */
/*==============================================================*/
create index GENERAN_FK on VENTAS (
RUT_USU ASC
);

/*==============================================================*/
/* Index: RELATIONSHIP_7_FK                                     */
/*==============================================================*/
create index RELATIONSHIP_7_FK on VENTAS (
ID_PRODUCTO ASC
);

/*==============================================================*/
/* Index: RELATIONSHIP_9_FK                                     */
/*==============================================================*/
create index RELATIONSHIP_9_FK on VENTAS (
NUM_BOLETA ASC
);

alter table BOLETAS
   add constraint FK_BOLETAS_EMITE_SUCURSAL foreign key (ID_SUCURSAL)
      references SUCURSALES (ID_SUCURSAL)
      on update restrict
      on delete restrict;

alter table BOLETAS
   add constraint FK_BOLETAS_RELATIONS_VENTAS foreign key (ID_VENTA)
      references VENTAS (ID_VENTA)
      on update restrict
      on delete restrict;

alter table BOLETAS
   add constraint FK_BOLETAS_RELATIONS_CLIENTES foreign key (RUT_CLTE)
      references CLIENTES (RUT_CLTE)
      on update restrict
      on delete restrict;

alter table PRODUCTOS
   add constraint FK_PRODUCTO_ANADE_USUARIOS foreign key (RUT_USU)
      references USUARIOS (RUT_USU)
      on update restrict
      on delete restrict;

alter table PRODUCTOS
   add constraint FK_PRODUCTO_SE_DIVIDE_CATEGORI foreign key (ID_CATEGORIA)
      references CATEGORIAS (ID_CATEGORIA)
      on update restrict
      on delete restrict;

alter table PRODUCTOS
   add constraint FK_PRODUCTO_TIENEN_SUCURSAL foreign key (ID_SUCURSAL)
      references SUCURSALES (ID_SUCURSAL)
      on update restrict
      on delete restrict;

alter table VENTAS
   add constraint FK_VENTAS_GENERAN_USUARIOS foreign key (RUT_USU)
      references USUARIOS (RUT_USU)
      on update restrict
      on delete restrict;

alter table VENTAS
   add constraint FK_VENTAS_RELATIONS_PRODUCTO foreign key (ID_PRODUCTO)
      references PRODUCTOS (ID_PRODUCTO)
      on update restrict
      on delete restrict;

alter table VENTAS
   add constraint FK_VENTAS_RELATIONS_BOLETAS foreign key (NUM_BOLETA)
      references BOLETAS (NUM_BOLETA)
      on update restrict
      on delete restrict;


INSERT INTO `sucursales`(`CIUDAD_SUC`, `COMUNA_SUC`, `DIRECCION_SUC`, `FONO_SUC`, `MAIL_SUC`) VALUES ('valparaíso','casablanca','los patitos 123','93976112','patitos@gmail.com');
INSERT INTO `sucursales`( `CIUDAD_SUC`, `COMUNA_SUC`, `DIRECCION_SUC`, `FONO_SUC`, `MAIL_SUC`) VALUES ('valparaíso','Con con','los platanos 662','93721712','losplatanos@gmail.com');
INSERT INTO `sucursales`(`CIUDAD_SUC`, `COMUNA_SUC`, `DIRECCION_SUC`, `FONO_SUC`, `MAIL_SUC`) VALUES ('Los Lagos','Puerto Varas','frutillar 162','626968271','frutillar@gmail.com');
INSERT INTO `sucursales`( `CIUDAD_SUC`, `COMUNA_SUC`, `DIRECCION_SUC`, `FONO_SUC`, `MAIL_SUC`) VALUES ('Santiago','Santiago','Catedral 1289','93975222','catedral@gmail.com');

INSERT INTO `categorias`( `NOMBRE_CAT`) VALUES ('Juguetes');
INSERT INTO `categorias`( `NOMBRE_CAT`) VALUES ('VideoJuegos');
INSERT INTO `categorias`( `NOMBRE_CAT`) VALUES ('Manga');
INSERT INTO `categorias`( `NOMBRE_CAT`) VALUES ('Animé');
INSERT INTO `categorias`( `NOMBRE_CAT`) VALUES ('Figuras');

INSERT INTO `usuarios`(`RUT_USU`, `NOMBRE_USU`, `APELLIDO_USU`, `MAIL_USU`, `CLAVE_USU`, `ROL_USU`) VALUES ('1-9','Gastón','Gatuso','gatuso@miau.cl','admin123','admin');
INSERT INTO `usuarios`(`RUT_USU`, `NOMBRE_USU`, `APELLIDO_USU`, `MAIL_USU`, `CLAVE_USU`, `ROL_USU`) VALUES ('11111111-1','Ceviche','de pollo','ceviche@miau.cl','admin','admin');
INSERT INTO `usuarios`(`RUT_USU`, `NOMBRE_USU`, `APELLIDO_USU`, `MAIL_USU`, `CLAVE_USU`, `ROL_USU`) VALUES ('11665257-6','Juan Carlos','Bodoque','bodoque@guau.cl','bodoque123','vendedor');


INSERT INTO `productos`(`ID_CATEGORIA`, `RUT_USU`, `ID_SUCURSAL`, `NOMBRE_PROD`, `DESCRIPCION_PROD`, `PRECIO_VTA`, `STOCK_PROD`, `ESTADO_PROD`) VALUES (2,'11111111-1', 3 ,'Zelda TOTK','El juego más hermoso del mundo', 47000, 10, 'Activo');
INSERT INTO `productos`(`ID_CATEGORIA`, `RUT_USU`, `ID_SUCURSAL`, `NOMBRE_PROD`, `DESCRIPCION_PROD`, `PRECIO_VTA`, `STOCK_PROD`, `ESTADO_PROD`) VALUES (5,'11111111-1', 3 ,'Amiibo Link ','El héroe de Hyrule hecho de resina', 30000, 50, 'Inactivo');
INSERT INTO `productos`(`ID_CATEGORIA`, `RUT_USU`, `ID_SUCURSAL`, `NOMBRE_PROD`, `DESCRIPCION_PROD`, `PRECIO_VTA`, `STOCK_PROD`, `ESTADO_PROD`) VALUES (3,'1-9', 2 ,'Death Note','El libro de la muerte ha llegado al mundo humano', 15000, 12, 'Activo');
INSERT INTO `productos`(`ID_CATEGORIA`, `RUT_USU`, `ID_SUCURSAL`, `NOMBRE_PROD`, `DESCRIPCION_PROD`, `PRECIO_VTA`, `STOCK_PROD`, `ESTADO_PROD`) VALUES (1,'1-9', 2 ,'Pop it','Fidget de reventar pelotitas', 15000, 60, 'Activo');
INSERT INTO `productos`(`ID_CATEGORIA`, `RUT_USU`, `ID_SUCURSAL`, `NOMBRE_PROD`, `DESCRIPCION_PROD`, `PRECIO_VTA`, `STOCK_PROD`, `ESTADO_PROD`) VALUES (2,'1-9', 4 ,'Spider-man','Juego PS4 sobre el increíble hombre araña', 28000, 30, 'Activo');
INSERT INTO `productos`(`ID_CATEGORIA`, `RUT_USU`, `ID_SUCURSAL`, `NOMBRE_PROD`, `DESCRIPCION_PROD`, `PRECIO_VTA`, `STOCK_PROD`, `ESTADO_PROD`) VALUES (2,'1-9', 1 ,'Deadpool','Remasterizado para PS4', 19000, 3, 'Inactivo');
INSERT INTO `productos`(`ID_CATEGORIA`, `RUT_USU`, `ID_SUCURSAL`, `NOMBRE_PROD`, `DESCRIPCION_PROD`, `PRECIO_VTA`, `STOCK_PROD`, `ESTADO_PROD`) VALUES (1,'1-9', 3 ,'Cubo Rubrik','Cubo puzzle 3x3 ', 17000, 20, 'Activo');