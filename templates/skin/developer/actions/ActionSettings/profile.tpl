{include file='header.tpl' menu='settings' showWhiteBack=true}

{literal}
<script>
document.addEvent('domready', function() {	

	var inputCity = $('profile_city');
 
	new Autocompleter.Request.HTML(inputCity, DIR_WEB_ROOT+'/include/ajax/cityAutocompleter.php', {
		'indicatorClass': 'autocompleter-loading', // class added to the input during request
		'minLength': 2, // We need at least 1 character
		'selectMode': 'pick', // Instant completion
		'multiple': false // Tag support, by default comma separated
	});
	
	
	var inputCountry = $('profile_country');
 
	new Autocompleter.Request.HTML(inputCountry, DIR_WEB_ROOT+'/include/ajax/countryAutocompleter.php', {
		'indicatorClass': 'autocompleter-loading', // class added to the input during request
		'minLength': 2, // We need at least 1 character
		'selectMode': 'pick', // Instant completion
		'multiple': false // Tag support, by default comma separated
	});
});
</script>
{/literal}


<h1>{$aLang.settings_profile_edit}</h1>
<form action="" method="POST" enctype="multipart/form-data">
	<p><label for="profile_name">{$aLang.settings_profile_name}:</label>
	<input type="text" name="profile_name" id="profile_name" value="{$oUserCurrent->getProfileName()|escape:'html'}" class="w100p" />
	<span class="form-note">{$aLang.settings_profile_name_notice}</span></p>
	
	<p><label for="mail">{$aLang.settings_profile_mail}:</label>
	<input type="text" class="w100p" name="mail" id="mail" value="{$oUserCurrent->getMail()|escape:'html'}" />
	<span class="form-note">{$aLang.settings_profile_mail_notice}</span></p>
	
	<p><label for="">{$aLang.settings_profile_sex}:</label>
	<label for=""><input type="radio" name="profile_sex" id="profile_sex_m" value="man" {if $oUserCurrent->getProfileSex()=='man'}checked{/if} class="radio" />  &mdash;  {$aLang.settings_profile_sex_man}</label>
	<label for=""><input type="radio" name="profile_sex" id="profile_sex_w" value="woman" {if $oUserCurrent->getProfileSex()=='woman'}checked{/if} class="radio" />  &mdash;  {$aLang.settings_profile_sex_woman}</label>
	<label for=""><input type="radio" name="profile_sex" id="profile_sex_o" value="other" {if $oUserCurrent->getProfileSex()=='other'}checked{/if} class="radio" />  &mdash;  {$aLang.settings_profile_sex_other}</label></p>
	
	<p><label for="">{$aLang.settings_profile_birthday}:</label>					
	<select name="profile_birthday_day" class="w70">
		<option value="">{$aLang.date_day}</option>
		{section name=date_day start=1 loop=32 step=1}    		
			<option value="{$smarty.section.date_day.index}" {if $smarty.section.date_day.index==$oUserCurrent->getProfileBirthday()|date_format:"%d"}selected{/if}>{$smarty.section.date_day.index}</option>
		{/section}
	</select>
	<select name="profile_birthday_month" class="w100">
		<option value="">{$aLang.date_month}</option>		
		<option value="1" {if 1==$oUserCurrent->getProfileBirthday()|date_format:"%m"}selected{/if}>{$aLang.date_month_1}</option>
		<option value="2" {if 2==$oUserCurrent->getProfileBirthday()|date_format:"%m"}selected{/if}>{$aLang.date_month_2}</option>
		<option value="3" {if 3==$oUserCurrent->getProfileBirthday()|date_format:"%m"}selected{/if}>{$aLang.date_month_3}</option>
		<option value="4" {if 4==$oUserCurrent->getProfileBirthday()|date_format:"%m"}selected{/if}>{$aLang.date_month_4}</option>
		<option value="5" {if 5==$oUserCurrent->getProfileBirthday()|date_format:"%m"}selected{/if}>{$aLang.date_month_5}</option>
		<option value="6" {if 6==$oUserCurrent->getProfileBirthday()|date_format:"%m"}selected{/if}>{$aLang.date_month_6}</option>
		<option value="7" {if 7==$oUserCurrent->getProfileBirthday()|date_format:"%m"}selected{/if}>{$aLang.date_month_7}</option>
		<option value="8" {if 8==$oUserCurrent->getProfileBirthday()|date_format:"%m"}selected{/if}>{$aLang.date_month_8}</option>
		<option value="9" {if 9==$oUserCurrent->getProfileBirthday()|date_format:"%m"}selected{/if}>{$aLang.date_month_9}</option>
		<option value="10" {if 10==$oUserCurrent->getProfileBirthday()|date_format:"%m"}selected{/if}>{$aLang.date_month_10}</option>
		<option value="11" {if 11==$oUserCurrent->getProfileBirthday()|date_format:"%m"}selected{/if}>{$aLang.date_month_11}</option>
		<option value="12" {if 12==$oUserCurrent->getProfileBirthday()|date_format:"%m"}selected{/if}>{$aLang.date_month_12}</option>		
	</select>
	<select name="profile_birthday_year" class="w70">
		<option value="">{$aLang.date_year}</option>
		{section name=date_year start=1940 loop=2000 step=1}    		
			<option value="{$smarty.section.date_year.index}" {if $smarty.section.date_year.index==$oUserCurrent->getProfileBirthday()|date_format:"%Y"}selected{/if}>{$smarty.section.date_year.index}</option>
		{/section}
	</select></p>
	
	<p><label for="profile_country">{$aLang.settings_profile_country}:</label><input type="text" id="profile_country" name="profile_country" value="{$oUserCurrent->getProfileCountry()|escape:'html'}" />
	<label for="profile_city">{$aLang.settings_profile_city}:</label><input type="text" id="profile_city" name="profile_city" value="{$oUserCurrent->getProfileCity()|escape:'html'}" /></p>
	
	<p><label for="profile_icq">{$aLang.settings_profile_icq}:</label><input type="text" name="profile_icq" id="profile_icq" value="{$oUserCurrent->getProfileIcq()|escape:'html'}" /></p>
	
	<p><label for="profile_site">{$aLang.settings_profile_site}:</label>
	<label for="profile_site"><input type="text" class="w300" style="margin-bottom: 5px;" id="profile_site" name="profile_site" value="{$oUserCurrent->getProfileSite()|escape:'html'}" /> &mdash; {$aLang.settings_profile_site_url}</label>
	<label for="profile_site_name"><input type="text" class="w300" id="profile_site_name" name="profile_site_name" value="{$oUserCurrent->getProfileSiteName()|escape:'html'}" /> &mdash; {$aLang.settings_profile_site_name}</label></p>
	
	<p><label for="profile_about">{$aLang.settings_profile_about}:</label>
	<textarea class="small" name="profile_about" id="profile_about">{$oUserCurrent->getProfileAbout()|escape:'html'}</textarea></p>
	
	<p><label for="password_now">{$aLang.settings_profile_password_current}:</label><input type="password" name="password_now" id="password_now" value="" />
	<label for="password">{$aLang.settings_profile_password_new}:</label><input type="password" id="password"	name="password" value="" />
	<label for="password_confirm">{$aLang.settings_profile_password_confirm}:</label><input type="password" id="password_confirm" name="password_confirm" value="" /></p>
	
	{if $oUserCurrent->getProfileAvatar()}
		<img src="{$oUserCurrent->getProfileAvatarPath(100)}" alt="avatar" />
		<img src="{$oUserCurrent->getProfileAvatarPath(64)}" alt="avatar" />
		<img src="{$oUserCurrent->getProfileAvatarPath(24)}" alt="avatar" />
		<label for="avatar_delete"><input type="checkbox" id="avatar_delete" name="avatar_delete" class="input-checkbox" value="on" /> &mdash; {$aLang.settings_profile_avatar_delete}</label>
	{/if}
	<p><label for="avatar">{$aLang.settings_profile_avatar}:</label><input type="file" id="avatar" name="avatar"/></p>
	
	{if $oUserCurrent->getProfileFoto()}
		<img src="{$oUserCurrent->getProfileFoto()}" alt="avatar" />			
		<p><label for="foto_delete"><input type="checkbox" id="foto_delete" name="foto_delete" class="input-checkbox" value="on" /> &mdash; {$aLang.settings_profile_foto_delete}</label></p>
	{/if}
	<p><label for="foto">{$aLang.settings_profile_foto}:</label><input type="file" id="foto" name="foto" /></p>
	
	<input type="submit" value="{$aLang.settings_profile_submit}" name="submit_profile_edit" />
</form>

{include file='footer.tpl'}