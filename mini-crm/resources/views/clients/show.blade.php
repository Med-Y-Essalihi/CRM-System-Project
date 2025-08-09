<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#EEEEEE] leading-tight" style="color: white">
            {{ $client->name }}
        </h2>
    </x-slot>

    <style>
        ul{
            li{
                color: white;
            }
        }
    </style>

    <div class="max-w-xl mx-auto py-8 text-[#EEEEEE] bg-[#393E46] rounded-lg p-6 shadow-md" style="background-color: #393E46; margin-top: 200px;">
        <ul class="space-y-4">
            <li><strong>Email:</strong> <span class="text-[#00ADB5]">{{ $client->email ?? 'N/A' }}</span></li>
            <li><strong>Phone:</strong> <span class="text-[#00ADB5]">{{ $client->phone ?? 'N/A' }}</span></li>
            <li><strong>Company:</strong> <span class="text-[#00ADB5]">{{ $client->company ?? 'N/A' }}</span></li>
            <li><strong>Notes:</strong><br> <span class="text-[#EEEEEE] whitespace-pre-wrap">{{ $client->notes ?? 'N/A' }}</span></li>
        </ul>

        <div class="mt-6 flex gap-4">
            <a href="{{ route('clients.edit', $client) }}" class="text-[#00ADB5] hover:underline font-semibold" style="background-color: #222831; color: #EEEEEE; padding: 5px 10px; border-radius: 5px; border: 2px solid #00ADB5; text-decoration: none;">Edit</a>
            <a href="{{ route('clients.index') }}" class="text-[#EEEEEE] hover:underline font-semibold" style="background-color: #222831; color: #EEEEEE; padding: 5px 10px; border-radius: 5px; border: 2px solid #00ADB5; text-decoration: none;">Back to list</a>
        </div>
    </div>
</x-app-layout>
