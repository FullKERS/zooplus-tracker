<!DOCTYPE html>
<html lang="pl">

@include('partial.head')

<body>

    @include('partial.nav')
    <div style="">


        @include('panels.dashboard-header')

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">

                @include('panels.dashboard-top-panels')



                <div class="content-header">
                    <div class="container-fluid">

                        <div class="row mb-2">
                            <div class="col-sm-9">

                                @include('panels.dashboard-campaign-list')

                            </div><!-- /.col -->


                            <div class="col-sm-3">
                                <div class="row">
                                    <div class="card card-success">
                                        <div class="card-header">
                                            <h3 class="card-title">Bar Chart</h3>

                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart">
                                                <div class="chartjs-size-monitor">
                                                    <div class="chartjs-size-monitor-expand">
                                                        <div class=""></div>
                                                    </div>
                                                    <div class="chartjs-size-monitor-shrink">
                                                        <div class=""></div>
                                                    </div>
                                                </div>
                                                <canvas id="barChart"
                                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 875px;"
                                                    width="783" height="223" class="chartjs-render-monitor"></canvas>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="card card-danger">
                                        <div class="card-header">
                                            <h3 class="card-title">TOP 5 Krajów Wysyłki</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus"></i>
                                                </button>
                                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                    <i class="fas fa-times"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="chart">
                                                <canvas id="pieChart"
                                                    style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>





                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->

        {{-- @include('panels/map') --}}


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

    </div>
    @include('partial.footer')

    @include('partial.scripts')

</body>



</html>