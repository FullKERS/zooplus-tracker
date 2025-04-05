<div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ App\Models\Statistic::projectsTotal() }}</h3>

                                <p>Projects total</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-clipboard-list fa-2x"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ App\Models\Statistic::openProjects() }}</h3>

                                <p>Open projects</p>
                            </div>
                            <div class="icon">
                                <i class="far fa-folder-open fa-2x"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ App\Models\Statistic::completedProjects() }}</h3>

                                <p>Completed projects</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-check-circle fa-2x"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-quantity">
                            <div class="inner">
                                <h3>{{ number_format(App\Models\Statistic::totalQuantityShipped(), 0, ',', ' ') }}</h3>

                                <p>Total quantity shipped</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-shipping-fast fa-2x"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                </div>