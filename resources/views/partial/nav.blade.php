<nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom fixed-top">
    <a class="navbar-brand"
        href="{{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.ViewFolder.php"><img
            id="navbar-logo"
            src="{{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}views/{{ $user->theme }}/images/seeddms-logo.svg">
        <span class="d-none d-md-inline-block ml-4">PrintHub</span></a>
    <form action="{{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.Search.php"
        class="form-inline ml-4 mr-auto" autocomplete="off"> <input type="hidden" name="folderid" value="1" /> <input
            type="hidden" name="navBar" value="1" /> <input name="query" class="form-control mr-sm-2 search-query"
            id="searchfield" data-provide="typeahead" type="search" style="width: 150px;" placeholder="Search"
            aria-label="Search" />
    </form>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMain"
        aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarMain">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link"
                    href="{{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.Calendar.php?mode=y">Calendar</a>
            </li>

            @php
            $isSeedDmsAdmin = request()->has('authenticated_user')
            && App\Models\Admin::where('username', request()->get('authenticated_user')->login)
            ->where('type', 'seeddms')
            ->exists();

            $isLocalAdmin = Auth::guard('web-local')->check()
            && App\Models\Admin::where('username', Auth::guard('web-local')->user()->email)
            ->where('type', 'local')
            ->exists();
            @endphp

            @if($isSeedDmsAdmin || $isLocalAdmin)
            <li class="nav-item">
                <a class="nav-link" target="_blank" href="{{ route('admin.campaigns.index') }}">
                    Admin Panel
                </a>
            </li>
            @endif
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbarMainUser"
                    aria-haspopup="true" aria-expanded="false">Signed in as '{{ $user->fullName }}'</a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarMainUser">
                    @if(Auth::guard('web-seeddms')->check())
                    <a class="dropdown-item"
                        href="{{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.Dashboard.php">
                        Dashboard
                    </a>
                    <a class="dropdown-item"
                        href="{{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.MyDocuments.php?inProcess=1">
                        My Documents
                    </a>
                    <a class="dropdown-item"
                        href="{{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.MyAccount.php">
                        My Account
                    </a>
                    <a class="dropdown-item"
                        href="{{ config('app.seeddms_url') }}{{ config('app.seeddms_url_additional') }}out/out.TransmittalMgr.php">
                        My Transmittals
                    </a>
                    @endif
                    @if(Auth::guard('web-local')->check())
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#changePasswordModal">
                        Change Password
                    </a>
                    @endif


                    <a href="#" class="dropdown-item"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Sign out
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>