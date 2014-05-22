<?php /* Smarty version Smarty-3.1-DEV, created on 2014-05-22 16:03:15
         compiled from "templates/menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:139379035653292390777e12-36224363%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b6da4162c469d98c5e879f8e0b21e18d44108090' => 
    array (
      0 => 'templates/menu.tpl',
      1 => 1400749391,
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
/cunm/dashboard" class="nav">Dashboard</a></li>
			
			<?php if ($_SESSION['user_level']!="3"){?>
				<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>
/cunm/adduser" class="nav">Add User</a></li>
			<?php }?>
			<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>
/cunm/password" class="nav">Change Password</a></li> 
			<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>
/cunm/logout" class="nav">Log Out</a></li>
		<?php }else{ ?>
			<li><a href="http://<?php echo $_SERVER['HTTP_HOST'];?>
/cunm/" class="nav">Home</a></li>
		<?php }?>
	</ul>
</nav><?php }} ?>