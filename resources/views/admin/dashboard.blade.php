<x-admin-layout>
    <div class="space-y-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <!-- Stats Cards -->
            <div class="bg-luxury-accent p-6 rounded-lg shadow">
                <h3 class="text-lg font-medium text-luxury-gold">Total Products</h3>
                <p class="text-3xl font-bold mt-2">{{ $totalProducts }}</p>
            </div>
            <div class="bg-luxury-accent p-6 rounded-lg shadow">
                <h3 class="text-lg font-medium text-luxury-gold">Total Orders</h3>
                <p class="text-3xl font-bold mt-2">{{ $totalOrders }}</p>
            </div>
            <div class="bg-luxury-accent p-6 rounded-lg shadow">
                <h3 class="text-lg font-medium text-luxury-gold">Total Users</h3>
                <p class="text-3xl font-bold mt-2">{{ $totalUsers }}</p>
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="bg-luxury-accent p-6 rounded-lg shadow">
            <h3 class="text-lg font-medium text-luxury-gold mb-4">Recent Orders</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-700">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-luxury-gold uppercase tracking-wider">Order #</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-luxury-gold uppercase tracking-wider">Customer</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-luxury-gold uppercase tracking-wider">Amount</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-luxury-gold uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-luxury-gold uppercase tracking-wider">Date</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-700">
                        @foreach($recentOrders as $order)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('admin.orders.show', $order) }}" class="text-luxury-gold hover:underline">
                                    {{ $order->order_number }}
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $order->user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">${{ number_format($order->total_amount, 2) }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $order->status === 'completed' ? 'bg-green-100 text-green-800' : 
                                       ($order->status === 'cancelled' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800') }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $order->created_at->format('M d, Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>