		<ul class="menu">
		
			<li {if $sAction=='profile'}class="active"{/if}>
				<a href="{$DIR_WEB_ROOT}/{$ROUTE_PAGE_PROFILE}/{$oUserProfile->getLogin()}/">{$aLang.user_menu_profile}</a>
				{if $sAction=='profile'}
					<ul class="sub-menu" >
						<li {if $aParams[0]=='whois' or $aParams[0]==''}class="active"{/if}><div><a href="{$DIR_WEB_ROOT}/{$ROUTE_PAGE_PROFILE}/{$oUserProfile->getLogin()}/">{$aLang.user_menu_profile_whois}</a></div></li>						
						<li {if $aParams[0]=='favourites'}class="active"{/if}><div><a href="{$DIR_WEB_ROOT}/{$ROUTE_PAGE_PROFILE}/{$oUserProfile->getLogin()}/favourites/">{$aLang.user_menu_profile_favourites}</a>{if $iCountTopicFavourite}({$iCountTopicFavourite}){/if}</div></li>						
					</ul>
				{/if}
			</li>
			
			
			<li {if $sAction=='my'}class="active"{/if}>
				<a href="{$DIR_WEB_ROOT}/{$ROUTE_PAGE_MY}/{$oUserProfile->getLogin()}/">{$aLang.user_menu_publication} {if ($iCountCommentUser+$iCountTopicUser)>0} ({$iCountCommentUser+$iCountTopicUser}){/if}</a>
				{if $sAction=='my'}
					<ul class="sub-menu" >
						<li {if $aParams[0]=='blog' or $aParams[0]==''}class="active"{/if}><div><a href="{$DIR_WEB_ROOT}/{$ROUTE_PAGE_MY}/{$oUserProfile->getLogin()}/">{$aLang.user_menu_publication_blog}</a>{if $iCountTopicUser}({$iCountTopicUser}){/if}</div></li>						
						<li {if $aParams[0]=='comment'}class="active"{/if}><div><a href="{$DIR_WEB_ROOT}/{$ROUTE_PAGE_MY}/{$oUserProfile->getLogin()}/comment/">{$aLang.user_menu_publication_comment}</a>{if $iCountCommentUser}({$iCountCommentUser}){/if}</div></li>
					</ul>
				{/if}
			</li>
								
		</ul>