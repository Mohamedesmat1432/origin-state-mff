<div class="bg-white p-6 rounded-xl shadow max-w-xl mx-auto text-center">
    <h2 class="text-2xl font-bold text-gray-800 mb-2">Send Asset Notification</h2>
    <p class="text-gray-500 mb-4">Notify all @mff.gov.eg users about this asset.</p>

    <button wire:click="notifyUsers" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">
        Send Notification
    </button>

    @if (session()->has('success'))
        <div class="mt-4 text-green-600">{{ session('success') }}</div>
    @endif

    <div class="mt-6 text-left">
        <h3 class="text-lg font-semibold text-gray-700 mb-2">Your Notifications</h3>
        <ul class="text-sm text-gray-600 space-y-2">
            @foreach ($notifications as $notification)
                <li class="border p-2 rounded shadow-sm">
                    {{ $notification->data['message'] ?? 'No message' }}<br>
                    <span class="text-xs text-gray-400">{{ $notification->created_at->diffForHumans() }}</span>
                </li>
            @endforeach
        </ul>
    </div>
</div>
