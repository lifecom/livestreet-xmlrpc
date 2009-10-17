{include file='header.tpl' menu='topic_action'}


{literal}
<script language="JavaScript" type="text/javascript">
document.addEvent('domready', function() {	
	new Autocompleter.Request.HTML($('topic_tags'), DIR_WEB_ROOT+'/include/ajax/tagAutocompleter.php', {
		'indicatorClass': 'autocompleter-loading', // class added to the input during request
		'minLength': 2, // We need at least 1 character
		'selectMode': 'pick', // Instant completion
		'multiple': true // Tag support, by default comma separated
	}); 
});
</script>
{/literal}


{if $BLOG_USE_TINYMCE}
<script type="text/javascript" src="{$DIR_WEB_ROOT}/classes/lib/external/tiny_mce/tiny_mce.js"></script>
{literal}
<script type="text/javascript">
tinyMCE.init({
	mode : "textareas",
	theme : "advanced",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",
	theme_advanced_buttons1 : "lshselect,bold,italic,underline,strikethrough,|,bullist,numlist,|,undo,redo,|,lslink,unlink,lsvideo,lsimage,pagebreak,code",
	theme_advanced_buttons2 : "",
	theme_advanced_buttons3 : "",
	theme_advanced_statusbar_location : "bottom",
	theme_advanced_resizing : true,
	theme_advanced_resize_horizontal : 0,
	theme_advanced_resizing_use_cookie : 0,
	theme_advanced_path : false,
	object_resizing : true,
	force_br_newlines : true,
    forced_root_block : '', // Needed for 3.x
    force_p_newlines : false,    
    plugins : "lslink,lsimage,lsvideo,safari,inlinepopups,media,lshselect,pagebreak",
    convert_urls : false,
    extended_valid_elements : "embed[src|type|allowscriptaccess|allowfullscreen|width|height]",
    pagebreak_separator :"<cut>"
});
</script>
{/literal}
{else}
	{include file='window_load_img.tpl' sToLoad='topic_text'}
{/if}


			

<div class="topic" style="display: none;">
	<div class="content" id="text_preview"></div>
</div>



{if $sEvent=='add'}
	<h2>{$aLang.topic_topic_create}</h2>
{else}
	<h2>{$aLang.topic_topic_edit}</h2>
{/if}

<form action="" method="POST" enctype="multipart/form-data">
	<p><label for="blog_id">{$aLang.topic_create_blog}</label>
	<select name="blog_id" id="blog_id" onChange="ajaxBlogInfo(this.value);">
		<option value="0">{$aLang.topic_create_blog_personal}</option>
		{foreach from=$aBlogsOwner item=oBlog}
			<option value="{$oBlog->getId()}" {if $_aRequest.blog_id==$oBlog->getId()}selected{/if}>{$oBlog->getTitle()}</option>
		{/foreach}
		{foreach from=$aBlogsUser item=oBlogUser}
			<option value="{$oBlogUser->getBlogId()}" {if $_aRequest.blog_id==$oBlogUser->getBlogId()}selected{/if}>{$oBlogUser->getBlogTitle()}</option>
		{/foreach}
	</select></p>
	
	<script language="JavaScript" type="text/javascript">
		ajaxBlogInfo($('blog_id').value);
	</script>
	
	<p><label for="topic_title">{$aLang.topic_create_title}:</label>
	<input type="text" id="topic_title" name="topic_title" value="{$_aRequest.topic_title}" class="w100p" />
	<span class="form-note">{$aLang.topic_create_title_notice}</span></p>

	<label for="topic_text">{$aLang.topic_create_text}:</label>
	{if !$BLOG_USE_TINYMCE}
		<div class="panel-form">       	 
			<a href="#" onclick="lsPanel.putTagAround('topic_text','b'); return false;"><img src="{$DIR_STATIC_SKIN}/images/panel/bold_ru.gif" width="20" height="20" title="{$aLang.panel_b}"></a>
			<a href="#" onclick="lsPanel.putTagAround('topic_text','i'); return false;"><img src="{$DIR_STATIC_SKIN}/images/panel/italic_ru.gif" width="20" height="20" title="{$aLang.panel_i}"></a>	 			
			<a href="#" onclick="lsPanel.putTagAround('topic_text','u'); return false;"><img src="{$DIR_STATIC_SKIN}/images/panel/underline_ru.gif" width="20" height="20" title="{$aLang.panel_u}"></a>	 			
			<a href="#" onclick="lsPanel.putTagAround('topic_text','s'); return false;"><img src="{$DIR_STATIC_SKIN}/images/panel/strikethrough.gif" width="20" height="20" title="{$aLang.panel_s}"></a>	 			
			&nbsp;
			<a href="#" onclick="lsPanel.putTagUrl('topic_text','{$aLang.panel_url_promt}'); return false;"><img src="{$DIR_STATIC_SKIN}/images/panel/link.gif" width="20" height="20"  title="{$aLang.panel_url}"></a>
			<a href="#" onclick="lsPanel.putQuote('topic_text'); return false;"><img src="{$DIR_STATIC_SKIN}/images/panel/quote.gif" width="20" height="20" title="{$aLang.panel_quote}"></a>
			<a href="#" onclick="lsPanel.putTagAround('topic_text','code'); return false;"><img src="{$DIR_STATIC_SKIN}/images/panel/code.gif" width="30" height="20" title="{$aLang.panel_code}"></a>
			<a href="#" onclick="lsPanel.putTagAround('topic_text','video'); return false;"><img src="{$DIR_STATIC_SKIN}/images/panel/video.gif" width="20" height="20" title="{$aLang.panel_video}"></a>
	
			<a href="#" onclick="showImgUploadForm(); return false;"><img src="{$DIR_STATIC_SKIN}/images/panel/img.gif" width="20" height="20" title="{$aLang.panel_image}"></a> 			
			<a href="#" onclick="lsPanel.putText('topic_text','<cut>'); return false;"><img src="{$DIR_STATIC_SKIN}/images/panel/cut.gif" width="20" height="20" title="{$aLang.panel_cut}"></a>	
		</div>
	{/if}
	<textarea name="topic_text" id="topic_text" rows="10">{$_aRequest.topic_text}</textarea><br /><br />
	
	<p><label for="topic_tags">{$aLang.topic_create_tags}:</label>
	<input type="text" id="topic_tags" name="topic_tags" value="{$_aRequest.topic_tags}" class="w100p" />
	<span class="form-note">{$aLang.topic_create_tags_notice}</span></p>
								
	<p><label for=""><input type="checkbox" id="topic_forbid_comment" name="topic_forbid_comment" class="input-checkbox" value="1" {if $_aRequest.topic_forbid_comment==1}checked{/if} /> 
	&mdash; {$aLang.topic_create_forbid_comment}</label>
	<span class="form-note">{$aLang.topic_create_forbid_comment_notice}</span></p>

	{if $oUserCurrent->isAdministrator()}
		<p><label for="topic_publish_index"><input type="checkbox" id="topic_publish_index" name="topic_publish_index" class="input-checkbox" value="1" {if $_aRequest.topic_publish_index==1}checked{/if} /> 
		&mdash; {$aLang.topic_create_publish_index}</label>
		<span class="form-note">{$aLang.topic_create_publish_index_notice}</span></p>
	{/if}
	
	<p class="buttons">
		<input type="submit" name="submit_preview" value="{$aLang.topic_create_submit_preview}" onclick="$('text_preview').getParent('div').setStyle('display','block'); ajaxTextPreview('topic_text',false); return false;" />&nbsp;
		<input type="submit" name="submit_topic_save" value="{$aLang.topic_create_submit_save}" />
		<input type="submit" name="submit_topic_publish" value="{$aLang.topic_create_submit_publish}" />
	</p>
</form>


{include file='footer.tpl'}

