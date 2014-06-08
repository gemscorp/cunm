{include file='header.tpl'}
<h3>Administration - Operational Area</h3>

{include file='common/alert.tpl'}

<form role="form" method='post' action='http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/admin/servicearea'>
  <div class="form-group">
    <label for="exampleInputEmail1">Operational Area</label>
    <input type="text" name='name' class="form-control" id="exampleInputEmail1" placeholder="Enter Operational Area">
  </div>
  <button type="submit" class="btn btn-default">Add Operational Area</button>
</form>

<h3>Operational Areas</h3>

<table id='report' class='table table-striped table-bordered'>
		<thead>
		<tr>
			<th>Name</th>
			<th>...</th>
		</tr>
		</thead>
		
		<tbody>
		{foreach from=$areas item=area}
			<tr>
				<td>{$area.name}</td>
				<td>&nbsp;</td>
			</tr>
		{/foreach}
		</tbody>
	</table>


{include file='footer.tpl'}