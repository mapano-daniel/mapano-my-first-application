<x-layout>
    <x-slot:heading>
        Create Job
    </x-slot:heading>

    <div class="flex justify-center items-center min-h-[70vh]">
        <div class="w-full max-w-lg bg-white p-8 rounded-lg shadow-md border border-gray-200">
            
            <form method="POST" action="/jobs">
                @csrf

                <div class="space-y-6">
                    <h2 class="text-xl font-semibold text-gray-900 text-center">
                        Create a New Job
                    </h2>
                    <p class="mt-1 text-sm leading-6 text-gray-600 text-center">
                        We just need a handful of details from you.
                    </p>

                    <!-- Job Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-900">Title</label>
                        <input type="text" 
                               name="title" 
                               id="title" 
                               class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                               placeholder="Shift Leader" 
                               required>
                        @error('title') 
                            <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p> 
                        @enderror
                    </div>

                    <!-- Salary -->
                    <div>
                        <label for="salary" class="block text-sm font-medium text-gray-900">Salary</label>
                        <input type="text" 
                               name="salary" 
                               id="salary" 
                               class="mt-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" 
                               placeholder="$50,000 Per Year" 
                               required>
                        @error('salary') 
                            <p class="text-xs text-red-500 font-semibold mt-1">{{ $message }}</p> 
                        @enderror
                    </div>
                </div>

                <!-- Buttons -->
                <div class="mt-6 flex items-center justify-end gap-x-6">
                    <a href="/jobs" class="text-sm font-semibold text-gray-900">Cancel</a>
                    <button type="submit" 
                        class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>