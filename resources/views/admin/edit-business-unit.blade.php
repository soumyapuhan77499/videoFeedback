@extends('layouts.app')

@section('styles')
    <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">

@endsection

@section('content')
    <div class="breadcrumb-header justify-content-between">
        <div class="left-content">
            <span class="main-content-title mg-b-0 mg-b-lg-1">EDIT BUSINESS UNIT</span>
        </div>
        <div class="justify-content-center mt-2">
            <ol class="breadcrumb d-flex justify-content-between align-items-center">
                <li class="breadcrumb-item tx-15">
                    <a href="{{ route('manageBusinessUnit') }}" class="btn btn-warning text-dark">Manage Business Unit</a>
                </li>
                <li class="breadcrumb-item tx-15">
                    <a href="javascript:void(0);">Dashboard</a>
                </li>
                <li class="breadcrumb-item active tx-15" aria-current="page">Edit Unit</li>
            </ol>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <form action="{{ route('admin.update-business-unit', $businessUnit->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="business_unit_name" class="form-label">Business Unit Name</label>
                <input type="text" name="business_unit_name" class="form-control" id="business_unit_name" value="{{ $businessUnit->business_unit_name }}" required>
            </div>

            <div class="col-md-4 mb-3">
                <label for="business_logo" class="form-label">Business Logo</label>
                <input type="file" name="business_logo" class="form-control" id="business_logo">
                @if($businessUnit->business_logo)
                <a href="{{ asset('storage/' . $businessUnit->business_logo) }}" target="_blank" class="btn btn-danger">
                    View
                </a>               
                 @endif
            </div>

            <div class="col-md-4 mb-3">
                <label for="mobile_number" class="form-label">Mobile Number</label>
                <input type="number" name="mobile_number" class="form-control" id="mobile_number" value="{{ $businessUnit->mobile_number }}">
            </div>

            <div class="col-md-4 mb-3">
                <label for="whatsapp_number" class="form-label">WhatsApp Number</label>
                <input type="number" name="whatsapp_number" class="form-control" id="whatsapp_number" value="{{ $businessUnit->whatsapp_number }}">
            </div>

            <div class="col-md-4 mb-3">
                <label for="user_name" class="form-label">User Name</label>
                <input type="text" name="user_name" class="form-control" id="user_name" value="{{ $businessUnit->user_name }}">
            </div>

            <div class="col-md-4 mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="text" name="password" class="form-control" id="password">
            </div>

            <div class="col-md-4 mb-3">
                <label for="locality" class="form-label">Locality</label>
                <input type="text" name="locality" class="form-control" id="locality" value="{{ $businessUnit->locality }}">
            </div>

            <div class="col-md-4 mb-3">
                <label for="pincode" class="form-label">Pincode</label>
                <input type="number" name="pincode" class="form-control" id="pincode" value="{{ $businessUnit->pincode }}">
            </div>

            <div class="col-md-4 mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" name="city" class="form-control" id="city" value="{{ $businessUnit->city }}">
            </div>

            <div class="col-md-4 mb-3">
                <label for="town" class="form-label">Town</label>
                <input type="text" name="town" class="form-control" id="town" value="{{ $businessUnit->town }}">
            </div>

            <div class="col-md-4 mb-3">
                <label for="state" class="form-label">State</label>
                <input type="text" name="state" class="form-control" id="state" value="{{ $businessUnit->state }}">
            </div>

            <div class="col-md-4 mb-3">
                <label for="country" class="form-label">Country</label>
                <input type="text" name="country" class="form-control" id="country" value="{{ $businessUnit->country }}">
            </div>

            <div class="col-md-12 mb-3">
                <label for="full_address" class="form-label">Full Address</label>
                <textarea name="full_address" class="form-control" id="full_address" rows="3">{{ $businessUnit->full_address }}</textarea>
            </div>
        </div>

        <div class="col-12 mt-4">
            <button type="submit" class="btn btn-primary w-100">Update</button>
        </div>
    </form>
@endsection


@section('scripts')
    <!-- Form-layouts js -->
    <script src="{{ asset('assets/js/form-layouts.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2(); // Initialize Select2 for dropdowns
        });
    </script>

    
@endsection