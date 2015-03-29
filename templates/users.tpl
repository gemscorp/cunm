{include file='header.tpl'}

<table class='table table-striped table-bordered'>
	<tr>
		<td>Id</td>
		<td>Username</td>
		<td>Last Login</td>
	</tr>
	{foreach from=$users item=user}
		<tr>
			<td>{$user.id}</td>
			<td>{$user.username}</td>
			<td>{$user.lastlogin}</td>
		</tr>
	{/foreach}
</table>

{include file='footer.tpl'}