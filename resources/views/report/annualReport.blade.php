@extends('layout.master')

@section('content')

<script src="Chart.js/Chart.bundle.js"></script>
<style type="text/css">
	@media print
	{
		body {
			visibility: hidden;
		}
		button, a {
			display: none !important;
		}
		.noprint {
			display: none !important;
		}
		.visible {
			visibility: visible;
			position: absolute;
			top: 50px;
			left: 10px;
		}
	}
</style>

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Annual Report</h4>
            <form method="post" enctype="multipart/form-data">
            <p class="card-description text-primary">
                <i class='menu-icon mdi mdi-chart-bar'></i> Generate Annual Fees Paid
            </p>

            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                    <label>Year</label>
                    <select class='form-control' style='width: 100%;' name='year' required>
                        <option value=''>- choose year -</option>
                        <option value='2019'>2019</option>
                        <option value='2020'>2020</option>
                        <option value='2021'>2021</option>
                        <option value='2022'>2022</option>
                        <option value='2023'>2023</option>
                        <option value='2024'>2024</option>
                        <option value='2025'>2025</option>
                    </select>
                </div>
                </div>
            </div>
            <br />
                <button type="reset" class="btn btn-outline-dark"><i class="mdi mdi-refresh"></i> Reset</button>
                <button type="submit" name="generate" class="btn btn-primary mr-2"><i class="mdi mdi-check"></i> Generate</button>
            </form>
            <hr/>
            <div class='visible'>
                <div class='container'>
                    <canvas class='col-md-6 grid-margin stretch-card' id='myChart'></canvas>
                </div>

                <b>Total Paid Fees for year $year are RM$totalPaid</b>
            </div>
            <div class='container-fluid w-100'>
                <button type='submit' name='submit' class='btn btn-primary float-left mt-4'  onclick='window.print()'>
                  <i class='mdi mdi-printer mr-1'></i>Print
                </button>
            </div>
    </div>
</div>
@endsection
