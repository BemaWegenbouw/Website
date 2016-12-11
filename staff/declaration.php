<?php
//Bema Wegenbouw BV Website
//Copyright 2016

$page = "staff-declaration";
require_once("../inc/engine.php");
include("../inc/parts/staff-header.php");
$uid = $_SESSION["uid"];
?>

<link href="../assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet">
<?php
if (isset($_POST) && !empty($_POST)) {

    $userid = $uid;
    $date = $_POST['date'];
    $start = $_POST['start_time'];
    $start_time = "$start:00";
    $end = $_POST['end_time'];
    $end_time = "$end:00";
    $break = $_POST['break'];

    $declaration->insert($userid, $date, $start_time, $end_time, $break);
} else

    ?>
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Urendeclaratie</h1>
                <div class="col-sm-4">
                    <form method="post" action="declaration.php">
                        <div class="col-sm-12 form-group">
                            datum:
                            <div class="input-group date datepicker" data-provide="datepicker">
                                <input type="date" name="date"class="form-control" placeholder="yyyy-mm-dd" required>
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 form-group">
                            begintijd:
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="text" name="start_time"class="form-control" placeholder="00:00" required >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-6 form-group">
                            eindtijd:
                            <div class="input-group clockpicker" data-autoclose="true">
                                <input type="text" name="end_time"class="form-control" placeholder="00:00" required >
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-time"></span>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-12 form-group">
                            pauze:

                            <div >
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default btn-number" type="button" data-type="minus" data-field="break" ><span class="glyphicon glyphicon-minus"></span></button>
                                    </span>
                                    <input type="text" class="form-control" name="break" value="0" min="0" max="150">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default btn-number" type="button" data-type="plus" data-field="break"><span class="glyphicon glyphicon-plus"></span></button>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12 form-group">
                            <button class="btn btn-block btn-default pull-left" type="submit" name="submit" value="Submit">verzenden</button>
                        </div>
                    </form>
                </div>

                <?php {
                    $declaration->declist();
                }
                ?>

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
    });//variabelen voor de datum kiezer
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