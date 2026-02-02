@extends('layouts.app')
@section('title', $lang['products_list'] ?? 'Products List')

@section('css')
<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <x-breadcrumb :langArray="[
                'supportportal.products',
                $lang['products_list'] ?? 'Products List',
            ]"/>

        <div class="card">
            <div class="card-header px-4 py-3 d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0 text-uppercase">{{ $lang['products_list'] ?? 'Products List' }}</h5>
                </div>
                <div class="d-flex gap-2">
                    @can('product.create')
                    <x-anchor-tag href="{{ route('products.create') }}" text="{{ __('app.create') }} {{ $lang['product'] ?? 'Product' }}" class="btn btn-primary px-5" />
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <form class="row g-3 needs-validation" id="datatableForm" action="{{ route('products.delete') }}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <input type="hidden" id="base_url" value="{{ url('/') }}">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered border w-100" id="datatable">
                            <thead>
                                <tr>
                                    <th class="d-none"></th>
                                    <th><input class="form-check-input row-select" type="checkbox"></th>
                                    <th>Company Name</th>
                                    <th>Contact Person</th>
                                    <th>Mobile No.</th>
                                    <th>Model</th>
                                    <th>Model Number</th>
                                    <th>Serial Number</th>
                                    <th>Purchase Date</th>
                                    <th>Warranty Start</th>
                                    <th>Warranty End</th>
                                    <th>Warranty Remaining (Days)</th>
                                    <th>{{ __('app.status') }}</th>
                                    <th>{{ __('app.action') }}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ versionedAsset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ versionedAsset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
<script src="{{ versionedAsset('custom/js/common/common.js') }}"></script>
<script src="{{ versionedAsset('custom/js/supportportal/products-list.js') }}"></script>
@endsection
