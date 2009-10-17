<?php
/*-------------------------------------------------------
*
*   LiveStreet Engine Social Networking
*   Copyright © 2008 Mzhelskiy Maxim
*
*--------------------------------------------------------
*
*   Official site: www.livestreet.ru
*   Contact e-mail: rus.engine@gmail.com
*
*   GNU General Public License, version 2:
*   http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
*
---------------------------------------------------------
*/

/**
 * Шаблон(скин)
 */
define('SITE_SKIN','new');

/**
 * Настройка путей
 * Если необходимо установить движек в директорию(не корень сайта) то следует сделать так:
 * define('DIR_WEB_ROOT','http://'.$_SERVER['HTTP_HOST'].'/subdir');
 * define('DIR_SERVER_ROOT',$_SERVER['DOCUMENT_ROOT'].'/subdir');
 * и возможно придёться увеличить значение SYS_OFFSET_REQUEST_URL на число вложенных директорий, например, для директории первой вложенности www.site.ru/livestreet/ поставить значение равное 1 
 */
define('DIR_WEB_ROOT','http://'.$_SERVER['HTTP_HOST']); // полный WEB адрес сайта
define('DIR_STATIC_ROOT',DIR_WEB_ROOT); // чтоб можно было статику засунуть на отдельный сервер
define('DIR_SERVER_ROOT',$_SERVER['DOCUMENT_ROOT']); // полный путь до сайта в файловой системе
define('DIR_STATIC_SKIN',DIR_STATIC_ROOT.'/templates/skin/'.SITE_SKIN);
define('DIR_UPLOADS','/uploads');
define('DIR_UPLOADS_IMAGES',DIR_UPLOADS.'/images');

/**
 * Настройки шаблонизатора Smarty
 *
 */
define('DIR_SMARTY_TEMPLATE',DIR_SERVER_ROOT.'/templates/skin/'.SITE_SKIN);
define('DIR_SMARTY_COMPILED',DIR_SERVER_ROOT.'/templates/compiled');
define('DIR_SMARTY_CACHE',DIR_SERVER_ROOT.'/templates/cache');
define('DIR_SMARTY_PLUG',DIR_SERVER_ROOT.'/classes/modules/sys_viewer/plugs');

/**
 * Системные настройки
 */
define('SYS_OFFSET_REQUEST_URL',0); // иногда помогает если сервер использует внутренние реврайты

/**
 * Настройки логирования
 */
define('SYS_LOGS_FILE','log.log'); // файл общего лога
define('SYS_LOGS_SQL_QUERY',false); // логировать или нет SQL запросы
define('SYS_LOGS_SQL_QUERY_FILE','sql_query.log'); // файл лога SQL запросов
define('SYS_LOGS_SQL_ERROR',true); // логировать или нет ошибки SQl
define('SYS_LOGS_SQL_ERROR_FILE','sql_error.log'); // файл лога ошибок SQL

/**
 * Настройки кеширования
 */
define('SYS_CACHE_USE',false); // использовать кеширование или нет
define('SYS_CACHE_TYPE','file'); // тип кеширования: file и memory. memory использует мемкеш
$aTmpDir=explode(';',session_save_path());
$sTmpDir = count($aTmpDir)>1 ? $aTmpDir[1] : $aTmpDir[0];
define('SYS_CACHE_DIR',$sTmpDir.'/'); // каталог для файлового кеша, также используется для временных картинок. По умолчанию подставляем каталог для хранения сессий
define('SYS_CACHE_PREFIX','livestreet_cache'); // префикс кеширования, чтоб можно было на одной машине держать несколько сайтов с общим кешевым хранилищем

/**
 * Настройки куков
 */
define('SYS_COOKIE_HOST',null); // хост для установки куков
define('SYS_COOKIE_PATH','/'); // путь для установки куков

/**
 * Настройки сессий
 */
define('SYS_SESSION_STANDART',true); // Использовать или нет стандартный механизм сессий
define('SYS_SESSION_NAME','PHPSESSID'); // название сессии
define('SYS_SESSION_TIMEOUT',null); // Тайм-аут сессии в секундах
define('SYS_SESSION_HOST',SYS_COOKIE_HOST); // хост сессии в куках
define('SYS_SESSION_PATH',SYS_COOKIE_PATH); // путь сессии в куках

/**
 * Настройки почтовых уведомлений
 */
define('SYS_MAIL_TYPE','mail'); // Какой тип отправки использовать
define('SYS_MAIL_FROM_EMAIL','rus.engine@gmail.com'); // Мыло с которого отправляются все уведомления
define('SYS_MAIL_FROM_NAME','Почтовик LiveStreet'); // Имя с которого отправляются все уведомления
define('SYS_MAIL_CHARSET','UTF-8'); // Какую кодировку использовать в письмах
define('SYS_MAIL_SMTP_HOST','localhost'); // Настройки SMTP - хост
define('SYS_MAIL_SMTP_PORT',25); // Настройки SMTP - порт
define('SYS_MAIL_SMTP_USER',''); // Настройки SMTP - пользователь
define('SYS_MAIL_SMTP_PASSWORD',''); // Настройки SMTP - пароль
define('SYS_MAIL_SMTP_AUTH',true); // Использовать авторизацию при отправке
define('SYS_MAIL_INCLUDE_COMMENT_TEXT',true); // Включает в уведомление о новых комментах текст коммента
define('SYS_MAIL_INCLUDE_TALK_TEXT',true); // Включает в уведомление о новых личных сообщениях текст сообщения


/**
 * Настройки ACL(Access Control List — список контроля доступа)
 */
define('ACL_CAN_CREATE_BLOG',1); // порог рейтинга при котором юзер может создать коллективный блог
define('ACL_CAN_POST_COMMENT',-10); // порог рейтинга при котором юзер может добавлять комментарии
define('ACL_CAN_POST_COMMENT_TIME',10); // время в секундах между постингом комментариев, если 0 то ограничение по времени не будет работать 
define('ACL_CAN_POST_COMMENT_TIME_RATING',1); // рейтинг, выше которого перестаёт действовать ограничение по времени на постинг комментов. Не имеет смысла при ACL_CAN_POST_COMMENT_TIME=0 
define('ACL_CAN_VOTE_COMMENT',-3); // порог рейтинга при котором юзер может голосовать за комментарии
define('ACL_CAN_VOTE_BLOG',-5); // порог рейтинга при котором юзер может голосовать за блог
define('ACL_CAN_VOTE_TOPIC',-7); // порог рейтинга при котором юзер может голосовать за топик
define('ACL_CAN_VOTE_USER',-1); // порог рейтинга при котором юзер может голосовать за пользователя

/**
 * Ограничение по времени на голосования
 */
define('VOTE_LIMIT_TIME_TOPIC',60*60*24*20);
define('VOTE_LIMIT_TIME_COMMENT',60*60*24*5);


/**
 * Языковые настройки
 */
define('LANG_CURRENT','russian'); // текущий язык текстовок
define('LANG_PATH',DIR_SERVER_ROOT.'/templates/language'); // полный путь до языковых файлов


/**
 * Настройки блоков
 */
define('BLOCK_STREAM_COUNT_ROW',20); // сколько записей выводить в блоке "Прямой эфир"
define('BLOCK_BLOGS_COUNT_ROW',10); // сколько записей выводить в блоке "Блоги"

/**
 * Прочие настройки
 */
define('SITE_NAME','LiveStreet - бесплатный движок социальной сети'); // название сайта
define('SITE_KEYWORDS','движок, livestreet, блоги, социальная сеть, бесплатный, php'); // seo keywords
define('SITE_DESCRIPTION','LiveStreet - официальный сайт бесплатного движка социальной сети'); // seo description
define('SITE_CLOSE_MODE',false); // использовать закрытый режим работы сайта, сайт будет доступен только авторизованным пользователям
define('USER_USE_ACTIVATION',false); // использовать активацию при регистрации или нет
define('USER_USE_INVITE',false); // использовать режим регистрации по приглашению или нет. Если использовать, то регистрация будет доступна ТОЛЬКО по приглашениям!
define('BLOG_PERSONAL_LIMIT_GOOD',-5); // Рейтинг топика в персональном блоге ниже которого он считается плохим
define('BLOG_COLLECTIVE_LIMIT_GOOD',-3); // рейтинг топика в коллективных блогах ниже которого он считается плохим
define('BLOG_INDEX_LIMIT_GOOD',8); // рейтинг топика выше которого(включительно) он попадает на главную
define('BLOG_TOPIC_NEW_TIME',60*60*24*1); // Время в секундах в течении которого топик считается новым
define('BLOG_TOPIC_PER_PAGE',10); // число топиков на одну страницу
define('BLOG_COMMENT_PER_PAGE',20); // число комментариев на одну страницу(это касается только полного списка комментариев прямого эфира)
define('BLOG_COMMENT_BAD',-5); // рейтинг комментария, начиная с которого он будет скрыт
define('BLOG_COMMENT_MAX_TREE_LEVEL',7); // максимальная вложенность комментов при отображении
define('BLOG_BLOGS_PER_PAGE',20); // число блогов на страницу
define('BLOG_IMG_RESIZE_WIDTH',500); // до какого размера в пикселях ужимать картинку по щирине при загрузки её в топики и комменты
define('BLOG_USE_TINYMCE',false); // использовать или нет визуальный редактор TinyMCE
define('USER_PER_PAGE',15); // число юзеров на страницу на странице статистики
define('RSS_EDITOR_MAIL',SYS_MAIL_FROM_EMAIL); // мыло редактора РСС
define('BLOG_URL_NO_INDEX',true); // "прятать" или нет ссылки от поисковиков, оборачивая их в тег <noindex> и добавляя rel="nofollow"


/**
 * Установка локали
 */
setlocale(LC_ALL, "ru_RU.UTF-8");


require_once(DIR_SERVER_ROOT."/config/config.table.php");
require_once(DIR_SERVER_ROOT."/config/loader.php");
?>