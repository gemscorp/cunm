{include file='header.tpl'}
<h3>Administration - Primary Credit Unions</h3>

{include file='common/alert.tpl'}

<form role="form" method='post' action='http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/federation/primarycu'>
  <div class="form-group">
    <label for="exampleInputEmail1">Primary Credit Union Name</label>
    <input type="text" name='name' class="form-control" id="exampleInputEmail1" placeholder="Enter Primary Credit Union Name">
  </div>
  <input type='hidden' name='federation_id' value='{$smarty.session.user_federation_id}' />
  <button type="submit" class="btn btn-default">Add Primary Credit Union</button>
</form>

<h3>Primary Credit Unions</h3>

<table id='report' class='table table-striped table-bordered'>
		<thead>
		<tr>
			<th>Name</th>
			<th>...</th>
		</tr>
		</thead>
		
		<tbody>
		{foreach from=$primarycus item=primarycu}
			<tr>
				<td>{$primarycu.name}</td>
				<td>&nbsp;</td>
			</tr>
		{/foreach}
		</tbody>
	</table>


{include file='footer.tpl'}