    @extends('layouts.admin')

    @section('datachart')
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <div class="row justify-content-center">

                <div class="col-xl-8 col-lg-7">

                    <!-- Area Chart -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="myAreaCharts"></canvas>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
        <!-- End Page Content -->

        <!-- Script for Chart.js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

        <!-- Script to draw area chart -->
        <script>
            // Get data from PHP
            var labels = <?php echo json_encode($labels); ?>;
            var data = <?php echo json_encode($data); ?>;

            // Draw area chart
            var ctx = document.getElementById("myAreaCharts");
            var myAreaCharts = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: "Absensi",
                        lineTension: 0.3,
                        backgroundColor: "rgba(78, 115, 223, 0.05)",
                        borderColor: "rgba(78, 115, 223, 1)",
                        pointRadius: 3,
                        pointBackgroundColor: "rgba(78, 115, 223, 1)",
                        pointBorderColor: "rgba(78, 115, 223, 1)",
                        pointHoverRadius: 3,
                        pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                        pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                        pointHitRadius: 10,
                        pointBorderWidth: 2,
                        data: data,
                    }],
                },
                options: {
                    // Options for customization
                }
            });
        </script>
    @endsection