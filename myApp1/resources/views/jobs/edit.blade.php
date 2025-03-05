<x:layout>
    <x-slot:heading>
        Edit {{$job->title}}
    </x-slot:heading>
    <form action="/jobs/{{$job->id}}" method="POST" class="max-w-lg mx-auto mt-8 p-6 bg-white rounded-lg shadow-md">
      @csrf
      @method('PATCH')
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Job Title</label>
            <input 
                type="text" 
                name="title" 
                id="title" 
                value="{{$job->title}}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                required
            >
            @error('title')
               <p class="text-xs text-red-500 italic font-bold">
                {{$message}}
            </p> 
            @enderror
        </div>
        <div class="mb-4">
            <label for="salary" class="block text-gray-700 text-sm font-bold mb-2">Salary</label>
            <input type="number" 
                name="salary" 
                id="salary" 
                value="{{$job->salary}}"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" 
                required
            >
            @error('salary')
            <p class="text-xs text-red-500 italic font-bold">
                {{$message}}
            </p> 
        @enderror
        </div>

        <div class="flex items-center justify-between">
            @can('edit-job', $job)
                {{-- the button that triggers the below form to delete job --}}
                <button type="submit"
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    form="delete-job">Delete
                </button>
            @endcan
          
           
    <div class="flex items-center">
        <button 
            type="reset" 
            class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800 mr-4"
            >Reset
        </button>
        <button type="submit" 
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
            >Edit
        </button>
            </div>
    </div>
    </form>


    {{-- form to delete job --}}
    <form action="/jobs/{{$job->id}}" method="POST" id="delete-job" class="hidden">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" form="delete-job">Delete</button>
    </form>
</x:layout>