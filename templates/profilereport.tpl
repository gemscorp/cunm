{include file='header.tpl'}

<h2>Profile Report</h2>

<table class='table table-striped table-bordered'>
<tr>
	<td>Site</td>
	<td>Required</td>
{foreach from=$days item=day}
	<td>{$day.cdate}</td>
{/foreach}
</tr>
{foreach from=$site_report item=site}
<tr>
	<td>{$site.name}</td>
	<td>{$site.profile_req}</td>
	{foreach from=$days item=day}
		{if $site[$day.cdate] < $site.profile_req}
			<td style='background-color: #FF3300;'>{$site[$day.cdate]} / {$site.profile_req}</td>
		{else}
			<td style='background-color: #00FF00;'>{$site[$day.cdate]} / {$site.profile_req}</td>
		{/if}
	{/foreach}
</tr>
{/foreach}
<tr>
	<td colspan='2'>Total</td>
	{foreach from=$days item=day}
		<td>{$actual[$day.cdate]} / {$required[$day.cdate]} </td>
	{/foreach}
</tr>
</table>
{include file='footer.tpl'}