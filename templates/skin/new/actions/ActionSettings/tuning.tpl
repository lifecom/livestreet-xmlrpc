{include file='header.tpl' menu='settings' showWhiteBack=true}

			<h1>{$aLang.settings_tuning}</h1>
			<strong>{$aLang.settings_tuning_notice}</strong>
			<form action="{$DIR_WEB_ROOT}/{$ROUTE_PAGE_SETTINGS}/tuning/" method="POST" enctype="multipart/form-data">
				<p>
					<label for=""><input {if $oUserCurrent->getSettingsNoticeNewTopic()}checked{/if}  type="checkbox" id="settings_notice_new_topic" name="settings_notice_new_topic" value="1" class="checkbox" /> &mdash; {$aLang.settings_tuning_notice_new_topic}</label><br />
					<label for=""><input {if $oUserCurrent->getSettingsNoticeNewComment()}checked{/if} type="checkbox"   id="settings_notice_new_comment" name="settings_notice_new_comment" value="1" class="checkbox" /> &mdash; {$aLang.settings_tuning_notice_new_comment}</label><br />
					<label for=""><input {if $oUserCurrent->getSettingsNoticeNewTalk()}checked{/if} type="checkbox" id="settings_notice_new_talk" name="settings_notice_new_talk" value="1" class="checkbox" /> &mdash; {$aLang.settings_tuning_notice_new_talk}</label><br />
					<label for=""><input {if $oUserCurrent->getSettingsNoticeReplyComment()}checked{/if} type="checkbox" id="settings_notice_reply_comment" name="settings_notice_reply_comment" value="1" class="checkbox" /> &mdash; {$aLang.settings_tuning_notice_reply_comment}</label><br />
					<label for=""><input {if $oUserCurrent->getSettingsNoticeNewFriend()}checked{/if} type="checkbox" id="settings_notice_new_friend" name="settings_notice_new_friend" value="1" class="checkbox" /> &mdash; {$aLang.settings_tuning_notice_new_friend}</label>
				</p>
				<p><input type="submit" name="submit_settings_tuning" value="{$aLang.settings_tuning_submit}" /></p>
			</form>

{include file='footer.tpl'}