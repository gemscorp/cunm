{include file='header.tpl'}

<h2> ACCU CUNM </h2>

<div class='well'>Registration</div>

{if $error neq ""}
	<div class="alert alert-danger">{$error}</div>
{/if}

<form role="form" method='post' action='register'>
  <div class="form-group">
    <label for="exampleInputUsername">Username</label>
    <input type="text" name='username' class="form-control" id="exampleInputUsername" placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="text" name='username' class="form-control" id="exampleInputEmail1" placeholder="Enter Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name='password' class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-default" id='register'>Register</button>
</form>

<script type='text/javascript'>
	$(function (e) {
		$("#register").click(function (e) {
			//window.location.href = 'register';
		});
	});
</script>

{include file='footer.tpl'}