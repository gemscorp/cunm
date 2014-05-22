{include file='header.tpl'}

<h3>Add User</h3>

{if $success neq ""}
	<div class="alert alert-success">{$success}</div>
{/if}


<form role="form" method='post' action='adduser'>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="text" name='username' class="form-control" id="exampleInputEmail1" placeholder="Enter Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name='password' class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  {if $smarty.session.user_level eq "2"}
  	<input type='hidden' name='federation_id' value='{$smarty.session.user_federation_id}' />
  <div class="form-group">
    <label for="primary_union">Primary Credit Union</label>
    <input type="text" name='primary_credit_union' class="form-control" id="primary_union" placeholder="Primary Credit Union">
  </div>
  {else}
  <div class="form-group">
    <label for="federation">Federation</label>
    <input type="text" name='federation' class="form-control" id="federation" placeholder="Federation">
  </div>
  <div class="form-group">
    <label for="country">Country</label>
    <input type="text" name='country' class="form-control" id="country" placeholder="Country">
  </div>
  {/if}
  <div class="form-group">
    <label for="level">User Level</label>
    <select name='level' class="form-control" id="level">
    	<option value='1'>Federation Administrator</option>
    	<option value='3'>Reports User</option>
    </select>
  </div>
  <button type="submit" class="btn btn-default">Create User</button>
</form>
{include file='footer.tpl'}