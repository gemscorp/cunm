<nav class="navbar navbar-default" role="navigation">
	<ul class="nav navbar-nav">
		{if isset($smarty.session.user_id)}
			<li><a href="http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/dashboard" class="nav">Dashboard</a></li>
			{if $smarty.session.user_level eq "2"}
				<li class="dropdown">
	          		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Primary Credit Union <b class="caret"></b></a>
			          <ul class="dropdown-menu">
			            <li><a href="http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/member/profile">Profile</a></li>
			            <li><a href="http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/member/operations">Operations</a></li>
			            <li><a href="http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/member/datasheet">Data Sheet</a></li>
			            <li class="divider"></li>
			            <li><a href="#">Report</a></li>
			          </ul>
	        	</li>
	        {/if}
	        {if $smarty.session.user_level eq "1"}
        	<li class="dropdown">
          		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Administration <b class="caret"></b></a>
		          <ul class="dropdown-menu">
		            <li><a href="http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/federation/primarycu">Primary Credit Unions</a></li>
		            <li><a href="http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/admin/users">Users</a></li>
		          </ul>
        	</li>
        	{/if}
	        {if $smarty.session.user_level eq "0"}
        	<li class="dropdown">
          		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Administration <b class="caret"></b></a>
		          <ul class="dropdown-menu">
		            <li><a href="http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/admin/servicearea">Service Area</a></li>
		            <li><a href="http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/admin/asset">Asset Groups</a></li>
		            <li><a href="http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/admin/service">Service</a></li>
		            <li><a href="http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/admin/balancesheet">Balance Sheet</a></li>
		            <li class="divider"></li>
		            <li><a href="http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/admin/country">Country List</a></li>
		            <li><a href="http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/admin/federation">Federation List</a></li>
		            <li><a href="http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/admin/users">Users</a></li>
		          </ul>
        	</li>
        	{/if}
			{if $smarty.session.user_level eq "0" || $smarty.session.user_level eq "1"}
				<li><a href="http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/adduser" class="nav">Add User</a></li>
			{/if}
			<li><a href="http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/password" class="nav">Change Password</a></li> 
			<li><a href="http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/logout" class="nav">Log Out</a></li>
		{else}
			<li><a href="http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/" class="nav">Home</a></li>
		{/if}
	</ul>
	{if isset($smarty.session.user_id)}
		<p class="navbar-text navbar-right">Signed in as <a href="#" class="navbar-link">{$smarty.session.user_email}</a></p>
	{/if}
</nav>