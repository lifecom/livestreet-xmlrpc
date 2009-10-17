<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="ru" xml:lang="ru">

<head>
	<title>{$sHtmlTitle}</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />	
	<!-- Styles -->
	<link rel="stylesheet" type="text/css" href="{$DIR_STATIC_SKIN}/css/style.css?v=1" />	
	<!--[if IE 6]><link rel="stylesheet" type="text/css" href="{$DIR_STATIC_SKIN}/css/ie6.css?v=1" /><![endif]-->
	<!--[if gte IE 7]><link rel="stylesheet" type="text/css" href="{$DIR_STATIC_SKIN}/css/ie7.css?v=1" /><![endif]-->
	{if $bRefreshToHome}
		<meta  HTTP-EQUIV="Refresh" CONTENT="3; URL={$DIR_WEB_ROOT}/">
	{/if}
</head>

<body>

<div id="container">
	<h1 class="lite-header"><a href="{$DIR_WEB_ROOT}">Live<span>Street</span></a></h1>
	
	{if !$noShowSystemMessage}
		{include file='system_message.tpl'}
	{/if}