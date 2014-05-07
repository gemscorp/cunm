<?php /* Smarty version Smarty-3.1-DEV, created on 2014-03-25 14:58:53
         compiled from "templates/footer.tpl" */ ?>
<?php /*%%SmartyHeaderCode:528514237532923907a3157-39478196%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9206ffe216f3f7c2e7655782292928f7d20e8be5' => 
    array (
      0 => 'templates/footer.tpl',
      1 => 1395734318,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '528514237532923907a3157-39478196',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1-DEV',
  'unifunc' => 'content_532923907a4c62_15835452',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_532923907a4c62_15835452')) {function content_532923907a4c62_15835452($_smarty_tpl) {?>
<script type='text/javascript'>

	$(function () {
		window.setInterval(function () {
			$.get("ping");
		} , 100000);
		
		window.setTimeout(function(){
			location.reload(true);
		},60000 * 10);
	});
</script>

</body>
</html><?php }} ?>