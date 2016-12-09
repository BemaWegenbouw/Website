  
    </div>
    <!-- /#wrapper -->
    <!-- /#wrapper -->

    <!-- jQuery -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<!-- Metis Menu Plugin JavaScript -->
		<script src="vendor/metisMenu/metisMenu.min.js"></script>
		<!-- Morris Charts JavaScript -->
        <!-- Custom Theme JavaScript -->
		<script src="../assets/js/sb-admin-2.js"></script>

		<?php if($page == "staff-tables") {?>
        <!-- DataTables JavaScript -->
		<script src="vendor/datatables/js/jquery.dataTables.min.js"></script>
		<script src="vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
		<script src="vendor/datatables-responsive/dataTables.responsive.js"></script>
		<!-- Page-Level Demo Scripts - Tables - Use for reference -->
		<script>
		$(document).ready(function() {
			$('#dataTables-example').DataTable({
				responsive: true
			});
		});
		</script>
        <?php } ?>
		
		<?php if($page == "staff-dashboard") {?>
        <script src="vendor/raphael/raphael.min.js"></script>
		<script src="vendor/morrisjs/morris.min.js"></script>
		<script src="data/morris-data.js"></script>
		<script type="text/javascript" src="../assets/clockpicker-gh-pages/dist/bootstrap-clockpicker.min.js"></script>
		<script type="text/javascript">
			$('.clockpicker').clockpicker()
					.find('input').change(function () {
				console.log(this.value);
			});
			var input = $('#single-input').clockpicker({
				placement: 'bottom',
				align: 'left',
				autoclose: true,
				'default': 'now'
			});

			$('.clockpicker-with-callbacks').clockpicker({
				donetext: 'Done',
				init: function () {
					console.log("colorpicker initiated");
				},
				beforeShow: function () {
					console.log("before show");
				},
				afterShow: function () {
					console.log("after show");
				},
				beforeHide: function () {
					console.log("before hide");
				},
				afterHide: function () {
					console.log("after hide");
				},
				beforeHourSelect: function () {
					console.log("before hour selected");
				},
				afterHourSelect: function () {
					console.log("after hour selected");
				},
				beforeDone: function () {
					console.log("before done");
				},
				afterDone: function () {
					console.log("after done");
				}
			})
					.find('input').change(function () {
				console.log(this.value);
			});

			// Manually toggle to the minutes view
			$('#check-minutes').click(function (e) {
				// Have to stop propagation here
				e.stopPropagation();
				input.clockpicker('show')
						.clockpicker('toggleView', 'minutes');
			});
			if (/mobile/i.test(navigator.userAgent)) {
				$('input').prop('readOnly', true);
			}
		</script>
		<script type="text/javascript" src="../assets/clockpicker-gh-pages/assets/js/highlight.min.js"></script>
		<script type="text/javascript">
			hljs.configure({tabReplace: '    '});
			hljs.initHighlightingOnLoad();
		</script>
		<script type="text/javascript" src="../assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>

		<script>
			$('.datepicker').datepicker({
				format: 'dd/mm/yyyy',
				startDate: '-3d',
				todayBtn: "linked",
				language: "nl",
				calendarWeeks: true,
				autoclose: true,
				todayHighlight: true,
				toggleActive: true
			});
		</script>
		<?php } ?>
		
		<?php if($page == "staff-calender") {?>
		 <script src='calender/lib/moment.min.js'></script>
		<script src='calender/lib/jquery.min.js'></script>
		<script src='calender/fullcalendar.min.js'></script>

		<?php } ?>
		
		<?php if($page == "staff-declaration") {?>
		<script type="text/javascript" src="../assets/clockpicker-gh-pages/dist/bootstrap-clockpicker.min.js"></script>
		<script type="text/javascript">
			$('.clockpicker').clockpicker()
					.find('input').change(function () {
				console.log(this.value);
			});
			var input = $('#single-input').clockpicker({
				placement: 'bottom',
				align: 'left',
				autoclose: true,
				'default': 'now'
			});

			$('.clockpicker-with-callbacks').clockpicker({
				donetext: 'Done',
				init: function () {
					console.log("colorpicker initiated");
				},
				beforeShow: function () {
					console.log("before show");
				},
				afterShow: function () {
					console.log("after show");
				},
				beforeHide: function () {
					console.log("before hide");
				},
				afterHide: function () {
					console.log("after hide");
				},
				beforeHourSelect: function () {
					console.log("before hour selected");
				},
				afterHourSelect: function () {
					console.log("after hour selected");
				},
				beforeDone: function () {
					console.log("before done");
				},
				afterDone: function () {
					console.log("after done");
				}
			})
					.find('input').change(function () {
				console.log(this.value);
			});

			// Manually toggle to the minutes view
			$('#check-minutes').click(function (e) {
				// Have to stop propagation here
				e.stopPropagation();
				input.clockpicker('show')
						.clockpicker('toggleView', 'minutes');
			});
			if (/mobile/i.test(navigator.userAgent)) {
				$('input').prop('readOnly', true);
			}
		</script>
		<script type="text/javascript" src="../assets/clockpicker-gh-pages/assets/js/highlight.min.js"></script>
		<script type="text/javascript">
			hljs.configure({tabReplace: '    '});
			hljs.initHighlightingOnLoad();
		</script>
		<?php } ?>
                
                

</body>

</html>