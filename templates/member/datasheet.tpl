{include file='header.tpl'}
<h3>Primary Credit Union - Data Sheet</h3>

<div class="alert alert-danger">Please set Operational Areas before creating datasheet</div>

Data Sheet Date: <input type="text" class="datepicker" value="" id="dp1"> 
<button id='createsheet' type="button" class="btn btn-success">Create New Datasheet</button>

<hr>

<h3>Past Data Sheets</h3>

<table id='report' class='table table-striped table-bordered'>
		<thead>
		<tr>
			<th>Date</th>
			<th>Total Members</th>
			<th>View</th>
		</tr>
		</thead>
		
		<tbody>
		
		<tr>
			<td>2014-01-01</td>
			<td>2333</td>
			<td><a href='#'>View</a></td>
		</tr>
		<tr>
			<td>2014-02-01</td>
			<td>2463</td>
			<td><a href='#'>View</a></td>
		</tr>
		</tbody>
	</table>

<script type='text/javascript'>

$(function () {
	$('.datepicker').datepicker( { format: 'yyyy-mm-dd' } ).on('changeDate', function(ev){
		console.log('here');
		$(this).datepicker('hide');
  	});
  	
  	$('#createsheet').click(function (e) {
  		window.location.href = 'http://{$smarty.server.HTTP_HOST}{$smarty.const.APP_PATH}/member/detail';
  	});
});

</script>

{include file='footer.tpl'}