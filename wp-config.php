<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'gb_incode');

/** Имя пользователя MySQL */
define('DB_USER', 'gb_incode');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '68afe9fa678');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'ey}Z!,yT}PqKvB)Qc*1vG_vOe4:5UVJ%sMNNzs{6OytXEM/+OlOu#D9=s-3[YIp8');
define('SECURE_AUTH_KEY',  ']U0],8cJQI/D83rkC@loHLfcG?B_aC?2lzbt*2PUSoga`budpe)3pVjeZAW4AX#T');
define('LOGGED_IN_KEY',    'CGoXn6dTCPK2$To%GUBb/.!%4bL<@|S>}4=UiPp&NgtNo0@Sq^@T 2qh%wh?/u*3');
define('NONCE_KEY',        ')sHTj3n}!re>yc`6@_F9$Dq%V68Nb{*T_i> }]#cQyHOq9zfsXs`|kyS #*0:sej');
define('AUTH_SALT',        '9p`xIk?;N*pNM=!`;6vPg,}m<^KXXmri4+ex&m2CJ@Pbv> Pl>;*6zzX}0AK;Rt}');
define('SECURE_AUTH_SALT', '=$0woy]3Y)zWFKm2!V(@|d.G?oqIi5vCqP+G5$5.`sH:G/.yO(E)/wX_2v}O3A.b');
define('LOGGED_IN_SALT',   'U]MDP%}mOXjejKsJ+n?_!`{dW}1?Z3:JWs)PKTGR/D9X/kQP18j!j}9MI6Qv}z;-');
define('NONCE_SALT',       '2FF7W6pZ@YL`@c:AlI;B+7u~JkLD5V|d:4B@|q!?:uTsQmzD%e[o@HkYUy-K|{@y');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
