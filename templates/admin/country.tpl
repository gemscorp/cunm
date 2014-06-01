{include file='header.tpl'}
<h3>Administration - Asset Groups</h3>

{include file='common/alert.tpl'}

<form role="form" method='post' action='http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/admin/country'>
  <div class="form-group">
    <label for="exampleInputEmail1">Country Name</label>
    <input type="text" name='name' class="form-control" id="exampleInputEmail1" placeholder="Enter Servie Area">
  </div>
  <button type="submit" class="btn btn-default">Add Country</button>
</form>

<h3>Countries</h3>

<table id='report' class='table table-striped table-bordered'>
		<thead>
		<tr>
			<th>Name</th>
			<th>...</th>
		</tr>
		</thead>
		
		<tbody>
		{foreach from=$countries item=country}
			<tr>
				<td>{$country.name}</td>
				<td>&nbsp;</td>
			</tr>
		{/foreach}
		</tbody>
	</table>


{include file='footer.tpl'}