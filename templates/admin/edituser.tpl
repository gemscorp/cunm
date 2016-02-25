{include file='header.tpl'}

<h3>Add User</h3>

{include file='common/alert.tpl'}

<form role="form" method='post' action='/admin/user/edit/{$user.id}'>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="text" name='username' class="form-control" id="exampleInputEmail1" placeholder="Enter Email" value="{$user.email}">
  </div>
  {if $smarty.session.user_level eq "1"}
  	<input type='hidden' name='federation_id' value='{$smarty.session.user_federation_id}' />
  <div class="form-group">
    <label for="primary_union">Primary Credit Union</label>
    <select id='primary_union_id' name='primary_union_id' class="form-control">
    	{foreach from=$primarycus item=primarycu}
			{if $user.primary_union_id eq $primarycu.id}
				<option value='{$primarycu.id}' selected>{$primarycu.name}</option>
			{else}
    			<option value='{$primarycu.id}'>{$primarycu.name}</option>
			{/if}
    	{/foreach}
    </select>
    <input type='hidden' name='country_id' value='{$smarty.session.user_country_id}' />
  </div>
  {else}
  <div class="form-group">
    <label for="country">Country</label>
    <select id='country_id' name='country_id' class="form-control">
    	{foreach from=$countries item=country}
			{if $user.country_id eq $country.id}
				<option value='{$country.id}' selected>{$country.name}</option>
			{else}
    			<option value='{$country.id}'>{$country.name}</option>
			{/if}
    	{/foreach}
    </select>
  </div>
  <div class="form-group">
    <label for="federation">Federation</label>
    <select id='federation_id' name='federation_id' class="form-control">
    	{foreach from=$federations item=federation}
			{if $user.federation_id eq $federation.id}
				<option value='{$federation.id}' selected>{$federation.name}</option>
			{else}
    			<option value='{$federation.id}'>{$federation.name}</option>
			{/if}
    	{/foreach}
    </select>
  </div>
  <input type='hidden' name='primary_union_id' value='0' />
  {/if}
  <div class="form-group">
    <label for="level">User Level</label>
    <select name='level' class="form-control" id="level">
    	{if $smarty.session.user_level eq "0"}
    		<option value='1'>Federation Administrator</option>
    	{/if}
    	{if $smarty.session.user_level eq "1"}
    		<option value='2'>Primary Credit Union User</option>
    	{/if}
    	<option value='3'>Reports User</option>
    </select>
  </div>
  <button type="submit" class="btn btn-default">Create User</button>
</form>

<script type='text/javascript'>
	$(function () {
		$("#addgroup").click(function (e) {
			e.preventDefault();
			 $( "#group" ).dialog({
      			height: 340,
      			modal: true
    		});
		});
		$("#addsubgroup").click(function (e) {
			e.preventDefault();
			e.preventDefault();
			 $( "#subgroup" ).dialog({
      			height: 340,
      			modal: true
    		});
		});
		$('#btnaddgroup').click(function (e) {
			e.preventDefault();
			var formdata = $("#formgroup").serialize();
			$.ajax({
				url: 'http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/ajax/bsgroup',
				data: formdata,
				type: 'post',
				dataType: 'json',
				success: function (json) {
					$("#group_id").append('<option value="' + json.id + '">' + json.name + '</option>');
					$("#mgroup_id").append('<option value="' + json.id + '">' + json.name + '</option>');
					$("#group_id").val(json.id);
					$( "#group" ).dialog('close');
				},
				error: function (error) {
				
				}
			});
		});
		$('#btnaddsubgroup').click(function (e) {
			e.preventDefault();
			var formdata = $("#formsubgroup").serialize();
			$.ajax({
				url: 'http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/ajax/bssubgroup',
				data: formdata,
				type: 'post',
				dataType: 'json',
				success: function (json) {
					$("#subgroup_id").append('<option value="' + json.id + '">' + json.name + '</option>');
					$("#subgroup_id").val(json.id);
					$( "#subgroup" ).dialog('close');
				},
				error: function (error) {
				
				}
			});
		});
		$("#group_id").change(function (e) {
			e.preventDefault();
			var group_id = $(this).val();
			
			$.ajax({
				url: 'http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/ajax/bssubgroup/' + group_id,
				type: 'get',
				dataType: 'json',
				success: function (json) {
					$("#subgroup_id").html("");
					$.each(json.subgroups, function (i,v) {
						$("#subgroup_id").append('<option value="' + v.id + '">' + v.name + '</option>');
					});
				},
				error: function (error) {
				
				}
			});
		});
		$("#country_id").change(function (e) {
			e.preventDefault();
			var country_id = $(this).val();
			
			$.ajax({
				url: 'http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/ajax/federations/' + country_id,
				type: 'get',
				dataType: 'json',
				success: function (json) {
					$("#federation_id").html("");
					$("#federation_id").append('<option value="0">No Federation</option>');
					$.each(json.federations, function (i,v) {
						$("#federation_id").append('<option value="' + v.id + '">' + v.name + '</option>');
					});
				},
				error: function (error) {
				
				}
			});
		
		});
	});
</script>

{include file='footer.tpl'}