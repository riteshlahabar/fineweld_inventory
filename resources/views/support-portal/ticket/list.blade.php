{{-- resources/views/support-portal/ticket/list.blade.php --}}
@extends('layouts.app')
@section('title', 'All Tickets')

@section('css')
<link href="{{ asset('assets/plugins/datatable/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet">
<style>
.ticket-card {
    border-left: 4px solid #dee2e6;
    transition: all 0.3s ease;
    margin-bottom: 1rem;
}
.ticket-card:hover {
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15);
    transform: translateY(-2px);
}
.ticket-card.high { border-left-color: #dc3545 !important; }
.ticket-card.medium { border-left-color: #ffc107 !important; }
.ticket-card.low { border-left-color: #28a745 !important; }
.ticket-header { background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); }
.status-badge, .priority-badge, .service-badge { cursor: pointer; }
</style>
@endsection

@section('content')
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <x-breadcrumb :langArray={[
                'Support Portal',
                'All Tickets',
            ]"/>

        <div class="card">
            <div class="card-header px-4 py-3 d-flex justify-content-between">
                <div>
                    <h5 class="mb-0 text-uppercase">All Tickets</h5>
                </div>

                @can('ticket.create')
                <x-anchor-tag href="{{ route('tickets.create') }}" text="Raise a Ticket" class="btn btn-primary px-5" />
                @endcan
            </div>
            
            <div class="card-body">
                <!-- Filters -->
                <div class="row g-3 mb-4">
                    <div class="col-md-2">
                        <x-label for="status_filter" name="Status" />
                        <select class="form-select" id="status_filter">
                            <option value="">All Status</option>
                            <option value="open">Open</option>
                            <option value="assigned">Assigned</option>
                            <option value="in_progress">In Progress</option>
                            <option value="completed">Completed</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <x-label for="priority_filter" name="Priority" />
                        <select class="form-select" id="priority_filter">
                            <option value="">All Priority</option>
                            <option value="high">High</option>
                            <option value="medium">Medium</option>
                            <option value="low">Low</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <x-label for="technician_filter" name="Technician" />
                        <select class="form-select" id="technician_filter">
                            <option value="">All Technicians</option>
                            <option value="tech1">Rahul Sharma</option>
                            <option value="tech2">Priya Patel</option>
                            <option value="tech3">Amit Kumar</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <x-label for="date_range" name="Date Range" />
                        <input type="date" class="form-control" id="date_range">
                    </div>
                    <div class="col-md-2">
                        <div class="d-flex gap-2 mt-4">
                            <button type="button" class="btn btn-outline-primary" id="filterBtn">Filter</button>
                            <button type="button" class="btn btn-outline-secondary" id="resetBtn">Reset</button>
                        </div>
                    </div>
                </div>

                <!-- Cards Container -->
                <form class="needs-validation" id="datatableForm" action="{{ route('tickets.delete') }}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    
                    <div class="row g-4" id="ticketCardsContainer">
                        {{-- CARD 1 --}}
                        <div class="col-xl-4 col-lg-6 col-md-12">
                            <div class="card ticket-card high h-100">
                                <div class="card-body">
                                    <input type="checkbox" class="form-check-input row-select d-none" value="1">
                                    <div class="d-none" data-ticket-id="1"></div>

                                    <div class="ticket-header p-3 rounded mb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="mb-1 fw-bold">
                                                <span class="badge bg-primary me-2">TKT-001</span>
                                            </h6>
                                            <div>
                                                <span class="badge bg-danger priority-badge me-1" data-ticket-id="1" data-field="priority" data-value="high">High</span>
                                                <span class="badge bg-warning status-badge" data-ticket-id="1" data-field="status" data-value="in_progress">In Progress</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-2 mb-3">
                                        <div class="col-6">
                                            <small class="text-muted">Company</small>
                                            <div class="fw-semibold">Fineweilds Pvt Ltd</div>
                                        </div>
                                        <div class="col-6">
                                            <small class="text-muted">Service Type</small>
                                            <div><span class="badge bg-info service-badge px-2 py-1" data-ticket-id="1" data-field="service_type" data-value="repair">Repair</span></div>
                                        </div>
                                        <div class="col-12">
                                            <small class="text-muted">Address</small>
                                            <div class="text-truncate">Nagpur, Maharashtra</div>
                                        </div>
                                        <div class="col-6">
                                            <small class="text-muted">Contact</small>
                                            <div>John Doe</div>
                                        </div>
                                        <div class="col-6">
                                            <small class="text-muted">Mobile</small>
                                            <div>+91 98765 43210</div>
                                        </div>
                                        <div class="col-6">
                                            <small class="text-muted">Model</small>
                                            <div class="fw-semibold">Model-X200</div>
                                        </div>
                                        <div class="col-6">
                                            <small class="text-muted">SLA Timer</small>
                                            <div class="text-danger fw-bold">02:45:30</div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <small class="text-muted d-block mb-1">Problem</small>
                                        <div class="bg-light p-2 rounded small">Motor failure</div>
                                    </div>

                                    <div class="row g-2 mb-3">
                                        <div class="col-7">
                                            <small class="text-muted">Technician</small>
                                            <select class="form-select form-select-sm technician-select" data-ticket-id="1">
                                                <option value="">Assign Technician</option>
                                                <option value="tech1">Rahul Sharma <br><small class="text-muted">Nagpur Central (2.5km)</small></option>
                                                <option value="tech2">Priya Patel <br><small class="text-muted">Nagpur South (4.1km)</small></option>
                                                <option value="tech3">Amit Kumar <br><small class="text-muted">Nagpur North (1.8km)</small></option>
                                            </select>
                                        </div>
                                        <div class="col-5">
                                            <small class="text-muted">Created</small>
                                            <div>2026-01-22 10:30</div>
                                        </div>
                                    </div>

                                    <div class="d-flex gap-2 pt-2 border-top">
                                        <button class="btn btn-sm btn-outline-primary flex-fill status-btn" data-ticket-id="1">Change Status</button>
                                        <button class="btn btn-sm btn-outline-warning flex-fill priority-btn" data-ticket-id="1">Change Priority</button>
                                        <button class="btn btn-sm btn-outline-info flex-fill service-btn" data-ticket-id="1">Change Service</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- CARD 2 --}}
                        <div class="col-xl-4 col-lg-6 col-md-12">
                            <div class="card ticket-card medium h-100">
                                <div class="card-body">
                                    <input type="checkbox" class="form-check-input row-select d-none" value="2">
                                    <div class="d-none" data-ticket-id="2"></div>

                                    <div class="ticket-header p-3 rounded mb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="mb-1 fw-bold">
                                                <span class="badge bg-primary me-2">TKT-002</span>
                                            </h6>
                                            <div>
                                                <span class="badge bg-warning priority-badge me-1" data-ticket-id="2" data-field="priority" data-value="medium">Medium</span>
                                                <span class="badge bg-info status-badge" data-ticket-id="2" data-field="status" data-value="open">Open</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-2 mb-3">
                                        <div class="col-6">
                                            <small class="text-muted">Company</small>
                                            <div class="fw-semibold">TechSolutions Ltd</div>
                                        </div>
                                        <div class="col-6">
                                            <small class="text-muted">Service Type</small>
                                            <div><span class="badge bg-success service-badge px-2 py-1" data-ticket-id="2" data-field="service_type" data-value="maintenance">Maintenance</span></div>
                                        </div>
                                        <div class="col-12">
                                            <small class="text-muted">Address</small>
                                            <div class="text-truncate">Pune, Maharashtra</div>
                                        </div>
                                        <div class="col-6">
                                            <small class="text-muted">Contact</small>
                                            <div>Sarah Wilson</div>
                                        </div>
                                        <div class="col-6">
                                            <small class="text-muted">Mobile</small>
                                            <div>+91 98765 43211</div>
                                        </div>
                                        <div class="col-6">
                                            <small class="text-muted">Model</small>
                                            <div class="fw-semibold">Pro-500</div>
                                        </div>
                                        <div class="col-6">
                                            <small class="text-muted">SLA Timer</small>
                                            <div class="text-warning fw-bold">01:23:15</div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <small class="text-muted d-block mb-1">Problem</small>
                                        <div class="bg-light p-2 rounded small">Software crash during operation</div>
                                    </div>

                                    <div class="row g-2 mb-3">
                                        <div class="col-7">
                                            <small class="text-muted">Technician</small>
                                            <select class="form-select form-select-sm technician-select" data-ticket-id="2">
                                                <option value="tech2" selected>Priya Patel <br><small class="text-muted">Nagpur South (4.1km)</small></option>
                                                <option value="tech1">Rahul Sharma <br><small class="text-muted">Nagpur Central (2.5km)</small></option>
                                                <option value="tech3">Amit Kumar <br><small class="text-muted">Nagpur North (1.8km)</small></option>
                                            </select>
                                        </div>
                                        <div class="col-5">
                                            <small class="text-muted">Created</small>
                                            <div>2026-01-22 09:15</div>
                                        </div>
                                    </div>

                                    <div class="d-flex gap-2 pt-2 border-top">
                                        <button class="btn btn-sm btn-outline-primary flex-fill status-btn" data-ticket-id="2">Change Status</button>
                                        <button class="btn btn-sm btn-outline-warning flex-fill priority-btn" data-ticket-id="2">Change Priority</button>
                                        <button class="btn btn-sm btn-outline-info flex-fill service-btn" data-ticket-id="2">Change Service</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- CARD 3 --}}
                        <div class="col-xl-4 col-lg-6 col-md-12">
                            <div class="card ticket-card low h-100">
                                <div class="card-body">
                                    <input type="checkbox" class="form-check-input row-select d-none" value="3">
                                    <div class="d-none" data-ticket-id="3"></div>

                                    <div class="ticket-header p-3 rounded mb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="mb-1 fw-bold">
                                                <span class="badge bg-primary me-2">TKT-003</span>
                                            </h6>
                                            <div>
                                                <span class="badge bg-success priority-badge me-1" data-ticket-id="3" data-field="priority" data-value="low">Low</span>
                                                <span class="badge bg-success status-badge" data-ticket-id="3" data-field="status" data-value="completed">Completed</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-2 mb-3">
                                        <div class="col-6">
                                            <small class="text-muted">Company</small>
                                            <div class="fw-semibold">AutoParts Inc</div>
                                        </div>
                                        <div class="col-6">
                                            <small class="text-muted">Service Type</small>
                                            <div><span class="badge bg-secondary service-badge px-2 py-1" data-ticket-id="3" data-field="service_type" data-value="inspection">Inspection</span></div>
                                        </div>
                                        <div class="col-12">
                                            <small class="text-muted">Address</small>
                                            <div class="text-truncate">Mumbai, Maharashtra</div>
                                        </div>
                                        <div class="col-6">
                                            <small class="text-muted">Contact</small>
                                            <div>Rajesh Kumar</div>
                                        </div>
                                        <div class="col-6">
                                            <small class="text-muted">Mobile</small>
                                            <div>+91 98765 43212</div>
                                        </div>
                                        <div class="col-6">
                                            <small class="text-muted">Model</small>
                                            <div class="fw-semibold">Basic-100</div>
                                        </div>
                                        <div class="col-6">
                                            <small class="text-muted">SLA Timer</small>
                                            <div class="text-success fw-bold">00:05:22</div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <small class="text-muted d-block mb-1">Problem</small>
                                        <div class="bg-light p-2 rounded small">Routine maintenance check</div>
                                    </div>

                                    <div class="row g-2 mb-3">
                                        <div class="col-7">
                                            <small class="text-muted">Technician</small>
                                            <select class="form-select form-select-sm technician-select" data-ticket-id="3">
                                                <option value="tech1" selected>Rahul Sharma <br><small class="text-muted">Nagpur Central (2.5km)</small></option>
                                                <option value="tech2">Priya Patel <br><small class="text-muted">Nagpur South (4.1km)</small></option>
                                                <option value="tech3">Amit Kumar <br><small class="text-muted">Nagpur North (1.8km)</small></option>
                                            </select>
                                        </div>
                                        <div class="col-5">
                                            <small class="text-muted">Created</small>
                                            <div>2026-01-21 16:45</div>
                                        </div>
                                    </div>

                                    <div class="d-flex gap-2 pt-2 border-top">
                                        <button class="btn btn-sm btn-outline-primary flex-fill status-btn" data-ticket-id="3">Change Status</button>
                                        <button class="btn btn-sm btn-outline-warning flex-fill priority-btn" data-ticket-id="3">Change Priority</button>
                                        <button class="btn btn-sm btn-outline-info flex-fill service-btn" data-ticket-id="3">Change Service</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- CARD 4 --}}
                        <div class="col-xl-4 col-lg-6 col-md-12">
                            <div class="card ticket-card high h-100">
                                <div class="card-body">
                                    <input type="checkbox" class="form-check-input row-select d-none" value="4">
                                    <div class="d-none" data-ticket-id="4"></div>

                                    <div class="ticket-header p-3 rounded mb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h6 class="mb-1 fw-bold">
                                                <span class="badge bg-primary me-2">TKT-004</span>
                                            </h6>
                                            <div>
                                                <span class="badge bg-danger priority-badge me-1" data-ticket-id="4" data-field="priority" data-value="high">High</span>
                                                <span class="badge bg-secondary status-badge" data-ticket-id="4" data-field="status" data-value="assigned">Assigned</span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-2 mb-3">
                                        <div class="col-6">
                                            <small class="text-muted">Company</small>
                                            <div class="fw-semibold">PowerTech Solutions</div>
                                        </div>
                                        <div class="col-6">
                                            <small class="text-muted">Service Type</small>
                                            <div><span class="badge bg-warning service-badge px-2 py-1" data-ticket-id="4" data-field="service_type" data-value="installation">Installation</span></div>
                                        </div>
                                        <div class="col-12">
                                            <small class="text-muted">Address</small>
                                            <div class="text-truncate">Delhi, India</div>
                                        </div>
                                        <div class="col-6">
                                            <small class="text-muted">Contact</small>
                                            <div>Priya Singh</div>
                                        </div>
                                        <div class="col-6">
                                            <small class="text-muted">Mobile</small>
                                            <div>+91 98765 43213</div>
                                        </div>
                                        <div class="col-6">
                                            <small class="text-muted">Model</small>
                                            <div class="fw-semibold">Elite-900</div>
                                        </div>
                                        <div class="col-6">
                                            <small class="text-muted">SLA Timer</small>
                                            <div class="text-danger fw-bold">04:12:08</div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <small class="text-muted d-block mb-1">Problem</small>
                                        <div class="bg-light p-2 rounded small">Complete system breakdown</div>
                                    </div>

                                    <div class="row g-2 mb-3">
                                        <div class="col-7">
                                            <small class="text-muted">Technician</small>
                                            <select class="form-select form-select-sm technician-select" data-ticket-id="4">
                                                <option value="tech3" selected>Amit Kumar <br><small class="text-muted">Nagpur North (1.8km)</small></option>
                                                <option value="tech1">Rahul Sharma <br><small class="text-muted">Nagpur Central (2.5km)</small></option>
                                                <option value="tech2">Priya Patel <br><small class="text-muted">Nagpur South (4.1km)</small></option>
                                            </select>
                                        </div>
                                        <div class="col-5">
                                            <small class="text-muted">Created</small>
                                            <div>2026-01-22 14:20</div>
                                        </div>
                                    </div>

                                    <div class="d-flex gap-2 pt-2 border-top">
                                        <button class="btn btn-sm btn-outline-primary flex-fill status-btn" data-ticket-id="4">Change Status</button>
                                        <button class="btn btn-sm btn-outline-warning flex-fill priority-btn" data-ticket-id="4">Change Priority</button>
                                        <button class="btn btn-sm btn-outline-info flex-fill service-btn" data-ticket-id="4">Change Service</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
<script src="{{ versionedAsset('custom/js/tickets/ticket-list.js') }}"></script>
@endsection
