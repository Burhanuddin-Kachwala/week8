<x:layout>
    <x-slot:heading>
        Create Job
    </x-slot:heading>
    <form action="/jobs" method="POST" class="max-w-lg mx-auto mt-8 p-6 bg-white rounded-lg shadow-md">
      @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Job Title</label>
            <input type="text" name="title" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            @error('title')
               <p class="text-xs text-red-500 italic font-bold">
                {{$message}}
            </p> 
            @enderror
        </div>
        <div class="mb-4">
            <label for="salary" class="block text-gray-700 text-sm font-bold mb-2">Salary</label>
            <input type="number" name="salary" id="salary" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            @error('salary')
            <p class="text-xs text-red-500 italic font-bold">
                {{$message}}
            </p> 
        @enderror
        </div>
        <div class="flex items-center justify-between">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Submit</button>
            <button type="reset" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Reset</button>
        </div>
    </form>
</x:layout>