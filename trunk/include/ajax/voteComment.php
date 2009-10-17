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
 * Голосование за комментарий
 */

set_include_path(get_include_path().PATH_SEPARATOR.dirname(dirname(dirname(__FILE__))));
$sDirRoot=dirname(dirname(dirname(__FILE__)));
require_once($sDirRoot."/config/config.ajax.php");

$iValue=@$_REQUEST['value'];
$bStateError=true;
$sMsg='';
$sMsgTitle='';
$iRating=0;
if ($oEngine->User_IsAuthorization()) {
	if ($oComment=$oEngine->Comment_GetCommentById(@$_REQUEST['idComment'])) {
		$oUserCurrent=$oEngine->User_GetUserCurrent();
		if ($oComment->getUserId()!=$oUserCurrent->getId()) {
			if (!($oTopicCommentVote=$oEngine->Comment_GetTopicCommentVote($oComment->getId(),$oUserCurrent->getId()))) {
				if (strtotime($oComment->getDate())>time()-VOTE_LIMIT_TIME_COMMENT) {
					if ($oEngine->ACL_CanVoteComment($oUserCurrent,$oComment)) {
						if (in_array($iValue,array('1','-1'))) {
							$oTopicCommentVote=new CommentEntity_TopicCommentVote();
							$oTopicCommentVote->setCommentId($oComment->getId());
							$oTopicCommentVote->setVoterId($oUserCurrent->getId());
							$oTopicCommentVote->setDelta($iValue);
							//$oComment->setRating($oComment->getRating()+$iValue);
							$oEngine->Rating_VoteComment($oUserCurrent,$oComment,$iValue);

							$oComment->setCountVote($oComment->getCountVote()+1);
							if ($oEngine->Comment_AddTopicCommentVote($oTopicCommentVote) and $oEngine->Comment_UpdateTopicComment($oComment)) {
								$bStateError=false;
								$sMsgTitle=$oEngine->Lang_Get('attention');
								$sMsg=$oEngine->Lang_Get('comment_vote_ok');
								$iRating=$oComment->getRating();
							} else {
								$sMsgTitle=$oEngine->Lang_Get('error');
								$sMsg=$oEngine->Lang_Get('comment_vote_error');
							}
						} else {
							$sMsgTitle=$oEngine->Lang_Get('attention');
							$sMsg=$oEngine->Lang_Get('comment_vote_error_value');
						}
					} else {
						$sMsgTitle=$oEngine->Lang_Get('attention');
						$sMsg=$oEngine->Lang_Get('comment_vote_error_acl');
					}
				} else {
					$sMsgTitle=$oEngine->Lang_Get('attention');
					$sMsg=$oEngine->Lang_Get('comment_vote_error_time');
				}
			} else {
				$sMsgTitle=$oEngine->Lang_Get('attention');
				$sMsg=$oEngine->Lang_Get('comment_vote_error_already');
			}
		} else {
			$sMsgTitle=$oEngine->Lang_Get('attention');
			$sMsg=$oEngine->Lang_Get('comment_vote_error_self');
		}
	} else {
		$sMsgTitle=$oEngine->Lang_Get('error');
		$sMsg=$oEngine->Lang_Get('comment_vote_error_noexists');
	}
} else {
	$sMsgTitle=$oEngine->Lang_Get('error');
	$sMsg=$oEngine->Lang_Get('need_authorization');
}


$GLOBALS['_RESULT'] = array(
"bStateError"     => $bStateError,
"iRating"   => $iRating,
"sMsgTitle"   => $sMsgTitle,
"sMsg"   => $sMsg,
);

?>