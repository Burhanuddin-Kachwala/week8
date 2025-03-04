<x:layout>
    <x-slot:heading>
       
        Create Job
    </x-slot:heading>
    <form action="/jobs" method="POST" class="max-w-lg mx-auto mt-8 p-6 bg-white rounded-lg shadow-md">
      @csrf
        <div class="mb-4">
            <x-form-title for="title">Title</x-form-title>
            <x-form-input type="text" name="title" id="title" required placeholder='Ex . Software Developer'></x-form-input>
           <x-form-error name='title'></x-form-error>
        </div>
        <div class="mb-4">
            <x-form-title for="salary">Salary</x-form-title>
            <x-form-input type="number" name="salary" id="salary" required placeholder='50000'></x-form-input>
           <x-form-error name='salary'></x-form-error>
       
        </div>
        <div class="flex items-center justify-between">
            <x-form-button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save</x-form-button>
            <x-form-button type="reset" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Reset</x-form-button>
        </div>
    </form>
    

</x:layout>