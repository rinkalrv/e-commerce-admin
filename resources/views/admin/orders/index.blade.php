<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-luxury-gold">Order Management</h2>
        <div class="flex space-x-4">
            <div class="relative">
                <input type="text" placeholder="Search orders..." class="pl-10 pr-4 py-2 rounded-md border-luxury bg-luxury-dark text-luxury-light focus:ring-luxury-gold focus:border-luxury-gold">
                <div class="absolute left-3 top-2.5 text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
            </div>
            <select class="rounded-md border-luxury bg-luxury-dark text-luxury-light focus:ring-luxury-gold focus:border-luxury-gold">
                <option>Filter by status</option>
                <option>Pending</option>
                <option>Processing</option>
                <option>Completed</option>
                <option>Cancelled</option>
            </select>
        </div>
    </div>

    <div class="bg-luxury-accent rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-700">
                <thead class="bg-luxury-dark">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-luxury-gold uppercase tracking-wider">Order #</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-luxury-gold uppercase tracking-wider">Customer</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-luxury-gold uppercase tracking-wider">Date</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-luxury-gold uppercase tracking-wider">Amount</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-luxury-gold uppercase tracking-wider">Status</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-luxury-gold uppercase tracking-wider">Payment</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-luxury-gold uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-700">
                    @foreach($orders as $order)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('admin.orders.show', $order) }}" class="text-luxury-gold hover:underline font-medium">
                                #{{ $order->order_number }}
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="font-medium">{{ $order->user->name }}</div>
                            <div class="text-sm text-gray-300">{{ $order->user->email }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            {{ $order->created_at->format('M d, Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            ${{ number_format($order->total_amount, 2) }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $order->status === 'completed' ? 'bg-green-100 text-green-800' : 
                                   ($order->status === 'processing' ? 'bg-blue-100 text-blue-800' :
                                   ($order->status === 'cancelled' ? 'bg-red-100 text-red-800' : 'bg-yellow-100 text-yellow-800')) }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $order->payment_status === 'paid' ? 'bg-green-100 text-green-800' : 
                                   ($order->payment_status === 'refunded' ? 'bg-purple-100 text-purple-800' : 'bg-red-100 text-red-800') }}">
                                {{ ucfirst($order->payment_status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('admin.orders.show', $order) }}" class="text-luxury-gold hover:text-amber-600 mr-3">View</a>
                            <a href="{{ route('admin.orders.invoice', $order) }}" class="text-blue-600 hover:text-blue-900" download>Invoice</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="px-6 py-4 bg-luxury-dark">
            {{ $orders->links() }}
        </div>
    </div>

    @push('styles')
    <style>
        /* Custom pagination styling to match luxury theme */
        .pagination .page-item.active .page-link {
            @apply bg-luxury-gold border-luxury-gold text-luxury-dark;
        }
        .pagination .page-link {
            @apply bg-luxury-dark border-luxury-accent text-luxury-light hover:bg-luxury-accent;
        }
    </style>
    @endpush
</x-admin-layout>