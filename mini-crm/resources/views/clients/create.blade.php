<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#EEEEEE] leading-tight" style="color: #00ADB5">
            {{ __('Add New Client') }}
        </h2>
    </x-slot>
    
    <style>
        .subBtn{
        color: #393E46;
        border: 1px solid transparent;
        transition: border 0.2  s;
        padding: 5px;
        border-radius: 10px;
        }
        .subBtn:hover {
            
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

    <div class="max-w-xl mx-auto py-8 bg-[#393E46] rounded-lg p-6 shadow-md text-[#EEEEEE]" style="background-color: rgba(8, 0, 29, 0.911);box-shadow: 5px 5px 5px #000000; margin-top: 50px;">
        <form action="{{ route('clients.store') }}" method="POST" class="space-y-6">
            @csrf

            <input 
                type="text" name="name" placeholder="Name" required
                class="w-full p-3 rounded border border-[#00ADB5] bg-[#393E46] text-[#EEEEEE] focus:outline-none focus:ring-2 focus:ring-[#00ADB5]"
                value="{{ old('name') }}"
                style="background-color: #222831;color: white; border: 2px solid #00ADB5; box-shadow: 5px 5px 5px #393E46;"
            >

            <input 
                type="email" name="email" placeholder="Email"
                class="w-full p-3 rounded border border-[#00ADB5] bg-[#393E46] text-[#EEEEEE] focus:outline-none focus:ring-2 focus:ring-[#00ADB5]"
                value="{{ old('email') }}"
                style="background-color: #222831;color: white; border: 2px solid #00ADB5; box-shadow: 5px 5px 5px #393E46;"
            >

            <input 
                type="text" name="phone" placeholder="Phone"
                class="w-full p-3 rounded border border-[#00ADB5] bg-[#393E46] text-[#EEEEEE] focus:outline-none focus:ring-2 focus:ring-[#00ADB5]"
                value="{{ old('phone') }}"
                style="background-color: #222831;color: white; border: 2px solid #00ADB5; box-shadow: 5px 5px 5px #393E46;"
            >

            <input 
                type="text" name="company" placeholder="Company"
                class="w-full p-3 rounded border border-[#00ADB5] bg-[#393E46] text-[#EEEEEE] focus:outline-none focus:ring-2 focus:ring-[#00ADB5]"
                value="{{ old('company') }}"
                style="background-color: #222831;color: white; border: 2px solid #00ADB5; box-shadow: 5px 5px 5px #393E46;"
            >

            <textarea 
                name="notes" placeholder="Notes"
                class="w-full p-3 rounded border border-[#00ADB5] bg-[#393E46] text-[#EEEEEE] focus:outline-none focus:ring-2 focus:ring-[#00ADB5]"
                rows="4"
                style="background-color: #222831;color: white; border: 2px solid #00ADB5; box-shadow: 5px 5px 5px #393E46;"
            >{{ old('notes') }}</textarea>

            {{-- Agent assignment dropdown for admin only --}}
            @if(Auth::user()->isAdmin())
                <div>
                    <label for="user_id" class="block mb-1">Assign to Agent</label>
                    <select 
                        name="user_id" id="user_id" required
                        class="w-full p-3 rounded border border-[#00ADB5] bg-[#393E46] text-[#EEEEEE] focus:outline-none focus:ring-2 focus:ring-[#00ADB5]"
                        style="background-color: #222831; color: white; border: 2px solid #00ADB5; box-shadow: 5px 5px 5px #393E46;"
                    >
                        <option value="">Select an agent</option>
                        @foreach($agents as $agent)
                            <option value="{{ $agent->id }}" {{ old('user_id') == $agent->id ? 'selected' : '' }}>
                                {{ $agent->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @endif

            <div class="flex items-center gap-4">
                <button 
                    type="submit" 
                    class="subBtn"
                >
                    Save Client
                </button>

                <a href="{{ route('clients.index') }}" class="cancelBtn">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</x-app-layout>
