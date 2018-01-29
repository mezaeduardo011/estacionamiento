  -----  ULTIMA MODIFICACION 25-01-2018 09:37 ----------------
  -- #### Seguridad de Datos de roles #### ---

  -- Clase encargada de mantener todos los perfies del sistema ejemplo Root
  create table seg_perfil (
    id                 BIGINT IDENTITY (1, 1) NOT NULL,
    detalle            VARCHAR(50)         NOT NULL,
    CONSTRAINT pk_seg_perfil PRIMARY KEY(id)
  );

  -- Encagado de contener los perfiles asociados al usuario Ejemplo Gregorio -> Root
  create table seg_usuario_perfil (
    seg_perfil_id      BIGINT   NOT NULL,
    seg_usuarios_id    BIGINT   NOT NULL
      CONSTRAINT pk_usuario_perfil PRIMARY KEY(seg_perfil_id,seg_usuarios_id)
  );

  -- ENCARGADO DE REGISTRAR PERFILES ASOCIADOS A ROLES EJEMPLO  ROOT [1,2,3,4,5,6,7,8]
  create table seg_perfil_roles (
    seg_perfil_id      BIGINT   NOT NULL,
    seg_roles_id    BIGINT   NOT NULL
      CONSTRAINT pk_seg_perfil_roles PRIMARY KEY(seg_perfil_id,seg_roles_id)
  );

  -- Cantidad de Roels asociados al sistema ejemplo GENERADOR - ADMINISTRADOR - [CREAR, ACCEDER, ELIMINAR]
  create table seg_roles (
    id                 BIGINT IDENTITY (1, 1) NOT NULL,
    detalle            VARCHAR(200)         NOT NULL,
    CONSTRAINT pk_seg_roles PRIMARY KEY(id)
  );


-- Es importante que la recuperaci�n de clave sea por correos y fecha de nacimiento
  create table seg_usuarios (
    id                 INT IDENTITY (1, 1) NOT NULL,
    apellidos          VARCHAR(50)         NOT NULL,
    nombres            VARCHAR(50)         NOT NULL,
    fech_nacimiento    DATETIME2(7)        NULL,
    usuario            VARCHAR(20)         NOT NULL,
    clave              CHAR(50)            NOT NULL,
    correo             VARCHAR(50)         NOT NULL,
    telefono           VARCHAR(50)         NULL NULL,
    fvence_clave        DATETIME2(7)        NULL,
    ivence_clave        CHAR(1)             NULL,
    cambiar_clave       CHAR(1)             NULL,
    login_fallidos      SMALLINT            NULL,
    idioma             CHAR(5)             NULL, --idioma
    created_usuario_id INT                 NOT NULL,
    updated_usuario_id INT                 NULL,
    created_at         DATETIME2(7)        NOT NULL,
    removed_at         DATETIME2(7)        NULL,
    updated_at         DATETIME2(7)        NULL,
    cuenta_bloqueada            CHAR(1)             NOT NULL,
    nsesion            INT                 NULL, --no loguear muchas veces
    dactive            TEXT                NULL, --active directory
    CONSTRAINT pk_seg_usuarios_1 PRIMARY KEY(id)
  );
  
  ALTER TABLE seg_usuarios
    ADD UNIQUE (usuario,correo,telefono);
    
  --- END


  CREATE TABLE seg_cambio_clave (
    id int Identity(1,1) NOT NULL,
    token varchar(200) NOT NULL,
    estatus bit NOT NULL,
    created_usuario_id INT NOT NULL,
    created_at DATETIME2(7) NOT NULL,
    updated_at DATETIME2(7),
    CONSTRAINT pk_seg_cambio_clave PRIMARY KEY(id)
  );

  CREATE TABLE ho_conexiones (
    id int Identity(1,1) NOT NULL,
    label varchar(20) NOT NULL,
    driver varchar(30) NOT NULL,
    host varchar(20) NOT NULL,
    db varchar(30) NOT NULL,
    usuario varchar(15) NOT NULL,
    clave varchar(50) NOT NULL,
    CONSTRAINT pk_ho_conexiones PRIMARY KEY(id)
  );
  
    ALTER TABLE ho_conexiones
    ADD UNIQUE (label,driver,host)
    
    -- Entidad encargada de mostrar el menu
    CREATE TABLE ho_menu (
    id int Identity(1,1) NOT NULL,
    app varchar(60) NOT NULL,
    entidad varchar(60) NOT NULL,
    vista varchar(60)  NULL,
    nombre varchar(60) NOT NULL,
    icon_fa varchar(60) NOT NULL,
    targe varchar(20)  NULL,
    ho_menu_id  NULL,
    created_usuario_id INT NOT NULL,
    updated_usuario_id INT  NULL,
    created_at DATETIME2(7) NOT NULL,
    updated_at  DATETIME2(7) NULL,
    CONSTRAINT pk_ho_menu PRIMARY KEY(id)
  );
  -- app: Admin, entidad: personal, nombre:demo, vista: ddd, ico_fa: fa-plus, target:__new
  
   ALTER TABLE ho_menu
    ADD UNIQUE (app,entidad,vista,nombre)
  
    -- Gestion de mascaras
    CREATE TABLE ho_mascaras (
    id int Identity(1,1) NOT NULL,
    ho_tipo_dato_type varchar(20) NOT NULL,
    label varchar(20) NOT NULL,
    mascara varchar(200) NOT NULL,
    mensaje varchar(200) NOT NULL,
    clase_input varchar(30) NOT NULL,
    created_usuario_id INT NOT NULL,
    updated_usuario_id INT  NULL,
    created_at  DATETIME2(7)        NOT NULL,
    updated_at  DATETIME2(7)        NULL,
    CONSTRAINT pk_ho_mascaras PRIMARY KEY(id)
  );
  -- typr:varchar, label:integer, mensaje: Campo Integer, mascara: /[0-9]/, clase_input: integer
  
    ALTER TABLE ho_mascaras
    ADD UNIQUE (ho_tipo_dato_type,label,mascara,clase_input);


      -- Gestion de mascaras
    CREATE TABLE ho_tipo_dato (
    type  varchar(20) NOT NULL,
    label varchar(20) NOT NULL,
    length INT NOT NULL,
    orden INT NOT NULL,
    created_usuario_id INT NOT NULL,
    created_at  DATETIME2(7)        NOT NULL,
    CONSTRAINT pk_ho_tipo_dato PRIMARY KEY(type)
  );
  -- Label:Integer, type:int, : Campo Integer, mascara: /[0-9]/, clase_input: integer

    ALTER TABLE ho_tipo_dato
    ADD UNIQUE (label)

  
    -- Gestion de combinaciones de teclas del sistema
    CREATE TABLE ho_keyboard (
    id int Identity(1,1) NOT NULL,
    menu_item_id INT NULL,
    combinacion varchar(30) NOT NULL,
    ruta_token varchar(20) NOT NULL,
    created_usuario_id INT NOT NULL,
    updated_usuario_id INT  NULL,
    created_at  DATETIME2(7)        NOT NULL,
    updated_at  DATETIME2(7)        NULL,
    CONSTRAINT pk_ho_Keyboard PRIMARY KEY(id)
  );
  
  -- menu_item_id: 12, combinacion:Ctrl_b, ruta_token: /logout
  
    ALTER TABLE ho_keyboard
    ADD UNIQUE (combinacion,ruta_token)



  -- Entidades registro de entidd
  CREATE TABLE ho_entidades (
    id BIGINT Identity(1,1) NOT NULL,
    conexiones_id int NOT NULL,
    entidad varchar(64) NOT NULL,
    field varchar(100) NOT NULL,
    type varchar(20) NOT NULL,
    nulo varchar(10) NOT NULL,
    dimension int,
    fijo varchar(60) NULL,
    restrincion varchar(10),
    CONSTRAINT pk_ho_entidades PRIMARY KEY(id)
  );


  ALTER TABLE ho_entidades
    ADD UNIQUE (conexiones_id,tabla,field)

  --- START AUDITORIA ----------
  CREATE TABLE seg_log_autenticacion (
    id BIGINT Identity(1,1) NOT NULL,
    host varchar(30) NOT NULL,
    navegador varchar(164) NOT NULL,
    accion varchar(100) NOT NULL,
    sistema varchar(30) NOT NULL,
    usuario varchar(30) NOT NULL,
    created_at DATETIME2(7) NOT NULL,
    CONSTRAINT pk_ho_seg_log_autenticacion PRIMARY KEY(id)
  );


  CREATE TABLE seg_log_eventos (
    id BIGINT Identity(1,1) NOT NULL,
    host varchar(30) NOT NULL,
    base_datos varchar(100) NOT NULL,
    entidad varchar(60) NOT NULL,
    entidad_id int ,
    new_value text,
    old_value text,
    usuario_id int,
    proceso varchar(60) NOT NULL,
    created_at DATETIME2(7) NOT NULL,
    CONSTRAINT pk_ho_seg_log_eventos PRIMARY KEY(id)
  );

  --- END AUDITORIA ----------

  CREATE TABLE ho_vistas (
    id BIGINT Identity(1,1),
    apps varchar(50) NOT NULL,
    conexiones_id int NOT NULL,
    entidad varchar(70) NOT NULL,
    entidad_alias varchar(70) NULL,
    nombre varchar(70) NOT NULL,
    nombre_alias varchar(70) NULL,
    field varchar(70) NOT NULL,
    field_alias varchar(70) NULL,
    type varchar(20) NOT NULL,
    dimension int,
    fijo varchar(60) NULL,
    restrincion varchar(10),
    label varchar(50) NOT NULL,
    mascara varchar(50) NOT NULL,
    nulo varchar(3) NOT NULL,
    place_holder varchar(200),
    relacionado varchar(10),
    tabla_vista varchar(50) NULL,
    vista_campo varchar(50),
    cart_separacion varchar(50) NULL ,
    orden int,
    hidden_form bit ,
    hidden_list bit ,
    procesado bit,
    CONSTRAINT pk_ho_vistas PRIMARY KEY(id)
  );

  ALTER TABLE ho_vistas
   ADD UNIQUE  (conexiones_id, entidad, nombre, field, label, mascara);


  -- Vista encargada de extraer las tablas
  SELECT a.*, (SELECT COUNT(b.TABLE_NAME) from test_crud.INFORMATION_SCHEMA.COLUMNS AS b WHERE b.TABLE_NAME = a.TABLE_NAME) AS columas from test_crud.INFORMATION_SCHEMA.TABLES AS a WHERE a.TABLE_NAME not like 'ho_%' AND a.TABLE_TYPE='BASE TABLE' AND a.TABLE_NAME not like 'seg%'

  -- Extraer las vistas generadas a partir de una entidad generadas por el sistema
  CREATE VIEW view_list_vist_gene AS
	 SELECT c.apps, c.conexiones_id, c.entidad, c.nombre, c.nombre_alias, d.cls AS pk , coalesce(procesado,0) AS procesado
	 from ho_vistas AS c
	 INNER JOIN view_list_tabla_con_pk AS d ON c.entidad=d.tbs
	 GROUP BY c.apps, c.conexiones_id, c.entidad, c.nombre, c.nombre_alias, d.cls, c.procesado;

  -- Vista encargadas de extraer las entidades seleccionada por el cliente en el momento
  CREATE VIEW view_list_enti_regi AS
SELECT b.apps, b.conexiones_id, a.entidad, (SELECT COUNT(conexiones_id) FROM view_list_vist_gene AS c WHERE c.entidad=a.entidad ) AS catidad, REPLACE(b.nombre,' ','') AS nombre, b.nombre_alias AS nombre_alias, b.procesado FROM ho_entidades AS a
LEFT JOIN view_list_vist_gene AS b ON a.entidad=b.entidad
--WHERE a.entidad='test_abm'
GROUP BY b.apps,b.conexiones_id, a.entidad, b.nombre, b.nombre_alias, b.procesado;


-- Vistas encargada de mostrar los campos cuando se selecciona drilla en la definicion
  CREATE VIEW view_selec_grilla AS
 SELECT c.apps, c.conexiones_id, c.entidad, c.nombre, a.COLUMN_NAME AS pk, a.ORDINAL_POSITION AS orden,  coalesce(procesado,0) AS procesado
 FROM ho_vistas AS c
 INNER JOIN INFORMATION_SCHEMA.COLUMNS AS a ON a.TABLE_NAME=c.entidad
 WHERE COLUMN_NAME NOT IN('update_at','created_at','created_usuario_id','updated_usuario_id')
 GROUP BY c.apps,c.conexiones_id, c.entidad, c.nombre, a.COLUMN_NAME, a.ORDINAL_POSITION, c.procesado;

 -- Vista encargada de Procesar las mascaras para PHP y JS
  CREATE VIEW view_list_mascaras AS
  SELECT a.nombre AS vista, b.ho_tipo_dato_type AS type, b.mascara AS mascaraJS, REPLACE(b.mascara,'\\','\') AS  mascaraPHP, b.mensaje, b.clase_input, a.field AS label, CASE WHEN hidden_form=1 THEN 'SI' ELSE 'NO' END hidden FROM ho_vistas AS a
  INNER JOIN ho_mascaras  AS b ON b.clase_input=a.mascara;

    -- Vista encargada de procesar los dato de seguridad M 23/01/2018
   CREATE VIEW view_seguridad AS
   SELECT a.id AS perfil_id, a.detalle AS perfil, c.id AS roles_id, c.detalle AS roles , e.*  from seg_perfil AS a
      INNER JOIN seg_perfil_roles AS b ON b.seg_perfil_id=a.id
      INNER JOIN seg_roles AS c ON c.id=b.seg_roles_id
      INNER JOIN seg_usuarios_perfil AS d ON d.seg_perfil_id=a.id
      INNER JOIN seg_usuarios AS e ON d.seg_usuarios_id=e.id;



  -- Vista para visualizar todas las tablas con lo campos primarios con sus nombre_campo
  CREATE VIEW view_list_tabla_con_pk AS
    SELECT a.TABLE_CATALOG AS dbs, a.TABLE_NAME AS tbs, b.COLUMN_NAME AS cls from INFORMATION_SCHEMA.TABLE_CONSTRAINTS AS a
    INNER JOIN INFORMATION_SCHEMA.CONSTRAINT_COLUMN_USAGE AS b
    ON a.CONSTRAINT_NAME=b.CONSTRAINT_NAME
    WHERE  CONSTRAINT_TYPE='PRIMARY KEY'
    GROUP BY a.TABLE_CATALOG, a.TABLE_NAME, b.COLUMN_NAME



--- Registro de los datos basico para el funcionamiento del sistema

  -- Alter de tabla
  ALTER table ho_mascaras ALTER column mascara varchar(200) not null;


  TRUNCATE TABLE seg_perfil;
  INSERT INTO seg_perfil(detalle) values('ADMIN');

  TRUNCATE TABLE seg_usuarios_perfil;
  INSERT INTO seg_usuarios_perfil(seg_perfil_id,seg_usuarios_id) VALUES(1,1);

  TRUNCATE TABLE seg_usuarios;
  INSERT INTO seg_usuarios(apellidos,nombres,fech_nacimiento,usuario,clave,correo,telefono,idioma,created_usuario_id,created_at,cuenta_bloqueada,dactive) VALUES('ADMIN','ADMIN','2012-12-12','admin','admin','admin@gmail.com','1127619977','es',1,'2012-12-12','N','NO');

  TRUNCATE TABLE ho_tipo_dato;

  INSERT INTO ho_tipo_dato(type,label,length,orden,created_usuario_id,created_at) VALUES('varchar','Varchar',1000,0,1,'2018-01-22 16:49:00');
  INSERT INTO ho_tipo_dato(type,label,length,orden,created_usuario_id,created_at) VALUES('int','Integer',10,0,1,'2018-01-22 16:49:00');
  INSERT INTO ho_tipo_dato(type,label,length,orden,created_usuario_id,created_at) VALUES('text','Texto',4000,0,1,'2018-01-22 16:49:00');
  INSERT INTO ho_tipo_dato(type,label,length,orden,created_usuario_id,created_at) VALUES('datetime','Datetime',24,0,1,'2018-01-22 16:49:00');
  INSERT INTO ho_tipo_dato(type,label,length,orden,created_usuario_id,created_at) VALUES('intbig','Intbig',19,0,1,'2018-01-22 16:49:00');
  INSERT INTO ho_tipo_dato(type,label,length,orden,created_usuario_id,created_at) VALUES('boolean','Boolean',1,0,1,'2018-01-22 16:49:00');
  INSERT INTO ho_tipo_dato(type,label,length,orden,created_usuario_id,created_at) VALUES('date','Date',10,0,1,'2018-01-22 16:49:00');


USE [hornero]
GO
/****** Object:  Table [dbo].[ho_mascaras]    Script Date: 01/22/2018 20:02:31 ******/
SET IDENTITY_INSERT [dbo].[ho_mascaras] ON
INSERT [dbo].[ho_mascaras] ([id], [ho_tipo_dato_type], [label], [mascara], [mensaje], [clase_input], [created_usuario_id], [updated_usuario_id], [created_at], [updated_at]) VALUES (1, N'varchar', N'Correo', N'^[A-z0-9\\._-]+@[A-z0-9][A-z0-9-]*(\\.[A-z0-9_-]+)*\\.([A-z]{2,6})$', N'Debe ingresar un correo valido, ejemplo: gbolivar@dominio.com.ve', N'correo', 1, NULL, CAST(0x07002431999DCB3D0B AS DateTime2), NULL)
INSERT [dbo].[ho_mascaras] ([id], [ho_tipo_dato_type], [label], [mascara], [mensaje], [clase_input], [created_usuario_id], [updated_usuario_id], [created_at], [updated_at]) VALUES (3, N'varchar', N'DNI', N'^[0-9]{7,8}$', N'Debe ingresar un DNI correcte', N'cdni', 1, NULL, CAST(0x07000BF9D89FCB3D0B AS DateTime2), NULL)
INSERT [dbo].[ho_mascaras] ([id], [ho_tipo_dato_type], [label], [mascara], [mensaje], [clase_input], [created_usuario_id], [updated_usuario_id], [created_at], [updated_at]) VALUES (5, N'int', N'DNI', N'^[0-9]{7,8}$', N'Debe ingresar un DNI correcte', N'idni', 1, NULL, CAST(0x0700B6891AA0CB3D0B AS DateTime2), NULL)
INSERT [dbo].[ho_mascaras] ([id], [ho_tipo_dato_type], [label], [mascara], [mensaje], [clase_input], [created_usuario_id], [updated_usuario_id], [created_at], [updated_at]) VALUES (6, N'varchar', N'IPV4', N'^(([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])\\.){3}([0-9]|[1-9][0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$', N'Debe ingresar una IPV4 correcte', N'ipv4', 1, NULL, CAST(0x07804E86A4A1CB3D0B AS DateTime2), NULL)
INSERT [dbo].[ho_mascaras] ([id], [ho_tipo_dato_type], [label], [mascara], [mensaje], [clase_input], [created_usuario_id], [updated_usuario_id], [created_at], [updated_at]) VALUES (7, N'varchar', N'URL', N'^((http[s]?|ftp):\\/)?\/?([^:\\/\\s]+)((\\/\\w+)*\\/)([\\w\\-\\.]+[^#?''\s]+)(.*)?(#[\\w\\-]+)?$', N'Debe ingresar un url valido.', N'url', 1, NULL, CAST(0x0700B267A59ACB3D0B AS DateTime2), NULL)
INSERT [dbo].[ho_mascaras] ([id], [ho_tipo_dato_type], [label], [mascara], [mensaje], [clase_input], [created_usuario_id], [updated_usuario_id], [created_at], [updated_at]) VALUES (8, N'intbig', N'Números', N'^[0-9]{1,18}$', N'Debe ingresar un número de 1 a 19 dígitos.', N'intbig', 1, NULL, CAST(0x0700B610AEA3CB3D0B AS DateTime2), NULL)
INSERT [dbo].[ho_mascaras] ([id], [ho_tipo_dato_type], [label], [mascara], [mensaje], [clase_input], [created_usuario_id], [updated_usuario_id], [created_at], [updated_at]) VALUES (9, N'int', N'Números', N'^[0-9]{1,8}$', N'Debe ingresar un número de 1 a 8 dígitos.', N'int', 1, NULL, CAST(0x07808445CBA3CB3D0B AS DateTime2), NULL)
INSERT [dbo].[ho_mascaras] ([id], [ho_tipo_dato_type], [label], [mascara], [mensaje], [clase_input], [created_usuario_id], [updated_usuario_id], [created_at], [updated_at]) VALUES (10, N'varchar', N'MD5', N'^[a-f0-9]{32}$', N'Debe ingresar un campo MD5 Valido.', N'md5', 1, NULL, CAST(0x07007F2656A4CB3D0B AS DateTime2), NULL)
INSERT [dbo].[ho_mascaras] ([id], [ho_tipo_dato_type], [label], [mascara], [mensaje], [clase_input], [created_usuario_id], [updated_usuario_id], [created_at], [updated_at]) VALUES (11, N'varchar', N'Bitcoin Address', N'^[13][a-km-zA-HJ-NP-Z0-9]{26,33}$', N'Debe ingresar una cartera de bitcoin valida', N'btc', 1, NULL, CAST(0x070095FC8CA4CB3D0B AS DateTime2), NULL)
INSERT [dbo].[ho_mascaras] ([id], [ho_tipo_dato_type], [label], [mascara], [mensaje], [clase_input], [created_usuario_id], [updated_usuario_id], [created_at], [updated_at]) VALUES (12, N'varchar', N'TDC', N'^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|', N'Debe ingresar una TDC valida', N'tdc', 1, NULL, CAST(0x07007EA1C2A4CB3D0B AS DateTime2), NULL)
INSERT [dbo].[ho_mascaras] ([id], [ho_tipo_dato_type], [label], [mascara], [mensaje], [clase_input], [created_usuario_id], [updated_usuario_id], [created_at], [updated_at]) VALUES (13, N'varchar', N'Solo Texto', N'^[a-zA-Z\s]+$', N'Debe ingresar solo texto sin caracteres especiales ni números.', N'soloTexto', 1, NULL, CAST(0x0700BD677BA5CB3D0B AS DateTime2), NULL)
INSERT [dbo].[ho_mascaras] ([id], [ho_tipo_dato_type], [label], [mascara], [mensaje], [clase_input], [created_usuario_id], [updated_usuario_id], [created_at], [updated_at]) VALUES (14, N'varchar', N'Letras y Números', N'^[0-9a-zA-Z\s]+$', N'Debe ingresar solo letras y números.', N'letrasSpacioNumeros', 1, NULL, CAST(0x07807AB9A5A5CB3D0B AS DateTime2), NULL)
INSERT [dbo].[ho_mascaras] ([id], [ho_tipo_dato_type], [label], [mascara], [mensaje], [clase_input], [created_usuario_id], [updated_usuario_id], [created_at], [updated_at]) VALUES (15, N'varchar', N'Color', N'^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$', N'Debe ingresar un color valido, ejemplo #FF00FF', N'color', 1, NULL, CAST(0x0780169E4CA6CB3D0B AS DateTime2), NULL)
INSERT [dbo].[ho_mascaras] ([id], [ho_tipo_dato_type], [label], [mascara], [mensaje], [clase_input], [created_usuario_id], [updated_usuario_id], [created_at], [updated_at]) VALUES (16, N'text', N'Texto', N'^[A-Za-zZñÑáéíóúÁÉÍÓÚ\\s]+$', N'Debe ingresar en la caja de texto solo valores validos Acentos, números, letras y espacios.', N'texto', 1, NULL, CAST(0x07806AB5A8A7CB3D0B AS DateTime2), NULL)
INSERT [dbo].[ho_mascaras] ([id], [ho_tipo_dato_type], [label], [mascara], [mensaje], [clase_input], [created_usuario_id], [updated_usuario_id], [created_at], [updated_at]) VALUES (17, N'varchar', N'Fecha', N'^(19|20)[0-9]{2}\\-(0[1-9]|1[012])\\-(0[1-9]|[12][0-9]|3[01])$', N'Debe ingresar una fecha valida, ejemplo AAAA-MM-DD', N'tfecha', 1, NULL, CAST(0x0700FA503EA8CB3D0B AS DateTime2), NULL)
INSERT [dbo].[ho_mascaras] ([id], [ho_tipo_dato_type], [label], [mascara], [mensaje], [clase_input], [created_usuario_id], [updated_usuario_id], [created_at], [updated_at]) VALUES (18, N'date', N'Fecha', N'^(19|20)[0-9]{2}\\-(0[1-9]|1[012])\\-(0[1-9]|[12][0-9]|3[01])$', N'Debe ingresar una fecha valida, ejemplo AAAA-MM-DD', N'dfecha', 1, NULL, CAST(0x07003D5876A8CB3D0B AS DateTime2), NULL)
INSERT [dbo].[ho_mascaras] ([id], [ho_tipo_dato_type], [label], [mascara], [mensaje], [clase_input], [created_usuario_id], [updated_usuario_id], [created_at], [updated_at]) VALUES (19, N'datetime', N'Fecha y Hora', N'^(19|20)[0-9]{2}\\-(0[1-9]|1[012])\\-(0[1-9]|[12][0-9]|3[01])(\\s)([0-1][0-9]|2[0-3])(:)([0-5][0-9])(:)([0-5][0-9])$', N'Debe ingresar en formato fecha y hora, ejemplo: 2017-12-01 23:59:59', N'datetime', 1, NULL, CAST(0x0780A27EF6A8CB3D0B AS DateTime2), NULL)
INSERT [dbo].[ho_mascaras] ([id], [ho_tipo_dato_type], [label], [mascara], [mensaje], [clase_input], [created_usuario_id], [updated_usuario_id], [created_at], [updated_at]) VALUES (20, N'varchar', N'Fecha y Hora', N'^(19|20)[0-9]{2}\\-(0[1-9]|1[012])\\-(0[1-9]|[12][0-9]|3[01])(\\s)([0-1][0-9]|2[0-3])(:)([0-5][0-9])(:)([0-5][0-9])$', N'Debe ingresar en formato fecha y hora, ejemplo: 2017-12-01 23:59:59', N'vdatetime', 1, NULL, CAST(0x0700A69344A9CB3D0B AS DateTime2), NULL)
INSERT [dbo].[ho_mascaras] ([id], [ho_tipo_dato_type], [label], [mascara], [mensaje], [clase_input], [created_usuario_id], [updated_usuario_id], [created_at], [updated_at]) VALUES (21, N'boolean', N'Boolean', N'^(true|false)+$', N'Debe Ingresar un valor booleano solo true o false.', N'booleans', 1, NULL, CAST(0x070095DD82AACB3D0B AS DateTime2), NULL)
SET IDENTITY_INSERT [dbo].[ho_mascaras] OFF