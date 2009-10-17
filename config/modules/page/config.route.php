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
 * Настройки роутинга страниц модуля "page"
 * Определяет какой экшен должен запускаться при определенном УРЛе
 */

define("ROUTE_PAGE_PAGE",'page');

return array(
	'page' => array(		
		ROUTE_PAGE_PAGE => 'ActionPage',
	),	
);

?>