<div class="block tags">
	<ul class="cloud">						
		{foreach from=$aTags item=oTag}
			<li><a class="w{$oTag->getSize()}" rel="tag" href="{$DIR_WEB_ROOT}/{$ROUTE_PAGE_TAG}/{$oTag->getText()|escape:'html'}/">{$oTag->getText()|escape:'html'}</a></li>	
		{/foreach}
	</ul>
</div>