<?php

/**
 * Модуль отвечает за обработку xmlrpc сообщений
 * Другой комментарий
 * пока модуль использует только часть своих возможностей
 */

require_once('XmlRpcServer.class.php');

class LsXmlRpc extends Module {


    public function Init() {
        
        
    }


    public function Test() {
     /*       $login='admin';
            $password = 'admin';
            if (
             (  // Пользователь может быть задан как логином, так и email-ом, поэтому нужно проверить и то и другое
                (func_check($login,'mail') and $oUser=$this->User_GetUserByMail($login))  
                or  $oUser=$this->User_GetUserByLogin($login)
             )  and (
                $oUser->getPassword()==func_encrypt($password) and $oUser->getActivate()
             )
        ) {
                $oUser = $this->User_GetUserById($oUser->getId());

                var_dump(!$oUser->isAdministrator());
          }*/
        new XmlRpcServer($this);
    }
}