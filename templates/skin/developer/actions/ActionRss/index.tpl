<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom" xmlns:dc="http://purl.org/dc/elements/1.1/">
<channel>
	<title>{$aChannel.title}</title>
	<link>{$aChannel.link}</link>
	<atom:link href="{$PATH_WEB_CURRENT}/" rel="self" type="application/rss+xml" />
	<description><![CDATA[{$aChannel.description}]]></description>
	<language>{$aChannel.language}</language>
	<managingEditor>{$aChannel.managingEditor} ({$DIR_WEB_ROOT})</managingEditor>
	<webMaster>{$aChannel.managingEditor} ({$DIR_WEB_ROOT})</webMaster>
	<copyright>{$DIR_WEB_ROOT}</copyright>
	<generator>{$aChannel.generator}</generator>
	{foreach from=$aItems item=oItem}
		<item>
			<title><![CDATA[{$oItem.title|escape:'html'}]]></title>
			<guid isPermaLink="true">{$oItem.guid}</guid>
			<link>{$oItem.link}</link>
			<dc:creator>{$oItem.author}</dc:creator>
			<description><![CDATA[{$oItem.description}]]></description>
			<pubDate>{date_format date=$oItem.pubDate format="r"}</pubDate>			
			<category>{$oItem.category|replace:',':'</category>
			<category>'}</category>
		</item>
	{/foreach}
</channel>
</rss>
