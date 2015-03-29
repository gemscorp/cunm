{include file='header.tpl'}

<h3>Profiler Report Past 7 Day</h3>


<table class='table table-striped table-bordered'>
	<tr>
		<td>Site</td>
		{foreach from=$days item=day}
			<td>{$day}</td>
		{/foreach}
	</tr>	
	<tr>
		<td>Total</td>
		{foreach from=$days item=day}
			{if $summary.$day.created < $summary.$day.quota}
			<td style='background-color: #FF3300;'>{$summary.$day.created} / {$summary.$day.quota}</td>
			{elseif $summary.$day.created eq 0 and $summary.$day.quota eq 0}
			<td>{$summary.$day.created} / {$summary.$day.quota}</td>
			{else}
			<td style='background-color: #00FF00;'>{$summary.$day.created} / {$summary.$day.quota}</td>
			{/if}
		{/foreach}
	</tr>
	{foreach from=$sites item=site}
		<tr>
		<td>{$site.name}</td>
		{assign var=site_id value=$site.id}
		{foreach from=$days item=day}
			{if $report.$day.$site_id.created < $report.$day.$site_id.quota}
			<td style='background-color: #FF3300;'>{$report.$day.$site_id.created} / {$report.$day.$site_id.quota}</td>
			{elseif $report.$day.$site_id.created eq 0 and $report.$day.$site_id.quota eq 0}
			<td>{$report.$day.$site_id.created} / {$report.$day.$site_id.quota}</td>
			{else}
			<td style='background-color: #00FF00;'>{$report.$day.$site_id.created} / {$report.$day.$site_id.quota}</td>
			{/if}
		{/foreach}
	</tr>
	{/foreach}
</table>

{literal}
<script type='text/javascript'>
	
</script>
{/literal}
{include file='footer.tpl'}