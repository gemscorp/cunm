{include file='header.tpl'}

<h3>Add User</h3>

{include file='common/alert.tpl'}

<form role="form" method='post' action='/admin/user/password/{$user.id}'>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="text" name='username' class="form-control" id="exampleInputEmail1" placeholder="Enter Email" value="{$user.email}" readonly />
  </div>
	<div class="form-group">
		<label for="exampleInputEmail1">Passwordl</label>
		<input type="text" name='password' class="form-control" id="password" placeholder="Enter Password" />
	</div>
  <button type="submit" class="btn btn-default">Change Password</button>
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