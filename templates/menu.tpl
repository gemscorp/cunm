<nav class="navbar navbar-default" role="navigation">
	<ul class="nav navbar-nav">
		{if isset($smarty.session.user_id)}
			<li><a href="http://{$smarty.server.HTTP_HOST}/bot/op/dashboard" class="nav">Dashboard</a></li>
			<li><a href="http://{$smarty.server.HTTP_HOST}/bot/op/add" class="nav">Add Profile</a></li>
			<li><a href="http://{$smarty.server.HTTP_HOST}/bot/op/edit" class="nav">Edit Profile</a></li>
			<li><a href="http://{$smarty.server.HTTP_HOST}/bot/op/addemail" class="nav">Add Email</a></li>
			{if $smarty.session.user_level > 1}
				<li><a href="http://{$smarty.server.HTTP_HOST}/bot/op/mandashboard" class="nav">Manager Dashboard</a></li>
				<li><a href="http://{$smarty.server.HTTP_HOST}/bot/op/health" class="nav">Health</a></li>
				<li><a href="http://{$smarty.server.HTTP_HOST}/bot/op/quota" class="nav">Set Quota</a></li>
				<li><a href="http://{$smarty.server.HTTP_HOST}/bot/op/dayquota" class="nav">Set Daily Quota</a></li>
				<li><a href="http://{$smarty.server.HTTP_HOST}/bot/op/adduser" class="nav">Add Profiler</a></li>
				<li><a href="http://{$smarty.server.HTTP_HOST}/bot/op/listuser" class="nav">List Profiler</a></li>
				<li><a href="http://{$smarty.server.HTTP_HOST}/bot/op/sitequota" class="nav">Site Quota</a></li>
			{/if}
			<li><a href="http://{$smarty.server.HTTP_HOST}/bot/op/password" class="nav">Change Password</a></li> 
			<li><a href="http://{$smarty.server.HTTP_HOST}/bot/op/logout" class="nav">Log Out</a></li>
		{else}
			<li><a href="http://{$smarty.server.HTTP_HOST}/bot/op/" class="nav">Home</a></li>
		{/if}
	</ul>
</nav>