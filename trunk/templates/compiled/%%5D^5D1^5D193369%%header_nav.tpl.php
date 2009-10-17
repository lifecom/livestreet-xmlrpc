<?php /* Smarty version 2.6.19, created on 2009-10-18 00:50:38
         compiled from header_nav.tpl */ ?>
	<!-- Navigation -->
	<div id="nav">
		<div class="left"></div>
		<?php if ($this->_tpl_vars['oUserCurrent'] && ( $this->_tpl_vars['sAction'] == $this->_tpl_vars['ROUTE_PAGE_BLOG'] || $this->_tpl_vars['sAction'] == $this->_tpl_vars['ROUTE_PAGE_INDEX'] || $this->_tpl_vars['sAction'] == $this->_tpl_vars['ROUTE_PAGE_NEW'] || $this->_tpl_vars['sAction'] == $this->_tpl_vars['ROUTE_PAGE_PERSONAL_BLOG'] )): ?>
			<div class="write">
				<a href="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/<?php echo $this->_tpl_vars['ROUTE_PAGE_TOPIC']; ?>
/add/" alt="<?php echo $this->_tpl_vars['aLang']['topic_create']; ?>
" title="<?php echo $this->_tpl_vars['aLang']['topic_create']; ?>
" class="button small">
					<span><em><?php echo $this->_tpl_vars['aLang']['topic_create']; ?>
</em></span>
				</a>
			</div>
		<?php endif; ?>
		
		<?php if ($this->_tpl_vars['menu']): ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "menu.".($this->_tpl_vars['menu']).".tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php endif; ?>
	
				
		<div class="right"></div>
		<!--<a href="#" class="rss" onclick="return false;"></a>-->
		<div class="search">
			<form action="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/<?php echo $this->_tpl_vars['ROUTE_PAGE_SEARCH']; ?>
/topics/" method="GET">
				<input class="text" type="text" onblur="if (!value) value=defaultValue" onclick="if (value==defaultValue) value=''" value="<?php echo $this->_tpl_vars['aLang']['search']; ?>
" name="q" />
				<input class="button" type="submit" value="" />
			</form>
		</div>
	</div>
	<!-- /Navigation -->