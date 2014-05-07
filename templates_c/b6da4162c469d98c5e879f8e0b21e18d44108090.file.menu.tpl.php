<?php /* Smarty version Smarty-3.1-DEV, created on 2014-05-01 13:15:49
         compiled from "templates/menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:139379035653292390777e12-36224363%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b6da4162c469d98c5e879f8e0b21e18d44108090' => 
    array (
      0 => 'templates/menu.tpl',
      1 => 1398924880,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '139379035653292390777e12-36224363',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_532923907a0799_33220658',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532923907a0799_33220658')) {function content_532923907a0799_33220658($_smarty_tpl) {?><nav class="navbar navbar-default" role="navigation">
	<ul class="nav navbar-nav">
		<?php if (isset($_SESSION['user_id'])){?>
			<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>
/bot/op/dashboard" class="nav">Dashboard</a></li>
			<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>
/bot/op/add" class="nav">Add Profile</a></li>
			<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>
/bot/op/edit" class="nav">Edit Profile</a></li>
			<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>
/bot/op/addemail" class="nav">Add Email</a></li>
			<?php if ($_SESSION['user_level']>1){?>
				<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>
/bot/op/mandashboard" class="nav">Manager Dashboard</a></li>
				<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>
/bot/op/health" class="nav">Health</a></li>
				<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>
/bot/op/quota" class="nav">Set Quota</a></li>
				<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>
/bot/op/dayquota" class="nav">Set Daily Quota</a></li>
				<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>
/bot/op/adduser" class="nav">Add Profiler</a></li>
				<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>
/bot/op/listuser" class="nav">List Profiler</a></li>
				<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>
/bot/op/sitequota" class="nav">Site Quota</a></li>
			<?php }?>
			<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>
/bot/op/password" class="nav">Change Password</a></li> 
			<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>
/bot/op/logout" class="nav">Log Out</a></li>
		<?php }else{ ?>
			<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>
/bot/op/" class="nav">Home</a></li>
		<?php }?>
	</ul>
</nav><?php }} ?>