
<div class="copyright text-right">
<p style="padding-right:100px">Designed by: Manpreet Kaur</p>
</div>
  <script src="js/jquery.scrollTo.js"></script>
	<script src="js/jquery.nav.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$('#nav').onePageNav({
			begin: function() {
			console.log('start')
			},
			end: function() {
			console.log('stop')
			}
		});
	});
	</script>
  