<x-layout>
<x-slot:heading>
    Jobs Page
</x-slot:heading>
    <h1>Jobs Listing</h1>
    
        @foreach($jobs as $job)
            <a href='/job/{{$job['id']}}' class="hover:underline">
                <li>{{ $job['title'] }} - {{ $job['salary'] }}</li>
            </a>
            
           
        @endforeach
    
</x-layout>