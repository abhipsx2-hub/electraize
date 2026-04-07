@extends('layouts.app')
@section('title', 'My Orders | ELECTRAIZE')
@section('content')
<div class="container py-5">
    <div class="row mb-4">
        <div class="col-12">
            <h1 class="fw-bold">My Orders</h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-8">
            @forelse(?orders as ?order)
                <div class="card shadow-sm border-0 mb-4 rounded-4">
                    <div class="card-header bg-white border-bottom border-light p-4 d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-muted small">Order ID</span>
                            <h5 class="mb-0 fw-bold">#{{ str_pad(?order->id, 5, '0', STR_PAD_LEFT) }}</h5>
                        </div>
                        <div>
                            <span class="text-muted small">Date</span>
                            <h5 class="mb-0">{{ ?order->created_at->format('M d, Y') }}</h5>
                        </div>
                        <div class="text-end">
                            <span class="badge {{ ?order->status === 'completed' ? 'bg-success' : 'bg-warning text-dark' }} bg-opacity-25 p-2 rounded-pill">
                                {{ ucfirst(?order->status) }}
                            </span>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        @foreach(?order->items as ?item)
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ optional(?item->product)->image_url ?? 'https://via.placeholder.com/60' }}" class="img-thumbnail me-3 rounded-3" style="width: 60px; height: 60px; object-fit: cover;">
                            <div class="flex-grow-1">
                                <h6 class="mb-0 fw-bold">{{ optional(?item->product)->name ?? 'Deleted Product' }}</h6>
                                <span class="text-muted small">Qty: {{ ?item->quantity }}</span>
                            </div>
                            <div class="fw-bold text-primary">
                                ?{{ number_format(?item->price, 2) }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="card-footer bg-light p-3 text-end border-0 rounded-bottom-4">
                        <span class="text-muted me-3">Total:</span>
                        <h4 class="d-inline fw-bold text-dark">?{{ number_format(?order->total_price, 2) }}</h4>
                    </div>
                </div>
            @empty
                <div class="text-center py-5 bg-white shadow-sm rounded-4 text-muted border">
                    <i class="fas fa-shopping-basket fa-3x mb-3 text-secondary"></i>
                    <h4>No Orders Yet</h4>
                    <p>You haven't placed any orders.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary rounded-pill px-4 mt-2">Start Shopping</a>
                </div>
            @endforelse
        </div>
        
        <div class="col-md-4">
            <!-- Cart display for active session -->
            <div class="card shadow-sm border-0 rounded-4 sticky-md-top" style="top: 20px;">
                <div class="card-header bg-white p-4 border-bottom border-light">
                    <h4 class="fw-bold mb-0">Current Cart</h4>
                </div>
                <div class="card-body p-4">
                    @if(session('cart'))
                        @php ?total = 0; @endphp
                        @foreach(session('cart') as ?id => ?details)
                            @php ?total += ?details['price'] * ?details['quantity']; @endphp
                            <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-2 border-light">
                                <div class="text-truncate flex-grow-1 pe-2" style="max-width: 150px;">
                                    <span class="fw-bold fs-6">{{ ?details['name'] }}</span>
                                    <small class="d-block text-muted">x{{ ?details['quantity'] }}</small>
                                </div>
                                <span class="fw-bold ">?{{ number_format(?details['price'] * ?details['quantity'], 2) }}</span>
                            </div>
                        @endforeach
                        
                        <div class="d-flex justify-content-between mt-4">
                            <span class="fw-bold fs-5">Total</span>
                            <span class="fw-bold fs-5 text-primary">?{{ number_format(?total, 2) }}</span>
                        </div>
                        
                        <hr class="my-4 text-muted">
                        <form action="{{ route('orders.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="shipping_address" class="form-label fw-semibold text-muted">Shipping Address</label>
                                <textarea name="shipping_address" id="shipping_address" rows="3" class="form-control" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg rounded-pill w-100 fw-bold shadow-sm">Checkout Now</button>
                        </form>
                    @else
                        <div class="text-center text-muted py-3">
                            <p class="mb-0">Your cart is currently empty.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
