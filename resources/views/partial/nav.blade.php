<nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom fixed-top">
        <a class="navbar-brand" href="{{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.ViewFolder.php"><img id="navbar-logo"
                src="{{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}oviews/bootstrap4/images/seeddms-logo.svg"> <span
                class="d-none d-md-inline-block ml-4">SeedDMS</span></a>
        <form action="{{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.Search.php" class="form-inline ml-4 mr-auto"
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
                        href="{{ config('app.seeddms_url') }}/dashboard-zooplus/login/42861f23b1b05a47a60338826a172759">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link"
                        href="{{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.Calendar.php?mode=y">Calendar</a></li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbarMainUser"
                        aria-haspopup="true" aria-expanded="false">Signed in as '{{ $user->fullName }}'</a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarMainUser">
                        <a class="dropdown-item"
                            href="{{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.Dashboard.php">Dashboard</a>
                        <a class="dropdown-item"
                            href="{{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.MyDocuments.php?inProcess=1">My
                            Documents</a>
                        <a class="dropdown-item" href="{{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.MyAccount.php">My
                            Account</a>
                        <a class="dropdown-item"
                            href="{{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.TransmittalMgr.php">My
                            Transmittals</a>
                        <div class="dropdown-divider"></div>
                        <div class="dropdown-submenu">
                            <a href="#" class="dropdown-item dropdown-toggle" data-toggle="dropdown">Language</a>
                            <div class="dropdown-menu dropdown-submenu-left">
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=ar_EG&referer={{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.ViewFolder.php">Arabic</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=bg_BG&referer={{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.ViewFolder.php">Bulgarian</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=ca_ES&referer={{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.ViewFolder.php">Catalan</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=cs_CZ&referer={{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.ViewFolder.php">Czech</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=de_DE&referer={{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.ViewFolder.php">German</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=el_GR&referer={{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.ViewFolder.php">Greek</a>
                                <a class="dropdown-item active"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=en_GB&referer={{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.ViewFolder.php">English
                                    (GB)</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=es_ES&referer={{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.ViewFolder.php">Spanish</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=fr_FR&referer={{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.ViewFolder.php">French</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=hr_HR&referer={{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.ViewFolder.php">Croatian</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=hu_HU&referer={{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.ViewFolder.php">Hungarian</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=id_ID&referer={{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.ViewFolder.php">Indonesian</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=it_IT&referer={{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.ViewFolder.php">Italian</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=ko_KR&referer={{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.ViewFolder.php">Korean</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=lo_LA&referer={{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.ViewFolder.php">Laotian</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=nb_NO&referer={{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.ViewFolder.php">Norwegian
                                    (Bokmål)</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=nl_NL&referer={{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.ViewFolder.php">Dutch</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=pl_PL&referer={{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.ViewFolder.php">Polish</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=pt_BR&referer={{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.ViewFolder.php">Portugese
                                    (BR)</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=ro_RO&referer={{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.ViewFolder.php">Romanian</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=ru_RU&referer={{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.ViewFolder.php">Russian</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=sk_SK&referer={{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.ViewFolder.php">Slovak</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=sv_SE&referer={{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.ViewFolder.php">Swedish</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=tr_TR&referer={{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.ViewFolder.php">Turkish</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=uk_UA&referer={{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.ViewFolder.php">Ukrainian</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=zh_CN&referer={{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.ViewFolder.php">Chinese
                                    (CN)</a>
                                <a class="dropdown-item"
                                    href="{{ config('app.seeddms_url') }}/seeddms60x/www/op/op.SetLanguage.php?lang=zh_TW&referer={{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.ViewFolder.php">Chinese
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