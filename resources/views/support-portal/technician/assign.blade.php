{{-- resources/views/technician/assign.blade.php --}}
@extends('layouts.app')
@section('title', 'Assign Technicians')

@section('css')
<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <x-breadcrumb :langArray="[
                'Support Portal',
                'Assign Technicians',
            ]"/>

        <div class="card">
            <div class="card-header px-4 py-3 d-flex justify-content-between">
                <div>
                    <h5 class="mb-0 text-uppercase">Assign Technicians</h5>
                </div>
            </div>

        <div class="row">
            <!-- Technician Cards - Job Count Overview -->
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="text-uppercase mb-0 fs-11 font-weight-bold text-white-50">Total Technicians</p>
                                <h3 class="fw-bolder mb-0">12</h3>
                            </div>
                            <div class="flex-shrink-0">
                                <i class="bx bx-user-circle fs-24"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="text-uppercase mb-0 fs-11 font-weight-bold text-white-50">Total Jobs</p>
                                <h3 class="fw-bolder mb-0">28</h3>
                            </div>
                            <div class="flex-shrink-0">
                                <i class="bx bx-task fs-24"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="text-uppercase mb-0 fs-11 font-weight-bold text-white-50">Busy (3+ Jobs)</p>
                                <h3 class="fw-bolder mb-0">3</h3>
                            </div>
                            <div class="flex-shrink-0">
                                <i class="bx bx-time-five fs-24"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1 overflow-hidden">
                                <p class="text-uppercase mb-0 fs-11 font-weight-bold text-white-50">Available</p>
                                <h3 class="fw-bolder mb-0">9</h3>
                            </div>
                            <div class="flex-shrink-0">
                                <i class="bx bx-check-circle fs-24"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Technician List with Job Details -->
        <div class="card">
            <div class="card-header px-4 py-3">
                <h5 class="mb-0">Technician Availability</h5>
            </div>
            <div class="card-body">
                <!-- Filter Row -->
                <div class="row g-3 mb-4">
                    <div class="col-md-3">
                        <label class="form-label">Filter by Region</label>
                        <select class="form-select">
                            <option>All Regions</option>
                            <option>Nagpur Central</option>
                            <option>Nagpur South</option>
                            <option>Nagpur North</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Max Jobs</label>
                        <select class="form-select">
                            <option>All</option>
                            <option value="1">1 Job</option>
                            <option value="2">2 Jobs</option>
                            <option value="3">3+ Jobs</option>
                        </select>
                    </div>
                </div>

                <!-- Technicians Table -->
                {{-- Replace the entire table section with these 4 cards --}}

<div class="row g-4" id="technicianCardsContainer">
    {{-- TECHNICIAN CARD 1 - Rahul Sharma (Busy) --}}
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
        <div class="card h-100 technician-card busy">
            <div class="card-header bg-gradient-primary text-white text-center py-3">
                <img src="https://ui-avatars.com/api/?name=Rahul+Sharma&size=60&background=4f46e5&color=fff" 
                     class="rounded-circle border border-4 border-white mb-2" alt="Rahul">
                <h6 class="mb-1 fw-bold">Rahul Sharma</h6>
                <small class="text-white-50">ID: TECH001</small>
            </div>
            
            <div class="card-body p-0">
                <!-- CURRENT JOB -->
                <div class="p-3 border-bottom">
                    <div class="fw-bold text-primary mb-1">🔄 Current Job (3 Active)</div>
                    <div class="row g-2 mb-2">
                        <div class="col-8">
                            <small class="text-muted d-block">Company</small>
                            <div class="fw-semibold">Fineweilds Pvt Ltd</div>
                        </div>
                        <div class="col-4">
                            <small class="text-muted d-block">ETA</small>
                            <div class="text-danger fw-bold">2h 15m</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center text-muted small">
                        <i class="bx bx-map-pin me-1"></i>
                        <span>Nagpur Central • 2.5km</span>
                    </div>
                </div>

                <!-- REMAINING JOBS -->
                <div class="p-3">
                    <div class="fw-semibold text-muted mb-2 small">Remaining Capacity: <span class="text-warning">0/5</span></div>
                    <div class="row g-1 text-center">
                        <div class="col-4">
                            <div class="bg-light rounded p-2">
                                <small class="text-muted">Today</small>
                                <div class="fw-bold text-primary">2</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="bg-light rounded p-2">
                                <small class="text-muted">Tomorrow</small>
                                <div class="fw-bold text-warning">1</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="bg-light rounded p-2">
                                <small class="text-muted">Pending</small>
                                <div class="fw-bold text-success">0</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer bg-light text-center py-2">
                <span class="badge bg-danger fs-6 px-3 py-2">Busy</span>
                <div class="dropdown d-inline-block ms-2">
                    <button class="btn btn-sm p-0" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">View Jobs</a></li>
                        <li><a class="dropdown-item text-success" href="#">Assign New</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- TECHNICIAN CARD 2 - Priya Patel (Available) --}}
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
        <div class="card h-100 technician-card available">
            <div class="card-header bg-gradient-success text-white text-center py-3">
                <img src="https://ui-avatars.com/api/?name=Priya+Patel&size=60&background=10b981&color=fff" 
                     class="rounded-circle border border-4 border-white mb-2" alt="Priya">
                <h6 class="mb-1 fw-bold">Priya Patel</h6>
                <small class="text-white-50">ID: TECH002</small>
            </div>
            
            <div class="card-body p-0">
                <!-- CURRENT JOB -->
                <div class="p-3 border-bottom bg-success-subtle">
                    <div class="fw-bold text-success mb-1">✅ Current Job (1 Active)</div>
                    <div class="row g-2 mb-2">
                        <div class="col-8">
                            <small class="text-muted d-block">Company</small>
                            <div class="fw-semibold">TechSolutions Ltd</div>
                        </div>
                        <div class="col-4">
                            <small class="text-muted d-block">ETA</small>
                            <div class="text-success fw-bold">45m</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center text-muted small">
                        <i class="bx bx-map-pin me-1"></i>
                        <span>Nagpur South • 4.1km</span>
                    </div>
                </div>

                <!-- REMAINING JOBS -->
                <div class="p-3">
                    <div class="fw-semibold text-muted mb-2 small">Remaining Capacity: <span class="text-success">4/5</span></div>
                    <div class="row g-1 text-center">
                        <div class="col-4">
                            <div class="bg-light rounded p-2">
                                <small class="text-muted">Today</small>
                                <div class="fw-bold text-success">0</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="bg-light rounded p-2">
                                <small class="text-muted">Tomorrow</small>
                                <div class="fw-bold text-info">0</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="bg-light rounded p-2">
                                <small class="text-muted">Pending</small>
                                <div class="fw-bold text-primary">0</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer bg-light text-center py-2">
                <span class="badge bg-success fs-6 px-3 py-2">Available</span>
                <div class="dropdown d-inline-block ms-2">
                    <button class="btn btn-sm p-0" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">View Jobs</a></li>
                        <li><a class="dropdown-item text-success" href="#">Assign New</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- TECHNICIAN CARD 3 - Amit Kumar (Busy) --}}
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
        <div class="card h-100 technician-card busy">
            <div class="card-header bg-gradient-warning text-white text-center py-3">
                <img src="https://ui-avatars.com/api/?name=Amit+Kumar&size=60&background=f59e0b&color=fff" 
                     class="rounded-circle border border-4 border-white mb-2" alt="Amit">
                <h6 class="mb-1 fw-bold">Amit Kumar</h6>
                <small class="text-white-50">ID: TECH003</small>
            </div>
            
            <div class="card-body p-0">
                <!-- CURRENT JOB -->
                <div class="p-3 border-bottom">
                    <div class="fw-bold text-primary mb-1">🔄 Current Job (2 Active)</div>
                    <div class="row g-2 mb-2">
                        <div class="col-8">
                            <small class="text-muted d-block">Company</small>
                            <div class="fw-semibold">PowerTech Solutions</div>
                        </div>
                        <div class="col-4">
                            <small class="text-muted d-block">ETA</small>
                            <div class="text-warning fw-bold">3h 30m</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center text-muted small">
                        <i class="bx bx-map-pin me-1"></i>
                        <span>Nagpur North • 1.8km</span>
                    </div>
                </div>

                <!-- REMAINING JOBS -->
                <div class="p-3">
                    <div class="fw-semibold text-muted mb-2 small">Remaining Capacity: <span class="text-warning">1/5</span></div>
                    <div class="row g-1 text-center">
                        <div class="col-4">
                            <div class="bg-light rounded p-2">
                                <small class="text-muted">Today</small>
                                <div class="fw-bold text-danger">1</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="bg-light rounded p-2">
                                <small class="text-muted">Tomorrow</small>
                                <div class="fw-bold text-warning">1</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="bg-light rounded p-2">
                                <small class="text-muted">Pending</small>
                                <div class="fw-bold text-info">0</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer bg-light text-center py-2">
                <span class="badge bg-danger fs-6 px-3 py-2">Busy</span>
                <div class="dropdown d-inline-block ms-2">
                    <button class="btn btn-sm p-0" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">View Jobs</a></li>
                        <li><a class="dropdown-item text-success" href="#">Assign New</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    {{-- TECHNICIAN CARD 4 - Sneha Rani (Available) --}}
    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12">
        <div class="card h-100 technician-card available">
            <div class="card-header bg-gradient-info text-white text-center py-3">
                <img src="https://ui-avatars.com/api/?name=Sneha+Rani&size=60&background=0ea5e9&color=fff" 
                     class="rounded-circle border border-4 border-white mb-2" alt="Sneha">
                <h6 class="mb-1 fw-bold">Sneha Rani</h6>
                <small class="text-white-50">ID: TECH004</small>
            </div>
            
            <div class="card-body p-0">
                <!-- NO CURRENT JOB -->
                <div class="p-4 text-center border-bottom bg-info-subtle">
                    <i class="bx bx-check-circle text-success fs-2 mb-2"></i>
                    <div class="fw-bold text-success mb-1">No Active Jobs</div>
                    <div class="text-muted">Ready for assignment</div>
                </div>

                <!-- REMAINING JOBS -->
                <div class="p-3">
                    <div class="fw-semibold text-muted mb-2 small">Remaining Capacity: <span class="text-success">5/5</span></div>
                    <div class="row g-1 text-center">
                        <div class="col-4">
                            <div class="bg-light rounded p-2">
                                <small class="text-muted">Today</small>
                                <div class="fw-bold text-success">0</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="bg-light rounded p-2">
                                <small class="text-muted">Tomorrow</small>
                                <div class="fw-bold text-info">0</div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="bg-light rounded p-2">
                                <small class="text-muted">Pending</small>
                                <div class="fw-bold text-primary">0</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer bg-light text-center py-2">
                <span class="badge bg-success fs-6 px-3 py-2">Available</span>
                <div class="dropdown d-inline-block ms-2">
                    <button class="btn btn-sm p-0" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">View Jobs</a></li>
                        <li><a class="dropdown-item text-success" href="#">Assign New</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Add this CSS --}}
<style>
.bg-gradient-primary { background: linear-gradient(135deg, #4f46e5, #7c3aed); }
.bg-gradient-success { background: linear-gradient(135deg, #10b981, #34d399); }
.bg-gradient-warning { background: linear-gradient(135deg, #f59e0b, #fbbf24); }
.bg-gradient-info { background: linear-gradient(135deg, #0ea5e9, #28c4ea); }
.technician-card { transition: all 0.3s ease; border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
.technician-card:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(0,0,0,0.15); }
</style>

            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{ versionedAsset('assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ versionedAsset('assets/plugins/datatable/js/dataTables.bootstrap5.min.js') }}"></script>
@endsection
