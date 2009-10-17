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
 * Обработка статистики юзеров, т.е. УРЛа вида /people/
 *
 */
class ActionPeople extends Action {
	/**
	 * Главное меню
	 *
	 * @var unknown_type
	 */
	protected $sMenuHeadItemSelect='people';
		
	/**
	 * Инициализация
	 *
	 */
	public function Init() {		
		$this->SetDefaultEvent('good');	
		$this->Viewer_AddHtmlTitle($this->Lang_Get('people'));	
		
		$this->Viewer_AddBlocks('right',array('actions/ActionPeople/sidebar.tpl'));
	}
	/**
	 * Регистрируем евенты
	 *
	 */
	protected function RegisterEvent() {		
		$this->AddEvent('good','EventGood');		
		$this->AddEvent('bad','EventBad');	
		$this->AddEvent('online','EventOnline');	
		$this->AddEvent('new','EventNew');	
		$this->AddEvent('country','EventCountry');	
		$this->AddEvent('city','EventCity');	
	}
		
	
	/**********************************************************************************
	 ************************ РЕАЛИЗАЦИЯ ЭКШЕНА ***************************************
	 **********************************************************************************
	 */
	
	/**
	 * Показывает юзеров по стране
	 *
	 */
	protected function EventCountry() {		
		if (!($oCountry=$this->User_GetCountryByName(urldecode($this->getParam(0))))) {
			return parent::EventNotFound();
		}
		/**
		 * Получаем статистику
		 */
		$this->GetStats();	
		/**
		 * Передан ли номер страницы
		 */
		if (preg_match("/^page(\d+)$/i",$this->getParam(1),$aMatch)) {			
			$iPage=$aMatch[1];
		} else {
			$iPage=1;
		}		
		/**
		 * Получаем список юзеров
		 */
		$iCount=0;			
		$aResult=$this->User_GetUsersByCountry($oCountry->getName(),$iPage,USER_PER_PAGE);	
		$aUsersCountry=$aResult['collection'];
		/**
		 * Формируем постраничность
		 */			
		$aPaging=$this->Viewer_MakePaging($aResult['count'],$iPage,USER_PER_PAGE,4,DIR_WEB_ROOT.'/'.ROUTE_PAGE_PEOPLE.'/'.$this->sCurrentEvent.'/'.$oCountry->getName());
		/**
		 * Загружаем переменные в шаблон
		 */
		if ($aUsersCountry) {
			$this->Viewer_Assign('aPaging',$aPaging);			
		}	
		$this->Viewer_Assign('oCountry',$oCountry);
		$this->Viewer_Assign('aUsersCountry',$aUsersCountry);				
	}
	/**
	 * Показывает юзеров по городу
	 *
	 */
	protected function EventCity() {		
		if (!($oCity=$this->User_GetCityByName(urldecode($this->getParam(0))))) {
			return parent::EventNotFound();
		}
		/**
		 * Получаем статистику
		 */
		$this->GetStats();	
		/**
		 * Передан ли номер страницы
		 */
		if (preg_match("/^page(\d+)$/i",$this->getParam(1),$aMatch)) {			
			$iPage=$aMatch[1];
		} else {
			$iPage=1;
		}		
		/**
		 * Получаем список юзеров
		 */
		$iCount=0;			
		$aResult=$this->User_GetUsersByCity($oCity->getName(),$iPage,USER_PER_PAGE);	
		$aUsersCity=$aResult['collection'];
		/**
		 * Формируем постраничность
		 */			
		$aPaging=$this->Viewer_MakePaging($aResult['count'],$iPage,USER_PER_PAGE,4,DIR_WEB_ROOT.'/'.ROUTE_PAGE_PEOPLE.'/'.$this->sCurrentEvent.'/'.$oCity->getName());
		/**
		 * Загружаем переменные в шаблон
		 */
		if ($aUsersCity) {
			$this->Viewer_Assign('aPaging',$aPaging);			
		}	
		$this->Viewer_Assign('oCity',$oCity);
		$this->Viewer_Assign('aUsersCity',$aUsersCity);				
	}
	/**
	 * Показываем последних на сайте
	 *
	 */
	protected function EventOnline() {
		/**
		 * Получаем статистику
		 */
		$this->GetStats();		
	}
	/**
	 * Показываем новых на сайте
	 *
	 */
	protected function EventNew() {
		/**
		 * Получаем статистику
		 */
		$this->GetStats();		
	}
	/**
	 * Показываем хороших юзеров
	 *
	 */
	protected function EventGood() {
		/**
		 * Получаем статистику
		 */
		$this->GetStats();		
		/**
		 * Получаем хороших юзеров
		 */
		$this->GetUserRating('good');	
		/**
		 * Устанавливаем шаблон вывода
		 */		
		$this->SetTemplateAction('index');	
	}		
	/**
	 * Показываем плохих юзеров
	 *
	 */
	protected function EventBad() {	
		/**
		 * Получаем статистику
		 */
		$this->GetStats();
		/**
		 * Получаем хороших юзеров
		 */
		$this->GetUserRating('bad');
		/**
		 * Устанавливаем шаблон вывода
		 */		
		$this->SetTemplateAction('index');
	}
	/**
	 * Получение статистики
	 *
	 */
	protected function GetStats() {
		/**
		 * Последние по визиту на сайт
		 */
		$aUsersLast=$this->User_GetUsersByDateLast(15);		
		/**
		 * Последние по регистрации
		 */
		$aUsersRegister=$this->User_GetUsersByDateRegister(15);		
		/**
		 * Статистика кто, где и т.п.
		 */
		$aStat=$this->User_GetStatUsers();		
		/**
		 * Загружаем переменные в шаблон
		 */
		$this->Viewer_Assign('aUsersLast',$aUsersLast);
		$this->Viewer_Assign('aUsersRegister',$aUsersRegister);
		$this->Viewer_Assign('aStat',$aStat);
	}	
	/**
	 * Получаем список юзеров 
	 *
	 * @param unknown_type $sType
	 */
	protected function GetUserRating($sType) {
		/**
		 * Передан ли номер страницы
		 */
		if (preg_match("/^page(\d+)$/i",$this->getParam(0),$aMatch)) {			
			$iPage=$aMatch[1];
		} else {
			$iPage=1;
		}		
		/**
		 * Получаем список юзеров
		 */
		$iCount=0;			
		$aResult=$this->User_GetUsersRating($sType,$iCount,$iPage,USER_PER_PAGE);	
		$aUsersRating=$aResult['collection'];	
		/**
		 * Формируем постраничность
		 */			
		$aPaging=$this->Viewer_MakePaging($aResult['count'],$iPage,USER_PER_PAGE,4,DIR_WEB_ROOT.'/'.ROUTE_PAGE_PEOPLE.'/'.$this->sCurrentEvent);
		/**
		 * Загружаем переменные в шаблон
		 */
		if ($aUsersRating) {
			$this->Viewer_Assign('aPaging',$aPaging);			
		}	
		$this->Viewer_Assign('aUsersRating',$aUsersRating);
	}
	
	/**
	 * Выполняется при завершении работы экшена
	 *
	 */
	public function EventShutdown() {		
		/**
		 * Загружаем в шаблон необходимые переменные
		 */
		$this->Viewer_Assign('sMenuHeadItemSelect',$this->sMenuHeadItemSelect);		
	}
}
?>