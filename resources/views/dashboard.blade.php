<!DOCTYPE html>
<html lang="en">

@include('partial.head')

<body>

    @include('partial.nav')
    <div style="">

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                @include('panels.dashboard-header')
                <div class="content-header">
                    <div class="container-fluid">



                        @include('panels.dashboard-top-panels')

                        <div class="row mb-2">
                            <div class="col-sm-9">

                                @include('panels.dashboard-campaign-list')

                            </div><!-- /.col -->


                            <div class="col-sm-3">

                                <div class="row">
                                    <div class="col-12">
                                    @include('panels/dashboard-calendar')     
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                    @include('panels/dashboard-countries-list') 
                                    </div>
                                        
                                </div>




                                {{-- @include('panels/dashboard-top5-countries') --}}

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