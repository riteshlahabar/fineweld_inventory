<?php

namespace App\Http\Controllers\Supportportal;

use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    public function list()
    {
        return view('support-portal.ticket.list');
    }
    
    public function datatableList()
    {
        // Return JSON data for datatable later
        return response()->json([]);
    }
    
    public function create()
{
    return view('support-portal.ticket.create');
}

public function assign()
{
    return view('support-portal.technician.assign');
}

public function track()
{
    return view('support-portal.technician.live');
}

public function status()
{
    // DUMMY DATA for design
    $ticket = (object) [
        'ticket_id' => 'TKT-001',
        'status' => 'completed',
        'total_amount' => 18500,
        'customer' => (object) [
            'name' => 'John Doe',
            'company' => 'Fineweilds Pvt Ltd',
            'phone' => '+91 98765 43210'
        ],
        'technician' => (object) [
            'name' => 'Rahul Sharma',
            'id' => 'TECH001'
        ],
        'parts' => [
            (object) ['name' => 'Industrial Motor 5HP', 'price' => 12000, 'image' => ''],
            (object) ['name' => 'Heavy Duty Bearing Set', 'price' => 2800, 'image' => ''],
            (object) ['name' => 'V-Belt Drive Kit', 'price' => 1500, 'image' => '']
        ]
    ];

    return view('support-portal.ticket.status', compact('ticket'));
}



}
