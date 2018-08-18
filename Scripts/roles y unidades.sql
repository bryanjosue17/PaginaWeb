INSERT INTO `tb_roles`
(`ID_ROL`,
`DESCRIPCION_ROL`)
VALUES
(
1,'Administrador');
INSERT INTO `tb_roles`
(`ID_ROL`,
`DESCRIPCION_ROL`)
VALUES
(
2,'Usuario');

INSERT INTO `tb_roles`
(`ID_ROL`,
`DESCRIPCION_ROL`)
VALUES
(
3,'Invitado');


INSERT INTO `proyecto`.`tb_unidad_trabajo`
(`ID_UNIDAD_TRABAJO`,
`DESCRIPCION_UNIDAD`)
VALUES
(1,
'Direccion General');


INSERT INTO `proyecto`.`tb_unidad_trabajo`
(`ID_UNIDAD_TRABAJO`,
`DESCRIPCION_UNIDAD`)
VALUES
(2,
'Gerencia Financiera');


INSERT INTO `proyecto`.`tb_unidad_trabajo`
(`ID_UNIDAD_TRABAJO`,
`DESCRIPCION_UNIDAD`)
VALUES
(3,
'Auxiliaturas');


INSERT INTO `proyecto`.`tb_unidad_trabajo`
(`ID_UNIDAD_TRABAJO`,
`DESCRIPCION_UNIDAD`)
VALUES
(4,
'Recursos Humanos y Juridico');


INSERT INTO `proyecto`.`tb_unidad_trabajo`
(`ID_UNIDAD_TRABAJO`,
`DESCRIPCION_UNIDAD`)
VALUES
(5,
'Contabilidad y Presupuesto');


INSERT INTO `proyecto`.`tb_unidad_trabajo`
(`ID_UNIDAD_TRABAJO`,
`DESCRIPCION_UNIDAD`)
VALUES
(6,
'Mercadotecnia y Publicidad');


INSERT INTO `Proyecto`.`tb_unidad_trabajo`
(`ID_UNIDAD_TRABAJO`,
`DESCRIPCION_UNIDAD`)
VALUES
(7,
'tb_usuariosInformatica');

INSERT INTO `tb_usuarios`
(`ID_USUARIO`,
`LOGIN`,
`ID_ROL`,
`ID_UNIDAD`,
`NOMBRE`,
`APELLIDO`,
`FECHA_NACIMIENTO`,
`GENERO`,
`EMAIL`,
`CLAVE`)
VALUES
(1,
'bryanjosue_17',
1,
2,
'Bryan',
'Xol',
'1998/01/25',
'M',
'xolbryan@gmail.com',
'$2y$12$uqLdavBtSQsGtHPrM0jCz.UZsq8xMMrhVvjfm6MsGu6yxU8IQg2ni');

