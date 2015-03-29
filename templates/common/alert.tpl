{nocache}
{if $error neq ""}
	<div class="alert alert-danger">{$error}</div>
{/if}

{if $success neq ""}
	<div class="alert alert-success">{$success}</div>
{/if}
{/nocache}