{include file='header.tpl'}
<h3>Administration - Users</h3>

{include file='common/alert.tpl'}

<form class="form-inline">
<fieldset>

<!-- Form Name -->
<legend>User Search</legend>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="country_id">Country</label>
    <select id="country_id" name="country_id" class="input-xlarge">
    	{foreach from=$countries item=country}
    		<option value='{$country.id}'>{$country.name}</option>
    	{/foreach}
    </select>
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">Search</button>
</div>

</fieldset>
</form>

<hr />

<table id='report' class='table table-striped table-bordered'>
		<thead>
		<tr>
			<th>Email</th>
			<th>User Level</th>
			<th>Federation</th>
			<th>Primary Credit Union</th>
			<th>Country</th>
		</tr>
		</thead>
		
		<tbody>
		{foreach from=$users item=user}
			<tr>
				<td>{$user.email}</td>
				<td>{$user.level}</td>
				<td>{$user.federation_id}</td>
				<td>{$user.primary_union_id}</td>
				<td>{$user.country_id}</td>
			</tr>
		{/foreach}
		</tbody>
	</table>


{include file='footer.tpl'}