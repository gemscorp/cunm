{include file='header.tpl'}

{if $error neq ""}
	<div class="alert alert-danger">{$error}</div>
{/if}

{if $success neq ""}
	<div class="alert alert-success">{$success}</div>
{/if}

<form method='post' action='password'>

Current Password: <input type='password' name='current_password' value='' /> 

New Password: <input type='password' name='new_password' value='' />

<input type='submit' value='Change Password' />

</form>

{include file='footer.tpl'}