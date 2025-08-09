<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#EEEEEE] leading-tight" style="color: #00ADB5">
            {{ __('Edit Client') }}
        </h2>
    </x-slot>

        <style>
        .editBtn{
        color: #393E46;
        border: 1px solid transparent;
        transition: border 0.2  s;
        padding: 5px;
        border-radius: 10px;
        }
        .editBtn:hover {
            
            background-color: #00ADB5;
            border-color: #222831;
            padding: 5px;
            color: white;
            border-radius: 10px;
            box-shadow: 5px 5px 5px #393E46;
        }
        .cancelBtn{
        color: #393E46;
        border: 1px solid transparent;
        transition: border 0.2s;
        padding: 5px;
        border-radius: 10px;
        }
        .cancelBtn:hover {
            background-color: #222831;
            border-color: #00ADB5;
            padding: 5px;
            color: white;
            border-radius: 10px;
            box-shadow: 5px 5px 5px #393E46;
        }
    </style>

    <div class="max-w-xl mx-auto py-8 bg-[#222831] rounded-lg p-6 shadow-md text-[#EEEEEE] " style="background-color: #EEEEEE;box-shadow: 5px 5px 5px #000000; margin-top: 100px;">
        <form action="{{ route('clients.update', $client) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <input 
                type="text" name="name" required
                class="w-full p-3 rounded border border-[#00ADB5] bg-[#393E46] text-[#EEEEEE] focus:outline-none focus:ring-2 focus:ring-[#00ADB5]"
                value="{{ old('name', $client->name) }}"
                style="background-color: #222831;color: white; border: 2px solid #00ADB5; box-shadow: 5px 5px 5px #393E46;"
            >

            <input 
                type="email" name="email"
                class="w-full p-3 rounded border border-[#00ADB5] bg-[#393E46] text-[#EEEEEE] focus:outline-none focus:ring-2 focus:ring-[#00ADB5]"
                value="{{ old('email', $client->email) }}"
                style="background-color: #222831;color: white; border: 2px solid #00ADB5; box-shadow: 5px 5px 5px #393E46;"
            >

            <input 
                type="text" name="phone"
                class="w-full p-3 rounded border border-[#00ADB5] bg-[#393E46] text-[#EEEEEE] focus:outline-none focus:ring-2 focus:ring-[#00ADB5]"
                value="{{ old('phone', $client->phone) }}"
                style="background-color: #222831;color: white; border: 2px solid #00ADB5; box-shadow: 5px 5px 5px #393E46;"
            >

            <input 
                type="text" name="company"
                class="w-full p-3 rounded border border-[#00ADB5] bg-[#393E46] text-[#EEEEEE] focus:outline-none focus:ring-2 focus:ring-[#00ADB5]"
                value="{{ old('company', $client->company) }}"
                style="background-color: #222831;color: white; border: 2px solid #00ADB5; box-shadow: 5px 5px 5px #393E46;"
            >

            <textarea 
                name="notes"
                class="w-full p-3 rounded border border-[#00ADB5] bg-[#393E46] text-[#EEEEEE] focus:outline-none focus:ring-2 focus:ring-[#00ADB5]"
                rows="4"
                style="background-color: #222831;color: white; border: 2px solid #00ADB5; box-shadow: 5px 5px 5px #393E46;"
            >{{ old('notes', $client->notes) }}</textarea>

            <div class="flex items-center gap-4">
                <button 
                    type="submit" 
                    class="editBtn"
                >
                    Update Client
                </button>

                <a href="{{ route('clients.index') }}" class="cancelBtn">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
