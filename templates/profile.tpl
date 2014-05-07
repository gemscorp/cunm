<h2>{$site.name} / {$site.profile_req}</h2>
<table class='table table-striped table-bordered'>
<tr>
{foreach from=$profiles item=profile}
	<td>{$profile.cdate}</td>
{/foreach}
</tr>
<tr>
{foreach from=$profiles item=profile}
	{if $profile.cnt < $site.profile_req}
		<td style='background-color: #FF3300;'>{$profile.cnt}</td>
	{else}
		<td style='background-color: #00FF00;'>{$profile.cnt}</td>
	{/if}
{/foreach}
</tr>
</table>