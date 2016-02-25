{include file='header.tpl'}
<h3>Administration - Users</h3>

{include file='common/alert.tpl'}

<form class="form-inline" method='post'>
<fieldset>

<!-- Form Name -->
<legend>User Search</legend>

<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="country_id">Country</label>
    <select id="country_id" name="country_id" class="input-xlarge">
    	<option value='-1'>All</option>
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
			<th>Edit User</th>
			<th>Reset Password</th>
			<th>Delete User</th>
		</tr>
		</thead>
		
		<tbody>
		{foreach from=$users item=user}
			<tr>
				<td>{$user.email}</td>
				<td>
					{if $user.level eq "0"}
						ACCU ADMIN
					{elseif $user.level eq "1"}
						FEDERATION ADMIN
					{elseif $user.level eq "2"}
						PRIMARY CU USER
					{elseif $user.level eq "3"}
						REPORT USER
					{/if}
				</td>
				<td>{$user.fedname}</td>
				<td>{$user.puname}</td>
				<td>{$user.country_name}</td>
				<td><a href="/admin/user/edit/{$user.id}">Edit</a></td>
				<td><a href="/admin/user/delete/{$user.id}">Edit</a></td>
				<td><a href="/admin/user/password/{$user.id}">Edit</a></td>
			</tr>
		{/foreach}
		</tbody>
	</table>


{include file='footer.tpl'}