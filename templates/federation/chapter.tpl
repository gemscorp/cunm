{include file='header.tpl'}
<h3>Administration - Chapter</h3>

{include file='common/alert.tpl'}

<form role="form" method='post' action='http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/federation/chapter'>
  <div class="form-group">
    <label for="exampleInputEmail1">Region/Chapter Name</label>
    <input type="text" name='name' class="form-control" id="exampleInputEmail1" placeholder="Enter Primary Region/Chapter Name">
  </div>
  <input type='hidden' name='federation_id' value='{$smarty.session.user_federation_id}' />
  <button type="submit" class="btn btn-default">Add Region/Chapter</button>
</form>

<h3>Regions/Chapters</h3>

<table id='report' class='table table-striped table-bordered'>
		<thead>
		<tr>
			<th>Name</th>
			<th>...</th>
		</tr>
		</thead>
		
		<tbody>
		{foreach from=$chapters item=chapter}
			<tr>
				<td>{$chapter.name}</td>
				<td>&nbsp;</td>
			</tr>
		{/foreach}
		</tbody>
	</table>


{include file='footer.tpl'}