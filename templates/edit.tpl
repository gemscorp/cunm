{include file='header.tpl'}

<table class='table table-striped table-bordered'>
	<tr>
		<td>Site</td>
		<td>Username</td>
		<td>Password</td>
		<td>Sex</td>
		<td>Delete</td>
	</tr>
	{foreach from=$profiles item=profile}
		<tr>
			<td><a href='edit/{$profile.id}'>{$sites[$profile.site_id]}</a></td>
			<td>{$profile.username}</td>
			<td>{$profile.password}</td>
			<td>{$profile.sex}</td>
			<td><a href='delete/{$profile.id}'>Delete</a></td>
		</tr>
	{/foreach}
</table>

{include file='footer.tpl'}