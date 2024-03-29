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

class UserEntity_User extends Entity {
	
	public function getId() {
        return $this->_aData['user_id'];
    }        
    public function getLogin() {
        return $this->_aData['user_login'];
    }
    public function getPassword() {
        return $this->_aData['user_password'];
    }
    public function getKey() {
        return $this->_aData['user_key'];
    }
    public function getMail() {
        return $this->_aData['user_mail'];
    }
    public function getSkill() {         
        return number_format(round($this->_aData['user_skill'],2), 2, '.', '');
    }
    public function getDateRegister() {
        return $this->_aData['user_date_register'];
    }
    public function getDateLast() {
        return $this->_aData['user_date_last'];
    }
    public function getDateActivate() {
        return $this->_aData['user_date_activate'];
    }
    public function getDateCommentLast() {
        return $this->_aData['user_date_comment_last'];
    }
    public function getIpRegister() {
        return $this->_aData['user_ip_register'];
    }
    public function getIpLast() {
        return $this->_aData['user_ip_last'];
    }    
    public function getRating() {         
        return number_format(round($this->_aData['user_rating'],2), 2, '.', '');
    }
    public function getCountVote() {
        return $this->_aData['user_count_vote'];
    }
    public function getActivate() {
        return $this->_aData['user_activate'];
    }
    public function getActivateKey() {
        return $this->_aData['user_activate_key'];
    }   
    public function getProfileName() {
        return $this->_aData['user_profile_name'];
    }
    public function getProfileSex() {
        return $this->_aData['user_profile_sex'];
    }
    public function getProfileCountry() {
        return $this->_aData['user_profile_country'];
    }
    public function getProfileRegion() {
        return $this->_aData['user_profile_region'];
    }
    public function getProfileCity() {
        return $this->_aData['user_profile_city'];
    }
    public function getProfileBirthday() {
        return $this->_aData['user_profile_birthday'];
    }
    public function getProfileSite($bHtml=false) {
    	if ($bHtml) {
    		if (strpos($this->_aData['user_profile_site'],'http://')!==0) {
    			return 'http://'.$this->_aData['user_profile_site'];
    		}
    	}
        return $this->_aData['user_profile_site'];
    }
    public function getProfileSiteName() {
        return $this->_aData['user_profile_site_name'];
    }
    public function getProfileIcq() {
        return $this->_aData['user_profile_icq'];
    }
    public function getProfileAbout() {
        return $this->_aData['user_profile_about'];
    }
    public function getProfileDate() {
        return $this->_aData['user_profile_date'];
    }
    public function getProfileAvatar() {
        return $this->_aData['user_profile_avatar'];
    }
    public function getProfileAvatarType() {
        return $this->_aData['user_profile_avatar_type'];
    }    
    public function getProfileFoto() {
        return $this->_aData['user_profile_foto'];
    }    
    public function getSettingsNoticeNewTopic() {
        return $this->_aData['user_settings_notice_new_topic'];
    }
    public function getSettingsNoticeNewComment() {
        return $this->_aData['user_settings_notice_new_comment'];
    }
    public function getSettingsNoticeNewTalk() {
        return $this->_aData['user_settings_notice_new_talk'];
    }
    public function getSettingsNoticeReplyComment() {
        return $this->_aData['user_settings_notice_reply_comment'];
    }
    public function getSettingsNoticeNewFriend() {
        return $this->_aData['user_settings_notice_new_friend'];
    }
    
    
    
    public function getProfileAvatarPath($iSize=100) {   
    	if ($this->getProfileAvatar()) { 	
        	return DIR_WEB_ROOT.DIR_UPLOADS_IMAGES.'/'.$this->getId().'/avatar_'.$iSize.'x'.$iSize.'.'.$this->getProfileAvatarType();
    	} else {
    		return DIR_STATIC_SKIN.'/images/avatar_'.$iSize.'x'.$iSize.'.jpg';
    	}
    }
    public function getUserIsVote() {
        return $this->_aData['user_is_vote'];
    }
    public function getUserVoteDelta() {
        return $this->_aData['user_vote_delta'];
    }
    public function getUserIsFrend() {
        return $this->_aData['user_is_frend'];
    }
    public function isAdministrator() {
        return $this->_aData['user_is_administrator'];
    }
    public function getUserWebPath() {   
    	return DIR_WEB_ROOT.'/'.ROUTE_PAGE_PROFILE.'/'.$this->getLogin().'/';
    }
    
    
    public function setId($data) {
    	$this->_aData['user_id']=$data;
    }
    public function setLogin($data) {
    	$this->_aData['user_login']=$data;
    }
    public function setPassword($data) {
    	$this->_aData['user_password']=$data;
    }
    public function setKey($data) {
    	$this->_aData['user_key']=$data;
    }
    public function setMail($data) {
    	$this->_aData['user_mail']=$data;
    }
    public function setSkill($data) {
    	$this->_aData['user_skill']=$data;
    }    
    public function setDateRegister($data) {
    	$this->_aData['user_date_register']=$data;
    }
    public function setDateLast($data) {
    	$this->_aData['user_date_last']=$data;
    }
    public function setDateActivate($data) {
    	$this->_aData['user_date_activate']=$data;
    }
    public function setDateCommentLast($data) {
    	$this->_aData['user_date_comment_last']=$data;
    }
    public function setIpRegister($data) {
    	$this->_aData['user_ip_register']=$data;
    }
    public function setIpLast($data) {
    	$this->_aData['user_ip_last']=$data;
    }    
    public function setRating($data) {
    	$this->_aData['user_rating']=$data;
    }
    public function setCountVote($data) {
    	$this->_aData['user_count_vote']=$data;
    }
    public function setActivate($data) {
    	$this->_aData['user_activate']=$data;
    }
    public function setActivateKey($data) {
    	$this->_aData['user_activate_key']=$data;
    }    
    public function setProfileName($data) {
    	$this->_aData['user_profile_name']=$data;
    }
    public function setProfileSex($data) {
    	$this->_aData['user_profile_sex']=$data;
    }
    public function setProfileCountry($data) {
    	$this->_aData['user_profile_country']=$data;
    }
    public function setProfileRegion($data) {
    	$this->_aData['user_profile_region']=$data;
    }
    public function setProfileCity($data) {
    	$this->_aData['user_profile_city']=$data;
    }
    public function setProfileBirthday($data) {
    	$this->_aData['user_profile_birthday']=$data;
    }
    public function setProfileSite($data) {
    	$this->_aData['user_profile_site']=$data;
    }
    public function setProfileSiteName($data) {
    	$this->_aData['user_profile_site_name']=$data;
    }
    public function setProfileIcq($data) {
    	$this->_aData['user_profile_icq']=$data;
    }
    public function setProfileAbout($data) {
    	$this->_aData['user_profile_about']=$data;
    }
    public function setProfileDate($data) {
    	$this->_aData['user_profile_date']=$data;
    }
    public function setProfileAvatar($data) {
    	$this->_aData['user_profile_avatar']=$data;
    }
    public function setProfileAvatarType($data) {
    	$this->_aData['user_profile_avatar_type']=$data;
    }  
    public function setProfileFoto($data) {
    	$this->_aData['user_profile_foto']=$data;
    }  
    public function setSettingsNoticeNewTopic($data) {
    	$this->_aData['user_settings_notice_new_topic']=$data;
    }
    public function setSettingsNoticeNewComment($data) {
    	$this->_aData['user_settings_notice_new_comment']=$data;
    }
    public function setSettingsNoticeNewTalk($data) {
    	$this->_aData['user_settings_notice_new_talk']=$data;
    }
    public function setSettingsNoticeReplyComment($data) {
    	$this->_aData['user_settings_notice_reply_comment']=$data;
    }
    public function setSettingsNoticeNewFriend($data) {
    	$this->_aData['user_settings_notice_new_friend']=$data;
    }
}
?>