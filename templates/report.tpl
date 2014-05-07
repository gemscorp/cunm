{include file='header.tpl'}

<h2>Profile Statistics</h2>

	<table id='report' class='table table-striped table-bordered'>
		<thead>
		<tr>
			<th>Site</th>
			<th>Active Profiles</th>
			<th>Inactive Profiles</th>
			<th>Profiles Per Day <br/>
				Tody / Yest / Req
			</th>
			<th>Members</th>
			<th>Total Sent</th>
			<th>Total Sent Today</th>
			<th>Total Sent Yesterday</th>
			<th>Total Sent Since 2 days</th>
			<th>Total Sent 7d</th>
			<th>AVG/MAX/MIN (24hr)</th>
			<th>AVG/MAX/MIN (48hr)</th>
			<th>AVG/MAX/MIN  (7d)</th>
			<th>Running</th>
			<th>Last Check</th>
			<th>Last Reset</th>
			{if isset($smarty.session.password) and $smarty.session.password == $smarty.const.ADMIN_PASSWORD}
				<th>Action</th>
			{/if}
		</tr>
		</thead>
		<tbody>
		{foreach from=$sites item=site}
		<tr>
			<td>{$site.name}</td>
			<td>{$site.active}</td>
			<td>{$site.inactive}</td>
			<td><a href="#" class="p7profile" data-site-id="{$site.id}">{$site.profile_create_today} / {$site.profile_create_yesterday} / {$site.profile_req}</a></td>
			<td>{$site.members|number_format}</td>
			<td>{$site.total_sent|number_format}</td>
			<td>{$site.total_sent_today|number_format}</td>
			<td>{$site.total_sent_yesterday|number_format}</td>
			<td>{$site.total_sent_twodays|number_format}</td>
			<td>{$site.total_sent_7d|number_format}</td>
			<td>{$site.avg_24}</td>
			<td>{$site.avg_48}</td>
			<td>{$site.avg_7d}</td>
			<td>{$site.running}</td>
			<td>{$site.last_checking}</td>
			<td>{$site.last_reset}</td>
			{if isset($smarty.session.password) and $smarty.session.password == $smarty.const.ADMIN_PASSWORD}
				<td>
					<a href="reset/{$site.id}">Reset All</a> <br/>
					<a href="reset/{$site.id}/1">Reset 7d</a>
				</td>
			{/if}
		</tr>
		{/foreach}
		</tbody>
	</table>

<script type='text/javascript'>
{literal}
	$(function() {
		$('#report').stickyTableHeaders();
		
		$(".p7profile").click(function (e) {
			e.preventDefault();
			$("#dialog").load("p7profile/" + $(this).data('site-id'));
			$("#dialog").dialog({minWidth: 850});					
		});
	});
{/literal}
</script>

<div id="dialog" title="Past 7 Days">
</div>

{include file='footer.tpl'}