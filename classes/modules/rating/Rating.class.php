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
 * Модуль управления рейтингами и силой 
 *
 */
class LsRating extends Module {

	/**
	 * Инициализация модуля
	 *
	 */
	public function Init() {		
		
	}
	/**
	 * Расчет рейтинга при голосовании за комментарий
	 *
	 * @param UserEntity_User $oUser
	 * @param CommentEntity_TopicComment $oComment
	 */
	public function VoteComment(UserEntity_User $oUser, CommentEntity_TopicComment $oComment, $iValue) {
		/**
		 * Устанавливаем рейтинг комментария
		 */
		$oComment->setRating($oComment->getRating()+$iValue);
		/**
		 * Начисляем силу автору коммента, используя логарифмическое распределение
		 */		
		$skill=$oUser->getSkill();
		$iMinSize=0.004;
		$iMaxSize=0.5;
		$iSizeRange=$iMaxSize-$iMinSize;
		$iMinCount=log(0+1);
		$iMaxCount=log(500+1);
		$iCountRange=$iMaxCount-$iMinCount;
		if ($iCountRange==0) {
			$iCountRange=1;
		}		
		if ($skill>50 and $skill<200) {
			$skill_new=$skill/70;
		} elseif ($skill>=200) {
			$skill_new=$skill/10;
		} else {
			$skill_new=$skill/130;
		}
		$iDelta=$iMinSize+(log($skill_new+1)-$iMinCount)*($iSizeRange/$iCountRange);
		/**
		 * Сохраняем силу
		 */
		$oUserComment=$this->User_GetUserById($oComment->getUserId());
		$iSkillNew=$oUserComment->getSkill()+$iValue*$iDelta;
		$iSkillNew=($iSkillNew<0) ? 0 : $iSkillNew;
		$oUserComment->setSkill($iSkillNew);
		$this->User_Update($oUserComment);
	}
	/**
	 * Расчет рейтинга и силы при гоосовании за топик
	 *
	 * @param UserEntity_User $oUser
	 * @param TopicEntity_Topic $oTopic
	 * @param unknown_type $iValue
	 */
	public function VoteTopic(UserEntity_User $oUser, TopicEntity_Topic $oTopic, $iValue) {
		$skill=$oUser->getSkill();
		/**
		 * Устанавливаем рейтинг топика
		 */
		$iDeltaRating=$iValue;
		if ($skill>=100 and $skill<250) {
			$iDeltaRating=$iValue*2;
		} elseif ($skill>=250 and $skill<400) {
			$iDeltaRating=$iValue*3;
		} elseif ($skill>=400) {
			$iDeltaRating=$iValue*4;
		}
		$oTopic->setRating($oTopic->getRating()+$iDeltaRating);
		/**
		 * Начисляем силу и рейтинг автору топика, используя логарифмическое распределение
		 */			
		$iMinSize=0.1;
		$iMaxSize=8;
		$iSizeRange=$iMaxSize-$iMinSize;
		$iMinCount=log(0+1);
		$iMaxCount=log(500+1);
		$iCountRange=$iMaxCount-$iMinCount;
		if ($iCountRange==0) {
			$iCountRange=1;
		}		
		if ($skill>50 and $skill<200) {
			$skill_new=$skill/70;
		} elseif ($skill>=200) {
			$skill_new=$skill/10;
		} else {
			$skill_new=$skill/100;
		}
		$iDelta=$iMinSize+(log($skill_new+1)-$iMinCount)*($iSizeRange/$iCountRange);
		/**
		 * Сохраняем силу и рейтинг
		 */
		$oUserTopic=$this->User_GetUserById($oTopic->getUserId());
		$iSkillNew=$oUserTopic->getSkill()+$iValue*$iDelta;
		$iSkillNew=($iSkillNew<0) ? 0 : $iSkillNew;
		$oUserTopic->setSkill($iSkillNew);
		$oUserTopic->setRating($oUserTopic->getRating()+$iValue*$iDelta/2.73);
		$this->User_Update($oUserTopic);
	}
	/**
	 * Расчет рейтинга и силы при голосовании за блог
	 *
	 * @param UserEntity_User $oUser
	 * @param BlogEntity_Blog $oBlog
	 * @param unknown_type $iValue
	 */
	public function VoteBlog(UserEntity_User $oUser, BlogEntity_Blog $oBlog, $iValue) {		
		/**
		 * Устанавливаем рейтинг блога, используя логарифмическое распределение
		 */		
		$skill=$oUser->getSkill();	
		$iMinSize=1.13;
		$iMaxSize=15;
		$iSizeRange=$iMaxSize-$iMinSize;
		$iMinCount=log(0+1);
		$iMaxCount=log(500+1);
		$iCountRange=$iMaxCount-$iMinCount;
		if ($iCountRange==0) {
			$iCountRange=1;
		}		
		if ($skill>50 and $skill<200) {
			$skill_new=$skill/20;
		} elseif ($skill>=200) {
			$skill_new=$skill/10;
		} else {
			$skill_new=$skill/50;
		}
		$iDelta=$iMinSize+(log($skill_new+1)-$iMinCount)*($iSizeRange/$iCountRange);
		/**
		 * Сохраняем рейтинг
		 */
		$oBlog->setRating($oBlog->getRating()+$iValue*$iDelta);		
	}
	/**
	 * Расчет рейтинга и силы при голосовании за пользователя
	 *
	 * @param UserEntity_User $oUser
	 * @param UserEntity_User $oUserTarget
	 * @param unknown_type $iValue
	 */
	public function VoteUser(UserEntity_User $oUser, UserEntity_User $oUserTarget, $iValue) {		
		/**
		 * Начисляем силу и рейтинг юзеру, используя логарифмическое распределение
		 */			
		$skill=$oUser->getSkill();
		$iMinSize=0.42;
		$iMaxSize=3.2;
		$iSizeRange=$iMaxSize-$iMinSize;
		$iMinCount=log(0+1);
		$iMaxCount=log(500+1);
		$iCountRange=$iMaxCount-$iMinCount;
		if ($iCountRange==0) {
			$iCountRange=1;
		}		
		if ($skill>50 and $skill<200) {
			$skill_new=$skill/40;
		} elseif ($skill>=200) {
			$skill_new=$skill/2;
		} else {
			$skill_new=$skill/70;
		}
		$iDelta=$iMinSize+(log($skill_new+1)-$iMinCount)*($iSizeRange/$iCountRange);
		/**
		 * Сохраняем силу и рейтинг
		 */		
		$iRatingNew=$oUserTarget->getRating()+$iValue*$iDelta;		
		$iSkillNew=$oUserTarget->getSkill()+$iValue*$iDelta/3.67;
		$iSkillNew=($iSkillNew<0) ? 0 : $iSkillNew;		
		$oUserTarget->setSkill($iSkillNew);
		$oUserTarget->setRating($iRatingNew);
		//$this->User_Update($oUserTarget);
	}
}
?>