{include file='header.tpl'}

<h2> ACCU CUNM </h2>

{include file='common/alert.tpl'}

<form role="form" method='post' action='login'>
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" name='username' class="form-control" id="exampleInputEmail1" placeholder="Enter Username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name='password' class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-default">Login</button>
</form>

<script type='text/javascript'>
	$(function (e) {
		$("#register").click(function (e) {
			window.location.href = 'register';
		});
	});
</script>

{include file='footer.tpl'}