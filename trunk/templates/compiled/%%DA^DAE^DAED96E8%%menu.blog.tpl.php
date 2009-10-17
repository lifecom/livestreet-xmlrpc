<?php /* Smarty version 2.6.19, created on 2009-10-18 00:50:38
         compiled from menu.blog.tpl */ ?>
		<ul class="menu">
		
			<li <?php if ($this->_tpl_vars['sMenuItemSelect'] == 'index'): ?>class="active"<?php endif; ?>>
				<a href="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/"><?php echo $this->_tpl_vars['aLang']['blog_menu_all']; ?>
</a> <?php if ($this->_tpl_vars['iCountTopicsNew'] > 0): ?>+<?php echo $this->_tpl_vars['iCountTopicsNew']; ?>
<?php endif; ?>
				<?php if ($this->_tpl_vars['sMenuItemSelect'] == 'index'): ?>
					<ul class="sub-menu" >
						<li <?php if ($this->_tpl_vars['sMenuSubItemSelect'] == 'good'): ?>class="active"<?php endif; ?>><div><a href="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/"><?php echo $this->_tpl_vars['aLang']['blog_menu_all_good']; ?>
</a></div></li>						
						<?php if ($this->_tpl_vars['iCountTopicsNew'] > 0): ?><li <?php if ($this->_tpl_vars['sMenuSubItemSelect'] == 'new'): ?>class="active"<?php endif; ?>><div><a href="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/<?php echo $this->_tpl_vars['ROUTE_PAGE_NEW']; ?>
/"><?php echo $this->_tpl_vars['aLang']['blog_menu_all_new']; ?>
</a> +<?php echo $this->_tpl_vars['iCountTopicsNew']; ?>
</div></li><?php endif; ?>
					</ul>
				<?php endif; ?>
			</li>
			
			<li <?php if ($this->_tpl_vars['sMenuItemSelect'] == 'blog'): ?>class="active"<?php endif; ?>>
				<a href="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/<?php echo $this->_tpl_vars['ROUTE_PAGE_BLOG']; ?>
/"><?php echo $this->_tpl_vars['aLang']['blog_menu_collective']; ?>
</a> <?php if ($this->_tpl_vars['iCountTopicsCollectiveNew'] > 0): ?>+<?php echo $this->_tpl_vars['iCountTopicsCollectiveNew']; ?>
<?php endif; ?>
				<?php if ($this->_tpl_vars['sMenuItemSelect'] == 'blog'): ?>
					<ul class="sub-menu" >											
						<li <?php if ($this->_tpl_vars['sMenuSubItemSelect'] == 'good'): ?>class="active"<?php endif; ?>><div><a href="<?php echo $this->_tpl_vars['sMenuSubBlogUrl']; ?>
"><?php echo $this->_tpl_vars['aLang']['blog_menu_collective_good']; ?>
</a></div></li>
						<?php if ($this->_tpl_vars['iCountTopicsBlogNew'] > 0): ?><li <?php if ($this->_tpl_vars['sMenuSubItemSelect'] == 'new'): ?>class="active"<?php endif; ?>><div><a href="<?php echo $this->_tpl_vars['sMenuSubBlogUrl']; ?>
new/"><?php echo $this->_tpl_vars['aLang']['blog_menu_collective_new']; ?>
</a> +<?php echo $this->_tpl_vars['iCountTopicsBlogNew']; ?>
</div></li><?php endif; ?>
						<li <?php if ($this->_tpl_vars['sMenuSubItemSelect'] == 'bad'): ?>class="active"<?php endif; ?>><div><a href="<?php echo $this->_tpl_vars['sMenuSubBlogUrl']; ?>
bad/"><?php echo $this->_tpl_vars['aLang']['blog_menu_collective_bad']; ?>
</a></div></li>
					</ul>
				<?php endif; ?>
			</li>
			
			<li <?php if ($this->_tpl_vars['sMenuItemSelect'] == 'log'): ?>class="active"<?php endif; ?>>
				<a href="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/<?php echo $this->_tpl_vars['ROUTE_PAGE_PERSONAL_BLOG']; ?>
/"><?php echo $this->_tpl_vars['aLang']['blog_menu_personal']; ?>
</a> <?php if ($this->_tpl_vars['iCountTopicsPersonalNew'] > 0): ?>+<?php echo $this->_tpl_vars['iCountTopicsPersonalNew']; ?>
<?php endif; ?>
				<?php if ($this->_tpl_vars['sMenuItemSelect'] == 'log'): ?>
					<ul class="sub-menu" style="left: -50px;">											
						<li <?php if ($this->_tpl_vars['sMenuSubItemSelect'] == 'good'): ?>class="active"<?php endif; ?>><div><a href="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/<?php echo $this->_tpl_vars['ROUTE_PAGE_PERSONAL_BLOG']; ?>
/"><?php echo $this->_tpl_vars['aLang']['blog_menu_personal_good']; ?>
</a></div></li>
						<?php if ($this->_tpl_vars['iCountTopicsPersonalNew'] > 0): ?><li <?php if ($this->_tpl_vars['sMenuSubItemSelect'] == 'new'): ?>class="active"<?php endif; ?>><div><a href="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/<?php echo $this->_tpl_vars['ROUTE_PAGE_PERSONAL_BLOG']; ?>
/new/"><?php echo $this->_tpl_vars['aLang']['blog_menu_personal_new']; ?>
</a> +<?php echo $this->_tpl_vars['iCountTopicsPersonalNew']; ?>
</div></li><?php endif; ?>
						<li <?php if ($this->_tpl_vars['sMenuSubItemSelect'] == 'bad'): ?>class="active"<?php endif; ?>><div><a href="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/<?php echo $this->_tpl_vars['ROUTE_PAGE_PERSONAL_BLOG']; ?>
/bad/"><?php echo $this->_tpl_vars['aLang']['blog_menu_personal_bad']; ?>
</a></div></li>
					</ul>
				<?php endif; ?>
			</li>
			
			<li <?php if ($this->_tpl_vars['sMenuItemSelect'] == 'top'): ?>class="active"<?php endif; ?>>
				<a href="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/<?php echo $this->_tpl_vars['ROUTE_PAGE_TOP']; ?>
/"><?php echo $this->_tpl_vars['aLang']['blog_menu_top']; ?>
</a>
				<?php if ($this->_tpl_vars['sMenuItemSelect'] == 'top'): ?>
					<ul class="sub-menu" style="left: -80px;">											
						<li <?php if ($this->_tpl_vars['sMenuSubItemSelect'] == 'blog'): ?>class="active"<?php endif; ?>><div><a href="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/<?php echo $this->_tpl_vars['ROUTE_PAGE_TOP']; ?>
/blog/"><?php echo $this->_tpl_vars['aLang']['blog_menu_top_blog']; ?>
</a></div></li>
						<li <?php if ($this->_tpl_vars['sMenuSubItemSelect'] == 'topic'): ?>class="active"<?php endif; ?>><div><a href="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/<?php echo $this->_tpl_vars['ROUTE_PAGE_TOP']; ?>
/topic/"><?php echo $this->_tpl_vars['aLang']['blog_menu_top_topic']; ?>
</a></div></li>
						<li <?php if ($this->_tpl_vars['sMenuSubItemSelect'] == 'comment'): ?>class="active"<?php endif; ?>><div><a href="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/<?php echo $this->_tpl_vars['ROUTE_PAGE_TOP']; ?>
/comment/"><?php echo $this->_tpl_vars['aLang']['blog_menu_top_comment']; ?>
</a></div></li>
					</ul>
				<?php endif; ?>
			</li>
								
		</ul>
		
		
		
