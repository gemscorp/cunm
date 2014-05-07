{include file='header.tpl'}

<form method='post' action='/bot/op/edit'>
		<div class="boxcontainner">
			<span class="label2">Site name:</span>
			<span class="field">
				<select name="site_id" id="site_id">
					{html_options options=$sites selected=$profile.site_id}
				</select>
			</span>
		</div>
		<div class="boxcontainner">
			<span class="label2">Sex:</span>
			<span class="field">
				<select name="sex" id="sex">
					{html_options values=$sex output=$sex selected=$profile.sex}
				</select>
			</span>
		</div>
		<div class="boxcontainner">
			<span class="label2">Username:</span>
			<span class="field">
				<input name="username" id="username" class="box" type="text" value='{$profile.username}'>
			</span>
		</div>
		<div class="boxcontainner">
			<span class="label2">Password:</span>
			<span class="field">
				<input name="password" id="password" class="box" type="text" value='{$profile.password}'>
			</span>
		</div>
		<div class="boxcontainner">
			<span class="label2">&nbsp;</span>
				<input name="submit" value="Update" class="button" type="submit">
				<input type='hidden' name='id' value='{$profile.id}' />
			<span class="field">
			</span>
		</div>
</form>


{include file='footer.tpl'}