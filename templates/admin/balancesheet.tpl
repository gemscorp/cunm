{include file='header.tpl'}
<h3>Administration - Balance Sheet </h3>

{include file='common/alert.tpl'}

<form role="form" method='post' action='http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/admin/balancesheet'>
  <div class="form-group">
    <label for="exampleInputEmail1">Group</label> [<a id='addgroup' href='#'>Add</a>]
    <select name='group_id' id='group_id' class="form-control">
    	{foreach from=$groups item=group}
    		<option value='{$group.id}'>{$group.name}</option>
    	{/foreach}
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Sub Group</label> [<a id='addsubgroup' href='#'>Add</a>]
    <select id='subgroup_id' name='subgroup_id' class="form-control">
    	{foreach from=$subgroups item=subgroup}
    		<option value='{$subgroup.id}'>{$subgroup.name}</option>
    	{/foreach}
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Line Item</label>
    <input type="text" name='name' class="form-control" id="exampleInputEmail1" placeholder="Enter Line Item">
  </div>
  <button type="submit" class="btn btn-default">Add Balance Sheet Item</button>
</form>

<h3>Balance Sheet line items</h3>

<table id='report' class='table table-striped table-bordered'>
		<thead>
		<tr>
			<th>Group</th>
			<th>Sub Group</th>
			<th>Line Item</th>
		</tr>
		</thead>
		
		<tbody>
		{foreach from=$bslines item=bsline}
			<tr>
				<td>{$bsline.group_name}</td>
				<td>{$bsline.subgroup_name}</td>
				<td>{$bsline.name}</td>
			</tr>
		{/foreach}
		</tbody>
	</table>

<div id="group" title="Add Balance Sheet Group" style='display: none;'>
  	<form id='formgroup' role="form" method='post' action='http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/admin/balancesheet'>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Group Name</label>
	    <input type="text" name='name' class="form-control" id="exampleInputEmail1" placeholder="Enter Group Name">
	  </div>
  	  <button id='btnaddgroup' type="button" class="btn btn-default">Add Group</button>
  	</form>
</div>

<div id="subgroup" title="Add Balance Sheet Group" style='display: none;'>
  	<form id='formsubgroup' role="form" method='post' action='http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/admin/balancesheet'>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Group Name</label>
	    <select name='mgroup_id' id='mgroup_id'>
	    	{foreach from=$groups item=group}
	    		<option value='{$group.id}'>{$group.name}</option>
	    	{/foreach}
    	</select>
	  </div>
	  <div class="form-group">
	    <label for="exampleInputEmail1">Sub Group Name</label>
	    <input type="text" name='name' class="form-control" id="exampleInputEmail1" placeholder="Enter Sub Group Name">
	  </div>
  	  <button id='btnaddsubgroup' type="button" class="btn btn-default">Add Sub Group</button>
  	</form>
</div>


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
	});
</script>

{include file='footer.tpl'}