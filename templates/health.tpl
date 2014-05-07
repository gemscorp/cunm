{include file='header.tpl'}

<h3>Profiler Health</h3>

Period: <input class='datepicker' type='text' id='day_start_date' name='start_date' value='{$start}' /> <input class='datepicker' type='text' id='day_end_date' name='start_date' value='{$finish}' />
<button class='btn btn-primary btn-sm' id='dailySearch'>Search</button>


<table class='table table-striped table-bordered'>
	<tr>
		<td>Profiler</td>
		<td>Total</td>
		<td>Bad</td>
		<td>Percent Bad</td>
		{foreach from=$sites item=site}
			<td>{$site.name}</td>
		{/foreach}
	</tr>
	{foreach from=$users item=user}
			<tr>
				<td>{$user.username}</td>
				<td>{$user.profile_count}</td>
				<td>{$user.profile_not}</td>
				<td>{$user.percent|number_format:2}</td>
				{foreach from=$sites item=site}
					{assign var=all value="all_`$site.id`"}
					{assign var=bad value="bad_`$site.id`"}
					{assign var=percent value="percent_`$site.id`"}
					{if $user.$all eq "0"}
						<td>&nbsp;</td>
					{else}
						<td nowrap>{$user.$bad} / {$user.$all} ( {$user.$percent|number_format:2} ) </td>
					{/if}
				{/foreach}
			</tr>
	{/foreach}
</table>

<script type='text/javascript'>
	var host = '{$smarty.server.HTTP_HOST}';
{literal}

	$(function () {
		
		$( ".datepicker" ).datepicker({ "dateFormat" : "yy-mm-dd"});
		
		 $("#dailySearch").click(function (e) {
		    	e.preventDefault();
		    	var startDate = $("#day_start_date").val();
		    	var endDate = $("#day_end_date").val();
		    	window.location.href = 'http://' + host + '/bot/op/health/' + startDate + '/' + endDate
		    });
	});
{/literal}
</script>

{include file='footer.tpl'}