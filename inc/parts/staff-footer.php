  
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
        <?php } ?>

</body>

</html>