@extends('../layout/main')

@section('head')
@yield('subhead')
@endsection

@section('content')
@include('../layout/components/mobile-menu')
<?php $setting = \App\Models\Setting::find(1); ?>
<div class="flex">
    <!-- BEGIN: Side Menu -->
    <nav class="side-nav">
        <a href="" class="intro-x flex items-center pl-5 pt-4">

            @if ($setting->logo == null)

            @else
            <img style="width: 50px" alt="Midone Tailwind HTML Admin Template" class="w-10" src="{{ asset('/fotoSetting/' . $setting->logo) }}">
            @endif
            <span class="hidden xl:block text-white text-lg ml-1">
                {{ $setting->name_application }} <span class="font-medium"></span>
            </span>
        </a>
        <div class="side-nav__devider my-6"></div>
        <ul>
            @if (Auth::user()->role == 'manager' || Auth::user()->role == 'admin')
            <li>
                <a href="/" class="side-menu @if (request()->is('/')) side-menu--active @endif">
                    <div class="side-menu__icon">

                        <i data-feather="home"></i>
                    </div>
                    <div class="side-menu__title">
                        Dashboard
                    </div>
                </a>
            </li>
            @endif
            @if (Auth::user()->role == 'admin')
            <li>
                <a href="{{ route('adduser.index') }}"
                    class="side-menu @if (request()->is('adduser')) side-menu--active @endif">
                    <div class="side-menu__icon">
                        <i data-feather="user-plus"></i>
                    </div>
                    <div class="side-menu__title">
                        Add User
                    </div>
                </a>
            </li>
            <li>
                <a class="side-menu @if (request()->is('setting/*')) side-menu--active @endif">
                    <div class="side-menu__icon">
                        <i data-feather="settings"></i>
                    </div>
                    <div class="side-menu__title">
                        Setting
                        <div class="side-menu__sub-icon">
                            <i data-feather="chevron-down"></i>
                        </div>
                    </div>
                </a>

                <ul class="{{ request()->is('setting/*') ? 'side-menu__sub-open' : '' }}">
                    <li>
                        <a href="{{ route('settingsAplication.index') }}"
                            class="{{ request()->is('setting/settingAplication/settingsAplication') ? 'side-menu side-menu--active' : 'side-menu' }}">
                            <div class="side-menu__icon">
                                <i data-feather="tool"></i>
                            </div>
                            <div class="side-menu__title">
                                Setting Aplikasi
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('settingMidtrans') }}"
                            class="{{ request()->is('setting/settingAplication/settingMidtrans') ? 'side-menu side-menu--active' : 'side-menu' }}">
                            <div class="side-menu__icon">
                                <i data-feather="credit-card"></i>
                            </div>
                            <div class="side-menu__title">
                               Setting Midtrans Key
                            </div>
                        </a>
                    </li>


                </ul>
            </li>
            @endif
            @if (Auth::user()->role == 'manager')
            <li>
                <a class="side-menu @if (request()->is('product/*')) side-menu--active @endif">
                    <div class="side-menu__icon">
                        <i data-feather="box"></i>
                    </div>
                    <div class="side-menu__title">
                        Master Product
                        <div class="side-menu__sub-icon">
                            <i data-feather="chevron-down"></i>
                        </div>
                    </div>
                </a>

                <ul class="{{ request()->is('product/*') ? 'side-menu__sub-open' : '' }}">
                    <li>
                        <a href="{{ route('kategori.index') }}"
                            class="{{ request()->is('product/kategoriProduct/kategori') ? 'side-menu side-menu--active' : 'side-menu' }}">
                            <div class="side-menu__icon">
                                <i data-feather="database"></i>
                            </div>
                            <div class="side-menu__title">
                                kategori Product
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('menu.index') }}"
                            class="{{ request()->is('product/addProduct/menu') ? 'side-menu side-menu--active' : 'side-menu' }}">
                            <div class="side-menu__icon">
                                <i data-feather="log-in"></i>
                            </div>
                            <div class="side-menu__title">
                                Product
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('restock.index') }}"
                            class="{{ request()->is('product/restockProduct/restock') ? 'side-menu side-menu--active' : 'side-menu' }}">
                            <div class="side-menu__icon">
                                <i data-feather="log-out"></i>
                            </div>
                            <div class="side-menu__title">
                                Product Masuk
                            </div>
                        </a>
                    </li>

                </ul>
            </li>
            {{--<li>
                <a href="{{ route('customer.index') }}"
                    class="side-menu @if (request()->is('customer/customer')) side-menu--active @endif">
                    <div class="side-menu__icon">
                        <i data-feather="user-plus"></i>
                    </div>
                    <div class="side-menu__title">
                        Customer
                    </div>
                </a>
            </li>--}}
            <li>
                <a href="{{ route('supplier.index') }}"
                    class="side-menu @if (request()->is('supplier/supplier')) side-menu--active @endif">
                    <div class="side-menu__icon">
                        <i data-feather="gift"></i>
                    </div>
                    <div class="side-menu__title">
                        Supplier
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('catatan.index') }}"
                    class="side-menu @if (request()->is('catatan/catatan')) side-menu--active @endif">
                    <div class="side-menu__icon">
                        <i data-feather="clipboard"></i>
                    </div>
                    <div class="side-menu__title">
                        Catatan Transaksi
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('indexReport') }}"
                    class="side-menu @if (request()->is('report')) side-menu--active @endif">
                    <div class="side-menu__icon">
                        <i data-feather="printer"></i>
                    </div>
                    <div class="side-menu__title">
                        Generate Report
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('catatanMutation') }}"
                    class="side-menu @if (request()->is('mutation')) side-menu--active @endif">
                    <div class="side-menu__icon">
                        <i data-feather="printer"></i>
                    </div>
                    <div class="side-menu__title">
                        Mutasi Barang
                    </div>
                </a>
            </li>

            @endif
            @if (Auth::user()->role == 'manager' || Auth::user()->role == 'admin')

            <li>
                <a href="{{ route('activity.index') }}"
                    class="side-menu @if (request()->is('activity')) side-menu--active @endif">
                    <div class="side-menu__icon">
                        <i data-feather="activity"></i>
                    </div>
                    <div class="side-menu__title">
                        Activity Log
                    </div>
                </a>
            </li>


            @endif
            @if (Auth::user()->role == 'kasir')
            <li>
                <a href="{{ route('transaksi.index') }}"
                    class="side-menu @if (request()->is('transaksi')) side-menu--active @endif">
                    <div class="side-menu__icon">
                        <i data-feather="monitor"></i>
                    </div>
                    <div class="side-menu__title">
                        Point Of Sale
                    </div>
                </a>
            </li>
            <li>
                <a href="{{ route('historyOrder') }}"
                    class="side-menu @if (request()->is('order')) side-menu--active @endif">
                    <div class="side-menu__icon">
                        <i data-feather="refresh-cw"></i>
                    </div>
                    <div class="side-menu__title">
                        History Orders
                    </div>
                </a>
            </li>
            @endif

        </ul>

    </nav>
    <!-- END: Side Menu -->
    <!-- BEGIN: Content -->
    <div class="content">
        @include('../layout/components/top-bar')
        @yield('subcontent')
    </div>
    <!-- END: Content -->
</div>
@endsection
