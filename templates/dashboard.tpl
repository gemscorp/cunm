{include file='header.tpl'}

<h2> ChatBox Operations - Dashboard </h2>

<h3>Whats New</h3>

<div class='well'>You can now add a note to a site, notes are specific for each day. It will show up in managers report, under your username</div> 

<h3>Profiler Quota</h3>

<table class='table table-striped table-bordered'>
	<tr>
		<td>Site</td>
		<td>Quota</td>
		<td>Created</td>
		<td>Note</td>
	</tr>
	{foreach from=$sites item=site}
		{if $site.quota > 0 or $site.override > 0}
			<tr>
				<td>{$site.name}</td>
				{if $site.quota < $site.override}
					<td style='background-color: #FF3300;'>{$site.override}</td>
				{else}
					<td>{$site.quota}</td>
				{/if}
				<td>{$site.created}</td>
				<td><a data-site-id='{$site.site_id}' href='#' class='note'>Add/Edit</td></td>
			</tr>
		{/if}
	{/foreach}
</table>

<script type='text/javascript'>
{literal}
	$(function () {
		$(".note").click(function (e) {
			e.preventDefault();
			e.preventDefault();
			$("#note").load("sitenote/" + $(this).data('site-id'));
			$("#note").dialog({minWidth: 550, minHeight: 400});		
		});
	});
{/literal}
</script>

<div id="note" title="Add Site Note">
</div>

{include file='footer.tpl'}