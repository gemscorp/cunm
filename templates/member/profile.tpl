{include file='header.tpl'}
<h3>Primary Credit Union Profile</h3>

{include file='common/alert.tpl'}

<form role="form" method='post' action='http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/member/profile'>
<div class="tab-content">
  <div class="tab-pane active" id="profile">
  	<div class="form-group">
    	<label for="exampleInputEmail1">Country</label>
    	{$country.name}
  	</div>
  	<div class="form-group">
    	<label for="exampleInputEmail1">Name of Credit Union</label>
    	{$primarycu.name}
  	</div>
  	<div class="form-group">
    	<label for="exampleInputEmail1">Address</label>
    	<input type="text" name='address' class="form-control" id="address" placeholder="Enter Address" value='{$primarycu.address}' required>
  	</div>
  	  	<div class="form-group">
    	<label for="exampleInputEmail1">City</label>
    	<input type="text" name='city' class="form-control" id="city" placeholder="Enter City" value='{$primarycu.city}' required>
  	</div>
  	<div class="form-group">
    	<label for="exampleInputEmail1">Date of Establishment</label>
    	<input type="text" name='doe' class="form-control datepicker" id="doe" placeholder="Enter Date of Establishment" value='{$primarycu.establishment}' required>
  	</div>
  	  	<div class="form-group">
    	<label for="exampleInputEmail1">Contact Person Name</label>
    	<input type="text" name='contact_person' class="form-control" id="contact_person" placeholder="Enter Contact Person" value='{$primarycu.contact_person}' required>
  	</div>
  	  	<div class="form-group">
    	<label for="exampleInputEmail1">Contact Person Position</label>
    	<input type="text" name='position' class="form-control" id="position" placeholder="Enter Contact Person Position" value='{$primarycu.position}' required>
  	</div>
  	  	<div class="form-group">
    	<label for="exampleInputEmail1">Phone No.</label>
    	<input type="text" name='phone' class="form-control" id="phone" placeholder="Enter Phone" value='{$primarycu.phone}' required>
  	</div>
  	<div class="form-group">
    	<label for="exampleInputEmail1">Fax</label>
    	<input type="text" name='fax' class="form-control" id="fax" placeholder="Enter Fax" value='{$primarycu.fax}' required>
  	</div>
  	<div class="form-group">
    	<label for="exampleInputEmail1">Email Address</label>
    	<input type="text" name='email' class="form-control" id="email" placeholder="Enter Contact Person Email" value='{$primarycu.email}' required>
  	</div>
  	<button type="submit" class="btn btn-default">Save Profile</button>
  </div>
 </form>
 {include file='footer.tpl'}