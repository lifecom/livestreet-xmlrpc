<?php /* Smarty version 2.6.19, created on 2009-10-18 00:50:38
         compiled from block.blogs_top.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'block.blogs_top.tpl', 3, false),)), $this); ?>
					<ul class="list">
						<?php $_from = $this->_tpl_vars['aBlogs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['oBlog']):
?>
							<li><div class="total"><?php echo $this->_tpl_vars['oBlog']->getRating(); ?>
</div><a href="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/<?php echo $this->_tpl_vars['ROUTE_PAGE_BLOG']; ?>
/<?php echo $this->_tpl_vars['oBlog']->getUrl(); ?>
/" class="stream-author"><?php echo ((is_array($_tmp=$this->_tpl_vars['oBlog']->getTitle())) ? $this->_run_mod_handler('escape', true, $_tmp, 'html') : smarty_modifier_escape($_tmp, 'html')); ?>
</a></li>						
						<?php endforeach; endif; unset($_from); ?>
					</ul>				