<style>
    td {
        text-align: center;
    }

    th {
        vertical-align: middle !important;
        text-align: center;
    }

    .cntr {
        text-align: center;
    }

    .instruction {
        color: red;
    }

    .page-header {
        margin: 20px 0px 0px 0px;
    }

    .table {
        box-shadow: 0px 0px 20px 10px #e5e5e5;
        padding: 10px;
        border-radius: 10px;
        overflow-x: auto;
        overflow-y: auto;
    }

    .header {
        background-color: #4f93ce;
        color: white;
    }

    /* .sidebar{
        margin-top:100px;
        } */
        
</style>
<div class="subcontent" style="height:100vh;">
    <div class="row" oncontextmenu='return false;'>
        <div class="col-lg-12">
            <h3 class="subcontenttitle">Welcome To DTE Employee Management System</h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row" oncontextmenu='return false;'>
        <div class="col-lg-12 text-center">

            <h4></h4>


        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery-ui.js'); ?>"></script>
<script>
    $(document).ready(function () {
        //$('#permission_tbl').DataTable({ responsive: true, });
    });
</script>
<script>
    // disable right click
    $(document).keydown(function (event) {
        if (event.keyCode == 123) { // Prevent F12
            return false;
        } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
            return false;
        } else if (event.ctrlKey && event.keyCode == 85) {
            return false;
        }
    });
</script>
