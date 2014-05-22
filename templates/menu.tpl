<nav class="navbar navbar-default" role="navigation">
	<ul class="nav navbar-nav">
		{if isset($smarty.session.user_id)}
			<li><a href="http://{$smarty.server.HTTP_HOST}/cunm/dashboard" class="nav">Dashboard</a></li>
			<li><a href="http://{$smarty.server.HTTP_HOST}/cunm/member/detail" class="nav">Member Detail</a></li>
			{if $smarty.session.user_level neq "3"}
				<li><a href="http://{$smarty.server.HTTP_HOST}/cunm/adduser" class="nav">Add User</a></li>
			{/if}
			<li><a href="http://{$smarty.server.HTTP_HOST}/cunm/password" class="nav">Change Password</a></li> 
			<li><a href="http://{$smarty.server.HTTP_HOST}/cunm/logout" class="nav">Log Out</a></li>
		{else}
			<li><a href="http://{$smarty.server.HTTP_HOST}/cunm/" class="nav">Home</a></li>
		{/if}
	</ul>
</nav>