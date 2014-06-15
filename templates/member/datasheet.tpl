{include file='header.tpl'}
<h3>Primary Credit Union - Data Sheet</h3>

{include file='common/alert.tpl'}

{if $op_area_set eq 0}
	<div class="alert alert-danger">Please set a href='http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/member/operations'>Operational Areas</a> before creating datasheet</div>
{/if}

<form role="form" method='post' action='http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/member/datasheet'>
Data Sheet Date: <input type="text" class="datepicker" value="" id="date" name='date'> 
<button id='createsheet' type="submit" class="btn btn-success">Create New Datasheet</button>
</form>

<hr>

<h3>Past Data Sheets</h3>

<table id='report' class='table table-striped table-bordered'>
		<thead>
		<tr>
			<th>Date</th>
			<th>Total Members</th>
			<th>View</th>
		</tr>
		</thead>
		
		<tbody>
		{foreach from=$ds item=d}
		<tr>
			<td>{$d.date}</td>
			<td>{$d.total_members}</td>
			<td><a href='http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/member/detail/{$d.id}'>View</a></td>
		</tr>
		{/foreach}
		</tbody>
	</table>

{include file='footer.tpl'}