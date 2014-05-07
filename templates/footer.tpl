
<script type='text/javascript'>

	$(function () {
		window.setInterval(function () {
			$.get("ping");
		} , 100000);
		
		window.setTimeout(function(){
			location.reload(true);
		},60000 * 10);
	});
</script>

</body>
</html>