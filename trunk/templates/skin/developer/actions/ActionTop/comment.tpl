{include file='header.tpl' menu="blog"}
	
	<div class="topic top">
		<h2>{$aLang.top_comments}</h2>				
		<ul class="block-nav">
			<li {if $aParams[0] and $aParams[0]=='24h'}class="active"{/if}><a href="{$DIR_WEB_ROOT}/{$ROUTE_PAGE_TOP}/comment/24h/">{$aLang.blog_menu_top_period_24h}</a></li>
			<li {if $aParams[0] and $aParams[0]=='7d'}class="active"{/if}><a href="{$DIR_WEB_ROOT}/{$ROUTE_PAGE_TOP}/comment/7d/">{$aLang.blog_menu_top_period_7d}</a></li>
			<li {if $aParams[0] and $aParams[0]=='30d'}class="active"{/if}><a href="{$DIR_WEB_ROOT}/{$ROUTE_PAGE_TOP}/comment/30d/">{$aLang.blog_menu_top_period_30d}</a></li>
			<li {if $aParams[0] and $aParams[0]=='all'}class="active"{/if}><a href="{$DIR_WEB_ROOT}/{$ROUTE_PAGE_TOP}/comment/all/">{$aLang.blog_menu_top_period_all}</a></li>
		</ul>
	</div>

	{include file='comment_list.tpl'}

{include file='footer.tpl'}