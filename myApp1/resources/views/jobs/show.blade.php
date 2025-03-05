<x-layout>
<x-slot:heading>
    Job Page
</x-slot:heading>
    <h1>Particular Job Listing</h1>
    
       <h2>{{$job['title']}} : Salary {{$job->salary}}</h2>

       @can('edit', $job)
         <p class="mt-6">
           <x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
        </p>
       @endcan
   
</x-layout>