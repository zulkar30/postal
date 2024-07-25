<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class="{{ request()->is('dashboard') || request()->is('dashboard/*') ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}">
                    <i
                        class="{{ request()->is('dashboard') || request()->is('dashboard/*') ? 'bx bx-category-alt bx-flashing' : 'bx bx-category-alt' }}"></i><span
                        class="menu-title" data-i18n="Dashboard">Dashboard</span>
                </a>
            </li>

            @can('app')
                <li class=" navigation-header"><span data-i18n="Application">Aplikasi</span><i class="la la-ellipsis-h"
                        data-toggle="tooltip" data-placement="right" data-original-title="Application"></i>
                </li>
            @endcan
            @can('management_access')
                <li class=" nav-item"><a href="#"><i
                            class="{{ request()->is('user') || request()->is('user/*') || request()->is('*/user') || request()->is('*/user/*') ? 'bx bx-group bx-flashing' : 'bx bx-group' }}"></i><span
                            class="menu-title" data-i18n="Management Access">Manajemen Akses</span></a>
                    <ul class="menu-content">

                        @can('user_access')
                            <li
                                class="{{ request()->is('user') || request()->is('user/*') || request()->is('*/user') || request()->is('*/user/*') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('user.index') }}">
                                    <i></i><span>User</span>
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcan

            @can('master_data_access')
                <li class=" nav-item"><a href="#"><i
                            class="{{ request()->is('permission') || request()->is('permission/*') || request()->is('*/permission') || request()->is('*/permission/*') || request()->is('role') || request()->is('role/*') || request()->is('*/role') || request()->is('*/role/*') ? 'bx bx-customize bx-flashing' : 'bx bx-customize' }}"></i><span
                            class="menu-title" data-i18n="Master Data">Master Data</span></a>
                    <ul class="menu-content">

                        @can('permission_access')
                            <li
                                class="{{ request()->is('permission') || request()->is('permission/*') || request()->is('*/permission') || request()->is('*/permission/*') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('permission') }}">
                                    <i></i><span>Akses</span>
                                </a>
                            </li>
                        @endcan

                        @can('role_access')
                            <li
                                class="{{ request()->is('role') || request()->is('role/*') || request()->is('*/role') || request()->is('*/role/*') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('role') }}">
                                    <i></i><span>Peran</span>
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcan

            @can('operational_access')
                <li class=" nav-item"><a href="#"><i
                            class="{{ request()->is('jadwal') || request()->is('jadwal/*') || request()->is('*/jadwal') || request()->is('*/jadwal/*') || request()->is('lansia') || request()->is('lansia/*') || request()->is('*/lansia') || request()->is('*/lansia/*') || request()->is('layanan') || request()->is('layanan/*') || request()->is('*/layanan') || request()->is('*/layanan/*') || request()->is('petugas') || request()->is('petugas/*') || request()->is('*/petugas') || request()->is('*/petugas/*') ? 'bx bx-hive bx-flashing' : 'bx bx-hive' }}"></i><span
                            class="menu-title" data-i18n="Operational">Operasional</span></a>
                    <ul class="menu-content">

                        @can('jadwal_access')
                            <li
                                class="{{ request()->is('jadwal') || request()->is('jadwal/*') || request()->is('*/jadwal') || request()->is('*/jadwal/*') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('jadwal.index') }}">
                                    <i></i><span>Jadwal</span>
                                </a>
                            </li>
                        @endcan

                        @can('lansia_access')
                            <li
                                class="{{ request()->is('lansia') || request()->is('lansia/*') || request()->is('*/lansia') || request()->is('*/lansia/*') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('lansia.index') }}">
                                    <i></i><span>Lansia</span>
                                </a>
                            </li>
                        @endcan

                        @can('layanan_access')
                            <li
                                class="{{ request()->is('layanan') || request()->is('layanan/*') || request()->is('*/layanan') || request()->is('*/layanan/*') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('layanan.index') }}">
                                    <i></i><span>Layanan</span>
                                </a>
                            </li>
                        @endcan

                        @can('petugas_access')
                            <li
                                class="{{ request()->is('petugas') || request()->is('petugas/*') || request()->is('*/petugas') || request()->is('*/petugas/*') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('petugas.index') }}">
                                    <i></i><span>Petugas</span>
                                </a>
                            </li>
                        @endcan

                        @can('telegram_access')
                            <li class="{{ request()->is('telegram') ? 'active' : '' }} ">
                                <a class="menu-item" href="{{ route('telegram') }}">
                                    <i></i><span>Telegram</span>
                                </a>
                            </li>
                        @endcan

                    </ul>
                </li>
            @endcan
        </ul>
    </div>
</div>

<!-- END: Main Menu-->
