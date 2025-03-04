<x-layout>
    
    <x-slot:heading>

        Jobs Page
    </x-slot:heading>
    <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Jobs Listing</h1>
    <x-button href='/jobs/create' >Create Job</x-button>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($jobs as $job)
        <div class="hover:shadow-2xl transition-transform transform hover:scale-105">
            <a href='/job/{{$job['id']}}' class="no-underline">
                <div class="bg-white p-4 rounded-lg shadow-md hover:shadow-lg transition-shadow">
                    <h2 class="text-xl font-bold mb-2 text-blue-800">{{ $job['title'] }}</h2>
                    <p class="text-gray-700 mb-1">RS : {{ $job['salary'] }}</p>
                    <p class="text-blue-800 mb-1">{{ $job->employer->name}}</p>
                </div>
            </a>
        </div>
        
        @endforeach
        
    </div>
    
        <div class="mt-6 mb-6 p-4">
            {{ $jobs->links() }}
        </div>
    
</x-layout>
