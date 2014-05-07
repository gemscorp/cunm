{include file='header.tpl'}

<h3>Set Profiler Quota</h3>

{if $success neq ""}
	<div class="alert alert-success">{$success}</div>
{/if}

<form method='post' action='quota'>
<table class='table table-striped table-bordered'>
	<tr>
		<td>Site</td>
		<td>Required</td>
		{foreach from=$users item=user}
			<td>{$user.username}</td>
		{/foreach}
	</tr>
	{foreach from=$sites item=site}
		<tr>
		<td>{$site.name}</td>
		<td>{$site.profile_req}</td>
		{foreach from=$users item=user}
			<td>
				<input type='text' name='site[{$site.id}][{$user.id}]' value='{$site[$user.id]}' size=5/>
			</td>
		{/foreach}
	</tr>
	{/foreach}
</table>

<input type='submit' value='Save Quota' />

</form>

{include file='footer.tpl'}