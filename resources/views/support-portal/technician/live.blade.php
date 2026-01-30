{{-- resources/views/support-portal/technician/live.blade.php --}}
@extends('layouts.app')
@section('title', 'Live Tracking')

@section('css')
<link href="https://cdn.jsdelivr.net/npm/@ttskch/r34s@1.0.1/dist/r34s.min.css" rel="stylesheet">
<style>
    #map-container {
        position: relative;
    }
    .legend-box {
        font-size: 0.8rem;
    }
    .legend-dot {
        display: inline-block;
        width: 10px;
        height: 10px;
        border-radius: 50%;
    }
    .card.h-100 {
        display: flex;
        flex-direction: column;
    }
    #map {
        border-radius: 0 0 8px 8px;
    }
</style>
@endsection


@section('content')
<!--start page wrapper -->
            <div class="page-wrapper">
    <div class="page-content">
        <x-breadcrumb :langArray="[
                'Support Portal',
                'Live Tracking',
            ]"/>

        <div class="card">
            <div class="col-4 text-start">
                <button class="btn btn-success" id="playPauseBtn">
                    <i class="bx bx-pause"></i> Pause Tracking
                </button>
                <span class="ms-2" id="lastUpdate">Last update: --:--:--</span>
            </div>
        </div>

        <!-- Live Stats Cards -->
        <div class="row mb-4">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="text-uppercase mb-0 fs-11 font-weight-bold text-white-50">Active Jobs</p>
                                <h3 class="fw-bolder mb-0" id="activeJobs">8</h3>
                            </div>
                            <i class="bx bx-task fs-24"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="text-uppercase mb-0 fs-11 font-weight-bold text-white-50">On Route</p>
                                <h3 class="fw-bolder mb-0" id="onRoute">3</h3>
                            </div>
                            <i class="bx bx-walk fs-24"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="text-uppercase mb-0 fs-11 font-weight-bold text-white-50">Available</p>
                                <h3 class="fw-bolder mb-0" id="availableTechs">4</h3>
                            </div>
                            <i class="bx bx-check-circle fs-24"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-grow-1">
                                <p class="text-uppercase mb-0 fs-11 font-weight-bold text-white-50">Delayed</p>
                                <h3 class="fw-bolder mb-0" id="delayed">2</h3>
                            </div>
                            <i class="bx bx-time-five fs-24"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       <!-- Live Map Section -->
<div class="row">
    <div class="col-xl-8">
        <div class="card h-100">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Live Map</h5>
                <div class="legend-box bg-light px-2 py-1 rounded">
                    <small class="fw-semibold me-2">Legend:</small>
                    <span class="legend-dot bg-danger border border-white me-2"></span>Active
                    <span class="legend-dot bg-warning border border-white mx-2"></span>On Route
                    <span class="legend-dot bg-success border border-white me-2"></span>Available
                    <span class="legend-dot bg-secondary border border-white"></span>Delayed
                </div>
            </div>
            <div class="card-body p-0">
                <div id="map-container" class="position-relative" style="height: 450px; width: 100%; overflow: hidden;">
                    <div id="map" style="height: 100%; width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>


            <!-- Technician Status Panel -->
            <div class="col-xl-4">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="mb-0">Current Status</h5>
                    </div>
                    <div class="card-body">
                        <!-- Technician Live Status -->
                        <div class="technician-status mb-3" data-tech-id="1">
                            <div class="d-flex align-items-center p-2 border rounded">
                                <div class="flex-shrink-0 me-3">
                                    <img src="https://ui-avatars.com/api/?name=Rahul+Sharma&size=40&background=dc3545&color=fff" class="rounded-circle" alt="Rahul">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="fw-semibold">Rahul Sharma <span class="badge bg-danger">🔴 At Job</span></div>
                                    <small class="text-muted">TKT-001 | Motor Repair</small>
                                </div>
                                <div>
                                    <div class="text-center">
                                        <div class="fw-bold text-danger fs-6" id="rahul-timer">01:23:45</div>
                                        <small>ETA: 30 mins</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="technician-status mb-3" data-tech-id="2">
                            <div class="d-flex align-items-center p-2 border rounded">
                                <div class="flex-shrink-0 me-3">
                                    <img src="https://ui-avatars.com/api/?name=Priya+Patel&size=40&background=10b981&color=fff" class="rounded-circle" alt="Priya">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="fw-semibold">Priya Patel <span class="badge bg-warning">🟡 Moving</span></div>
                                    <small class="text-muted">To TKT-002 | Nagpur South</small>
                                </div>
                                <div>
                                    <div class="text-center">
                                        <div class="fw-bold text-warning fs-6" id="priya-timer">00:45:12</div>
                                        <small>Next: TKT-003 (2.5km)</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="technician-status mb-3" data-tech-id="3">
                            <div class="d-flex align-items-center p-2 border rounded">
                                <div class="flex-shrink-0 me-3">
                                    <img src="https://ui-avatars.com/api/?name=Amit+Kumar&size=40&background=198754&color=fff" class="rounded-circle" alt="Amit">
                                </div>
                                <div class="flex-grow-1">
                                    <div class="fw-semibold">Amit Kumar <span class="badge bg-success">🟢 Available</span></div>
                                    <small class="text-muted">Nagpur North - Ready</small>
                                </div>
                                <div>
                                    <div class="text-center">
                                        <div class="fw-bold text-success fs-6" id="amit-timer">00:00:00</div>
                                        <small>Next: Assign</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    let map, techMarkers = {};
    let isTracking = true;
    let updateInterval;

    $(document).ready(function() {
        initMap();
        startTracking();
        
        $('#playPauseBtn').click(function() {
            isTracking = !isTracking;
            if (isTracking) {
                $(this).html('<i class="bx bx-pause"></i> Pause Tracking');
                startTracking();
            } else {
                $(this).html('<i class="bx bx-play"></i> Resume Tracking');
                stopTracking();
            }
        });
    });

    function initMap() {
    map = L.map('map').setView([21.1458, 79.0882], 12);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap'
    }).addTo(map);
    
    // Ensure map fits container perfectly
    map.invalidateSize();
    
    // Auto-fit on window resize
    window.addEventListener('resize', () => {
        setTimeout(() => map.invalidateSize(), 100);
    });
}


    function startTracking() {
        updateInterval = setInterval(updateLiveData, 5000); // Update every 5 seconds
        updateLiveData();
    }

    function stopTracking() {
        clearInterval(updateInterval);
    }

    function updateLiveData() {
        // Simulate live data
        const techData = [
            {id: 1, name: 'Rahul Sharma', lat: 21.15, lng: 79.09, status: 'active', job: 'TKT-001', timer: '01:23:45', eta: '30 mins'},
            {id: 2, name: 'Priya Patel', lat: 21.13, lng: 79.07, status: 'moving', job: 'TKT-002', timer: '00:45:12', next: 'TKT-003'},
            {id: 3, name: 'Amit Kumar', lat: 21.17, lng: 79.10, status: 'available', job: 'None', timer: '00:00:00', next: 'Assign'}
        ];

        techData.forEach(tech => {
            updateTechnician(tech);
            updateMarker(tech);
        });

        $('#lastUpdate').text('Last update: ' + new Date().toLocaleTimeString());
    }

    function updateTechnician(tech) {
        $(`[data-tech-id="${tech.id}"] .fw-semibold`).html(tech.name + ` <span class="badge bg-${getStatusColor(tech.status)}">${getStatusIcon(tech.status)}</span>`);
        $(`#${tech.name.toLowerCase().replace(' ', '-')}-timer`).text(tech.timer);
    }

    function getStatusColor(status) {
        return status === 'active' ? 'danger' : status === 'moving' ? 'warning' : 'success';
    }

    function getStatusIcon(status) {
        return status === 'active' ? '🔴 At Job' : status === 'moving' ? '🟡 Moving' : '🟢 Available';
    }

    function updateMarker(tech) {
        if (techMarkers[tech.id]) {
            map.removeLayer(techMarkers[tech.id]);
        }
        
        const icon = getMarkerIcon(tech.status);
        techMarkers[tech.id] = L.marker([tech.lat, tech.lng], {icon: icon})
            .addTo(map)
            .bindPopup(`
                <b>${tech.name}</b><br>
                ${tech.job}<br>
                ETA: ${tech.eta || 'N/A'}<br>
                <span class="badge bg-${getStatusColor(tech.status)}">${getStatusIcon(tech.status)}</span>
            `);
    }

    function getMarkerIcon(status) {
        const colors = {
            active: '#dc3545',
            moving: '#ffc107', 
            available: '#28a745'
        };
        return L.divIcon({
            className: 'custom-marker',
            html: `<div style="background:${colors[status]};width:20px;height:20px;border-radius:50%;border:3px solid white;box-shadow:0 2px 6px rgba(0,0,0,0.3);"></div>`,
            iconSize: [26, 26],
            iconAnchor: [13, 13]
        });
    }
</script>
@endsection
