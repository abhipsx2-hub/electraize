@extends('layouts.app')
@section('title', 'Admin Dashboard | ELECTRAIZE')
@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold m-0"><i class="fas fa-cogs text-primary me-2"></i>Admin Dashboard</h1>
    </div>

    <!-- Stats Row -->
    <div class="row g-4 mb-5">
        <div class="col-md-6 col-lg-3">
            <div class="card shadow-sm border-0 border-start border-4 border-primary rounded-3 text-center py-3">
                <div class="card-body">
                    <h5 class="text-muted mb-2 fw-semibold">Total Users</h5>
                    <h2 class="display-5 fw-bold m-0">{{ $total_users }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card shadow-sm border-0 border-start border-4 border-success rounded-3 text-center py-3">
                <div class="card-body">
                    <h5 class="text-muted mb-2 fw-semibold">Total Orders</h5>
                    <h2 class="display-5 fw-bold m-0">{{ $total_orders }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card shadow-sm border-0 border-start border-4 border-info rounded-3 text-center py-3">
                <div class="card-body">
                    <h5 class="text-muted mb-2 fw-semibold">Products</h5>
                    <h2 class="display-5 fw-bold m-0">{{ $total_products }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="card shadow-sm border-0 border-start border-4 border-warning rounded-3 text-center py-3">
                <div class="card-body">
                    <h5 class="text-muted mb-2 fw-semibold">Pending Repairs</h5>
                    <h2 class="display-5 fw-bold m-0">{{ $pending_repairs }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <!-- Recent Orders -->
        <div class="col-lg-6">
            <div class="card shadow-sm border-0 rounded-4 h-100">
                <div class="card-header bg-white p-4 border-bottom d-flex justify-content-between align-items-center">
                    <h5 class="fw-bold m-0">Recent Orders</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Order #</th>
                                    <th>Customer</th>
                                    <th>Details</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recent_orders as $order)
                                <tr>
                                    <td><strong>{{ str_pad($order->id, 5, '0', STR_PAD_LEFT) }}</strong></td>
                                    <td>{{ optional($order->user)->name ?? 'Guest' }}</td>
                                    <td>${{ number_format($order->total_price, 2) }}</td>
                                    <td><span class="badge {{ $order->status === 'completed' ? 'bg-success' : 'bg-warning text-dark' }}">{{ ucfirst($order->status) }}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Repairs -->
        <div class="col-lg-6">
            <div class="card shadow-sm border-0 rounded-4 h-100">
                <div class="card-header bg-white p-4 border-bottom">
                    <h5 class="fw-bold m-0">Recent Repair Requests</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Issue</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recent_repairs as $repair)
                                <tr>
                                    <td>{{ $repair->name }}</td>
                                    <td class="text-truncate" style="max-width: 150px;" title="{{ $repair->issue }}">{{ $repair->issue }}</td>
                                    <td>{{ $repair->phone }}</td>
                                    <td><span class="badge bg-secondary">{{ ucfirst($repair->status) }}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- E-Waste Requests -->
        <div class="col-lg-12">
            <div class="card shadow-sm border-0 rounded-4 h-100">
                <div class="card-header bg-white p-4 border-bottom">
                    <h5 class="fw-bold m-0">E-Waste Pickup Requests</h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Contact</th>
                                    <th>Items</th>
                                    <th>Address</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recent_ewaste as $ewaste)
                                <tr>
                                    <td>{{ $ewaste->name }}</td>
                                    <td>{{ $ewaste->phone }}</td>
                                    <td>{{ $ewaste->item_description }}</td>
                                    <td>{{ $ewaste->address }}</td>
                                    <td><span class="badge bg-dark">{{ ucfirst($ewaste->status) }}</span></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
