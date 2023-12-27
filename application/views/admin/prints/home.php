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
<div class="subContent" style="margin-top:10px;">
    <div class="row" oncontextmenu='return false;'>
        <div class="col-lg-12 col-md-12 col-sm-12">
            <form name="institute_details_form" id="rlc" role="form" method="post"
                action="<?php echo base_url('Report1'); ?>" enctype="multipart/form-data" target="_blank">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <div class="row">
                                <div class="form-group col-md-12 required">
                                    <label class="control-label">Select Courses</label>
                                    <select class=" form-control" name="course" id="coursedata" required onchange="getPostByCourse(this)">
                                        <option disable> Select </option>
                                        <?php foreach($course as $cur) {?>
                                        <option value="<?php echo $cur['course_id']  ?>"><?php echo $cur['coursename']  ?></option>
                                        <?php } ?>
                                    </select>
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
<script>
    function getPostByCourse(seldata) {
        var courseid = seldata.value;
        var designation = $("#designation_1");
        designation.empty();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('getPostByCourse'); ?>",
            data: { courseid: courseid },
            success: function (data) {
                //console.log(data);
                var result = JSON.parse(data);
                var cnt = result.length;
                var html = '<option value="">Select</option>';
                for (var i = 0; i < cnt; i++) {
                    html += '<option value="'+result[i]['desigation_id']+'">' + result[i]['designation'] + '</option>';
                    designation.append(html);
                }

            }
        });
    }
</script>
