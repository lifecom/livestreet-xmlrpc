{include file='header.tpl' menu='topic_action' showWhiteBack=true}


{literal}
<script>
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



<div class="topic" style="display: none;">
	<div class="content" id="text_preview"></div>
</div>

{if $sEvent=='add'}
	<h2>{$aLang.topic_question_create}</h2>
{else}
	<h2>{$aLang.topic_question_edit}</h2>
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
	
	<script>
		ajaxBlogInfo(document.getElementById('blog_id').value);
	</script>
	
	<p><label for="topic_title">{$aLang.topic_question_create_title}:</label>
	<input type="text" id="topic_title" name="topic_title" value="{$_aRequest.topic_title}" class="w100p" {if $bEditDisabled}disabled{/if} />
	<span class="form-note">{$aLang.topic_question_create_title_notice}</span></p>
	
	{$aLang.topic_question_create_answers}:
	<ul class="answer-list">
		{if count($_aRequest.answer)>=2}
			{foreach from=$_aRequest.answer item=sAnswer}
				<li>
					<input type="text" value="{$sAnswer}" name="answer[]" class="" {if $bEditDisabled}disabled{/if} />
					<input type="button" name="drop_answer" value=" - " onClick="dropField(this);" {if $bEditDisabled}disabled{/if}>
					<input type="button" value=" + " onClick="addField(this);" {if $bEditDisabled}disabled{/if}>   
				</li>
			{/foreach}
		{else}
			<li>
				<input type="text" value="" name="answer[]" class="" {if $bEditDisabled}disabled{/if} />
				<input type="button" name="drop_answer" value=" - " onClick="dropField(this);" {if $bEditDisabled}disabled{/if}>
				<input type="button" value=" + " onClick="addField(this);" {if $bEditDisabled}disabled{/if}>   
			</li>
			<li>
				<input type="text" value="" name="answer[]" class="" {if $bEditDisabled}disabled{/if} />
				<input type="button" name="drop_answer" value=" - " onClick="dropField(this);" {if $bEditDisabled}disabled{/if}>
				<input type="button" value=" + " onClick="addField(this);" {if $bEditDisabled}disabled{/if}>   
			</li>
		{/if} 
	</ul>
	
	{if !$bEditDisabled}
		{literal}<script>checkFieldForLast();</script>{/literal}
	{/if}
	</p>

	<p><label for="topic_text">{$aLang.topic_question_create_text}:</label>
	<textarea name="topic_text" id="topic_text" rows="10">{$_aRequest.topic_text}</textarea></p>
	
	<p><label for="topic_tags">{$aLang.topic_create_tags}:</label>
	<input type="text" id="topic_tags" name="topic_tags" value="{$_aRequest.topic_tags}" class="w100p" />
	<span class="form-note">{$aLang.topic_create_tags_notice}</span></p>
								
	<p><label for=""><input type="checkbox" id="topic_forbid_comment" name="topic_forbid_comment" class="input-checkbox" value="1" {if $_aRequest.topic_forbid_comment==1}checked{/if} /> 
	&mdash; {$aLang.topic_create_forbid_comment}</label>
	<span class="form-note">{$aLang.topic_create_forbid_comment_notice}</span></p>

	{if $oUserCurrent->isAdministrator()}
		<p><label for=""><input type="checkbox" id="topic_publish_index" name="topic_publish_index" class="input-checkbox" value="1" {if $_aRequest.topic_publish_index==1}checked{/if} /> 
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

