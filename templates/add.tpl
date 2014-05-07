{include file='header.tpl'}

<h3>Add Profile</h3>


{if $all}
    <div class="alert alert-info">All sites have been enabled</div>
{else}
   <div class="alert alert-info">When your daily quota is met, you will be able to create profile for any site</div>
{/if}

{if $remove eq 1}
	<div class="alert alert-warning">You have reached the daily quota of some sites, these sites will no longer appear on the list until you have met with your daily quota</div>
{/if}

{if $success neq ""}
	<div class="alert alert-success">{$success}</div>
{/if}

<form method='post' action='add'>
		<div class="boxcontainner">
			<span class="label2">Site name:</span>
			<span class="field">
				<select name="site_id" id="site_id">
					{html_options options=$sites selected=$site_id}
				</select>
			</span>
		</div>
		<div class="boxcontainner">
			<span class="label2">Sex:</span>
			<span class="field">
				<select name="sex" id="sex">
					<option value="Female">Female</option>
					<option value="Male">Male</option>
					<option value="Gay">Gay</option>
					<option value="Lesbian">Lesbian</option>
				</select>
			</span>
		</div>
		<div class="boxcontainner">
			<span class="label2">Username:</span>
			<span class="field">
				<input name="username" id="username" class="box" type="text">
			</span>
		</div>
		<div class="boxcontainner">
			<span class="label2">Password:</span>
			<span class="field">
				<input name="password" id="password" class="box" type="text">
			</span>
		</div>
		<div class="boxcontainner">
			<span class="label2">&nbsp;</span>
				<input name="submit" value="Insert" class="button" type="submit">
			<span class="field">
			</span>
		</div>
</form>

{include file='footer.tpl'}