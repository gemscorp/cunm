{include file='header.tpl'}
<h3>Administration - Federations</h3>

{include file='common/alert.tpl'}

<form role="form" method='post' action='http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/admin/federation'>
  <div class="form-group">
    <label for="country">Country</label>
    <select id='country_id' name='country_id' class="form-control">
    	{foreach from=$countries item=country}
    		<option value='{$country.id}'>{$country.name}</option>
    	{/foreach}
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Federation Name</label>
    <input type="text" name='name' class="form-control" id="exampleInputEmail1" placeholder="Enter Federation Name">
  </div>
  <button type="submit" class="btn btn-default">Add Federation</button>
</form>

<h3>Federations</h3>

<table id='report' class='table table-striped table-bordered'>
		<thead>
		<tr>
			<th>Country</th>
			<th>Federation</th>
			<th>Primary CU Count</th>
		</tr>
		</thead>
		
		<tbody>
		{foreach from=$federations item=federation}
			<tr>
				<td>{$federation.country_name}</td>
				<td>{$federation.name}</td>
				<td>{$federation.pucount}</td>
			</tr>
		{/foreach}
		</tbody>
	</table>


{include file='footer.tpl'}