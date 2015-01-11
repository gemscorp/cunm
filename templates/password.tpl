{include file='header.tpl'}

{include file='common/alert.tpl'}

<form role="form" method='post' action='password'>
  <div class="form-group">
    <label for="exampleInputEmail1">Current Password</label>
    <input type="password" name='current_password' class="form-control" id="exampleInputEmail1" placeholder="Current Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">New Password</label>
    <input type="password" name='new_password' class="form-control" id="exampleInputPassword1" placeholder="New Password">
  </div>
  <button type="submit" class="btn btn-default">Change Password</button>
</form>

{include file='footer.tpl'}