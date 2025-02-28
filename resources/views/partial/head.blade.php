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