<?php /* Smarty version 2.6.19, created on 2009-10-18 00:50:38
         compiled from header.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" xml:lang="ru">

<head>
	<title><?php echo $this->_tpl_vars['sHtmlTitle']; ?>
</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />	
	<meta name="DESCRIPTION" content="<?php echo $this->_tpl_vars['sHtmlDescription']; ?>
" />
	<meta name="KEYWORDS" content="<?php echo $this->_tpl_vars['sHtmlKeywords']; ?>
" />	
	
	<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['DIR_STATIC_SKIN']; ?>
/css/style.css?v=1" />
	<!--[if IE 6]><link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['DIR_STATIC_SKIN']; ?>
/css/ie6.css?v=1" /><![endif]-->
	<!--[if gte IE 7]><link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['DIR_STATIC_SKIN']; ?>
/css/ie7.css?v=1" /><![endif]-->	
	<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['DIR_STATIC_SKIN']; ?>
/css/Roar.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['DIR_STATIC_SKIN']; ?>
/css/piechart.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['DIR_STATIC_SKIN']; ?>
/css/Autocompleter.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['DIR_STATIC_SKIN']; ?>
/css/prettify.css" />
	<!--[if gt IE 6]><link rel="stylesheet" type="text/css" href="<?php echo $this->_tpl_vars['DIR_STATIC_SKIN']; ?>
/css/simple_comments.css" /><![endif]-->
		
	<link href="<?php echo $this->_tpl_vars['DIR_STATIC_SKIN']; ?>
/images/favicon.ico" rel="shortcut icon" />
	<link rel="search" type="application/opensearchdescription+xml" href="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/<?php echo $this->_tpl_vars['ROUTE_PAGE_SEARCH']; ?>
/opensearch/" title="<?php echo $this->_tpl_vars['SITE_NAME']; ?>
" />
	
	<?php if ($this->_tpl_vars['aHtmlRssAlternate']): ?>
		<link rel="alternate" type="application/rss+xml" href="<?php echo $this->_tpl_vars['aHtmlRssAlternate']['url']; ?>
" title="<?php echo $this->_tpl_vars['aHtmlRssAlternate']['title']; ?>
">
	<?php endif; ?>
</head>

<script language="JavaScript" type="text/javascript">
var DIR_WEB_ROOT='<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
';
var DIR_STATIC_SKIN='<?php echo $this->_tpl_vars['DIR_STATIC_SKIN']; ?>
';
var BLOG_USE_TINYMCE='<?php echo $this->_tpl_vars['BLOG_USE_TINYMCE']; ?>
';
</script>

<script type="text/javascript" src="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/classes/lib/external/JsHttpRequest/JsHttpRequest.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/classes/lib/external/MooTools_1.2/mootools-1.2.js?v=1.2.2"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/classes/lib/external/MooTools_1.2/plugs/Roal/Roar.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/classes/lib/external/MooTools_1.2/plugs/Autocompleter/Observer.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/classes/lib/external/MooTools_1.2/plugs/Autocompleter/Autocompleter.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/classes/lib/external/MooTools_1.2/plugs/Autocompleter/Autocompleter.Request.js"></script>
<!--[if IE]>
	<script type="text/javascript" src="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/classes/lib/external/MooTools_1.2/plugs/Piechart/moocanvas.js"></script>
<![endif]-->	
<script type="text/javascript" src="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/classes/lib/external/MooTools_1.2/plugs/Piechart/piechart.js"></script>

<script type="text/javascript" src="<?php echo $this->_tpl_vars['DIR_WEB_ROOT']; ?>
/classes/lib/external/prettify/prettify.js"></script>

<script type="text/javascript" src="<?php echo $this->_tpl_vars['DIR_STATIC_SKIN']; ?>
/js/vote.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['DIR_STATIC_SKIN']; ?>
/js/favourites.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['DIR_STATIC_SKIN']; ?>
/js/questions.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['DIR_STATIC_SKIN']; ?>
/js/block_loader.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['DIR_STATIC_SKIN']; ?>
/js/friend.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['DIR_STATIC_SKIN']; ?>
/js/blog.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['DIR_STATIC_SKIN']; ?>
/js/other.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['DIR_STATIC_SKIN']; ?>
/js/login.js"></script>
<script type="text/javascript" src="<?php echo $this->_tpl_vars['DIR_STATIC_SKIN']; ?>
/js/panel.js"></script>


<?php echo '
<script language="JavaScript" type="text/javascript">
var tinyMCE=false;
var msgErrorBox=new Roar({
			position: \'upperRight\',
			className: \'roar-error\',
			margin: {x: 30, y: 10}
		});	
var msgNoticeBox=new Roar({
			position: \'upperRight\',
			className: \'roar-notice\',
			margin: {x: 30, y: 10}
		});	
</script>
'; ?>




<body onload="prettyPrint()">



<div id="debug" style="border: 2px #dd0000 solid; display: none;"></div>

<div id="container">
	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header_top.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>	
	
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header_nav.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	
	<!--
	<div id="extra">
		<a href="#">К списку постов</a>
	</div>
	-->
	
	<div id="wrapper" class="<?php if (! $this->_tpl_vars['showUpdateButton']): ?>update-hide<?php endif; ?> <?php if ($this->_tpl_vars['showWhiteBack']): ?>white-back<?php endif; ?>">
		
	
		<!-- Content -->
		<div id="content" <?php if ($this->_tpl_vars['bNoSidebar']): ?>style="width:100%;"<?php endif; ?>>
		
		<?php if (! $this->_tpl_vars['noShowSystemMessage']): ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'system_message.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<?php endif; ?>