{include file='header.tpl'}

<h3>Set Profiler Quota - for Day {$day}</h3>

{if $success neq ""}
	<div class="alert alert-success">{$success}</div>
{/if}

<form method='post' action='dayquota'>
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
				{assign var=u value=$user.id}
				{assign var=ud value="day_`$user.id`"}
				<input type='text' name='site[{$site.id}][{$user.id}]' value='{$site.$ud}' size=5 /> {$site.$u}
			</td>
		{/foreach}
	</tr>
	{/foreach}
</table>

<input type='submit' value='Save Quota' />

</form>

{include file='footer.tpl'}