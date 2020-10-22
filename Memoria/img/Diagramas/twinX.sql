## SE HA TENIDO QUE ELIMINAR EL USUARIO DE USER PARA AÑADIRLE FOREIGN KEYS
## 
CREATE TABLE `centro` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nombre` varchar(255) UNIQUE NOT NULL
);

CREATE TABLE `curso` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `curso` varchar(4) NOT NULL
);

CREATE TABLE `mail_predef` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `titulo` varchar(255) UNIQUE NOT NULL,
  `asunto` varchar(255) NOT NULL,
  `cuerpo` text NOT NULL
);

CREATE TABLE `titulacion` (
  `id` int PRIMARY KEY,
  `nombre` varchar(255) UNIQUE NOT NULL,
  `id_centro` int NOT NULL
);

CREATE TABLE `asignatura` (
  `id` int PRIMARY KEY,
  `id_tit` int NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `ects` int NOT NULL,
  `cuatrimestre` ENUM ('PRIMERO', 'SEGUNDO', 'C_COMPLETO') NOT NULL,
  `tipo` ENUM ('TRONCAL', 'OBLIGATORIA', 'OPTATIVA') NOT NULL
);

CREATE TABLE `asignatura_ext` (
  `id` int PRIMARY KEY,
  `id_conv` int NOT NULL,
  `cod_asig` varchar(255) COMMENT 'Identificador en destino que facilite la identificación de la asignatura',
  `nombre` varchar(255) NOT NULL,
  `ects` int NOT NULL,
  `id_curso` int NOT NULL COMMENT 'Importante, ya que pueden cambiar de un año para otro en destino',
  `cuatrimestre` ENUM ('PRIMERO', 'SEGUNDO', 'C_COMPLETO') NOT NULL
);

CREATE TABLE `pais` (
  `iso` varchar(255) PRIMARY KEY,
  `nombre` varchar(255) NOT NULL
);

CREATE TABLE `universidad` (
  `cod_uni` varchar(255) NOT NULL,
  `cod_pais` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `direccion` varchar(255),
  `web` varchar(255),
  `email` varchar(255),
  PRIMARY KEY (`cod_pais`, `cod_uni`)
);

CREATE TABLE `area` (
  `cod_isced` int PRIMARY KEY,
  `nombre_isced` varchar(255) NOT NULL,
  `nombre_area` varchar(255)
);

CREATE TABLE `estudiante` (
  `id_usuario` int NOT NULL,
  `dni` varchar(255) UNIQUE NOT NULL,
  `id_convenio` int NOT NULL,
  `id_titulacion` int NOT NULL,
  `telefono2` int,
  `email_go_ugr` varchar(255),
  `f_nacimiento` datetime NOT NULL,
  `tipo_estudiante` ENUM ('INCOMING', 'OUTCOMING') NOT NULL,
  `cesion_datos` boolean,
  `nota_expediente` double,
  `beca_mec` boolean
);

CREATE TABLE `competencia_ling` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `lengua` varchar(255) NOT NULL,
  `nivel` ENUM ('B1', 'B2', 'C1', 'C2') NOT NULL
);

CREATE TABLE `rel_cl_est` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `id_cl` int NOT NULL,
  `id_est` int NOT NULL
);

CREATE TABLE `req_ling_conv` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `id_comp` int NOT NULL,
  `id_conv` int NOT NULL
);

CREATE TABLE `convenio` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `cod_area` varchar(255) NOT NULL,
  `cod_uni` varchar(255) NOT NULL,
  `cod_pais` varchar(255) NOT NULL,
  `id_tutor` int NOT NULL COMMENT 'ref a usuario pero tiene que ser un tutor, futura restricción',
  `id_curso_creacion` int NOT NULL,
  `creado_por` int NOT NULL,
  `num_becas_in` int NOT NULL,
  `num_becas_out` int NOT NULL,
  `meses_in` int NOT NULL,
  `meses_out` int NOT NULL,
  `anotaciones` text,
  `anno_inicio` int NOT NULL,
  `anno_fin` int NOT NULL,
  `req_titulacion` varchar(255),
  `req_curso` varchar(255),
  `nominacion_online` boolean,
  `link_nom_online` varchar(255),
  `info_nom_online` text,
  `link_documentacion` varchar(255),
  `movilidad_pdi` boolean,
  `movilidad_pas` boolean,
  `tipo_movilidad` ENUM ('ERASMUS', 'ARQUS', 'ERASMUS_DI', 'ERASMUS_PARTNER', 'INTERCAMBIO', 'LIBRE_MOVILIDAD') NOT NULL,
  `user_online` varchar(255),
  `password_online` varchar(255),
  `notas_online` varchar(255),
  `fecha_online` datetime,
  `info_tor` text,
  `observ_discapacidad` text,
  `observ_req_ling` text,
  `begin_nom_1s` datetime,
  `end_nom_1s` datetime,
  `begin_nom_2s` datetime,
  `end_nom_2s` datetime,
  `begin_app_1s` datetime,
  `end_app_1s` datetime,
  `begin_app_2s` datetime,
  `end_app_2s` datetime,
  `begin_mov_1s` datetime,
  `end_mov_1s` datetime,
  `begin_mov_2s` datetime,
  `end_mov_2s` datetime,
  `memo_grading` text,
  `memo_visado` text,
  `memo_seguro` text,
  `memo_alojamiento` text
);

CREATE TABLE `admon_out` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `nombre_coord` varchar(255),
  `cargo_coord` varchar(255),
  `email_coord` varchar(255),
  `tlf_coord` varchar(255),
  `address_coord` varchar(255) COMMENT 'Por defecto igual que la de la universidad',
  `web_inf_acad` varchar(255),
  `nombre_admon_in` varchar(255),
  `cargo_admon_in` varchar(255),
  `mail_admon_in` varchar(255),
  `nombre_resp_acad_in` varchar(255),
  `cargo_resp_acad_in` varchar(255),
  `nombre_admon_out` varchar(255),
  `cargo_admon_out` varchar(255),
  `mail_admon_out` varchar(255),
  `nombre_resp_acad_out` varchar(255),
  `cargo_resp_acad_out` varchar(255),
  `mail_resp_acad_out` varchar(255)
);

CREATE TABLE `acuerdo_estudios` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `id_estudiante` int NOT NULL,
  `timestamp_creacion` datetime NOT NULL,
  `periodo` ENUM ('PRIMERO', 'SEGUNDO', 'C_COMPLETO') NOT NULL,
  `fase` int NOT NULL,
  `id_curso` int NOT NULL,
  `necesidades` text,
  `begin_movilidad` datetime,
  `end_movilidad` datetime,
  `timestamp_nominacion` datetime,
  `timestamp_registro` datetime NOT NULL,
  `link_documentacion` varchar(255) COMMENT 'otra alternativa: tabla contenedora de link_documentacion para AE (necesaria otra para convenios también, apliando el mismo método)',
  `n_solicitud_RRII` int,
  `convocatoria` ENUM ('PRIMERA', 'SEGUNDA', 'EXTRAORDINARIA') NOT NULL,
  `estado_validacion` ENUM ('REVISION', 'DENEGADO', 'ACEPTADO', 'VIGENTE') COMMENT 'idea: podría tener una serie de códigos que pudieran definir el estado o, de ser otro número de los predefinidos, sería el id de renuncia, dándose el acuerdo como inválido (por renuncia)'
);

CREATE TABLE `ae_asigloc_asigext` (
  `id_ae` int,
  `asig_loc` int,
  `asig_ext` int,
  PRIMARY KEY (`id_ae`, `asig_loc`, `asig_ext`)
);

CREATE TABLE `renuncia` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `id_ae` int NOT NULL COMMENT 'construir un disparador para invalidar el acuerdo en su tabla',
  `descripcion` text NOT NULL,
  `timestamp` datetime NOT NULL
);

CREATE TABLE `expediente` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `id_ae` int NOT NULL,
  `id_tipo_exp` int NOT NULL
);

CREATE TABLE `tipo_expediente` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `descripcion` varchar(255) NOT NULL,
  `tipo_estudiante` ENUM ('INCOMING', 'OUTCOMING') NOT NULL
);

CREATE TABLE `fase_expediente` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `id_tipo_exp` int NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fase_final` boolean DEFAULT 0
);

CREATE TABLE `envio_mail_fase` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `id_mail` int NOT NULL,
  `id_fase` int NOT NULL,
  `cargo` ENUM ('COORDINADOR', 'ADMON_IN', 'ADMON_OUT', 'RESP_ADMON_OUT') NOT NULL
);

CREATE TABLE `hist_envio_mail_fase` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `id_mail` int NOT NULL,
  `id_fase` int NOT NULL,
  `id_exp` int NOT NULL,
  `email` varchar(255) NOT NULL
);

CREATE TABLE `hist_envio_mail_fase_mod` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `asunto` varchar(255),
  `cuerpo` text NOT NULL,
  `id_fase` int NOT NULL,
  `id_exp` int NOT NULL,
  `email` varchar(255) NOT NULL
);

CREATE TABLE `rel_exp_fase` (
  `id` int PRIMARY KEY,
  `id_exp` int NOT NULL,
  `id_fase` int NOT NULL,
  `id_gestor` int NOT NULL,
  `procesado` boolean,
  `timestamp` datetime NOT NULL,
  `info` varchar(255) COMMENT 'podría estar en otra tabla'
);

CREATE TABLE `rel_exp_fav_gestor` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `id_exp` int,
  `id_gestor` int
);

CREATE TABLE `evento` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `id_creador` int NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text,
  `estado` ENUM ('PENDIENTE', 'EN_PROCESO', 'TERMINADO') NOT NULL,
  `prioridad` ENUM ('ALTA', 'MEDIA', 'BAJA') NOT NULL DEFAULT "MEDIA"
);

CREATE TABLE `tarea` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `estado` ENUM ('PENDIENTE', 'EN_PROCESO', 'TERMINADO') NOT NULL DEFAULT "PENDIENTE"
);

CREATE TABLE `deadline_aviso` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `id_responsable` int NOT NULL,
  `id_evento` int NOT NULL,
  `id_tarea` int NOT NULL
);

CREATE TABLE `mensaje` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `timestamp` datetime NOT NULL,
  `id_emisor` int NOT NULL,
  `id_receptor` int NOT NULL,
  `leido` boolean,
  `etiqueta` ENUM ('AVISO', 'MENSAJE', 'RECORDATORIO') NOT NULL,
  `asunto` varchar(255),
  `cuerpo` text NOT NULL,
  `eliminado` boolean
);

ALTER TABLE `titulacion` ADD FOREIGN KEY (`id_centro`) REFERENCES `centro` (`id`);

ALTER TABLE `asignatura` ADD FOREIGN KEY (`id_tit`) REFERENCES `titulacion` (`id`);

ALTER TABLE `asignatura_ext` ADD FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id`);

ALTER TABLE `asignatura_ext` ADD FOREIGN KEY (`id_conv`) REFERENCES `convenio` (`id`);

ALTER TABLE `universidad` ADD FOREIGN KEY (`cod_pais`) REFERENCES `pais` (`iso`);

ALTER TABLE `estudiante` ADD FOREIGN KEY (`id_titulacion`) REFERENCES `titulacion` (`id`);

ALTER TABLE `estudiante` ADD FOREIGN KEY (`id_usuario`) REFERENCES `user` (`id`);

ALTER TABLE `estudiante` ADD FOREIGN KEY (`id_convenio`) REFERENCES `convenio` (`id`);

ALTER TABLE `rel_cl_est` ADD FOREIGN KEY (`id_cl`) REFERENCES `competencia_ling` (`id`);

ALTER TABLE `rel_cl_est` ADD FOREIGN KEY (`id_est`) REFERENCES `estudiante` (`id_usuario`);

ALTER TABLE `req_ling_conv` ADD FOREIGN KEY (`id_comp`) REFERENCES `competencia_ling` (`id`);

ALTER TABLE `req_ling_conv` ADD FOREIGN KEY (`id_conv`) REFERENCES `convenio` (`id`);

ALTER TABLE `convenio` ADD FOREIGN KEY (`id_curso_creacion`) REFERENCES `curso` (`id`);

ALTER TABLE `convenio` ADD FOREIGN KEY (`cod_pais`) REFERENCES `pais` (`iso`);

ALTER TABLE `convenio` ADD FOREIGN KEY (`creado_por`) REFERENCES `user` (`id`);

ALTER TABLE `convenio` ADD FOREIGN KEY (`cod_area`) REFERENCES `area` (`cod_isced`);

ALTER TABLE `convenio` ADD FOREIGN KEY (`cod_pais`, `cod_uni`) REFERENCES `universidad` (`cod_pais`, `cod_uni`);

ALTER TABLE `convenio` ADD FOREIGN KEY (`id_admon_out`) REFERENCES `admon_out` (`id`);

ALTER TABLE `convenio`  ADD FOREIGN KEY (`id_tutor`) REFERENCES `user` (`id`);

ALTER TABLE `acuerdo_estudios` ADD FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id`);

ALTER TABLE `acuerdo_estudios` ADD FOREIGN KEY (`id_estudiante`) REFERENCES `estudiante` (`id_usuario`);

ALTER TABLE `ae_asigloc_asigext` ADD FOREIGN KEY (`asig_loc`) REFERENCES `asignatura` (`id`);

ALTER TABLE `ae_asigloc_asigext` ADD FOREIGN KEY (`asig_ext`) REFERENCES `asignatura_ext` (`id`);

ALTER TABLE `renuncia` ADD FOREIGN KEY (`id_ae`) REFERENCES `acuerdo_estudios` (`id`);

ALTER TABLE `expediente` ADD FOREIGN KEY (`id_ae`) REFERENCES `acuerdo_estudios` (`id`);

ALTER TABLE `expediente` ADD FOREIGN KEY (`id_tipo_exp`) REFERENCES `tipo_expediente` (`id`);

ALTER TABLE `fase_expediente` ADD FOREIGN KEY (`id_tipo_exp`) REFERENCES `tipo_expediente` (`id`);

ALTER TABLE `envio_mail_fase` ADD FOREIGN KEY (`id_mail`) REFERENCES `mail_predef` (`id`);

ALTER TABLE `envio_mail_fase` ADD FOREIGN KEY (`id_fase`) REFERENCES `fase_expediente` (`id`);

ALTER TABLE `hist_envio_mail_fase` ADD FOREIGN KEY (`id_mail`) REFERENCES `mail_predef` (`id`);

ALTER TABLE `hist_envio_mail_fase` ADD FOREIGN KEY (`id_fase`) REFERENCES `fase_expediente` (`id`);

ALTER TABLE `hist_envio_mail_fase` ADD FOREIGN KEY (`id_exp`) REFERENCES `expediente` (`id`);

ALTER TABLE `hist_envio_mail_fase_mod` ADD FOREIGN KEY (`id_fase`) REFERENCES `fase_expediente` (`id`);

ALTER TABLE `hist_envio_mail_fase_mod` ADD FOREIGN KEY (`id_exp`) REFERENCES `expediente` (`id`);

ALTER TABLE `rel_exp_fase` ADD FOREIGN KEY (`id_exp`) REFERENCES `expediente` (`id`);

ALTER TABLE `rel_exp_fase` ADD FOREIGN KEY (`id_fase`) REFERENCES `fase_expediente` (`id`);

ALTER TABLE `rel_exp_fase` ADD FOREIGN KEY (`id_gestor`) REFERENCES `user` (`id`);

ALTER TABLE `rel_exp_fav_gestor` ADD FOREIGN KEY (`id_exp`) REFERENCES `expediente` (`id`);

ALTER TABLE `rel_exp_fav_gestor` ADD FOREIGN KEY (`id_gestor`) REFERENCES `user` (`id`);

ALTER TABLE `evento` ADD FOREIGN KEY (`id_creador`) REFERENCES `user` (`id`);

ALTER TABLE `deadline_aviso` ADD FOREIGN KEY (`id_responsable`) REFERENCES `user` (`id`);

ALTER TABLE `deadline_aviso` ADD FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id`);

ALTER TABLE `deadline_aviso` ADD FOREIGN KEY (`id_tarea`) REFERENCES `tarea` (`id`);

ALTER TABLE `mensaje` ADD FOREIGN KEY (`id_emisor`) REFERENCES `user` (`id`);

ALTER TABLE `mensaje` ADD FOREIGN KEY (`id_receptor`) REFERENCES `user` (`id`);

