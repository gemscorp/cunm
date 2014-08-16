{include file='header.tpl'}
<h3>Primary Credit Union - Data Sheet</h3>

{include file='common/alert.tpl'}

<hr>

<h3>Report Search</h3>

<form method='post' action='{$smarty.const.APP_PATH}/report/main'>
	Country <select name='country_id'>
			{html_options options=$country}
			</select>
	Federation <select name='federation_id'>
				<option value='0'>All</option>
				{html_options options=$federation}
			   </select>

	<input type='submit' value='Search' />
</form>

{include file='footer.tpl'}