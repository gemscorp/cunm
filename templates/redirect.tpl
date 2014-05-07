{include file='header.tpl'}

<h2>Redirect Statistics</h2>

	Start Date: <input class='datepicker' type='text' id='day_start_date' name='start_date' value='{$day_start}' />
	End Date: <input class='datepicker' type='text' id='day_end_date' name='start_date' value='{$day_finish}' />
	<button class='btn btn-primary btn-sm' id='dailySearch'>Search</button>
	

	<table id='report' class='table table-striped table-bordered'>
		<thead>
		<tr>
			<th>Date</th>
			<th>Redirect</th>
			<th>Count</th>
		</tr>
		</thead>
		
		<tbody>
		{foreach from=$rows item=row}
		<tr>
			<td>{$row.date}</td>
			<td>{$row.host}</td>
			<td>{$row.cnt}</td>
		</tr>
		{/foreach}
		<tr>
			<td colspan='2'>Total</td>
			<td>{$total}</td>
		</tr>
		</tbody>
	</table>
	
	
<script type='text/javascript'>

	$(function () {
		$( ".datepicker" ).datepicker({ "dateFormat" : "yy-mm-dd"});
		
		
		$("#dailySearch").click(function (e) {
			var http = location.protocol;
			var slashes = http.concat("//");
			var host = slashes.concat(window.location.hostname);
			
	    	e.preventDefault();
	    	var startDate = $("#day_start_date").val();
	    	var endDate = $("#day_end_date").val();
	    	window.location.href = host + "/bot/stat/redirect/" + startDate + "/" + endDate;
    	});
	});
	
	

</script>