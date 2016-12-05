<?php
//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-declaration";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");
?>
<link rel="stylesheet" type="text/css" href="../assets/clockpicker-gh-pages/assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../assets/clockpicker-gh-pages/dist/bootstrap-clockpicker.min.css">
<link rel="stylesheet" type="text/css" href="../assets/clockpicker-gh-pages/assets/css/github.min.css">
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Urendeclaratie</h1>
                <div class="col-sm-4">
                    <form method="get" action="declaration.php">
                        <!--
                        datum: <input type="text" name="date" placeholder="dd-mm-jjjj" required><br>
                        pattern="[0-9.-]{3}+-[0-9.-]{3}+-[0-9]{4}"
                        -->
                        <div class="col-sm-12 form-group">
                            datum:<input class="form-control" id="date" name="date" placeholder="dd-mm-jjjj" type="text" pattern="[0-9.-]{3}+[0-9.-]{3}+[0-9]{4}" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            begintijd:
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="text" name="start_time"class="form-control" value="00:00" required>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-6 form-group">
                            eindtijd:
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="text" name="end_time"class="form-control" value="00:00" required>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-12 form-group">
                            pauze (in minuten):<input class="form-control" id="break" name="break" placeholder="(in minuten)" type="number" min="0" value="0" required>
                        </div>
                        <div class="col-sm-12 form-group">
                            <button class="btn btn-default pull-left" type="submit" name="submit" value="Submit">verzenden</button>
                        </div>
                        <!--
                                                begintijd: <input type="text" name="start_date" placeholder="00:00" required>
                                                eindtijd: <input type="text" name="end_date" placeholder="00:00" required><br>
                                                <input type="checkbox" name="break" value="false"> ik heb geen pauze gehad.<br>
                                                pauze: <input type="text" name ="break_time" placeholder="in minuten"><br>
                                                <button class="btn btn-default pull-left" type="submit" name="submit" value="Submit">verzenden</button>-->

                    </form>
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php
include("../inc/parts/staff-footer.php");
?>


<script type="text/javascript" src="../assets/clockpicker-gh-pages/assets/js/jquery.min.js"></script>
<script type="text/javascript" src="../assets/clockpicker-gh-pages/assets/js/bootstrap.min.js"></script>
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