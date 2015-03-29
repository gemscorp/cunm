{include file='header.tpl'}
<h3>Administration - Unlock Requests</h3>

{include file='common/alert.tpl'}

<h3>Pending</h3>

<table id='report' class='table table-striped table-bordered'>
		<thead>
		<tr>
			<th>Request Date</th>
			<th>Request Type</th>
			<th>Primary Credit Union Name</th>
			<th>Reason</th>
			<th>Action</th>
		</tr>
		</thead>
		
		<tbody>
		{foreach from=$reqs item=req}
			<tr>
				<td>{$req.cdate}</td>
				<td>{$req.type}</td>
				<td>{$req.pu_name}</td>
				<td>{$req.comment}</td>
				<td><a class='unlock' data-id='{$req.id}' href='#'>Unlock</a></td>
			</tr>
		{/foreach}
		</tbody>
	</table>
<script type='text/javascript'>

	$(function () {
		$(".unlock").click(function (e) {
			var that = $(this);
			var id = $(this).data('id');
			$.post('http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/admin/unlock', { id: id}, function () {
				that.parent().parent().remove();
			}); 
		});
	});

</script>

{include file='footer.tpl'}