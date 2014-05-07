{include file='header.tpl'}

<h3>Add Profiler</h3>

{if $success neq ""}
	<div class="alert alert-success">{$success}</div>
{/if}

<form method='post' action='adduser'>
	Username: <input type='text' name='username' />
	Password: <input type='password' name='password' />
	<input type='submit' />
</form>

{include file='footer.tpl'}