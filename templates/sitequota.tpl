{include file='header.tpl'}

<h3>Set Site Quota</h3>

{if $success neq ""}
	<div class="alert alert-success">{$success}</div>
{/if}

<form method='post' action='sitequota'>
<table class='table table-striped table-bordered'>
	<tr>
		<td>Site</td>
		<td>Required</td>
		<td>Update</td>
	</tr>
	{foreach from=$sites item=site}
		<tr>
		<td>{$site.name}</td>
		<td>{$site.profile_req}</td>
		<td><input type='text' size='5' name='site[{$site.id}]' value='{$site.profile_req}' /></td>
	</tr>
	{/foreach}
</table>

<input type='submit' value='Save Site Quota' />

</form>

{include file='footer.tpl'}