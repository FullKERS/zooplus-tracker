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