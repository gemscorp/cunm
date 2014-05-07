{include file='header.tpl'}

<h3>Manager Dashboard</h3>

Date: <input class='datepicker' type='text' id='day_start_date' name='start_date' value='{$day_start}' />
<button class='btn btn-primary btn-sm' id='dailySearch'>Search</button>

<table class='table table-striped table-bordered'>
	<tr>
		<td>Site</td>
		<td>Required</td>
		<td>Assigned</td>
		<td>Created</td>
		{foreach from=$users item=user}
			<td><a href="/bot/op/ureport/{$user.username}">{$user.username}</a></td>
		{/foreach}
	</tr>
	<tr>
		<td>Total</td>
		<td>{$summary.profile_req}</td>
		<td>{$summary.profile_quota}</td>
		<td>{$summary.profile_created}</td>
		{foreach from=$users item=user}
			{assign var=qt value="quota_`$user.id`"}
			{assign var=cr value="create_`$user.id`"}
			{if $summary.$cr < $summary.$qt}
				<td style='background-color: #FF3300;'>{$summary.$cr} / {$summary.$qt}</td>
			{elseif $summary.$qt eq 0}
				<td>{$summary.$cr} / {$summary.$qt}</td>
			{else}
				<td style='background-color: #00FF00;'>{$summary.$cr} / {$summary.$qt}</td>
			{/if}
		{/foreach}
	</tr>
	
	{foreach from=$sites item=site}
		<tr>
		<td>{$site.name}</td>
		<td>{$site.profile_req}</td>
		<td>{$site.assigned}</td>
		<td>{$site.created}</td>
		{foreach from=$users item=user}
			{assign var=u value=$user.id}
			{assign var=cd value="create_`$user.id`"}
			{assign var=do value="do_`$user.id`"}
			{assign var=sn value="sn_`$user.id`"}
			{if $site.$do > $site.$u }
				{assign var=ful	value=$site.$do}
			{else}
				{assign var=ful	value=$site.$u}
			{/if}
			{assign var=req value=$site.$cd}
			
			{if $req < $ful}
				<td style='background-color: #FF3300;'>
					{$req} / {$ful}
					
					{if $site.$sn eq 1}
						<a class='info' data-site-id='{$site.id}' data-user-id='{$user.id}' data-day='{$day_start}' href='#'><img src='/bot/op/images/more.jpg' width=16 height=16 /></a>
					{/if}
					 
				</td>
			{elseif $ful eq "0"}
				<td>
					{$req} / {$ful}
				</td>
			{else}
				<td style='background-color: #00FF00;'>
					{$req} / {$ful}
				</td>
			{/if}
			
		{/foreach}
	</tr>
	{/foreach}
</table>

<div id="note" title="Site Note">
</div>

{literal}
<script type='text/javascript'>
	$(function () {
		$( ".datepicker" ).datepicker({ "dateFormat" : "yy-mm-dd"});
		
		$("#dailySearch").click(function (e) {
			var day = $("#day_start_date").val();
			window.location.href = "/bot/op/mandashboard/" + day;
		});
		
		$(".info").click(function (e) {
			e.preventDefault();
			$("#note").load("/bot/op/viewsitenote/" + $(this).data('site-id') + "/" + $(this).data('user-id') + "/" + $(this).data('day'));
			$("#note").dialog({minWidth: 400, minHeight: 300});		
		});
	});
</script>
{/literal}
{include file='footer.tpl'}