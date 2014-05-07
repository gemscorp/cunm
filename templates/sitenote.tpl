<h3>{$sites[$site_id]}</h3>
<form method='post' id='savenote'>
	<textarea id='txtnote' name='note' style='width: 400px; height: 300px;'>{$note.note}</textarea> <br/>
	<input type='hidden' id='site_id' name='site_id' value='{$site_id}'/>
	<button id='save'>Save</button>
</form>
<script type='text/javascript'>
{literal}
	$(function () {
		$("#save").click(function (e) {
			e.preventDefault();
			var note = $("#txtnote").val();
			var site_id = $("#site_id").val();
			$.ajax({
				url: 'sitenote',
				type: 'post',
				dataType: 'json',
				data: {site_id: site_id, note: note},
				success: function (json) {
					$("#note").dialog('close');
				}
			});
		});
	});
{/literal}
</script>
