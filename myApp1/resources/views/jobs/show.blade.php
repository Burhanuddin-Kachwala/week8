<x-layout>
<x-slot:heading>
    Job Page
</x-slot:heading>
    <h1>Particular Job Listing</h1>
    
       <h2>{{$job['title']}} : Salary {{$job->salary}}</h2>
    <div class="mt-6">
        <x-button href="/job/{{$job->id}}/edit">Edit</x-button>
    </div>
</x-layout>