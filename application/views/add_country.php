<style>
    .ksfc {
        min-height: inherit;
    }
    .select2-container{
width: 100% !important  ;

    }
    .select2-container--default .select2-selection--single{
        border: 1px solid #e2e2e2 !important;
        height: 46px  !important;
    padding: 10px !important;
    }
</style>

<!-- Container Start -->
<div class="page-wrapper">
    <div class="main-content">
        <!-- Page Title Start -->
        <div class="row">
            <div class="colxl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-title-wrapper">
                    <div class="page-title-box">
                        <!-- <h4 class="page-title bold">Countries</h4> -->
                    </div>
                    <div class="breadcrumb-list">
                        <ul>
                            <li class="breadcrumb-link">
                                <a href="<?= (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'admin') ? base_url('admin') : ((isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'agent') ? base_url('agent') : ''); ?>"><i class="fas fa-home mr-2"></i><?php echo $this->lang->line('ltr_dashboard'); ?></a>
                            </li>
                            <li class="breadcrumb-link active">Countries</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Real Estate table Start -->
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card table-card">
                    <div class="card-header pb-0">
                        <h4>Countries</h4>
                        <div class="error"></div>
                    </div>
                    <div class="card-body pb-4">
                        <div class="chart-holder">
                            <form class="separate-form formget" method="POST" action="<?= base_url('admin/update_country'); ?>">

                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="row">
                                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                            <div class="form-group ">
                                                <select name="countryId" id="" class="form-select select-2">
                                                    <option value="" selected disabled>--select a county--</option>
                                                    <?php
                                                    foreach ($countries as $country) { ?>
                                                        <option value="<?= $country['id']; ?>"><?= $country['name']; ?></option>
                                                    <?php  } ?>
                                                </select>
                                            </div>

                                        </div>
                                        <div class="form-group ">

                                        <input onchange="validateimg(this, 300, 300, '', '')" accept="image/*" name="cImg" type="file" class="form-control">
                                        </div>  <div class="form-group">
                                        <input class="btn btn-primary" type="submit" name="submit">
                                    </div>
                                    </div>
                                  
                                </div>
                            </form>



                            <table id="example" class="table table-striped table-bordered dt-responsive wrap data_table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Country Name</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($countries as $country) {
                                    ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $country['name']; ?></td>
                                            <td>
                                                <?php if ($country['image']) { ?>
                                                    <img style="width: 50px;" src="<?= base_url(); ?>uploads/countries/<?= $country['image']; ?>" alt="">
                                                <?php } else { ?>

                                                    <img style="width: 50px;" src="<?= base_url(); ?>assets/front_assets/images/No_Image_Available.jpg" alt="">

                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php
                                        $i++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $('#changeStatus').on('click', function() {

                var catIds = [];
                $('input[name="catIds"]:checked').each(function() {
                    catIds.push($(this).val());
                });
                if (catIds.length > 0) {
                    if ($('#bulk-stts-chnge').val() == 'delete') {
                        $('#confirmOk').text('Yes, delete')
                        $('#confirmModalMsg').text('Are you sure you want to deleted selected categories ?')
                    } else if ($('#bulk-stts-chnge').val() == 'inactive') {
                        $('#confirmModalMsg').text('Are you sure you want to make selected categories Inactive ?')
                        $('#confirmOk').text('Yes')
                    } else {
                        $('#confirmModalMsg').text('Are you sure you want to make selected categories Active ?')
                        $('#confirmOk').text('Yes')
                    }
                    confirmDialog("Are You sure! You want to remove?", function() {

                        $.ajax({
                            url: "<?= base_url('Admin/changeCatStatus'); ?>",
                            type: 'POST',
                            data: {
                                catIds: catIds,
                                action: $('#bulk-stts-chnge').val()
                            },
                            // dataType: 'JSON',
                            success: function(data) {
                                var data = JSON.parse(data)
                                console.log(data.msg)


                                if (data.status) {
                                    showAlert(data.msg, 'success', $('#burl').val());

                                    setTimeout(() => {
                                        window.location.reload();
                                    }, 800);
                                } else {
                                    showAlert(data.msg, 'error', $('#burl').val());
                                }
                            }
                        })

                    })

                } else {
                    showAlert('No category selected.', 'error', $('#burl').val());
                }

            })
        </script>
        <script>
            $('.select-2').select2({
                placeholder: "Select a country",
            });
        </script>

        <script>
            function validateimg(ctrl, maxWidth, maxHeight, minWidth, minHeiht) {
                var fileUpload = ctrl;
                // var regex = new RegExp("([a-zA-Z0-9s_\\.-: ])+(.jpg|.png|.gif)$");
                var regex = new RegExp("([a-zA-Z0-9\\s_\\.-:\\\\()])+(.jpg|.png|.gif)$");

                console.log(fileUpload.value.toLowerCase());
                for (var i = 0; i < fileUpload.files.length; i++) {
                    if (regex.test(fileUpload.value.toLowerCase())) {
                        if (typeof fileUpload.files != "undefined") {
                            var reader = new FileReader();
                            reader.readAsDataURL(fileUpload.files[0]);
                            reader.onload = function(e) {
                                var image = new Image();
                                image.src = e.target.result;
                                image.onload = function() {
                                    var height = this.height;
                                    var width = this.width;
                                    // console.log(height);
                                    if (minWidth == "" && minHeiht == "") {
                                        if (height != maxHeight || width != maxWidth) {
                                            swicon = "warning";
                                            msg =
                                                "Please upload  " +
                                                maxWidth +
                                                "*" +
                                                maxHeight +
                                                " photo size.";
                                            showAlert(msg, 'error', $('#burl').val());
                                            // sweetAlret(msg, swicon);
                                            $(ctrl).val("");
                                            return false;
                                        }
                                    } else {
                                        if (
                                            height > maxHeight ||
                                            width > maxWidth ||
                                            height < minHeiht ||
                                            width < minWidth
                                        ) {
                                            swicon = "warning";
                                            msg =
                                                "Please upload Max " +
                                                maxWidth +
                                                "*" +
                                                maxHeight +
                                                " & Min " +
                                                minWidth +
                                                "*" +
                                                minHeiht +
                                                " photo size.";
                                            showAlert(msg, 'error', $('#burl').val());
                                            $(ctrl).val("");
                                            return false;
                                        }
                                    }
                                };
                            };
                        } else {
                            swicon = "warning";
                            msg = "This browser does not support HTML5.";
                            showAlert(msg, 'error', $('#burl').val());
                            $(ctrl).val("");
                            return false;
                        }
                    } else {
                        swicon = "warning";
                        msg = "Please select a valid Image file.";
                        showAlert(msg, 'error', $('#burl').val());
                        $(ctrl).val("");
                        return false;
                    }
                }
            }
        </script>