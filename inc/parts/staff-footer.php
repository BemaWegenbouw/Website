  
    </div>
    
         <!-- START ALGEMEEN -->
                <!-- jQuery -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<!-- Bootstrap Core JavaScript -->
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<!-- Metis Menu Plugin JavaScript -->
		<script src="vendor/metisMenu/metisMenu.min.js"></script>
		<!-- Morris Charts JavaScript -->
                 <!-- Custom Theme JavaScript -->
		<script src="../assets/js/sb-admin-2.js"></script>
                
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
		<script>
		$(document).ready(function() {
			$('#example').DataTable({
				responsive: true
			});
		});
		</script>
         <!-- EIND ALGEMEEN -->    
 
         <!-- START PLANNING -->
		<?php if($page == "staff-planning") {?>
                <!--Calendar scripts-->
                <script src='calendar/lib/moment.min.js'></script>               
                <script src='calendar/fullcalendar.min.js'></script>
                <script src='calendar/fullcalendar.js'></script>
                <script src='calendar/locale/nl.js'></script>
                <script>

                    $(document).ready(function () {

                        $('#calendar').fullCalendar({
                            header: {
                                left: 'prev,next today',
                                center: 'title',
                                right: 'month,agendaWeek,listMonth'
                            },
                            defaultDate: '<?php print date("Y-m-d"); ?>',
                            navLinks: true, // can click day/week names to navigate views
                            businessHours: true, // display business hours
                            editable: true,
                            events: [
                <?php
                $calendar->CalendarAllView();
                ?>]
                        });

                    });

                </script>
                 <!-- START CLOCKSCRIPT -->
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
				format: 'yyyy-mm-dd',
		//        startDate: '-3d',
				todayBtn: "linked",
				language: "nl",
				calendarWeeks: true,
				autoclose: true,
				todayHighlight: true,
				toggleActive: true
			});
		</script>
		<script>
			$('.btn-number').click(function (e) {
				e.preventDefault();

				fieldName = $(this).attr('data-field');
				type = $(this).attr('data-type');
				var input = $("input[name='" + fieldName + "']");
				var currentVal = parseInt(input.val());
				if (!isNaN(currentVal)) {
					if (type == 'minus') {

						if (currentVal > input.attr('min')) {
							input.val(currentVal - 15).change();
						}
						if (parseInt(input.val()) == input.attr('min')) {
		//                    $(this).attr('disabled', true);
						}

					} else if (type == 'plus') {

						if (currentVal < input.attr('max')) {
							input.val(currentVal + 15).change();
						}
						if (parseInt(input.val()) == input.attr('max')) {
		//                    $(this).attr('disabled', true);
						}

					}
				} else {
					input.val(0);
				}
			});
			$('.input-number').focusin(function () {
				$(this).data('oldValue', $(this).val());
			});
			$('.input-number').change(function () {

				minValue = parseInt($(this).attr('min'));
				maxValue = parseInt($(this).attr('max'));
				valueCurrent = parseInt($(this).val());

				name = $(this).attr('name');
				if (valueCurrent >= minValue) {
					$(".btn-number[data-type='minus'][data-field='" + name + "']")//.removeAttr('disabled')
				} else {
					alert('Sorry, het minimum aantal is bereikt');
					$(this).val($(this).data('minValue'));
				}
				if (valueCurrent <= maxValue) {
					$(".btn-number[data-type='plus'][data-field='" + name + "']")//.removeAttr('disabled')
				} else {
					alert('Sorry, het minimum aantal is bereikt');
					$(this).val($(this).data('maxValue'));
				}


			});
			$(".input-number").keydown(function (e) {
				// Allow: backspace, delete, tab, escape, enter and .
				if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
						// Allow: Ctrl+A
								(e.keyCode == 65 && e.ctrlKey === true) ||
								// Allow: home, end, left, right
										(e.keyCode >= 35 && e.keyCode <= 39)) {
							// let it happen, don't do anything
							return;
						}
						// Ensure that it is a number and stop the keypress
						if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
							e.preventDefault();
						}
					});
		</script>
                <!-- EINDE CLOCKSCRIPT -->
                <?php } ?>
                <!-- EIND PLANNING -->
                <!-- START DASHBOARD-->
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
				format: 'yyyy-mm-dd',
		//        startDate: '-3d',
				todayBtn: "linked",
				language: "nl",
				calendarWeeks: true,
				autoclose: true,
				todayHighlight: true,
				toggleActive: true
			});
		</script>
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
                <!--Calendar scripts-->
                <script src='calendar/lib/moment.min.js'></script>               
                <script src='calendar/fullcalendar.min.js'></script>
                <script src='calendar/fullcalendar.js'></script>
                <script src='calendar/locale/nl.js'></script>
                <script>

                    $(document).ready(function () {

                        $('#calendar').fullCalendar({
                            header: {
                                left: 'prev,next today',
                                center: 'title',
                                right: 'month,agendaWeek,agendaDay,listMonth'
                            },
                            defaultDate: '<?php print date("Y-m-d"); ?>',
                            navLinks: true, // can click day/week names to navigate views
                            businessHours: true, // display business hours
                            editable: false,
                            events: [
                <?php
                $calendar->CalendarView($uid);
                ?>]
                        });

                    });

                </script>
		<?php } ?>
		<!--  EIND DASHBOARD-->

		<!-- START BESCHIKBAARHEID -->
                <?php if($page == "staff-calendar") {?>
		<script src='calendar/lib/moment.min.js'></script>               
                <script src='calendar/fullcalendar.min.js'></script>
                <script src='calendar/fullcalendar.js'></script>
                <script src='calendar/locale/nl.js'></script>
                <script>

                    $(document).ready(function () {

                        $('#calendar').fullCalendar({
                            header: {
                                left: 'prev,next today',
                                center: 'title',
                                right: 'month,agendaWeek,agendaDay,listMonth'
                            },
                            defaultDate: '<?php print date("Y-m-d"); ?>',
                            navLinks: true, // can click day/week names to navigate views
                            businessHours: true, // display business hours
                            editable: false,
                            events: [
                <?php
                $calendar->CalendarView($uid);
                ?>]
                        });

                    });

                </script>
                
                
		<?php } ?>
                <!-- EIND BESCHIKBAARHEID -->
                
                <!-- START DECLARATION-->
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
		<script type="text/javascript" src="../assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
		<script>
			$('.datepicker').datepicker({
				format: 'yyyy-mm-dd',
		//        startDate: '-3d',
				todayBtn: "linked",
				language: "nl",
				calendarWeeks: true,
				autoclose: true,
				todayHighlight: true,
				toggleActive: true
			});
		</script>
		<script>
			$('.btn-number').click(function (e) {
				e.preventDefault();

				fieldName = $(this).attr('data-field');
				type = $(this).attr('data-type');
				var input = $("input[name='" + fieldName + "']");
				var currentVal = parseInt(input.val());
				if (!isNaN(currentVal)) {
					if (type == 'minus') {

						if (currentVal > input.attr('min')) {
							input.val(currentVal - 15).change();
						}
						if (parseInt(input.val()) == input.attr('min')) {
		//                    $(this).attr('disabled', true);
						}

					} else if (type == 'plus') {

						if (currentVal < input.attr('max')) {
							input.val(currentVal + 15).change();
						}
						if (parseInt(input.val()) == input.attr('max')) {
		//                    $(this).attr('disabled', true);
						}

					}
				} else {
					input.val(0);
				}
			});
			$('.input-number').focusin(function () {
				$(this).data('oldValue', $(this).val());
			});
			$('.input-number').change(function () {

				minValue = parseInt($(this).attr('min'));
				maxValue = parseInt($(this).attr('max'));
				valueCurrent = parseInt($(this).val());

				name = $(this).attr('name');
				if (valueCurrent >= minValue) {
					$(".btn-number[data-type='minus'][data-field='" + name + "']")//.removeAttr('disabled')
				} else {
					alert('Sorry, het minimum aantal is bereikt');
					$(this).val($(this).data('minValue'));
				}
				if (valueCurrent <= maxValue) {
					$(".btn-number[data-type='plus'][data-field='" + name + "']")//.removeAttr('disabled')
				} else {
					alert('Sorry, het minimum aantal is bereikt');
					$(this).val($(this).data('maxValue'));
				}


			});
			$(".input-number").keydown(function (e) {
				// Allow: backspace, delete, tab, escape, enter and .
				if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
						// Allow: Ctrl+A
								(e.keyCode == 65 && e.ctrlKey === true) ||
								// Allow: home, end, left, right
										(e.keyCode >= 35 && e.keyCode <= 39)) {
							// let it happen, don't do anything
							return;
						}
						// Ensure that it is a number and stop the keypress
						if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
							e.preventDefault();
						}
					});
		</script>
		<?php } ?>
                <!-- EINDE DECLARATION -->
                

</body>

</html>