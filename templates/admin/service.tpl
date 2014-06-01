{include file='header.tpl'}
<h3>Administration - Services</h3>

{include file='common/alert.tpl'}

<form role="form" method='post' action='http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/admin/service'>
  <div class="form-group">
    <label for="exampleInputEmail1">Service</label>
    <input type="text" name='name' class="form-control" id="exampleInputEmail1" placeholder="Enter Servie Area">
  </div>
  <button type="submit" class="btn btn-default">Add Service</button>
</form>

<h3>Services</h3>

<table id='report' class='table table-striped table-bordered'>
		<thead>
		<tr>
			<th>Name</th>
			<th>...</th>
		</tr>
		</thead>
		
		<tbody>
		{foreach from=$services item=service}
			<tr>
				<td>{$service.name}</td>
				<td>&nbsp;</td>
			</tr>
		{/foreach}
		</tbody>
	</table>


{include file='footer.tpl'}