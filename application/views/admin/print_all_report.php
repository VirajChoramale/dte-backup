<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/css/select2.min.css" rel="stylesheet" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.4/js/select2.min.js"></script>
<style>
    .select2-results__option {
        padding-right: 20px;
        vertical-align: middle;
    }

    .select2-results__option:before {
        content: "";
        display: inline-block;
        position: relative;
        height: 20px;
        width: 20px;
        border: 2px solid #e9e9e9;
        border-radius: 4px;
        background-color: #fff;
        margin-right: 20px;
        vertical-align: middle;
    }

    .select2-container--default .select2-results__option[aria-selected=true]::before {
        background-color: #40a6ffe6;
    }

    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color: #eaeaeb;
        color: #272727;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__rendered input {
        margin: 2px 0;
        padding: 0px 15px 0 8px;
        min-height: 32px;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__rendered {
        margin: 0;
        padding: 0 0 0 8px;
    }

    .select2-container--default .select2-selection--multiple {
        border: 1px solid #00000029;
        box-shadow: 0 3px 6px #00000029;
        font-size: 15px;
        min-height: 40px;
        margin: 0;
        padding: 0;
    }

    .select2-container--default.select2-container--open.select2-container--below .select2-selection--multiple {
        border-radius: 4px;
    }

    .select2-container--default.select2-container--focus .select2-selection--multiple {
        border-color: #40a6ffe6;
        border-width: 2px;
    }

    .select2-container--default .select2-selection--multiple {
        border-width: 2px;
    }

    .select2-container--open .select2-dropdown--below {

        border-radius: 6px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);

    }
</style>

<div class="subContent">
    <div class="row" oncontextmenu='return false;'>
        <!-- <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="panel panel-default">
                <form name="institute_details_form" id="inst_det_form" role="form" method="post"
                    action="<?php echo base_url('print_report'); ?>" enctype="multipart/form-data">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="row">
                                    <div class="form-group col-md-12 required">
                                        <label class="control-label">Print All Regions</label>
                                    </div>
                                </div>
                                 <div class="col-lg-12 text-center">
                                     <button class="btn btn-primary text-center" type="submit" name="print all">
                                        Submit
                                    </button>
                                </div>

                            </div>


                        </div>

                    </div>
                </form>
            </div>

        </div>

        <div class="col-lg-4 col-md-4 col-sm-4">
            <div class="panel panel-default">
                <form name="institute_details_form" id="inst_det_form" role="form" method="post"
                    action="<?php echo base_url('print_report'); ?>" enctype="multipart/form-data">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="row">
                                    <div class="form-group col-md-12 required">
                                        <label class="control-label">Print By Regions</label>
                                        <input type="hidden" name="regionwise" value="regionwise">
                                        <select class="form-control" name="regions" id="regions" required>
                                            <option value="">Select</option>
                                            <?php foreach ($regiondata as $rd) { ?>
                                                <option value="<?php echo $rd['id'] ?>">
                                                    <?php echo $rd['region_name'] ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                 <div class="col-lg-12 text-center">
                                     <button class="btn btn-primary send_password text-center" type="submit"
                                        name="send_password">
                                        Submit
                                    </button>
                                </div>

                            </div>


                        </div>

                    </div>
                </form>
            </div>

        </div> -->

        <div class="col-lg-12 col-md-12 col-sm-12">

            <form name="institute_details_form" id="inst_det_form" role="form" method="post"
                action="<?php echo base_url('print_report'); ?>" enctype="multipart/form-data" target="_blank">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="row">
                                <div class="form-group col-md-12 required">
                                    <label class="control-label">Select Post</label>
                                    <input type="hidden" name="postwise" value="postwise">
                                    <select class="form-control" name="designation" id="designation" required>
                                        <option value="">Select</option>
                                        <?php foreach ($postdata as $gid) { ?>
                                            <option value="<?php echo $gid['id'] ?>">
                                                <?php echo $gid['designation'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>


                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="row">
                                <div class="form-group col-md-12 required">
                                    <label class="control-label">Select Region</label>
                                    <select class="js-select2 form-control" multiple="multiple" name="region[]">
                                        <option value="0">Select Post</option>
                                        <?php foreach ($regiondata as $rd) { ?>
                                            <option value="<?php echo $rd['id'] ?>">
                                                <?php echo $rd['region_name'] ?>
                                            </option>
                                        <?php } ?>

                                    </select>
                                    <!-- <div class="dropdown custome_dropdown">
                                        <a class="form-control" data-toggle="dropdown" href="#">
                                            Select
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-form custome_menu_form" role="menu">
                                            <li>
                                                <label class="checkbox">
                                                    <?php foreach ($regiondata as $rd) { ?>
                                                        <input type="checkbox" name="region[]"
                                                            value="<?php echo $rd['id'] ?>">
                                                        <option value="<?php echo $rd['id'] ?>">
                                                            <?php echo $rd['region_name'] ?>
                                                        </option>
                                                    <?php } ?>
                                                </label>
                                            </li>
                                        </ul>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 text-center">
                        <button class="btn btn-primary send_password text-center" type="submit" name="send_password">
                            Submit
                        </button>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>

<div class="subContent" style="margin-top:10px;">
    <div class="row" oncontextmenu='return false;'>
        <div class="col-lg-12 col-md-12 col-sm-12">

            <form name="institute_details_form" id="rpi" role="form" method="post"
                action="<?php echo base_url('print_report_new'); ?>" enctype="multipart/form-data" target="_blank">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="row">
                                <div class="form-group col-md-12 required">
                                    <label class="control-label">Select Region</label>
                                    <select class="form-control" name="region" id="region" required>
                                        <option value="">Select</option>
                                        <?php foreach ($regiondata as $rd) { ?>
                                            <option value="<?php echo $rd['id'] ?>">
                                                <?php echo $rd['region_name'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="row">
                                <div class="form-group col-md-12 required">
                                    <label class="control-label">Select Post</label>

                                    <select class="js-select2 form-control" multiple="multiple" name="designation[]">
                                        <?php foreach ($postdata as $gd) { ?>
                                            <option value="<?php echo $gd['id'] ?>">
                                                <?php echo $gd['designation'] ?>
                                            </option>
                                        <?php } ?>

                                    </select>
                                    <!-- <div class="dropdown custome_dropdown">
                                        <a class="form-control" data-toggle="dropdown" href="#" id="slu">

                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-form custome_menu_form" role="menu">
                                            <li>
                                                <label class="checkbox">
                                                    <?php foreach ($postdata as $gd) { ?>
                                                        <input type="checkbox" name="designation[]"
                                                            value="<?php echo $gd['id'] ?>"
                                                            onchange="updateSelectedDesignations(this.form)">
                                                        <option value="<?php echo $gd['id'] ?>">
                                                            <?php echo $gd['designation'] ?>
                                                        </option>
                                                    <?php } ?>
                                                </label>
                                            </li>
                                        </ul>
                                    </div> -->

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-12 text-center">
                        <button class="btn btn-primary send_password text-center" type="submit">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

<div class="subContent" style="margin-top:10px;">
    <div class="row" oncontextmenu='return false;'>
        <div class="col-lg-12 col-md-12 col-sm-12">

            <form name="institute_details_form" id="rid" role="form" method="post"
                action="<?php echo base_url('print_report_new1'); ?>" enctype="multipart/form-data" target="_blank">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="row">
                                <div class="form-group col-md-12 required">
                                    <label class="control-label">Select Region</label>
                                    <select class="form-control" name="region" id="region" required
                                        onchange="getinstbyregion(this)">
                                        <option value="">Select</option>
                                        <?php foreach ($regiondata as $rd) { ?>
                                            <option value="<?php echo $rd['id'] ?>">
                                                <?php echo $rd['region_name'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="row">
                                <div class="form-group col-md-12 required">
                                    <label class="control-label">Select Institute</label>
                                    <div class="dropdown custome_dropdown">
                                        <a class="form-control" data-toggle="dropdown" href="#" id="rid1">

                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-form custome_menu_form" role="menu">
                                            <li>
                                                <label class="checkbox" id="instdata">

                                                </label>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-12 text-center">
                        <button class="btn btn-primary send_password text-center" type="submit">
                            Submit
                        </button>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>

<div class="subContent" style="margin-top:10px;">
    <div class="row" oncontextmenu='return false;'>
        <div class="col-lg-12 col-md-12 col-sm-12">

            <form name="institute_details_form" id="rlc" role="form" method="post"
                action="<?php echo base_url('print_report_new2'); ?>" enctype="multipart/form-data" target="_blank">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <div class="row">
                                <div class="form-group col-md-12 required">
                                    <label class="control-label">Select Region</label>
                                    <select class="form-control" name="region" id="region" required
                                        onchange="getlevelbyregion(this)">
                                        <option value="">Select</option>
                                        <?php foreach ($regiondata as $rd) { ?>
                                            <option value="<?php echo $rd['id'] ?>">
                                                <?php echo $rd['region_name'] ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <div class="row">
                                <div class="form-group col-md-12 ">
                                    <label class="control-label">Select Level</label>
                                    <select class="form-control" name="level" id="level" data-reg="0" required
                                        onchange="getcoursebylevel(this)">
                                        <option value="">Select</option>

                                    </select>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <div class="row">
                                <div class="form-group col-md-12 required">
                                    <label class="control-label">Select Courses</label>

                                    <select class="js-select2 form-control" multiple="multiple" name="course[]" id="coursedata" required>
                                        

                                    </select>
                                    <!-- <div class="dropdown custome_dropdown">
                                        <a class="form-control" data-toggle="dropdown" href="#" id="rlc">

                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-form custome_menu_form" role="menu">
                                            <li>
                                                <label class="checkbox" id="coursedata">

                                                </label>
                                            </li>
                                        </ul>
                                    </div> -->

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <div class="row">
                                <div class="form-group col-md-12 required">
                                    <label class="control-label">Select Post</label>
                                    <select class="form-control" name="designation" id="designation_1" required>
                                        <option value="">Select</option>

                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-12 text-center">
                        <button class="btn btn-primary send_password text-center" type="submit">
                            Submit
                        </button>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>




<!-- ---------------------JSCode------------------------------ -->

<script>


    $(".js-select2").select2({
        closeOnSelect: false,
        placeholder: "Select ",
        allowHtml: true,
        allowClear: true,
        tags: true
    });

</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#region').multiselect();
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('#rip').addEventListener('submit', function (event) {
            var checkboxes = document.querySelectorAll('input[name="designation[]"]:checked');
            if (checkboxes.length === 0) {
                event.preventDefault();
                alert('Please select at least one option.');
            }
        });
    });
    function updateSelectedDesignations1(form) {
        var checkboxes = form.querySelectorAll('input[name="designation[]"]:checked');
        var selectedDesignationsContainer = form.querySelector('#slu1');
        checkboxes.forEach(function (checkbox) {
            selectedDesignationsContainer.innerHTML += checkbox.nextElementSibling.textContent + ', ';
        });
        selectedDesignationsContainer.innerHTML = selectedDesignationsContainer.innerHTML.slice(0, -2);
    }
</script>
<script>
    function getinstbyregion(seldata) {
        var region_id = seldata.value;
        var instdata = $("#instdata");
        instdata.empty();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('get_instnew'); ?>",
            data: { region_id: region_id },
            success: function (data) {
                //console.log(data);
                var result = JSON.parse(data);
                console.log(result);
                var cnt = result.length;
                //console.log(cnt);
                for (var i = 0; i < cnt; i++) {
                    var html = '<input type="checkbox" name="institute[]" value="' + result[i]['inst_id'] + '" onchange="updateSelectedInstitute1(this.form)">';
                    html += '<option>' + result[i]['inst_name'] + '</option>';
                    instdata.append(html);
                    //console.log(html);
                }

            }
        });
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelector('#rid').addEventListener('submit', function (event) {
            var checkboxes = document.querySelectorAll('input[name="institute[]"]:checked');
            if (checkboxes.length === 0) {
                event.preventDefault();
                alert('Please select at least one option.');
            }
        });
    });
    function updateSelectedInstitute1(form) {
        var checkboxes = form.querySelectorAll('input[name="institute[]"]:checked');
        var selectedDesignationsContainer = form.querySelector('#rid1');
        checkboxes.forEach(function (checkbox) {
            selectedDesignationsContainer.innerHTML += checkbox.nextElementSibling.textContent + ', ';
        });
        selectedDesignationsContainer.innerHTML = selectedDesignationsContainer.innerHTML.slice(0, -2);
    }
</script>
<script>
    function getlevelbyregion(seldata) {
        var region_id = seldata.value
        var leveldata = $("#level");
        var ll = leveldata.attr('data-reg', parseInt(region_id));
        leveldata.empty();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('get_level'); ?>",
            data: { region_id: region_id },
            success: function (data) {
                var result = JSON.parse(data);
                var cnt = result.length;
                var html = '<option>Select Level</option>';
                for (var i = 0; i < cnt; i++) {
                    html += '<option value="' + result[i]['course_level_id'] + '">' + result[i]['course_level_name'] + '</option>';
                    leveldata.append(html);
                }

            }
        });
    }

    function getcoursebylevel(seldata) {
        var lel_id = seldata.value;
        var region_id = $(seldata).attr("data-reg");
        var coursedata = $("#coursedata");
        coursedata.empty();
        var posr = $("#designation_1");
        posr.empty();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('get_coursnew'); ?>",
            data: { region_id: region_id, level_id: lel_id },
            success: function (data) {
                var result1 = JSON.parse(data);
                console.log(result1);
                var course = result1.regiondata
                var post = result1.postdata
                var cnt = course.length;
                var pcnt = post.length;

                for (var i = 0; i < cnt; i++) {
                   // var html = '<input type="checkbox" name="course[]" value="' + course[i]['course_id'] + '" onchange="updateSelectedcourse1(this.form)">';
                    var html = '<option value="'+course[i]['course_id']+'">' + course[i]['coursename'] + '</option>';
                    coursedata.append(html);
                }

                //var html1 = '<option>Select Post</option>';
                for (var j = 0; j < pcnt; j++) {
                    // console.log(j);
                    var dvalue = '<option value="' + post[j]['id'] + '">' + post[j]['designation'] + '</option>';
                    //console.log(dvalue);
                    posr.append(dvalue);
                }


            }
        });
    }
</script>
<!--<script>-->
<!--    document.addEventListener('DOMContentLoaded', function () {-->
<!--        document.querySelector('#rlc').addEventListener('submit', function (event) {-->
<!--            var checkboxes = document.querySelectorAll('input[name="course[]"]:checked');-->
<!--            if (checkboxes.length === 0) {-->
<!--                event.preventDefault();-->
<!--                alert('Please select at least one option.');-->
<!--            }-->
<!--        });-->
<!--    });-->
<!--    function updateSelectedcourse1(form) {-->
<!--        var checkboxes = form.querySelectorAll('input[name="course[]"]:checked');-->
<!--        var selectedDesignationsContainer = form.querySelector('#rlc');-->
<!--        checkboxes.forEach(function (checkbox) {-->
<!--            selectedDesignationsContainer.innerHTML += checkbox.nextElementSibling.textContent + ', ';-->
<!--        });-->
<!--        selectedDesignationsContainer.innerHTML = selectedDesignationsContainer.innerHTML.slice(0, -2);-->
<!--    }-->
<!--</script>-->