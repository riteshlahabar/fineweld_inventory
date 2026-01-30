{{-- resources/views/support-portal/ticket/status.blade.php --}}
@extends('layouts.app')
@section('title', 'Ticket Status')

@section('css')
<style>
.ticket-tile {
    border: none;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border-top: 4px solid #10b981;
    transition: all 0.3s ease;
    cursor: pointer;
    overflow: hidden;
}
.ticket-tile:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
}
.tile-avatar {
    width: 60px;
    height: 60px;
    object-fit: cover;
}
.completed-ticket-card {
    border: none;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    border-top: 4px solid #10b981;
}
.part-item {
    border: 1px solid #e9ecef;
    border-radius: 8px;
    transition: all 0.3s ease;
}
.part-item:hover {
    border-color: #10b981;
    box-shadow: 0 4px 12px rgba(16,185,129,0.15);
}
.part-image {
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 6px;
}
.ticket-image {
    max-height: 200px;
    object-fit: cover;
    border-radius: 12px;
}
.status-timeline {
    position: relative;
    max-width: 800px;
    margin: 0 auto;
}
.status-timeline::before {
    content: '';
    position: absolute;
    left: 50%;
    top: 0;
    bottom: 0;
    width: 2px;
    background: linear-gradient(to bottom, #10b981, #34d399);
    transform: translateX(-50%);
}
.timeline-item {
    position: relative;
    margin: 2rem 0;
}
.timeline-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #10b981;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    z-index: 1;
}
.modal-xl-custom {
    max-width: 1100px;
}
</style>
@endsection

@section('content')
<div class="page-wrapper">
    <div class="page-content">
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">
                <h5>Completed Tickets</h5>
            </div>
            <div class="ps-3 mt-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('tickets.list') }}"><i class="bx bx-support"></i> Support Portal</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Completed Tickets</li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Compact Tiles Grid -->
        <div class="row g-4">
            <!-- Ticket Tile 1 -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="card h-100 ticket-tile" data-bs-toggle="modal" data-bs-target="#ticketModal1">
                    <div class="card-body p-4 text-center position-relative">
                        <div class="position-absolute top-0 end-0 p-2">
                            <span class="badge bg-success rounded-pill">Completed</span>
                        </div>
                        <div class="mb-3">
                            <img src="https://ui-avatars.com/api/?name=Motor+Failure&size=60&background=10b981&color=fff" 
                                 class="rounded-circle mx-auto mb-2 tile-avatar shadow-sm" alt="TKT-001">
                        </div>
                        <h6 class="fw-bold mb-2 text-truncate">TKT-001</h6>
                        <p class="text-muted small mb-2">Motor Failure</p>
                        <div class="fw-bold text-success fs-5 mb-2">₹18,500</div>
                        <div class="d-flex justify-content-between small text-muted">
                            <span>Rahul Sharma</span>
                            <span>22 Jan</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ticket Tile 2 -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="card h-100 ticket-tile" data-bs-toggle="modal" data-bs-target="#ticketModal2">
                    <div class="card-body p-4 text-center position-relative">
                        <div class="position-absolute top-0 end-0 p-2">
                            <span class="badge bg-warning rounded-pill">In Progress</span>
                        </div>
                        <img src="https://ui-avatars.com/api/?name=Welding&size=60&background=ffc107&color=000" 
                             class="rounded-circle mx-auto mb-2 tile-avatar shadow-sm" alt="TKT-002">
                        <h6 class="fw-bold mb-2 text-truncate">TKT-002</h6>
                        <p class="text-muted small mb-2">Welding Machine</p>
                        <div class="fw-bold text-warning fs-5 mb-2">₹12,800</div>
                        <div class="d-flex justify-content-between small text-muted">
                            <span>Priya Patel</span>
                            <span>21 Jan</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ticket Tile 3 -->
            <div class="col-xl-3 col-lg-4 col-md-6">
                <div class="card h-100 ticket-tile" data-bs-toggle="modal" data-bs-target="#ticketModal3">
                    <div class="card-body p-4 text-center position-relative">
                        <div class="position-absolute top-0 end-0 p-2">
                            <span class="badge bg-info rounded-pill">Pending Parts</span>
                        </div>
                        <img src="https://ui-avatars.com/api/?name=Hydraulic&size=60&background=0dcaf0&color=000" 
                             class="rounded-circle mx-auto mb-2 tile-avatar shadow-sm" alt="TKT-003">
                        <h6 class="fw-bold mb-2 text-truncate">TKT-003</h6>
                        <p class="text-muted small mb-2">Hydraulic Leak</p>
                        <div class="fw-bold text-info fs-5 mb-2">₹9,200</div>
                        <div class="d-flex justify-content-between small text-muted">
                            <span>Amit Kumar</span>
                            <span>20 Jan</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Add more tiles as needed -->
        </div>
    </div>
</div>

<!-- Modal 1: TKT-001 Full Details -->
<div class="modal fade" id="ticketModal1" tabindex="-1">
    <div class="modal-dialog modal-xl-custom modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content completed-ticket-card">
            <div class="modal-header bg-gradient-success text-white py-4">
                <div class="d-flex align-items-center">
                    <span class="badge bg-light fs-6 px-3 py-2 me-3">TKT-001</span>
                    <h4 class="mb-0 fw-bold">Motor Failure - Complete System Overhaul</h4>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="fw-bold text-muted mb-2">Customer Details</h6>
                        <div class="d-flex align-items-center mb-1">
                            <i class="bx bx-user-circle me-2 text-primary"></i>
                            <div>
                                <div class="fw-semibold">John Doe</div>
                                <small class="text-muted">+91 98765 43210</small>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <i class="bx bx-building-house me-2 text-info"></i>
                            <div class="fw-semibold">Fineweilds Pvt Ltd</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-bold text-muted mb-2">Service Location</h6>
                        <div class="d-flex align-items-center mb-1">
                            <i class="bx bx-map-pin me-2 text-danger"></i>
                            <div>
                                <div class="fw-semibold">Nagpur Central, Maharashtra</div>
                                <small class="text-muted">Plot No. 45, Industrial Area</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mb-4">
                    <h6 class="fw-bold text-muted mb-3">Machine Damage Photo</h6>
                    <div class="text-center">
                        <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800" 
                             alt="Motor Damage" class="ticket-image img-fluid shadow-sm border">
                        <div class="mt-2 text-muted small">Burnt motor windings and bearing failure</div>
                    </div>
                </div>

                <h6 class="fw-bold text-muted mb-3">Parts Used & Charges</h6>
                <div class="row g-3 mb-4">
                    <div class="col-md-6 col-lg-4">
                        <div class="part-item p-3 h-100">
                            <div class="d-flex align-items-start mb-2">
                                <img src="https://images.unsplash.com/photo-1605392008895-8b96e4ee9aca?w=200" 
                                     alt="Motor" class="part-image me-3 shadow-sm flex-shrink-0">
                                <div class="flex-grow-1">
                                    <h6 class="fw-bold mb-1">Industrial Motor 5HP</h6>
                                    <div class="text-success fw-bold fs-6 mb-1">₹12,000</div>
                                    <small class="text-muted">Qty: 1 | Warranty: 12 months</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="part-item p-3 h-100">
                            <div class="d-flex align-items-start mb-2">
                                <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=200" 
                                     alt="Bearing" class="part-image me-3 shadow-sm flex-shrink-0">
                                <div class="flex-grow-1">
                                    <h6 class="fw-bold mb-1">Heavy Duty Bearing Set</h6>
                                    <div class="text-success fw-bold fs-6 mb-1">₹2,800</div>
                                    <small class="text-muted">Qty: 2 | Warranty: 6 months</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="part-item p-3 h-100">
                            <div class="d-flex align-items-start mb-2">
                                <img src="https://images.unsplash.com/photo-1558618047-3c8c76fdd7a4?w=200" 
                                     alt="Belts" class="part-image me-3 shadow-sm flex-shrink-0">
                                <div class="flex-grow-1">
                                    <h6 class="fw-bold mb-1">V-Belt Drive Kit</h6>
                                    <div class="text-success fw-bold fs-6 mb-1">₹1,500</div>
                                    <small class="text-muted">Qty: 1 | Warranty: 3 months</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="part-item p-3 bg-light">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="fw-bold mb-1">Labor Charges</h6>
                                    <small class="text-muted">Motor replacement, alignment & testing (4.5 hrs)</small>
                                </div>
                                <div class="col-md-4 text-md-end">
                                    <div class="text-success fw-bold fs-5">₹2,200</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <h6 class="fw-bold text-muted mb-3">Service Timeline</h6>
                <div class="status-timeline">
                    <div class="row timeline-item">
                        <div class="col-md-6">
                            <div class="text-end mb-3">
                                <div class="timeline-icon bg-info">1</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded ms-4">
                                <div class="fw-bold text-info mb-1">Ticket Created</div>
                                <small class="text-muted">2026-01-22 10:30 AM</small>
                            </div>
                        </div>
                    </div>
                    <div class="row timeline-item">
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded me-4">
                                <div class="fw-bold text-warning mb-1">Technician Assigned</div>
                                <small class="text-muted">Rahul Sharma • 2026-01-22 11:15 AM</small>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-start mb-3">
                                <div class="timeline-icon bg-warning">2</div>
                            </div>
                        </div>
                    </div>
                    <div class="row timeline-item">
                        <div class="col-md-6">
                            <div class="text-end mb-3">
                                <div class="timeline-icon bg-primary">3</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded ms-4">
                                <div class="fw-bold text-primary mb-1">Job Completed</div>
                                <small class="text-muted">2026-01-22 15:45 PM • Tested & Running</small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4 pt-3 border-top">
                    <div class="col-md-6">
                        <div class="fw-bold text-muted">Technician</div>
                        <div class="fw-semibold text-primary">Rahul Sharma</div>
                        <small class="text-muted">Nagpur Central • TECH001</small>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <div class="fw-bold text-success fs-4 mb-1">TOTAL: ₹18,500</div>
                        <div class="text-success">✅ Service Completed Successfully</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal 2 & 3 (Simplified) -->
<div class="modal fade" id="ticketModal2" tabindex="-1">
    <div class="modal-dialog modal-xl-custom modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-gradient-warning text-dark">
                <h5 class="mb-0">TKT-002 - Welding Machine Repair</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>In progress - Priya Patel assigned</p>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ticketModal3" tabindex="-1">
    <div class="modal-dialog modal-xl-custom modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-gradient-info text-white">
                <h5 class="mb-0">TKT-003 - Hydraulic Leak</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>Pending parts - Awaiting delivery</p>
            </div>
        </div>
    </div>
</div>
@endsection
