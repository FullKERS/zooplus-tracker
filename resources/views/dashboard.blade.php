<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="search" type="application/opensearchdescription+xml"
        href="{{ config('app.seeddms_url') }}www/out/out.OpensearchDesc.php" title="SeedDMS" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="{{ config('app.seeddms_url') }}www/views/bootstrap4/styles/seeddms.css">
    <link rel="stylesheet"
        href="{{ config('app.seeddms_url') }}www/views/bootstrap4/vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet"
        href="{{ config('app.seeddms_url') }}www/views/bootstrap4/vendors/bootstrap-datepicker/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{ config('app.seeddms_url') }}www/styles/bootstrap/chosen/css/chosen.css">
    <link rel="stylesheet"
        href="{{ config('app.seeddms_url') }}www/views/bootstrap4/vendors/select2/css/select2.min.css">
    <link rel="stylesheet"
        href="{{ config('app.seeddms_url') }}www/views/bootstrap4/vendors/select2-bootstrap4-theme/select2-bootstrap4.min.css">
    <link rel="stylesheet" href="{{ config('app.seeddms_url') }}www/views/bootstrap4/vendors/jqtree/jqtree.css">
    <link rel="stylesheet" href="{{ config('app.seeddms_url') }}www/views/bootstrap4/styles/application.css">
    <link rel="stylesheet" href="{{ config('app.seeddms_url') }}www/views/bootstrap4/styles/styles.css">

    <script src="{{ config('app.seeddms_url') }}www/views/bootstrap4/vendors/jquery/jquery.min.js"></script>
    <script src="{{ config('app.seeddms_url') }}www/styles/bootstrap/passwordstrength/jquery.passwordstrength.js">
    </script>
    <script src="{{ config('app.seeddms_url') }}www/views/bootstrap4/vendors/noty/jquery.noty.js"></script>
    <script src="{{ config('app.seeddms_url') }}www/views/bootstrap4/vendors/noty/layouts/topRight.js"></script>
    <script src="{{ config('app.seeddms_url') }}www/views/bootstrap4/vendors/noty/layouts/topCenter.js"></script>
    <script src="{{ config('app.seeddms_url') }}www/views/bootstrap4/vendors/noty/themes/default.js"></script>
    <script src="{{ config('app.seeddms_url') }}www/views/bootstrap4/vendors/jqtree/tree.jquery.js"></script>
    <script src="{{ config('app.seeddms_url') }}www/views/bootstrap4/vendors/bootbox/bootbox.min.js"></script>
    <script src="{{ config('app.seeddms_url') }}www/views/bootstrap4/vendors/bootbox/bootbox.locales.min.js"></script>
    <script src="{{ config('app.seeddms_url') }}www/views/bootstrap4/vendors/popper/popper.min.js"></script>
    <script src="{{ config('app.seeddms_url') }}www/views/bootstrap4/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="{{ config('app.seeddms_url') }}www/styles/bootstrap/bootstrap/js/bootstrap-typeahead.js"></script>
    <script
        src="{{ config('app.seeddms_url') }}www/views/bootstrap4/vendors/bootstrap-datepicker/js/bootstrap-datepicker.js">
    </script>

    <link rel="stylesheet" href="{{ asset('css/zooplus.css') }}">
    <script src="{{ asset('js/zooplus.js') }}"></script>
    <script src="https://kit.fontawesome.com/dc014db90e.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Knob/1.2.13/jquery.knob.min.js"></script>




    <!-- Pliki językowe dla datepickera -->
    @foreach(['de', 'es', 'ar', 'el', 'bg', 'ru', 'hr', 'hu', 'ko', 'pl', 'ro', 'sk', 'tr', 'uk', 'ca', 'nl', 'fi',
    'cs', 'it', 'fr', 'sv', 'sl', 'pt-BR', 'zh-CN', 'zh-TW'] as $lang)
    <script
        src="{{ config('app.seeddms_url') }}www/views/bootstrap4/vendors/bootstrap-datepicker/locales/bootstrap-datepicker.{{ $lang }}.min.js">
    </script>
    @endforeach

    <script src="{{ config('app.seeddms_url') }}www/styles/bootstrap/chosen/js/chosen.jquery.min.js"></script>
    <script src="{{ config('app.seeddms_url') }}www/views/bootstrap4/vendors/select2/js/select2.min.js"></script>
    <script src="{{ config('app.seeddms_url') }}www/out/out.ViewFolder.php?action=webrootjs"></script>
    <script src="{{ config('app.seeddms_url') }}www/views/bootstrap4/styles/application.js"></script>
    <script src="{{ config('app.seeddms_url') }}www/out/out.ViewFolder.php?action=js"></script>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.1/dist/js/adminlte.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



    <link rel="icon" href="{{ config('app.seeddms_url') }}www/views/bootstrap4/images/favicon.svg"
        type="image/svg+xml" />
    <link rel="apple-touch-icon" sizes="180x180"
        href="{{ config('app.seeddms_url') }}www/views/bootstrap4/images/apple-touch-icon.png">
    <title>SeedDMS: Folder &#039;DMS&#039;</title>

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom fixed-top">
        <a class="navbar-brand" href="{{ config('app.seeddms_url') }}/www/out/out.ViewFolder.php"><img id="navbar-logo"
                src="{{ config('app.seeddms_url') }}www/views/bootstrap4/images/seeddms-logo.svg"> <span
                class="d-none d-md-inline-block ml-4">SeedDMS</span></a>
        <form action="{{ config('app.seeddms_url') }}/www/out/out.Search.php" class="form-inline ml-4 mr-auto"
            autocomplete="off"> <input type="hidden" name="folderid" value="1" /> <input type="hidden" name="navBar"
                value="1" /> <input name="query" class="form-control mr-sm-2 search-query" id="searchfield"
                data-provide="typeahead" type="search" style="width: 150px;" placeholder="Search" aria-label="Search" />
        </form>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMain"
            aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link"
                        href="http://192.168.1.105/tracker/login/42861f23b1b05a47a60338826a172759">Tracking</a></li>
                <li class="nav-item"><a class="nav-link"
                        href="{{ config('app.seeddms_url') }}/www/out/out.Calendar.php?mode=y">Calendar</a></li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbarMainUser"
                        aria-haspopup="true" aria-expanded="false">Signed in as '{{ $user->fullName }}'</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarMainUser">
                        <a class="dropdown-item"
                            href="{{ config('app.seeddms_url') }}/www/out/out.Dashboard.php">Dashboard</a>
                        <a class="dropdown-item"
                            href="{{ config('app.seeddms_url') }}/www/out/out.MyDocuments.php?inProcess=1">My
                            Documents</a>
                        <a class="dropdown-item" href="{{ config('app.seeddms_url') }}/www/out/out.MyAccount.php">My
                            Account</a>
                        <a class="dropdown-item"
                            href="{{ config('app.seeddms_url') }}/www/out/out.TransmittalMgr.php">My
                            Transmittals</a>
                        <div class="dropdown-divider"></div>
                        <div class="dropdown-submenu">
                            <a href="#" class="dropdown-item dropdown-toggle" data-toggle="dropdown">Language</a>
                            <div class="dropdown-menu dropdown-submenu-left">
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=ar_EG&referer={{ config('app.seeddms_url') }}/www/out/out.ViewFolder.php">Arabic</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=bg_BG&referer={{ config('app.seeddms_url') }}/www/out/out.ViewFolder.php">Bulgarian</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=ca_ES&referer={{ config('app.seeddms_url') }}/www/out/out.ViewFolder.php">Catalan</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=cs_CZ&referer={{ config('app.seeddms_url') }}/www/out/out.ViewFolder.php">Czech</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=de_DE&referer={{ config('app.seeddms_url') }}/www/out/out.ViewFolder.php">German</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=el_GR&referer={{ config('app.seeddms_url') }}/www/out/out.ViewFolder.php">Greek</a>
                                <a class="dropdown-item active"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=en_GB&referer={{ config('app.seeddms_url') }}/www/out/out.ViewFolder.php">English
                                    (GB)</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=es_ES&referer={{ config('app.seeddms_url') }}/www/out/out.ViewFolder.php">Spanish</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=fr_FR&referer={{ config('app.seeddms_url') }}/www/out/out.ViewFolder.php">French</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=hr_HR&referer={{ config('app.seeddms_url') }}/www/out/out.ViewFolder.php">Croatian</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=hu_HU&referer={{ config('app.seeddms_url') }}/www/out/out.ViewFolder.php">Hungarian</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=id_ID&referer={{ config('app.seeddms_url') }}/www/out/out.ViewFolder.php">Indonesian</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=it_IT&referer={{ config('app.seeddms_url') }}/www/out/out.ViewFolder.php">Italian</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=ko_KR&referer={{ config('app.seeddms_url') }}/www/out/out.ViewFolder.php">Korean</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=lo_LA&referer={{ config('app.seeddms_url') }}/www/out/out.ViewFolder.php">Laotian</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=nb_NO&referer={{ config('app.seeddms_url') }}/www/out/out.ViewFolder.php">Norwegian
                                    (Bokmål)</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=nl_NL&referer={{ config('app.seeddms_url') }}/www/out/out.ViewFolder.php">Dutch</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=pl_PL&referer={{ config('app.seeddms_url') }}/www/out/out.ViewFolder.php">Polish</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=pt_BR&referer={{ config('app.seeddms_url') }}/www/out/out.ViewFolder.php">Portugese
                                    (BR)</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=ro_RO&referer={{ config('app.seeddms_url') }}/www/out/out.ViewFolder.php">Romanian</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=ru_RU&referer={{ config('app.seeddms_url') }}/www/out/out.ViewFolder.php">Russian</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=sk_SK&referer={{ config('app.seeddms_url') }}/www/out/out.ViewFolder.php">Slovak</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=sv_SE&referer={{ config('app.seeddms_url') }}/www/out/out.ViewFolder.php">Swedish</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=tr_TR&referer={{ config('app.seeddms_url') }}/www/out/out.ViewFolder.php">Turkish</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=uk_UA&referer={{ config('app.seeddms_url') }}/www/out/out.ViewFolder.php">Ukrainian</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=zh_CN&referer={{ config('app.seeddms_url') }}/www/out/out.ViewFolder.php">Chinese
                                    (CN)</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=zh_TW&referer={{ config('app.seeddms_url') }}/www/out/out.ViewFolder.php">Chinese
                                    (TW)</a>
                            </div>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item"
                            href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.Logout.php">Sign out</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div style="">


        <!-- Content Wrapper. Contains page content -->

        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">ZooPlus Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Starter Page</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->



        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>150</h3>

                                <p>New Orders</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>53<sup style="font-size: 20px">%</sup></h3>

                                <p>Bounce Rate</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>44</h3>

                                <p>User Registrations</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>44</h3>

                                <p>User Registrations</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>



                <div class="content-header">
                    <div class="container-fluid">

                        <div class="row mb-2">
                            <div class="col-sm-9">

                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Lista kampanii</h3>


                                    </div>
                                    <div class="card-body">

                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th><i class="fa-solid fa-envelope"></i> Nazwa Kampanii</th>
                                                    <th><i class="fa-solid fa-bars-staggered"></i> Numer Zlecenia</th>
                                                    <th><i class="fa-solid fa-calendar-days"></i> Data Przyjęcia</th>
                                                    <th><i class="fa-solid fa-calendar-days"></i> Data Zakończenia</th>
                                                    <th><i class="fa-solid fa-percent"></i> Postęp</th>
                                                    <th><i class="fa-solid fa-copy"></i> Ilość Wersji</th>
                                                    <th><i class="fa-solid fa-clipboard-question"></i> Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach($campaignes as $campaign)
                                                <tr data-widget="expandable-table" aria-expanded="false">
                                                    <td><i class="icon-campaigne fa-solid fa-folder-plus"></i>
                                                        {{ $campaign->campaign_name }}
                                                    </td>
                                                    <td>{{ $campaign->orderNumbers }}</td>
                                                    <td>01.01.2024</td>
                                                    <td>15.01.2024</td>
                                                    <td>
                                                        <div class="progress progress-xs">
                                                            <div class="pprogress-bar bg-success" style="width: 80%">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $campaign->subcampaignsCount }}</td>
                                                    <td><span class="badge badge-warning">W trakcie</span></td>
                                                </tr>
                                                <tr class="expandable-body">
                                                    <td colspan="7">
                                                        <table
                                                            class="table table-bordered table-hover sub-campaign-table">
                                                            <thead>
                                                                <tr>
                                                                    <th><i class="fa-solid fa-envelope"></i> Nazwa
                                                                        Podkampanii
                                                                    </th>
                                                                    <th><i class="fa-solid fa-bars-staggered"></i> Numer
                                                                        Zlecenia</th>
                                                                    <th><i class="fa-solid fa-copy"></i> Nakład</th>
                                                                    <th><i class="fa-solid fa-clipboard-question"></i>
                                                                        Status
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($campaign->subcampaigns as $subcampaign)
                                                                <tr data-widget="expandable-table"
                                                                    aria-expanded="false">
                                                                    <td>
                                                                        @if(isset($subcampaign->country->flag_image))
                                                                        {{ $subcampaign->country->flag_image }}
                                                                        @endif
                                                                        {{ $subcampaign->subcampaign_name }}
                                                                    </td>
                                                                    <td>{{ $subcampaign->order_number }}</td>
                                                                    <td>5000</td>
                                                                    <td><span class="badge badge-warning">W
                                                                            trakcie</span></td>
                                                                </tr>
                                                                <tr class="expandable-body">
                                                                    <td colspan="5">

                                                                        <div class="subcampaign-details">
                                                                            <div class="subcampaign-info">
                                                                                <p><strong>Nakład:</strong> 10 000
                                                                                    egzemplarzy
                                                                                </p>
                                                                            </div>

                                                                            <div class="line_box timeline_process"
                                                                                style="margin: 40px 0;">
                                                                                <div class="text_circle done">
                                                                                    <div class="circle">
                                                                                        <h4>Przyjęcie zlecenia</h4>
                                                                                        <p>01. 11. 2024</p>
                                                                                    </div>
                                                                                    <a href="javascript:void(0)"
                                                                                        class="tvar"><span
                                                                                            data-toggle="popover"
                                                                                            title="Info"
                                                                                            data-trigger="hover"
                                                                                            data-placement="top"
                                                                                            data-content="Proces przyjęcia zlecenia.">i</span></a>
                                                                                </div>
                                                                                <div class="text_circle done">
                                                                                    <div class="circle">
                                                                                        <h4>Akceptacja plików</h4>
                                                                                        <p>05. 11. 2024</p>
                                                                                    </div>
                                                                                    <a href="javascript:void(0)"
                                                                                        class="tvar"><span
                                                                                            data-toggle="popover"
                                                                                            title="Info"
                                                                                            data-trigger="hover"
                                                                                            data-placement="top"
                                                                                            data-content="Weryfikacja i akceptacja przesłanych plików.">i</span></a>
                                                                                </div>
                                                                                <div class="text_circle done">
                                                                                    <div class="circle">
                                                                                        <h4>Druk</h4>
                                                                                        <p>10. 11. 2024</p>
                                                                                    </div>
                                                                                    <a href="javascript:void(0)"
                                                                                        class="tvar"><span
                                                                                            data-toggle="popover"
                                                                                            title="Info"
                                                                                            data-trigger="hover"
                                                                                            data-placement="top"
                                                                                            data-content="Rozpoczęcie procesu drukowania.">i</span></a>
                                                                                </div>
                                                                                <div class="text_circle done">
                                                                                    <div class="circle">
                                                                                        <h4>Personalizacja</h4>
                                                                                        <p>15. 11. 2024</p>
                                                                                    </div>
                                                                                    <a href="javascript:void(0)"
                                                                                        class="tvar"><span
                                                                                            data-toggle="popover"
                                                                                            title="Info"
                                                                                            data-trigger="hover"
                                                                                            data-placement="top"
                                                                                            data-content="Dodawanie personalizacji.">i</span></a>
                                                                                </div>
                                                                                <div class="text_circle">
                                                                                    <div class="circle">
                                                                                        <h4>Introligatornia</h4>
                                                                                        <p>20. 11. 2024</p>
                                                                                    </div>
                                                                                    <a href="javascript:void(0)"
                                                                                        class="tvar"><span
                                                                                            data-toggle="popover"
                                                                                            title="Info"
                                                                                            data-trigger="hover"
                                                                                            data-placement="top"
                                                                                            data-content="Proces introligatorski.">i</span></a>
                                                                                </div>
                                                                                <div class="text_circle">
                                                                                    <div class="circle">
                                                                                        <h4>Wysyłka na pocztę</h4>
                                                                                        <p>25. 11. 2024</p>
                                                                                    </div>
                                                                                    <a href="javascript:void(0)"
                                                                                        class="tvar"><span
                                                                                            data-toggle="popover"
                                                                                            title="Info"
                                                                                            data-trigger="hover"
                                                                                            data-placement="top"
                                                                                            data-content="Przekazanie przesyłek na pocztę.">i</span></a>
                                                                                </div>
                                                                                <div class="text_circle">
                                                                                    <div class="circle">
                                                                                        <h4>Dystrybucja</h4>
                                                                                        <p>30. 11. 2024</p>
                                                                                    </div>
                                                                                    <a href="javascript:void(0)"
                                                                                        class="tvar"><span
                                                                                            data-toggle="popover"
                                                                                            title="Info"
                                                                                            data-trigger="hover"
                                                                                            data-placement="top"
                                                                                            data-content="Ostateczna dystrybucja przesyłek.">i</span></a>
                                                                                </div>
                                                                            </div>

                                                                            <script>
                                                                            $(function() {
                                                                                $('[data-toggle="popover"]')
                                                                                    .popover();
                                                                            });
                                                                            </script>




                                                                            <div class="subcampaign-links">
                                                                                <button class="btn btn-primary"><i
                                                                                        class="fa-solid fa-file"></i>
                                                                                    Pliki kampanii</button>
                                                                                <button class="btn btn-secondary"><i
                                                                                        class="fa-solid fa-check"></i>
                                                                                    Potwierdzenie
                                                                                    nadania</button>
                                                                            </div>
                                                                        </div>

                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                @endforeach

                                                <tr data-widget="expandable-table" aria-expanded="false">
                                                    <td><i class="icon-campaigne fa-solid fa-folder-plus"></i>
                                                        Calendar+coupons
                                                        2025</td>
                                                    <td>001</td>
                                                    <td>01.01.2024</td>
                                                    <td>15.01.2024</td>
                                                    <td>
                                                        <div class="progress progress-xs">
                                                            <div class="pprogress-bar bg-success" style="width: 80%">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>10</td>
                                                    <td><span class="badge badge-warning">W trakcie</span></td>
                                                </tr>
                                                <tr class="expandable-body">
                                                    <td colspan="7">
                                                        <table
                                                            class="table table-bordered table-hover sub-campaign-table">
                                                            <thead>
                                                                <tr>
                                                                    <th><i class="fa-solid fa-envelope"></i> Nazwa
                                                                        Podkampanii
                                                                    </th>
                                                                    <th><i class="fa-solid fa-bars-staggered"></i> Numer
                                                                        Zlecenia</th>
                                                                    <th><i class="fa-solid fa-copy"></i> Nakład</th>
                                                                    <th><i class="fa-solid fa-clipboard-question"></i>
                                                                        Status
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr data-widget="expandable-table"
                                                                    aria-expanded="false">
                                                                    <td><i
                                                                            class="icon-campaigne fa-solid fa-folder-plus"></i>
                                                                        <img src="https://flagcdn.com/w40/pl.png"
                                                                            alt="Polska" class="flag-icon" />
                                                                        Podkampania 1
                                                                    </td>
                                                                    <td>101</td>
                                                                    <td>5000</td>
                                                                    <td><span class="badge badge-warning">W
                                                                            trakcie</span></td>
                                                                </tr>
                                                                <tr class="expandable-body">
                                                                    <td colspan="5">

                                                                        <div class="subcampaign-details">
                                                                            <div class="subcampaign-info">
                                                                                <p><strong>Nakład:</strong> 10 000
                                                                                    egzemplarzy
                                                                                </p>
                                                                            </div>

                                                                            <div class="line_box timeline_process"
                                                                                style="margin: 40px 0;">
                                                                                <div class="text_circle done">
                                                                                    <div class="circle">
                                                                                        <h4>Przyjęcie zlecenia</h4>
                                                                                        <p>01. 11. 2024</p>
                                                                                    </div>
                                                                                    <a href="javascript:void(0)"
                                                                                        class="tvar"><span
                                                                                            data-toggle="popover"
                                                                                            title="Info"
                                                                                            data-trigger="hover"
                                                                                            data-placement="top"
                                                                                            data-content="Proces przyjęcia zlecenia.">i</span></a>
                                                                                </div>
                                                                                <div class="text_circle done">
                                                                                    <div class="circle">
                                                                                        <h4>Akceptacja plików</h4>
                                                                                        <p>05. 11. 2024</p>
                                                                                    </div>
                                                                                    <a href="javascript:void(0)"
                                                                                        class="tvar"><span
                                                                                            data-toggle="popover"
                                                                                            title="Info"
                                                                                            data-trigger="hover"
                                                                                            data-placement="top"
                                                                                            data-content="Weryfikacja i akceptacja przesłanych plików.">i</span></a>
                                                                                </div>
                                                                                <div class="text_circle done">
                                                                                    <div class="circle">
                                                                                        <h4>Druk</h4>
                                                                                        <p>10. 11. 2024</p>
                                                                                    </div>
                                                                                    <a href="javascript:void(0)"
                                                                                        class="tvar"><span
                                                                                            data-toggle="popover"
                                                                                            title="Info"
                                                                                            data-trigger="hover"
                                                                                            data-placement="top"
                                                                                            data-content="Rozpoczęcie procesu drukowania.">i</span></a>
                                                                                </div>
                                                                                <div class="text_circle done">
                                                                                    <div class="circle">
                                                                                        <h4>Personalizacja</h4>
                                                                                        <p>15. 11. 2024</p>
                                                                                    </div>
                                                                                    <a href="javascript:void(0)"
                                                                                        class="tvar"><span
                                                                                            data-toggle="popover"
                                                                                            title="Info"
                                                                                            data-trigger="hover"
                                                                                            data-placement="top"
                                                                                            data-content="Dodawanie personalizacji.">i</span></a>
                                                                                </div>
                                                                                <div class="text_circle">
                                                                                    <div class="circle">
                                                                                        <h4>Introligatornia</h4>
                                                                                        <p>20. 11. 2024</p>
                                                                                    </div>
                                                                                    <a href="javascript:void(0)"
                                                                                        class="tvar"><span
                                                                                            data-toggle="popover"
                                                                                            title="Info"
                                                                                            data-trigger="hover"
                                                                                            data-placement="top"
                                                                                            data-content="Proces introligatorski.">i</span></a>
                                                                                </div>
                                                                                <div class="text_circle">
                                                                                    <div class="circle">
                                                                                        <h4>Wysyłka na pocztę</h4>
                                                                                        <p>25. 11. 2024</p>
                                                                                    </div>
                                                                                    <a href="javascript:void(0)"
                                                                                        class="tvar"><span
                                                                                            data-toggle="popover"
                                                                                            title="Info"
                                                                                            data-trigger="hover"
                                                                                            data-placement="top"
                                                                                            data-content="Przekazanie przesyłek na pocztę.">i</span></a>
                                                                                </div>
                                                                                <div class="text_circle">
                                                                                    <div class="circle">
                                                                                        <h4>Dystrybucja</h4>
                                                                                        <p>30. 11. 2024</p>
                                                                                    </div>
                                                                                    <a href="javascript:void(0)"
                                                                                        class="tvar"><span
                                                                                            data-toggle="popover"
                                                                                            title="Info"
                                                                                            data-trigger="hover"
                                                                                            data-placement="top"
                                                                                            data-content="Ostateczna dystrybucja przesyłek.">i</span></a>
                                                                                </div>
                                                                            </div>

                                                                            <script>
                                                                            $(function() {
                                                                                $('[data-toggle="popover"]')
                                                                                    .popover();
                                                                            });
                                                                            </script>




                                                                            <div class="subcampaign-links">
                                                                                <button class="btn btn-primary"><i
                                                                                        class="fa-solid fa-file"></i>
                                                                                    Pliki kampanii</button>
                                                                                <button class="btn btn-secondary"><i
                                                                                        class="fa-solid fa-check"></i>
                                                                                    Potwierdzenie
                                                                                    nadania</button>
                                                                            </div>
                                                                        </div>

                                                                    </td>
                                                                </tr>
                                                                <tr data-widget="expandable-table"
                                                                    aria-expanded="false">

                                                                    <td><i
                                                                            class="icon-campaigne fa-solid fa-folder-plus"></i>
                                                                        <img src="https://flagcdn.com/w40/de.png"
                                                                            alt="Polska" class="flag-icon" />
                                                                        Podkampania 2
                                                                    </td>
                                                                    <td>102</td>
                                                                    <td>3000</td>
                                                                    <td><span
                                                                            class="badge badge-success">Zakończona</span>
                                                                    </td>
                                                                </tr>
                                                                <tr class="expandable-body">
                                                                    <td colspan="5">
                                                                        <p>Szczegóły podkampanii 2...</p>
                                                                    </td>
                                                                </tr>
                                                                <tr data-widget="expandable-table"
                                                                    aria-expanded="false">
                                                                    <td><i
                                                                            class="icon-campaigne fa-solid fa-folder-plus"></i>
                                                                        <img src="https://flagcdn.com/w40/cz.png"
                                                                            alt="Polska" class="flag-icon" />
                                                                        Podkampania 3
                                                                    </td>
                                                                    <td>103</td>
                                                                    <td>4000</td>
                                                                    <td><span
                                                                            class="badge badge-danger">Oczekująca</span>
                                                                    </td>
                                                                </tr>
                                                                <tr class="expandable-body">
                                                                    <td colspan="5">
                                                                        <p>Szczegóły podkampanii 3...</p>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><i class="icon-campaigne fa-solid fa-folder-plus"></i> FSC
                                                        Broszura A5 -
                                                        PIES - 22
                                                        wersje</td>
                                                    <td>002</td>
                                                    <td>05.01.2024</td>
                                                    <td>20.01.2024</td>
                                                    <td>
                                                        <div class="progress progress-xs">
                                                            <div class="pprogress-bar bg-success" style="width: 20%">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>22</td>
                                                    <td><span class="badge badge-success">Zakończone</span></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="icon-campaigne fa-solid fa-folder-plus"></i> FSC
                                                        Broszura A5 -
                                                        KOT - 22 wersje
                                                    </td>
                                                    <td>003</td>
                                                    <td>06.01.2024</td>
                                                    <td>22.01.2024</td>
                                                    <td>
                                                        <div class="progress progress-xs">
                                                            <div class="pprogress-bar bg-success" style="width: 90%">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>22</td>
                                                    <td><span class="badge badge-success">Zakończone</span></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="icon-campaigne fa-solid fa-folder-plus"></i> STR
                                                        Selfmailer
                                                        reaktywacyjny
                                                        210x297mm luty
                                                        2025</td>
                                                    <td>004</td>
                                                    <td>10.01.2024</td>
                                                    <td>28.01.2024</td>
                                                    <td>
                                                        <div class="progress progress-xs">
                                                            <div class="pprogress-bar bg-success" style="width: 60%">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>15</td>
                                                    <td><span class="badge badge-warning">W trakcie</span></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="icon-campaigne fa-solid fa-folder-plus"></i> Broszura
                                                        A5 -
                                                        PIES - 22 wersje
                                                    </td>
                                                    <td>005</td>
                                                    <td>12.01.2024</td>
                                                    <td>30.01.2024</td>
                                                    <td>
                                                        <div class="progress progress-xs">
                                                            <div class="pprogress-bar bg-success" style="width: 70%">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>22</td>
                                                    <td><span class="badge badge-warning">W trakcie</span></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="icon-campaigne fa-solid fa-folder-plus"></i> Broszura
                                                        A5 - KOT
                                                        - 22 wersje
                                                    </td>
                                                    <td>006</td>
                                                    <td>15.01.2024</td>
                                                    <td>05.02.2024</td>
                                                    <td>
                                                        <div class="progress progress-xs">
                                                            <div class="pprogress-bar bg-success" style="width: 30%">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>22</td>
                                                    <td><span class="badge badge-warning">W trakcie</span></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="icon-campaigne fa-solid fa-folder-plus"></i>
                                                        Selfmailer
                                                        zooplus PL i CZ</td>
                                                    <td>007</td>
                                                    <td>18.01.2024</td>
                                                    <td>08.02.2024</td>
                                                    <td>
                                                        <div class="progress progress-xs">
                                                            <div class="pprogress-bar bg-success" style="width: 80%">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>5</td>
                                                    <td><span class="badge badge-success">Zakończone</span></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="icon-campaigne fa-solid fa-folder-plus"></i> Ulotka
                                                        zapachowa
                                                        Febreze_TEST
                                                    </td>
                                                    <td>008</td>
                                                    <td>20.01.2024</td>
                                                    <td>10.02.2024</td>
                                                    <td>
                                                        <div class="progress progress-xs">
                                                            <div class="pprogress-bar bg-success" style="width: 30%">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>3</td>
                                                    <td><span class="badge badge-warning">W trakcie</span></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="icon-campaigne fa-solid fa-folder-plus"></i>
                                                        Selfmailer
                                                        Reactivation - format
                                                        210x297mm</td>
                                                    <td>009</td>
                                                    <td>22.01.2024</td>
                                                    <td>15.02.2024</td>
                                                    <td>
                                                        <div class="progress progress-xs">
                                                            <div class="pprogress-bar bg-success" style="width: 40%">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>6</td>
                                                    <td><span class="badge badge-warning">W trakcie</span></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="icon-campaigne fa-solid fa-folder-plus"></i>
                                                        Selfmailer
                                                        Reactivation - format
                                                        230x297mm</td>
                                                    <td>010</td>
                                                    <td>25.01.2024</td>
                                                    <td>18.02.2024</td>
                                                    <td>
                                                        <div class="progress progress-xs">
                                                            <div class="pprogress-bar bg-success" style="width: 20%">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>4</td>
                                                    <td><span class="badge badge-warning">W trakcie</span></td>
                                                </tr>
                                                <tr>
                                                    <td><i class="icon-campaigne fa-solid fa-folder-plus"></i>
                                                        Selfmailer
                                                        Reactivation - format
                                                        210x297mm</td>
                                                    <td>011</td>
                                                    <td>28.01.2024</td>
                                                    <td>20.02.2024</td>
                                                    <td>
                                                        <div class="progress progress-xs">
                                                            <div class="pprogress-bar bg-success" style="width: 55%">
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>6</td>
                                                    <td><span class="badge badge-danger">Oczekujące</span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

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

        <h2>Map</h2>

        <div class="map-container">
            <svg viewBox="0 0 1000 800">

                <!-- Definicja strzałek -->
                <defs>
                    <marker id="arrow" markerWidth="10" markerHeight="10" refX="10" refY="3" orient="auto"
                        markerUnits="strokeWidth">
                        <path d="M0,0 L0,6 L9,3 z" fill="red" />
                    </marker>
                </defs>

                <!-- Mapa Europy -->
                <image href="https://pl.m.wikipedia.org/wiki/Plik:Blank_map_of_Europe.svg" width="1000" height="800" />

                <!-- Punkt startowy: Dębica -->
                <circle cx="540" cy="410" r="5" fill="red" />
                <text x="550" y="405">Dębica</text>

                <!-- Linie do różnych miast -->
                <line x1="540" y1="410" x2="450" y2="600" />
                <text x="470" y="590">Kampania 1</text>

                <line x1="540" y1="410" x2="700" y2="450" />
                <text x="680" y="440">Kampania 2</text>

                <line x1="540" y1="410" x2="500" y2="320" />
                <text x="510" y="310">Kampania 3</text>

            </svg>
        </div>


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
    <footer class="footer border-top">
        <div class="container">
            <div class="disclaimer">This is a classified area. Access is permitted only to authorized personnel. Any
                violation
                will be prosecuted according to the national and international laws.</div>
            <div class="footNote">SeedDMS free document management system - www.seeddms.org</div>
        </div>
    </footer>

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Pobranie ostatnich 6 miesięcy
        const months = [];
        const today = new Date();
        for (let i = 5; i >= 0; i--) {
            const date = new Date(today.getFullYear(), today.getMonth() - i, 1);
            months.push(date.toLocaleString('pl-PL', {
                month: 'long'
            })); // Nazwy miesięcy w języku polskim
        }

        // Dane dla nakładu zamówionego i wysłanego
        const dataOrdered = [120, 150, 180, 200, 170, 190]; // Nakład zamówiony
        const dataSent = [100, 130, 160, 190, 150, 180]; // Nakład wysłany

        // Pobranie kontekstu canvas
        const ctx = document.getElementById('barChart').getContext('2d');

        // Tworzenie wykresu
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: months, // Ostatnie 6 miesięcy
                datasets: [{
                        label: 'Nakład Zamówiony',
                        backgroundColor: 'rgba(54, 162, 235, 0.6)', // Niebieski
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1,
                        data: dataOrdered
                    },
                    {
                        label: 'Nakład Wysłany',
                        backgroundColor: 'rgba(255, 99, 132, 0.6)', // Czerwony
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1,
                        data: dataSent
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Ilość sztuk'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                }
            }
        });
    });
    </script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Nazwy krajów i wartości zrealizowanych zamówień
    const countries = ["Niemcy", "Francja", "Hiszpania", "Włochy", "Wielka Brytania"];
    const shipments = [320, 270, 190, 160, 140]; // Ilość zrealizowanych zamówień

    // Kolory dla wykresu
    const backgroundColors = [
        'rgba(255, 99, 132, 0.6)',  // Czerwony
        'rgba(54, 162, 235, 0.6)',  // Niebieski
        'rgba(255, 206, 86, 0.6)',  // Żółty
        'rgba(75, 192, 192, 0.6)',  // Zielony
        'rgba(153, 102, 255, 0.6)'  // Fioletowy
    ];

    // Pobranie kontekstu canvas
    const ctx = document.getElementById('pieChart').getContext('2d');

    // Tworzenie wykresu
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: countries, // Nazwy krajów
            datasets: [{
                label: 'Zrealizowane zamówienia',
                data: shipments, // Ilości zamówień
                backgroundColor: backgroundColors, // Kolory segmentów
                borderColor: 'rgba(255, 255, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'bottom'
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            let value = tooltipItem.raw;
                            return ` ${value} zamówień`;
                        }
                    }
                }
            }
        }
    });
});
</script>

</body>



</html>