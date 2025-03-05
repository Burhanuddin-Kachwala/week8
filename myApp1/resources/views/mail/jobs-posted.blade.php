<x-mail::message>
    # Job Created Successfully

    <h2>{{ $job->title }}</h2>
    Your job has been created successfully. You can view the job by clicking the button below.

    <x-mail::button :url="url('jobs/' . $job->id)">
        View Job
    </x-mail::button>

    Thanks,<br>
    {{ config('app.name') }}
</x-mail::message>