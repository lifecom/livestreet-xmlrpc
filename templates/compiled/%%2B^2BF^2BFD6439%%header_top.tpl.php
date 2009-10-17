<?php /* Smarty version 2.6.19, created on 2009-10-18 00:50:38
         compiled from header_top.tpl */ ?>
	<!-- Header -->
	<?php if (! $this->_tpl_vars['oUserCurrent']): ?>	
	<div style="display: none;">
	<div class="login-popup" id="login-form">
		<div class="login-popup-top"><a href="#" class="close-block" onclick="return false;"></a></div>
		<div class="content">
			<form action="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/<?php echo $this->_tpl_vars['ROUTE_PAGE_LOGIN']; ?>
/" method="POST">
				<h3><?php echo $this->_tpl_vars['aLang']['user_authorization']; ?>
</h3>
				<div class="lite-note"><a href="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/<?php echo $this->_tpl_vars['ROUTE_PAGE_REGISTRATION']; ?>
/"><?php echo $this->_tpl_vars['aLang']['registration_submit']; ?>
</a><label for=""><?php echo $this->_tpl_vars['aLang']['user_login']; ?>
</label></div>
				<p><input type="text" class="input-text" name="login" tabindex="1" id="login-input"/></p>
				<div class="lite-note"><a href="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/<?php echo $this->_tpl_vars['ROUTE_PAGE_LOGIN']; ?>
/reminder/" tabindex="-1"><?php echo $this->_tpl_vars['aLang']['user_password_reminder']; ?>
</a><label for=""><?php echo $this->_tpl_vars['aLang']['user_password']; ?>
</label></div>
				<p><input type="password" name="password" class="input-text" tabindex="2" /></p>
				<div class="lite-note"><button type="submit" onfocus="blur()"><span><em><?php echo $this->_tpl_vars['aLang']['user_login_submit']; ?>
</em></span></button><label for="" class="input-checkbox"><input type="checkbox" name="remember" checked tabindex="3" ><?php echo $this->_tpl_vars['aLang']['user_login_remember']; ?>
</label></div>
				<input type="hidden" name="submit_login">
			</form>
		</div>
		<div class="login-popup-bottom"></div>
	</div>
	</div>
	<?php endif; ?>
	
	<div id="header">
		<h1><a href="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
"><strong>Live</strong>Street</a></h1>
		
		<ul class="nav-main">
			<li <?php if ($this->_tpl_vars['sMenuHeadItemSelect'] == 'blog'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/<?php echo $this->_tpl_vars['ROUTE_PAGE_BLOG']; ?>
/"><?php echo $this->_tpl_vars['aLang']['blogs']; ?>
</a></li>
			<li <?php if ($this->_tpl_vars['sMenuHeadItemSelect'] == 'people'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/<?php echo $this->_tpl_vars['ROUTE_PAGE_PEOPLE']; ?>
/"><?php echo $this->_tpl_vars['aLang']['people']; ?>
</a></li>
			<li <?php if ($this->_tpl_vars['sAction'] == 'page' && $this->_tpl_vars['sEvent'] == 'about'): ?>class="active"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/<?php echo $this->_tpl_vars['ROUTE_PAGE_PAGE']; ?>
/about/"><?php echo $this->_tpl_vars['aLang']['page_about']; ?>
</a></li>
		</ul>
		
		<?php if ($this->_tpl_vars['oUserCurrent']): ?>
		<div class="profile">
			<a href="<?php echo $this->_tpl_vars['oUserCurrent']->getUserWebPath(); ?>
" class="avatar"><img src="<?php echo $this->_tpl_vars['oUserCurrent']->getProfileAvatarPath(48); ?>
" alt="<?php echo $this->_tpl_vars['oUserCurrent']->getLogin(); ?>
" /></a>
			<ul>
				<li><a href="<?php echo $this->_tpl_vars['oUserCurrent']->getUserWebPath(); ?>
" class="author"><?php echo $this->_tpl_vars['oUserCurrent']->getLogin(); ?>
</a> (<a href="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/<?php echo $this->_tpl_vars['ROUTE_PAGE_LOGIN']; ?>
/exit/"><?php echo $this->_tpl_vars['aLang']['exit']; ?>
</a>)</li>
				<li>
					<?php if ($this->_tpl_vars['iUserCurrentCountTalkNew']): ?>
						<a href="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/<?php echo $this->_tpl_vars['ROUTE_PAGE_TALK']; ?>
/" class="message" title="<?php echo $this->_tpl_vars['aLang']['user_privat_messages_new']; ?>
"><?php echo $this->_tpl_vars['iUserCurrentCountTalkNew']; ?>
</a> 
					<?php else: ?>
						<a href="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/<?php echo $this->_tpl_vars['ROUTE_PAGE_TALK']; ?>
/" class="message-empty">&nbsp;</a>
					<?php endif; ?>
					<?php echo $this->_tpl_vars['aLang']['user_settings']; ?>
 <a href="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/<?php echo $this->_tpl_vars['ROUTE_PAGE_SETTINGS']; ?>
/profile/" class="author"><?php echo $this->_tpl_vars['aLang']['user_settings_profile']; ?>
</a> | <a href="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/<?php echo $this->_tpl_vars['ROUTE_PAGE_SETTINGS']; ?>
/tuning/" class="author"><?php echo $this->_tpl_vars['aLang']['user_settings_tuning']; ?>
</a> 
				</li>
				<li><?php echo $this->_tpl_vars['aLang']['user_rating']; ?>
 <strong><?php echo $this->_tpl_vars['oUserCurrent']->getRating(); ?>
</strong></li>
			</ul>
		</div>
		<?php else: ?>
		<div class="profile guest">
			<a href="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/<?php echo $this->_tpl_vars['ROUTE_PAGE_LOGIN']; ?>
/" onclick="return showLoginForm();"><?php echo $this->_tpl_vars['aLang']['user_login_submit']; ?>
</a> <?php echo $this->_tpl_vars['aLang']['or']; ?>
 
			<a href="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/<?php echo $this->_tpl_vars['ROUTE_PAGE_REGISTRATION']; ?>
/" class="reg"><?php echo $this->_tpl_vars['aLang']['registration_submit']; ?>
</a>
		</div>
		<?php endif; ?>
		
		
	</div>
	<!-- /Header -->