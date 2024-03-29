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

set_include_path(get_include_path().PATH_SEPARATOR.dirname(__FILE__));
require_once('mapper/Page.mapper.class.php');

/**
 * Модуль статических страниц
 *
 */
class LsPage extends Module {		
	protected $oMapper;
	protected $aRebuildIds=array();
		
	/**
	 * Инициализация
	 *
	 */
	public function Init() {		
		$this->oMapper=new Mapper_Page($this->Database_GetConnect());
	}
	/**
	 * Добавляет страницу
	 *
	 * @param PageEntity_Page $oPage
	 * @return unknown
	 */
	public function AddPage(PageEntity_Page $oPage) {
		if ($sId=$this->oMapper->AddPage($oPage)) {			
			$oPage->setId($sId);
			//чистим зависимые кеши
			$this->Cache_Clean(Zend_Cache::CLEANING_MODE_MATCHING_TAG,array('page_change',"page_change_{$oPage->getId()}","page_change_urlfull_{$oPage->getUrlFull()}"));
			return true;
		}
		return false;
	}
	/**
	 * Обновляет страницу
	 *
	 * @param PageEntity_Page $oPage
	 * @return unknown
	 */
	public function UpdatePage(PageEntity_Page $oPage) {
		if ($this->oMapper->UpdatePage($oPage)) {
			//чистим зависимые кеши
			$this->Cache_Clean(Zend_Cache::CLEANING_MODE_MATCHING_TAG,array('page_change',"page_change_{$oPage->getId()}","page_change_urlfull_{$oPage->getUrlFull()}"));
			return true;
		}
		return false;
	}	
	/**
	 * Получает страницу по полному УРЛу
	 *
	 * @param unknown_type $sUrlFull
	 */
	public function GetPageByUrlFull($sUrlFull,$iActive=1) {
		if (false === ($data = $this->Cache_Get("page_{$sUrlFull}_{$iActive}"))) {			
			$data = $this->oMapper->GetPageByUrlFull($sUrlFull,$iActive);
			if ($data) {
				$this->Cache_Set($data, "page_{$sUrlFull}_{$iActive}", array("page_change_{$data->getId()}"), 60*60*1);
			} else {
				$this->Cache_Set($data, "page_{$sUrlFull}_{$iActive}", array("page_change_urlfull_{$sUrlFull}"), 60*60*1);
			}
		}
		return $data;		
	}
	/**
	 * Получает страницу по её айдишнику
	 *
	 * @param unknown_type $sId
	 * @return unknown
	 */
	public function GetPageById($sId) {
		return $this->oMapper->GetPageById($sId);
	}
	/**
	 * Получает список всех страниц ввиде дерева
	 *
	 * @return unknown
	 */
	public function GetPages() {
		$aPages=array();
		$aPagesRow=$this->oMapper->GetPages();	
		if (count($aPagesRow)) {
			$aPages=$this->BuildPagesRecursive($aPagesRow);
		}
		return $aPages;
	}
	/**
	 * Строит дерево страниц
	 *
	 * @param unknown_type $aPages
	 * @param unknown_type $bBegin
	 * @return unknown
	 */
	protected function BuildPagesRecursive($aPages,$bBegin=true) {
		static $aResultPages;
		static $iLevel;
		if ($bBegin) {
			$aResultCommnets=array();
			$iLevel=0;
		}		
		foreach ($aPages as $aPage) {
			$aTemp=$aPage;
			$aTemp['level']=$iLevel;
			unset($aTemp['childNodes']);
			$aResultPages[]=new PageEntity_Page($aTemp);			
			if (isset($aPage['childNodes']) and count($aPage['childNodes'])>0) {
				$iLevel++;
				$this->BuildPagesRecursive($aPage['childNodes'],false);
			}
		}
		$iLevel--;		
		return $aResultPages;
	}
	/**
	 * Рекурсивно обновляет полный URL у всех дочерних страниц(веток)
	 *
	 * @param unknown_type $oPageStart
	 */
	public function RebuildUrlFull($oPageStart) {		
		$aPages=$this->GetPagesByPid($oPageStart->getId());
		foreach ($aPages as $oPage) {
			if ($oPage->getId()==$oPageStart->getId()) {
				continue;
			}
			if (in_array($oPage->getId(),$this->aRebuildIds)) {
				continue;
			}
			$this->aRebuildIds[]=$oPage->getId();
			$oPage->setUrlFull($oPageStart->getUrlFull().'/'.$oPage->getUrl());
			$this->UpdatePage($oPage);
			$this->RebuildUrlFull($oPage);
		}		
	}
	/**
	 * Получает список дочерних страниц первого уровня
	 *
	 * @param unknown_type $sPid
	 * @return unknown
	 */
	public function GetPagesByPid($sPid) {
		return $this->oMapper->GetPagesByPid($sPid);
	}
	/**
	 * Удаляет страницу по её айдишнику
	 * Если тип таблиц БД InnoDB, то удалятся и все дочернии страницы
	 *
	 * @param unknown_type $sId
	 * @return unknown
	 */
	public function deletePageById($sId) {
		if ($this->oMapper->deletePageById($sId)) {
			//чистим зависимые кеши
			$this->Cache_Clean(Zend_Cache::CLEANING_MODE_MATCHING_TAG,array('page_change',"page_change_{$sId}"));
			return true;
		}
		return false;		
	}
	/**
	 * Получает число статических страниц
	 *
	 * @return unknown
	 */
	public function GetCountPage() {
		return $this->oMapper->GetCountPage();
	}
	/**
	 * Устанавливает ВСЕМ страницам PID = NULL
	 * Это бывает нужно, когда особо "умный" админ зациклит страницы сами на себя..
	 *
	 * @return unknown
	 */
	public function SetPagesPidToNull() {
		return $this->oMapper->SetPagesPidToNull();
	}
}
?>