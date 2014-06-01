{include file='header.tpl'}
<h3>Administration - Asset Groups</h3>

{include file='common/alert.tpl'}

<form role="form" method='post' action='http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/admin/asset'>
  <div class="form-group">
    <label for="exampleInputEmail1">Asset Group</label>
    <input type="text" name='name' class="form-control" id="exampleInputEmail1" placeholder="Enter Servie Area">
  </div>
  <button type="submit" class="btn btn-default">Add Asset Group</button>
</form>

<h3>Asset Groups</h3>

<table id='report' class='table table-striped table-bordered'>
		<thead>
		<tr>
			<th>Name</th>
			<th>...</th>
		</tr>
		</thead>
		
		<tbody>
		{foreach from=$assetgroups item=assetgroup}
			<tr>
				<td>{$assetgroup.name}</td>
				<td>&nbsp;</td>
			</tr>
		{/foreach}
		</tbody>
	</table>


{include file='footer.tpl'}