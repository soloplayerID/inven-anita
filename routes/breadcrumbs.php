<?php
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

Breadcrumbs::for('dashboard', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard-overview-1'));
});
// dashboard->user
Breadcrumbs::for('user_index', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('User', route('adduser.index'));
});
// dashboard->setting aplikasi
Breadcrumbs::for('settingAplication', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Setting Aplication', route('settingsAplication.index'));
});
// dashboard->setting Midtrans
Breadcrumbs::for('settingMidtrans', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Setting Midtrans', route('settingMidtrans'));
});
// dashboard->activity_log
Breadcrumbs::for('activity', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Activity Log', route('activity.index'));
});
// dashboard->Kategori
Breadcrumbs::for('kategori', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Kategori', route('kategori.index'));
});
// dashboard->customer
Breadcrumbs::for('customer', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Customer', route('customer.index'));
});
// dashboard->supplier
Breadcrumbs::for('supplier', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Supplier', route('supplier.index'));
});
// dashboard->Menu Produk
Breadcrumbs::for('menu', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Menu Produk', route('menu.index'));
});
// dashboard->Restock Produk
Breadcrumbs::for('restock', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Restock Produk', route('restock.index'));
});
// dashboar->catatan Transaksi
Breadcrumbs::for('catatan_transaksi', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Catatan Transaksi', route('catatan.index'));
});

// dashboar->catatan Mutation
Breadcrumbs::for('catatanMutation', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Mutation Recap', route('catatanMutation'));
});
// dashboard->catatan transaksi -> code_transaksi
Breadcrumbs::for('invoice', function (BreadcrumbTrail $trail, $order) {
    $trail->parent('catatan_transaksi');
    foreach ($order->unique('code_transaksi') as $item) {
        $trail->push($item->code_transaksi, route('invoice', $item->code_transaksi));
    }
});
// dashboard->Generate laporan
Breadcrumbs::for('customReport', function (BreadcrumbTrail $trail) {
    $trail->parent('dashboard');
    $trail->push('Report', route('customReport'));
});
// pos
Breadcrumbs::for('pos', function (BreadcrumbTrail $trail) {
    $trail->push('Point Of Sale', route('transaksi.index'));
});
// pos->history oder
Breadcrumbs::for('historyOrder', function (BreadcrumbTrail $trail) {
    $trail->parent('pos');
    $trail->push('History Order', route('historyOrder'));
});
// pos->history order -> code_transaksi
Breadcrumbs::for('invoiceKasir', function (BreadcrumbTrail $trail, $order) {
    $trail->parent('historyOrder');
    foreach ($order->unique('code_transaksi') as $item) {
        $trail->push($item->code_transaksi, route('invoice', $item->code_transaksi));
    }
});
