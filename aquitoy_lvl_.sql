-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-08-2022 a las 19:38:30
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aquitoy_lvl`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ubicacion` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_telefono` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_contacto` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `origen_destino_recurrente` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cod_sede` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `at_cuentas_mensajero`
--

CREATE TABLE `at_cuentas_mensajero` (
  `cod_cuentas_mensajero` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_cuenta` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cod_mensajero` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hora_inicio` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hora_salida` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `at_domicilios_historial`
--

CREATE TABLE `at_domicilios_historial` (
  `cod_domicilios_historial` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `consecutivo` bigint(20) DEFAULT NULL,
  `ubicacion` bigint(20) DEFAULT NULL,
  `fecha_ubicacion` bigint(20) DEFAULT NULL,
  `cod_domicilio` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cod_cliente` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_comercial` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo_documento` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_documento` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `inicio_contrato` date DEFAULT NULL,
  `correo_electronico` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contacto` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono_contacto` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `horario_inicio` time DEFAULT NULL,
  `horario_fin` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pagina_web` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_telefono` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notas` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE `cuentas` (
  `id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contrasena` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nota` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cod_persona` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cod_tipos_cuenta` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cod_cliente` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilios`
--

CREATE TABLE `domicilios` (
  `id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `asignado_a` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `origen` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `destino` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_inicio` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha_fin` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notas` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `entrega_efectivo` tinyint(4) DEFAULT NULL,
  `cod_cliente` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cod_tipo_vehiculo` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cod_tipo_servicio` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajeros`
--

CREATE TABLE `mensajeros` (
  `id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_08_20_162752_create_areas_table', 1),
(3, '2022_08_20_162753_create_at_cuentas_mensajero_table', 1),
(4, '2022_08_20_162754_create_at_domicilios_historial_table', 1),
(5, '2022_08_20_162755_create_clientes_table', 1),
(6, '2022_08_20_162756_create_cuentas_table', 1),
(7, '2022_08_20_162757_create_domicilios_table', 1),
(8, '2022_08_20_162758_create_failed_jobs_table', 1),
(9, '2022_08_20_162759_create_mensajeros_table', 1),
(10, '2022_08_20_162800_create_password_resets_table', 1),
(11, '2022_08_20_162802_create_personas_table', 1),
(12, '2022_08_20_162803_create_recurrentes_table', 1),
(13, '2022_08_20_162804_create_sedes_table', 1),
(14, '2022_08_20_162805_create_tipos_servicio_table', 1),
(15, '2022_08_20_162806_create_tipos_usuario_table', 1),
(16, '2022_08_20_162807_create_tipos_vehiculo_table', 1),
(17, '2022_08_20_162808_create_users_table', 1),
(18, '2022_08_21_080356_create_usuario_estados_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `id_tipo_documento` int(11) DEFAULT NULL,
  `nombres` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellidos` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cel_personal` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cel_corporativo` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sexo` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp(6) NULL DEFAULT NULL,
  `updated_at` timestamp(6) NULL DEFAULT NULL,
  `fecha_nacimiento` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notapersona` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `id_tipo_documento`, `nombres`, `apellidos`, `email`, `cel_personal`, `cel_corporativo`, `direccion`, `sexo`, `created_at`, `updated_at`, `fecha_nacimiento`, `ciudad`, `notapersona`) VALUES
(1, 1, 'GUSTAVO ADOLFO', 'GÓMEZ LÓPEZ', 'gustavo.gomez.lopez@outlook.com', '3044195396', '3215356706', 'CARRERA 80 #1C-50', 'MASCULINO', NULL, NULL, '1988-06-19', 'CALI', 'NOTA DE PERSONA'),
(2, 1, 'HECTOR', 'AMAYA', 'amayahector840@gmail.com', NULL, '3174295625', 'CALLE 56A #26 E -36 NUEVA FLOR', 'MASCULINO', NULL, NULL, '1981-09-13', 'CALI', NULL),
(3, 1, 'LUIS EDUARDO', 'CABAL HERRERA', 'stellita1768@hotmail.com', NULL, '3188280549', 'TRANS 31 C # 4E-108', 'MASCULINO', NULL, NULL, '1971-06-08', 'CALI', NULL),
(4, 1, 'MARLON ALBERTO', 'DAVID GUTIERREZ', 'marlondavid822@gmail.com', NULL, '3226108043', 'CARRERA 24 B 71 26 ', 'MASCULINO', NULL, NULL, '1987-04-08', 'CALI', NULL),
(5, 1, ' JEAN', 'FONTAL', 'jeanfontalq@gmail.com', NULL, '3187118266', 'AV 2B 2 NORTE #74-34 APTO G 40', 'MASCULINO', NULL, NULL, '1982-08-19', 'CALI', NULL),
(6, 1, ' CARLOS JAVIER', 'GONZALEZ VELEZ', 'carlosegonzales47@hotmail.com', NULL, '3108998086', 'CALLE 26#37-17', 'MASCULINO', NULL, NULL, '1973-07-22', 'CALI', NULL),
(7, 1, 'ANDRES', 'GUTIERREZ', 'deportista42@gmail.com', NULL, '3008427036', 'CARRERA 26 # 19-54 SANTA ELENA', 'MASCULINO', NULL, NULL, '1974-10-06', 'CALI', NULL),
(8, 1, ' DIEGO', 'IMBAJOA', 'dfimbajoa0@gmail.com', NULL, '3106625459', 'CALLE 25 OESTE #49B09', 'MASCULINO', NULL, NULL, '1981-07-01', 'CALI', NULL),
(9, 1, ' FRANCISCO', 'LASSO', 'alexislr19841017@gmail.com', NULL, '3013812826', 'AV 15 OESE # 17-80 APTO 304A', 'MASCULINO', NULL, NULL, '1984-10-17', 'CALI', NULL),
(10, 1, 'JOSE', 'MARIN', 'joseorlaymarin3@gmail.com', NULL, '3167688369', 'KRA 36 # 28. 134 BARRIO VITORI', 'MASCULINO', NULL, NULL, '1967-05-14', 'CALI', NULL),
(11, 1, ' JAIRO', 'MARQUINEZ', 'czuluaga.asistente@imbanaco.com.co', NULL, '3147479283', 'CARRERA 33 # 46-105', 'MASCULINO', NULL, NULL, '1981-04-11', 'CALI', NULL),
(12, 1, ' GEOVANNY', 'MARTINEZ', 'geovannymartinez_23@hotmail.com', NULL, '3176413065', 'CALLE 54# 28E-36', 'MASCULINO', NULL, NULL, '1977-10-23', 'CALI', NULL),
(13, 1, ' LUIS FERNANDO', 'MENA', 'luisfdomena@hotmail.com', NULL, '3167696959', 'CALLE 25 #39-07 LA IDEPENDENCI', 'MASCULINO', NULL, NULL, '1979-05-10', 'CALI', NULL),
(14, 1, ' NORBERTO', 'MENA', 'flormena2@hotmail.com', NULL, '3173355057', 'CALLE 55 3BN 154', 'MASCULINO', NULL, NULL, '03/07/1958', 'CALI', NULL),
(15, 1, ' CARLOS', 'MONTILLA', 'dianacris-0204@hotmail.com', NULL, '3187414341', 'CARRERA 3RA NORTE #38N46', 'MASCULINO', NULL, NULL, '1979-04-12', 'CALI', NULL),
(16, 1, ' WILLIAN ALFREDO', 'MORENO', 'morenowillianalfredo@gmail.com', NULL, '3188480283', NULL, 'MASCULINO', NULL, NULL, NULL, 'CALI', NULL),
(17, 1, ' ALEXANDER', 'MOSQUERA', 'alx371982@gmail.com', NULL, '3165284367', 'CALLE 8E#45S-09 JAMUNDI BONANZ', 'MASCULINO', NULL, NULL, '1982-08-22', 'CALI', NULL),
(18, 1, ' JHON', 'MUÑOZ', 'jossenf84@hotmail.com', NULL, '3167745188', 'CARRERA 89 OESTE # 1-12', 'MASCULINO', NULL, NULL, '1984-02-09', 'CALI', NULL),
(19, 1, 'ANYELO ISRAEL', 'NOVOA', 'anyelon@hotmail.com', NULL, '3188219116', 'CALLE 24 OESTE 47 36', 'MASCULINO', NULL, NULL, '1979-07-02', 'CALI', NULL),
(20, 1, 'OSCAR', 'PAEZ', 'oscarhe85@gmail.com', NULL, '3168765522', 'CALLE 114 20 60', 'MASCULINO', NULL, NULL, '1985-12-16', 'CALI', NULL),
(21, 1, ' OSCAR', 'QUINTERO', 'oscarq8488@gmail.com', NULL, '3188228539', 'AVENIDA 5 OESTE 26 06', 'MASCULINO', NULL, NULL, '1984-08-08', 'CALI', NULL),
(22, 1, ' WILLIAM', 'RIVERA', 'williamsteven.wr@gmail.com', NULL, '3202435889', 'CARRERA 94A OESTE #4A-79', 'MASCULINO', NULL, NULL, '1982-04-05', 'CALI', NULL),
(23, 1, ' CRISTIAM', 'ROA', 'cristiamroa_12@hotmail.com', NULL, '3188631707', 'MANZANA 17 CASA 123', 'MASCULINO', NULL, NULL, '1993-10-12', 'CALI', NULL),
(24, 1, 'WILLIAN ALFREDO', 'ROA OREJARENA', 'aquitoywro@hotmail.com', NULL, '3146828862', 'AVENIDA 2 I NORTE 47 BN 09', 'MASCULINO', NULL, NULL, '1984-05-09', 'CALI', NULL),
(25, 1, 'ANDRES', 'SAAVEDRA QUICENO', 'andressaavqui71@gmail.com', NULL, '3167745283', 'AVENIDA GUADALUPE VIA GUAYACAN', 'MASCULINO', NULL, NULL, '1971-06-22', 'CALI', NULL),
(26, 1, 'JANK CARLOS', 'SAMBONI NOVOA', 'jankfl@hotmail.com', NULL, '3167741288', 'CALLE 24 OESTE 47 36', 'MASCULINO', NULL, NULL, '1983-10-23', 'CALI', NULL),
(27, 1, 'BLADIMIR', 'TORO', 'bladicaes@hotmail.com', NULL, '3177264630', 'CL 2 C 4 OESTE 76B 16', 'MASCULINO', NULL, NULL, '1979-09-16', 'CALI', NULL),
(28, 1, 'NORMAN', 'VALENCIA', 'normanvalencia85@gmail.com', NULL, '3167724601', 'CALLE 42# 39E-29 ANTONIO NARIÑ', 'MASCULINO', NULL, NULL, '1975-09-11', 'CALI', NULL),
(29, 1, 'FRANK STARLIN ', 'VELEZ TENORIO', 'mencha1950@hotmail.com', NULL, '3175157884', 'CARRERA 44 56 C 22', 'MASCULINO', NULL, NULL, '1975-11-26', 'CALI', NULL),
(30, 1, 'ISAIL', 'VILLADA OSORIO', 'isailv.sena@gmail.com', NULL, '3168098006', 'CARRERA 27 AA # 96-94 ALFONSO ', 'MASCULINO', NULL, NULL, '1979-10-07', 'CALI', NULL),
(31, 1, 'JOEL', 'VILLADA OSORIO', 'joelvios_0104@hotmail.com', NULL, '3003404369', 'CARRERA 27 AA # 96-94 ALFONSO ', 'MASCULINO', NULL, NULL, '1992-02-15', 'CALI', NULL),
(32, 1, 'JORGE ENIMER', 'MOSQUERA', 'jorgeenimer@gmail.com', NULL, '3217724143', 'CARRERA 6 # 24N 42 CIUDAD JARD', 'MASCULINO', NULL, NULL, '1966-10-03', 'CALI', NULL),
(33, 1, 'GEOVANNY', 'BENAVIDES', 'benavidesgeovanny99@gmail.com', NULL, '3167685996', 'CARRERA 34 # 15-50 TORRE INGAC', 'MASCULINO', NULL, NULL, '1999-07-23', 'CALI', NULL),
(34, 1, 'JESUS ALEJANDRO ', 'PEREZ', 'japm147@gmail.com', NULL, '3116688412', 'CALLE 18B #3E-19 SANTAFE PASTO', 'MASCULINO', NULL, NULL, '1999-01-02', 'CALI', NULL),
(35, 1, 'YULIETH KARINA', 'BOLAÑOS ', 'yuliethka_16@hotmail.com', NULL, '3153108241', 'CALLE 2 99 120', 'FEMENINO', NULL, NULL, '1990-01-30', 'CALI', NULL),
(36, 2, 'PEPITO', 'PRUEBA', 'pepito@prueba.com', '565498999', '878999562', 'DIRECCION', 'FEMENINO', '2022-08-23 13:05:10.000000', '2022-08-23 13:05:10.000000', '1990-03-01', 'PEREIRA', 'NOTA PERSONA PRUEBA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recurrentes`
--

CREATE TABLE `recurrentes` (
  `id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sede_recurrente` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `area_recurrente` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cod_sede` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cod_area` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sedes`
--

CREATE TABLE `sedes` (
  `id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombres` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero_telefono` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombre_contacto` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `origen_destino_recurrente` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cod_cliente` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_documento`
--

CREATE TABLE `tipos_documento` (
  `id` int(11) NOT NULL,
  `tipodocumento_cod` varchar(3) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipodocumento_nombre` varchar(55) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipos_documento`
--

INSERT INTO `tipos_documento` (`id`, `tipodocumento_cod`, `tipodocumento_nombre`) VALUES
(1, 'CC', 'CÉDULA DE CIUDADANÍA'),
(2, 'CE', 'CÉDULA DE EXTRANJERÍA'),
(3, 'NIT', 'NÚMERO DE IDENTIFICACIÓN TRIBUTARIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_servicio`
--

CREATE TABLE `tipos_servicio` (
  `id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_usuario`
--

CREATE TABLE `tipos_usuario` (
  `id` int(11) NOT NULL,
  `tipousu_nombre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipousu_descripcion` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipos_usuario`
--

INSERT INTO `tipos_usuario` (`id`, `tipousu_nombre`, `tipousu_descripcion`, `created_at`, `updated_at`) VALUES
(1, 'MENSAJERO', NULL, NULL, NULL),
(2, 'CLIENTE', NULL, NULL, NULL),
(3, 'AUXILIAR ADMINISTRATIVO', NULL, NULL, NULL),
(4, 'ADMINISTRADOR', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_vehiculo`
--

CREATE TABLE `tipos_vehiculo` (
  `id` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripcion` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `numero_documento` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_usuestado` int(11) DEFAULT NULL,
  `nota` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_tipos_usuario` int(11) DEFAULT NULL,
  `id_personas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`userid`, `numero_documento`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `id_usuestado`, `nota`, `id_tipos_usuario`, `id_personas`) VALUES
(1, '1130599190', NULL, '$2y$10$.3ZB1VmzrrqTrjhDUyrNS.pC0oYBatF.GZxr8BH3ugqTWWdY3u7qO', NULL, NULL, NULL, 1, 'NOTA DE USUARIO', 1, 1),
(2, '16934245', NULL, '$2y$10$.3ZB1VmzrrqTrjhDUyrNS.pC0oYBatF.GZxr8BH3ugqTWWdY3u7qO', NULL, NULL, NULL, 1, NULL, 1, 2),
(3, '94310676', NULL, '$2y$10$.3ZB1VmzrrqTrjhDUyrNS.pC0oYBatF.GZxr8BH3ugqTWWdY3u7qO', NULL, NULL, NULL, 1, NULL, 1, 3),
(4, '1130592053', NULL, '$2y$10$.3ZB1VmzrrqTrjhDUyrNS.pC0oYBatF.GZxr8BH3ugqTWWdY3u7qO', NULL, NULL, NULL, 1, NULL, 1, 4),
(5, '14696582', NULL, '$2y$10$.3ZB1VmzrrqTrjhDUyrNS.pC0oYBatF.GZxr8BH3ugqTWWdY3u7qO', NULL, NULL, NULL, 1, NULL, 1, 5),
(6, '94399578', NULL, '$2y$10$.3ZB1VmzrrqTrjhDUyrNS.pC0oYBatF.GZxr8BH3ugqTWWdY3u7qO', NULL, NULL, NULL, 1, NULL, 1, 6),
(7, '94418294', NULL, '$2y$10$.3ZB1VmzrrqTrjhDUyrNS.pC0oYBatF.GZxr8BH3ugqTWWdY3u7qO', NULL, NULL, NULL, 1, NULL, 1, 7),
(8, '16937275', NULL, '$2y$10$.3ZB1VmzrrqTrjhDUyrNS.pC0oYBatF.GZxr8BH3ugqTWWdY3u7qO', NULL, NULL, NULL, 1, NULL, 1, 8),
(9, '14639001', NULL, '$2y$10$.3ZB1VmzrrqTrjhDUyrNS.pC0oYBatF.GZxr8BH3ugqTWWdY3u7qO', NULL, NULL, NULL, 1, NULL, 1, 9),
(10, '7552707', NULL, '$2y$10$.3ZB1VmzrrqTrjhDUyrNS.pC0oYBatF.GZxr8BH3ugqTWWdY3u7qO', NULL, NULL, NULL, 1, NULL, 1, 10),
(11, '16926926', NULL, '$2y$10$.3ZB1VmzrrqTrjhDUyrNS.pC0oYBatF.GZxr8BH3ugqTWWdY3u7qO', NULL, NULL, NULL, 1, NULL, 1, 11),
(12, '94510647', NULL, '$2y$10$.3ZB1VmzrrqTrjhDUyrNS.pC0oYBatF.GZxr8BH3ugqTWWdY3u7qO', NULL, NULL, NULL, 1, NULL, 1, 12),
(13, '94432889', NULL, '$2y$10$.3ZB1VmzrrqTrjhDUyrNS.pC0oYBatF.GZxr8BH3ugqTWWdY3u7qO', NULL, NULL, NULL, 1, NULL, 1, 13),
(14, '2552991', NULL, '$2y$10$.3ZB1VmzrrqTrjhDUyrNS.pC0oYBatF.GZxr8BH3ugqTWWdY3u7qO', NULL, NULL, NULL, 1, NULL, 1, 14),
(15, '16461674', NULL, '$2y$10$.3ZB1VmzrrqTrjhDUyrNS.pC0oYBatF.GZxr8BH3ugqTWWdY3u7qO', NULL, NULL, NULL, 1, NULL, 1, 15),
(16, '94522324', NULL, '$2y$10$.3ZB1VmzrrqTrjhDUyrNS.pC0oYBatF.GZxr8BH3ugqTWWdY3u7qO', NULL, NULL, NULL, 1, NULL, 1, 16),
(17, '94062441', NULL, '$2y$10$.3ZB1VmzrrqTrjhDUyrNS.pC0oYBatF.GZxr8BH3ugqTWWdY3u7qO', NULL, NULL, NULL, 1, NULL, 1, 17),
(18, '14636975', NULL, '$2y$10$.3ZB1VmzrrqTrjhDUyrNS.pC0oYBatF.GZxr8BH3ugqTWWdY3u7qO', NULL, NULL, NULL, 1, NULL, 1, 18),
(19, '94534720', NULL, '$2y$10$.3ZB1VmzrrqTrjhDUyrNS.pC0oYBatF.GZxr8BH3ugqTWWdY3u7qO', NULL, NULL, NULL, 1, NULL, 1, 19),
(20, '94552966', NULL, '$2y$10$.3ZB1VmzrrqTrjhDUyrNS.pC0oYBatF.GZxr8BH3ugqTWWdY3u7qO', NULL, NULL, NULL, 1, NULL, 1, 20),
(21, '16378910', NULL, '$2y$10$.3ZB1VmzrrqTrjhDUyrNS.pC0oYBatF.GZxr8BH3ugqTWWdY3u7qO', NULL, NULL, NULL, 1, NULL, 1, 21),
(22, '15816294', NULL, '$2y$10$.3ZB1VmzrrqTrjhDUyrNS.pC0oYBatF.GZxr8BH3ugqTWWdY3u7qO', NULL, NULL, NULL, 1, NULL, 1, 22),
(23, '1143850410', NULL, '$2y$10$.3ZB1VmzrrqTrjhDUyrNS.pC0oYBatF.GZxr8BH3ugqTWWdY3u7qO', NULL, NULL, NULL, 1, NULL, 1, 23),
(24, '91528823', NULL, '$2y$10$.3ZB1VmzrrqTrjhDUyrNS.pC0oYBatF.GZxr8BH3ugqTWWdY3u7qO', NULL, NULL, NULL, 1, NULL, 1, 24),
(25, '94382310', NULL, '$2y$10$.3ZB1VmzrrqTrjhDUyrNS.pC0oYBatF.GZxr8BH3ugqTWWdY3u7qO', NULL, NULL, NULL, 1, NULL, 1, 25),
(26, '16847381', NULL, '$2y$10$.3ZB1VmzrrqTrjhDUyrNS.pC0oYBatF.GZxr8BH3ugqTWWdY3u7qO', NULL, NULL, NULL, 1, NULL, 1, 26),
(27, '16839691', NULL, '$2y$10$.3ZB1VmzrrqTrjhDUyrNS.pC0oYBatF.GZxr8BH3ugqTWWdY3u7qO', NULL, NULL, NULL, 1, NULL, 1, 27),
(28, '94456188', NULL, '$2y$10$.3ZB1VmzrrqTrjhDUyrNS.pC0oYBatF.GZxr8BH3ugqTWWdY3u7qO', NULL, NULL, NULL, 1, NULL, 1, 28),
(29, '94450006', NULL, '$2y$10$.3ZB1VmzrrqTrjhDUyrNS.pC0oYBatF.GZxr8BH3ugqTWWdY3u7qO', NULL, NULL, NULL, 1, NULL, 1, 29),
(30, '6134596', NULL, '$2y$10$.3ZB1VmzrrqTrjhDUyrNS.pC0oYBatF.GZxr8BH3ugqTWWdY3u7qO', NULL, NULL, NULL, 1, NULL, 1, 30),
(31, '1143945441', NULL, '$2y$10$.3ZB1VmzrrqTrjhDUyrNS.pC0oYBatF.GZxr8BH3ugqTWWdY3u7qO', NULL, NULL, NULL, 1, NULL, 1, 31),
(32, '4641103', NULL, '$2y$10$.3ZB1VmzrrqTrjhDUyrNS.pC0oYBatF.GZxr8BH3ugqTWWdY3u7qO', NULL, NULL, NULL, 1, NULL, 1, 32),
(33, '1087426678', NULL, '$2y$10$.3ZB1VmzrrqTrjhDUyrNS.pC0oYBatF.GZxr8BH3ugqTWWdY3u7qO', NULL, NULL, NULL, 1, NULL, 1, 33),
(34, '1233192685', NULL, '$2y$10$.3ZB1VmzrrqTrjhDUyrNS.pC0oYBatF.GZxr8BH3ugqTWWdY3u7qO', NULL, NULL, NULL, 1, NULL, 1, 34),
(35, '1144135111', NULL, '$2y$10$.3ZB1VmzrrqTrjhDUyrNS.pC0oYBatF.GZxr8BH3ugqTWWdY3u7qO', NULL, NULL, NULL, 1, NULL, 4, 35),
(36, '987654321', NULL, '$2y$10$LYYpSb1Y8FzGkSSr4lseOOxi5pxOhXzdsILlynGUhpagSlDfmQqCK', NULL, '2022-08-23 13:05:10', '2022-08-23 13:05:10', 3, NULL, 3, 36);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_estados`
--

CREATE TABLE `usuario_estados` (
  `id` int(11) NOT NULL,
  `usuestado_nombre` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `usuestado_descripcion` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuario_estados`
--

INSERT INTO `usuario_estados` (`id`, `usuestado_nombre`, `usuestado_descripcion`, `created_at`, `updated_at`) VALUES
(1, 'ACTIVO', NULL, NULL, NULL),
(2, 'INACTIVO', NULL, NULL, NULL),
(3, 'DISPONIBLE', NULL, NULL, NULL),
(4, 'EN SERVICIO', NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IX_Relationship2` (`cod_sede`);

--
-- Indices de la tabla `at_cuentas_mensajero`
--
ALTER TABLE `at_cuentas_mensajero`
  ADD PRIMARY KEY (`cod_cuentas_mensajero`),
  ADD KEY `in_cuentas_mensajero_cod_cuenta` (`cod_cuenta`),
  ADD KEY `in_cuentas_mensajero_cod_mensajero` (`cod_mensajero`);

--
-- Indices de la tabla `at_domicilios_historial`
--
ALTER TABLE `at_domicilios_historial`
  ADD PRIMARY KEY (`cod_domicilios_historial`),
  ADD KEY `IX_Relationship5` (`cod_domicilio`),
  ADD KEY `IX_Relationship6` (`cod_cliente`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `in_cuentas_cod_persona` (`cod_persona`),
  ADD KEY `in_cuentas_cod_tipos_cuenta` (`cod_tipos_cuenta`),
  ADD KEY `re_cliente_cuenta_idx` (`cod_cliente`);

--
-- Indices de la tabla `domicilios`
--
ALTER TABLE `domicilios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IX_Relationship5` (`cod_cliente`),
  ADD KEY `IX_Relationship2` (`cod_tipo_vehiculo`),
  ADD KEY `IX_Relationship3` (`cod_tipo_servicio`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `mensajeros`
--
ALTER TABLE `mensajeros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idtipodocumento` (`id_tipo_documento`);

--
-- Indices de la tabla `recurrentes`
--
ALTER TABLE `recurrentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IX_Relationship3` (`cod_sede`),
  ADD KEY `IX_Relationship4` (`cod_area`);

--
-- Indices de la tabla `sedes`
--
ALTER TABLE `sedes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IX_Relationship1` (`cod_cliente`);

--
-- Indices de la tabla `tipos_documento`
--
ALTER TABLE `tipos_documento`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipos_documento_tipodocumento_cod_uindex` (`tipodocumento_cod`),
  ADD UNIQUE KEY `tipos_documento_id_uindex` (`id`);

--
-- Indices de la tabla `tipos_servicio`
--
ALTER TABLE `tipos_servicio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_usuario`
--
ALTER TABLE `tipos_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_vehiculo`
--
ALTER TABLE `tipos_vehiculo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `users_numero_documento_uindex` (`numero_documento`),
  ADD KEY `fk_idusuarioestados` (`id_usuestado`),
  ADD KEY `fk_idpersonas` (`id_personas`),
  ADD KEY `fk_idtiposusuario` (`id_tipos_usuario`);

--
-- Indices de la tabla `usuario_estados`
--
ALTER TABLE `usuario_estados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `tipos_documento`
--
ALTER TABLE `tipos_documento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipos_usuario`
--
ALTER TABLE `tipos_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `usuario_estados`
--
ALTER TABLE `usuario_estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `fk_idtipodocumento` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipos_documento` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_idpersonas` FOREIGN KEY (`id_personas`) REFERENCES `personas` (`id`),
  ADD CONSTRAINT `fk_idtiposusuario` FOREIGN KEY (`id_tipos_usuario`) REFERENCES `tipos_usuario` (`id`),
  ADD CONSTRAINT `fk_idusuarioestados` FOREIGN KEY (`id_usuestado`) REFERENCES `usuario_estados` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
