<?php
$data;
//echo "<pre>";
//print_r($course_details);
//echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MSBTE</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url();?>assets/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url();?>assets/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url();?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('/');?>">Maharashtra State Board of Technical Education</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                       
                    </ul>
                </div>
                
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper" style="margin-left:0px;">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="page-header">Welcome to Approval Process Manual Portal</h3>
                </div>
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="<?php echo base_url('/')?>">Click Here To Go Back</a>
                            <center><h2><b>Syllabus</b></h2></center>
                        </div>
                        <div class="panel-body">
                        
                            <center>
                                <div class="col-lg-4"></div>
                                <div class="col-lg-4">
                                <select name="course_code" id="course_code" onchange="load_syllabus(this.value)" class='form-control '>
                                    <option value="">Please Select Course</option>
                                    <optgroup label="Group A">
                                    <?php 
                                    foreach($course_details1 as $val)
                                    {
                                        ?>
                                        <option value="<?php echo $val['course_code']; ?>"><?php echo $val['course_code'].'-'.$val['course_name']; ?></option>
                                        <?php
                                    }
                                    ?>
                                    <optgroup label="Group B">
                                        <?php 
                                    foreach($course_details2 as $val)
                                    {
                                        ?>
                                        <option value="<?php echo $val['course_code']; ?>"><?php echo $val['course_code'].'-'.$val['course_name']; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                </div>
                                
                                <div id="syllabus_file">
                                    
                                </div>
                            </center>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-4 -->

            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <script>
        
        function load_syllabus(val)
	{
		$.ajax({
            type: "POST",
            data: {course:val},
            url: "<?php echo base_url('syllabus_ajax') ?>",
            success: function(data)
            {
               
              $("#syllabus_file").html(data);
            }
            
            });
	}
    </script>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url();?>assets/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url();?>assets/dist/js/sb-admin-2.js"></script>

</body>

</html>