<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#EEEEEE] leading-tight" style="color: white; display: flex; justify-content: flex-start; align-item: center;">
            {{ __('My Clients') }} 
        </h2>
            <style>
                            
                /* Wrapper centers the form */
                .search-form-wrapper {
                    display: flex;
                    justify-content: center;  /* center horizontally */ 
                    margin-bottom: 1.5rem;    /* spacing below */
                }

                /* Form itself uses flex for input + button side by side */
                .search-form {
                    display: flex;
                    gap: 0.5rem;              /* space between input and button */
                    width: 100%;
                    max-width: 500px;         /* max width for the form */
                }

                /* Input styles */
                .search-input {
                    flex: 1;                  /* input takes all available space */
                    background-color: rgb(5, 0, 19);
                    padding: 0.5rem 1rem;
                    border: 2px solid #00ADB5; /* blue border */
                    border-radius: 0.5rem;
                    font-size: 1rem;
                    transition: border-color 0.3s ease;
                }
                .search-input:focus {
                    outline: none;
                    border-color: #00ADB5;    /* darker blue on focus */
                    box-shadow: 0 0 5px #393E46;
                }

                /* Button styles */
                .search-button {
                    background-color: #00ADB5; /* blue */
                    color: #393E46;
                    padding: 0 1.25rem;
                    border: none;
                    border-radius: 0.5rem;
                    font-size: 1rem;
                    cursor: pointer;
                    transition: background-color 0.3s ease;
                }
                .search-button:hover {
                    background-color: #393E46; /* darker blue on hover */
                    color: #00ADB5
                }
            </style>

            <div class="search-form-wrapper">
                <form method="GET" action="{{ route('clients.index') }}" class="search-form">
                    <input
                        type="text"
                        name="search"
                        placeholder="Search by name or company"
                        value="{{ request('search') }}"
                        class="search-input"
                    />
                    <button type="submit" class="search-button">Search</button>
                </form>
            </div>

    </x-slot>

    <div class="max-w-5xl mx-auto py-8 text-[#EEEEEE]">
        <div class="flex justify-between items-center mb-6">
            
            <a href="{{ route('clients.create') }}" class="bg-[#00ADB5] hover:bg-[#00959B] text-white px-4 py-2 rounded" style="background-color: rgb(14, 0, 51); color: white; padding: 0.5rem 1rem; border-radius: 0.25rem; transition: background-color 0.3s ease; display: flex; flex-direction: column; justify-content: center; align-items: flex-end; margin-left: auto; margin-right: 20px;margin-top:20px;margin-bottom: 20px;">
                + Add Client
            </a>
        </div>


        @if (session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4" style="background-color: #d1fae5;
                color: #047857;  
                text-align:center;
                width :200px;
                margin-left: 50px;
                padding: 0.75rem;       
                border-radius: 0.25rem;
                margin-bottom: 1rem;">
                {{ session('success') }}
            </div>
        @endif

        <table class="table-auto border-collapse w-[500px] h-[500px] mx-auto"
        style="background-color: ##393E46; border: 2px solid #00ADB5;color: #EEEEEE; border: 2px solid black;">
            <thead style="background-color: rgb(31 41 55); border: 2px solid white; " >
                <tr class="bg-[#393E46] text-[#EEEEEE]">
                    <th class="border border-[#393E46] px-4 py-2">Name</th>
                    <th class="border border-[#393E46] px-4 py-2">Email</th>
                    <th class="border border-[#393E46] px-4 py-2">Phone</th>
                    <th class="border border-[#393E46] px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="text-[#222831]" style="background-color: rgb(17 24 39); border: 2px solid white;">
                @forelse ($clients as $client)
                    <tr class="hover:bg-[#00ADB5] hover:text-[#EEEEEE] transition-colors duration-300" style="border: 2px solid white;">
                        <td class="border border-[#393E46] px-4 py-2">{{ $client->name }}</td>
                        <td class="border border-[#393E46] px-4 py-2">{{ $client->email }}</td>
                        <td class="border border-[#393E46] px-4 py-2">{{ $client->phone }}</td>
                        <td class=" px-4 py-2 flex gap-3" >
                            <!-- View Button -->
                            <a href="{{ route('clients.show', $client) }}"
                            class="hover:underline"
                            style="background-color: #222831; color: #EEEEEE; padding: 5px 10px; border-radius: 5px; border: 2px solid #00ADB5; text-decoration: none;">
                            View
                            </a>

                            <!-- Edit Button -->
                            <a href="{{ route('clients.edit', $client) }}"
                            class="hover:underline"
                            style="background-color: #222831; color: #EEEEEE; padding: 5px 10px; border-radius: 5px; border: 2px solid #00ADB5; text-decoration: none;">
                            Edit
                            </a>


                            <!-- Delete Button (form) -->
                            <form action="{{ route('clients.destroy', $client) }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure?')"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="hover:underline"
                                        style="background-color: #960000; color: white; padding: 5px 10px; border-radius: 5px; border: 2px solid #393E46; cursor: pointer;">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4 text-[#222831] font-semibold" style="white">
                            No clients found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</x-app-layout>
