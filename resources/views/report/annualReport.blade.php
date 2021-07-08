@extends('layout.master')

@section('content')

<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Annual Report</h4>
        <form method="get" action="{{ route('annual-report') }}" enctype="multipart/form-data">
            <p class="card-description text-primary">
              <i class='menu-icon mdi mdi-chart-bar'></i> Generate Monthly Fees Paid
            </p>
            <hr />
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                    <label>Year</label>
                    <select class='form-control' style='width: 100%;' name='year' required>
                        <option value=''>- choose year -</option>
                        <option value='2019'>2019</option>
                        <option value='2020'>2020</option>
                        <option value='2021'>2021</option>
                        <option value='2022'>2022</option>
                        <option value='2022'>2023</option>
                        <option value='2022'>2024</option>
                        <option value='2022'>2025</option>
                    </select>
                </div>
              </div>
            </div>
            <br />
            <button type="reset" class="btn btn-outline-dark"><i class="mdi mdi-refresh"></i> Reset</button>
            <button type="submit" name="generate" class="btn btn-primary mr-2"><i class="mdi mdi-check"></i> Generate</button>
          </form>
          <hr/>
          {{-- {{ dd($total_paid) }} --}}
            @if($total_paid >0)
                <div class='visible'>
                    <div class='container'>
                        <canvas class='col-md-6 grid-margin stretch-card' id='myChart'></canvas>
                    </div>
                    <b>Total Paid Fees for {{ $year }} are RM{{ $total_paid }}</b>
                </div>
                <div class='container-fluid w-100'>
                    <button type='submit' name='submit' class='btn btn-primary float-left mt-4'  onclick='window.print()'>
                    <i class='mdi mdi-printer mr-1'></i>Print
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
	var ctx = document.getElementById("myChart");
    var myBarChart = new Chart(ctx,
    {
		type: 'bar',
		data:
        {
			labels: ['Total Paid Fees'],
			datasets:
            [{
                label: 'Total Paid Fees for {{ $year }} RM {{$total_paid}}',
                data: [<?php echo $total_paid; ?>],
                backgroundColor: [
                    'rgba(54, 162, 235, 1)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)'
                ],
                borderWidth: 1
            }]
		},
		options:
        {
			scales:
            {
				yAxes:
                [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
			}
		}
	});
</script>
@endpush