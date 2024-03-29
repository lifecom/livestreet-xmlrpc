{include file='header.light.tpl'}

	<div class="lite-center">
	
		{if $bLoginError}
			<p><span class="">{$aLang.user_login_bad}</span><br />
		{/if}

		<form action="{$DIR_WEB_ROOT}/{$ROUTE_PAGE_LOGIN}/" method="POST">
				<h3>{$aLang.user_authorization}</h3>
				<div class="lite-note"><a href="{$DIR_WEB_ROOT}/{$ROUTE_PAGE_REGISTRATION}/">{$aLang.user_registration}</a><label for="login-input">{$aLang.user_login}</label></div>
				<p><input type="text" class="input-text" name="login" tabindex="1" id="login-input"/></p>
				<div class="lite-note"><a href="{$DIR_WEB_ROOT}/{$ROUTE_PAGE_LOGIN}/reminder/" tabindex="-1">{$aLang.user_password_reminder}</a><label for="password-input">{$aLang.user_password}</label></div>
				<p><input type="password" name="password" class="input-text" tabindex="2" id="password-input"/></p>
				<div class="lite-note">
					<button type="submit" class="button"><span><em>{$aLang.user_login_submit}</em></span></button>
					<label for="" class="input-checkbox"><input type="checkbox" name="remember" checked tabindex="3" >{$aLang.user_login_remember}</label>
				</div>
				<input type="hidden" name="submit_login">
		</form>
		
		{if $USER_USE_INVITE} 	
			<br><br>		
			<form action="{$DIR_WEB_ROOT}/{$ROUTE_PAGE_REGISTRATION}/invite/" method="POST">
				<h3>{$aLang.registration_invite}</h3>
				<div class="lite-note"><label for="invite_code">{$aLang.registration_invite_code}:</label></div>
				<p><input type="text" class="input-text" name="invite_code" id="invite_code"/></p>				
				<input type="submit" name="submit_invite" value="{$aLang.registration_invite_check}">
			</form>
		{/if}
	</div>

{include file='footer.light.tpl'}