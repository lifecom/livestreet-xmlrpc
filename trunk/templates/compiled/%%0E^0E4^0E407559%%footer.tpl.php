<?php /* Smarty version 2.6.19, created on 2009-10-18 00:50:38
         compiled from footer.tpl */ ?>
		</div>
		<!-- /Content -->
		<?php if (! $this->_tpl_vars['bNoSidebar']): ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'sidebar.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php endif; ?>
		
	</div>

	<!-- Footer -->
	<div id="footer">
		<div class="right">
			© Powered by <a href="http://livestreet.ru" title="Free social engine">«LiveStreet»</a><br />
			<a href="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/<?php echo $this->_tpl_vars['ROUTE_PAGE_PAGE']; ?>
/about/"><?php echo $this->_tpl_vars['aLang']['page_about']; ?>
</a>
		</div>
		Design by — <a href="http://www.xeoart.com/">Студия XeoArt</a>&nbsp;<img src="<?php echo $this->_tpl_vars['DIR_STATIC_SKIN']; ?>
/images/xeoart.gif" border="0">
	</div>
	<!-- /Footer -->

</div>

</body>
</html>