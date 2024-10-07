@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Dashboard</h1>

        <h2 class="text-center">Hi Admin</h2>

        <div class="row mt-4">
            <!-- Today's Orders Card -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title">
                            <i class="fas fa-shopping-cart"></i> Orders for Today
                        </h3>
                        @if ($todayOrders->isEmpty())
                            <p class="text-muted">No orders for today.</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Total Price</th>
                                        <th>Order Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($todayOrders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->total_price }} Dh</td>
                                            <td>{{ $order->created_at->format('Y-m-d H:i:s') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Stock Alerts Card -->
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h3 class="card-title">
                            <i class="fas fa-exclamation-triangle"></i> Stock Alerts
                        </h3>
                        @if ($lowStockProducts->isEmpty())
                            <p class="text-muted">No products with low stock.</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lowStockProducts as $product)
                                        <tr>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->quantity }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Today's Tasks -->
        <div class="mt-4">
            <h4 class="text-center">Today's Tasks</h4>
            @if ($todayTasks->count() > 0)
                <ul class="list-group">
                    @foreach ($todayTasks as $task)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>
                                <i class="fas fa-tasks"></i> {{ $task->title }}
                            </span>
                            <span class="badge badge-primary badge-pill">{{ $task->description }}</span>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="text-center text-muted">No tasks for today.</p>
            @endif
        </div>
    </div>
@endsection
