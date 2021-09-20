<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->

    @include('common.style')

</head>

<body>
    <div class="container-scroller">
        <!-- partial:../../partials/_navbar.html -->

        @include('common.header')

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_settings-panel.html -->


            <!-- partial -->
            <!-- partial:../../partials/_sidebar.html -->
            @include('common.sidebar')
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">

                        <div class="col-12 grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Enter Expences</h4>
                                    <form enctype="multipart/form-data" class="form-sample" action="{{ route('admin.addexpences')}}" method="post">

                                        @csrf
                                        @if(Session::get('success'))

                                        <div class="alert alert-success">
                                            {{Session::get('success')}}

                                        </div>

                                        @endif

                                        @if(Session::get('fail'))

                                        <div class="alert alert-danger">
                                            {{Session::get('fail')}}
                                        </div>

                                        @endif

                                        <table id="wo_amt_table2" class="form" ;>

                                            <div style="float: right;">
                                                
                                            <label>Add or Remove more rows</label>
                                            &nbsp; &nbsp;
                                                <button data-toggle="tooltip" title="Add Row" type="button" value="Add Row" class="btn btn-primary btn-rounded btn-icon" onClick="addRow('wo_amt_table2')"><i class=" mdi mdi-plus "></i></button>
                                                &nbsp; &nbsp;
                                                <button data-toggle="tooltip" title="Delete Row" type="button" value="Delete Row" class="btn btn-primary btn-rounded btn-icon" onClick="deleteRow('wo_amt_table2')"><i class=" mdi mdi-minus "></i></button>


                                            </div>

                                            <br>
                                            <br>

                                            <!-- <thead>

                        <th>GST Slab</th>
                        <th>Taxable Amount</th>
                        <th>Unit</th>
                        <th>CGST</th>
                        <th>SGST</th>
                        <th>IGST</th>

                      </thead> -->

                                            <tr>
                                                <td>

                                                    <select class="form-control" name="expences[]">

                                                        <option></option>
                                                        <option value="direct">Direct Expence</option>
                                                        <option value="indirect">InDirect Expence</option>


                                                    </select>


                                                </td>

                                                

                                                <td><input placeholder="expence description" class="form-control " type="text" class="small" name="exp_des[]" style="width: 100%" onChange="calc(this.parentElement.parentElement)"></td>

                                                <td><input placeholder="expence amount" class="form-control " type="text" class="small" name="exp_amt[]" style="width: 100%" required style="border:0px"></td>

                                                <td><input placeholder="date" class="form-control " type="date" class="small" name="exp_dates[]" style="width: 100%" required style="border:0px"></td>

                                                
                                            </tr>


                                        </table>

                                        <br>
                                        <br>


                                        <br>
                                        <br>
                                        <br>

                                        <div class=text-center>
                                            <button type="submit" class="btn btn-primary btn-rounded btn-fw">Save Expences</button>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->

                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('common.script')
    <!-- End custom js for this page-->

    <!-- dynamically adding gst slab rows  -->

    <!-- new add row method -->

    <script type="text/javascript">
        window.calc = function(thisRow) {

            var one = thisRow.getElementsByTagName('select')[0].value;

            var two = thisRow.getElementsByTagName('input')[0].value;

            var gst = two * (one / 100);

            //alert(two);

            if (document.getElementById('inside').checked == true) {

                thisRow.getElementsByTagName('input')[2].value = gst / 2;
                thisRow.getElementsByTagName('input')[3].value = gst / 2;


            } else if (document.getElementById('outside').checked == true) {

                thisRow.getElementsByTagName('input')[4].value = gst.toFixed(2);

            } else {
                alert("Select State of sale first");
                thisRow.getElementsByTagName('input')[0].value = "0";
            }






        }

        window.addRow = function(tableID) {
            var table = document.getElementById(tableID);
            var rowCount = table.rows.length;
            if (rowCount < 70) { // limit the user from creating fields more than your limits
                var row = table.insertRow(rowCount);
                var colCount = table.rows[0].cells.length;
                for (var i = 0; i < colCount; i++) {
                    var newcell = row.insertCell(i);
                    newcell.innerHTML = table.rows[0].cells[i].innerHTML;

                }
            } else {
                alert("Maximum rows allowed are 70.");

            }
        }

        window.deleteRow = function(tableID) {
            try {
                var table = document.getElementById(tableID);
                var rowCount = table.rows.length;
                if (rowCount > 1) {
                    table.deleteRow(rowCount - 1);
                }

            } catch (e) {
                alert(e);
            }
        }
    </script>

    <!-- new add row method close -->

    <!-- dynamically adding gst slab rows close  -->


</body>

</html>