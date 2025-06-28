<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <div>
            <h2 class="text-2xl font-bold text-luxury-gold">Order #{{ $order->order_number }}</h2>
            <p class="text-sm text-gray-300">Placed on {{ $order->created_at->format('M d, Y \a\t h:i A') }}</p>
        </div>
        <div class="flex space-x-4">
            <a href="{{ route('admin.orders.invoice', $order) }}" class="btn-luxury" download>
                Download Invoice
            </a>
            <a href="{{ route('admin.orders.index') }}" class="btn-luxury">Back to Orders</a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Order Items -->
        <div class="lg:col-span-2 space-y-6">
            <div class="bg-luxury-accent p-6 rounded-lg shadow">
                <h3 class="text-lg font-medium text-luxury-gold mb-4">Order Items</h3>
                <div class="divide-y divide-gray-700">
                    @foreach($order->items as $item)
                    <div class="py-4 flex">
                        <div class="h-16 w-16 flex-shrink-0 overflow-hidden rounded-md bg-gray-800">
                            @if($item->product->image_path)
                                <img src="{{ Storage::url($item->product->image_path) }}" 
                                     alt="{{ $item->product->name }}" 
                                     class="h-full w-full object-cover">
                            @else
                                <div class="h-full w-full flex items-center justify-center">
                                    <svg class="h-8 w-8 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                            @endif
                        </div>

                        <div class="ml-4 flex-1">
                            <div>
                                <h4 class="text-sm font-medium text-luxury-light">
                                    {{ $item->product->name }}
                                </h4>
                                <p class="mt-1 text-sm text-gray-300">SKU: {{ $item->product->sku ?? 'N/A' }}</p>
                            </div>
                            <div class="flex justify-between mt-2">
                                <p class="text-sm text-gray-300">Qty: {{ $item->quantity }}</p>
                                <p class="text-sm font-medium text-luxury-gold">
                                    ${{ number_format($item->price, 2) }}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="mt-6 border-t border-gray-700 pt-4">
                    <div class="flex justify-between text-base font-medium text-luxury-light">
                        <p>Subtotal</p>
                        <p>${{ number_format($order->total_amount, 2) }}</p>
                    </div>
                    <div class="flex justify-between text-sm text-gray-300 mt-1">
                        <p>Shipping</p>
                        <p>$0.00</p>
                    </div>
                    <div class="flex justify-between text-lg font-bold text-luxury-gold mt-4">
                        <p>Total</p>
                        <p>${{ number_format($order->total_amount, 2) }}</p>
                    </div>
                </div>
            </div>

            <!-- Order Status Management -->
            <div class="bg-luxury-accent p-6 rounded-lg shadow">
                <h3 class="text-lg font-medium text-luxury-gold mb-4">Update Order Status</h3>
                <form action="{{ route('admin.orders.status', $order) }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label for="status" class="block text-sm font-medium text-luxury-gold mb-1">Order Status</label>
                            <select name="status" id="status" 
                                    class="w-full rounded-md border-luxury bg-luxury-dark text-luxury-light focus:ring-luxury-gold focus:border-luxury-gold">
                                @foreach(['pending', 'processing', 'completed', 'cancelled'] as $status)
                                    <option value="{{ $status }}" {{ $order->status === $status ? 'selected' : '' }}>
                                        {{ ucfirst($status) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="payment_status" class="block text-sm font-medium text-luxury-gold mb-1">Payment Status</label>
                            <select name="payment_status" id="payment_status" 
                                    class="w-full rounded-md border-luxury bg-luxury-dark text-luxury-light focus:ring-luxury-gold focus:border-luxury-gold">
                                @foreach(['paid', 'unpaid', 'refunded'] as $status)
                                    <option value="{{ $status }}" {{ $order->payment_status === $status ? 'selected' : '' }}>
                                        {{ ucfirst($status) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="mt-4 btn-luxury px-4 py-2">
                        Update Status
                    </button>
                </form>
            </div>
        </div>

        <!-- Customer & Shipping Info -->
        <div class="space-y-6">
            <div class="bg-luxury-accent p-6 rounded-lg shadow">
                <h3 class="text-lg font-medium text-luxury-gold mb-4">Customer Information</h3>
                <div class="space-y-2">
                    <p class="text-sm"><span class="text-luxury-gold">Name:</span> {{ $order->user->name }}</p>
                    <p class="text-sm"><span class="text-luxury-gold">Email:</span> {{ $order->user->email }}</p>
                    <p class="text-sm"><span class="text-luxury-gold">Phone:</span> {{ $order->user->phone ?? 'N/A' }}</p>
                </div>
            </div>

            <div class="bg-luxury-accent p-6 rounded-lg shadow">
                <h3 class="text-lg font-medium text-luxury-gold mb-4">Shipping Address</h3>
                <address class="text-sm not-italic">
                    {!! nl2br(e($order->shipping_address)) !!}
                </address>
            </div>

            <div class="bg-luxury-accent p-6 rounded-lg shadow">
                <h3 class="text-lg font-medium text-luxury-gold mb-4">Billing Address</h3>
                <address class="text-sm not-italic">
                    {!! nl2br(e($order->billing_address)) !!}
                </address>
            </div>

            <div class="bg-luxury-accent p-6 rounded-lg shadow">
                <h3 class="text-lg font-medium text-luxury-gold mb-4">Order Notes</h3>
                <p class="text-sm">{{ $order->customer_note ?? 'No notes provided' }}</p>
            </div>
        </div>
    </div>
</x-admin-layout>