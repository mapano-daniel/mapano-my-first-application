<x-layout>
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>

    <!-- ✅ Create Job Button -->
    <div class="mb-6 flex justify-end">
        <a href="/jobs/create" 
            class="inline-block rounded-md bg-indigo-600 px-6 py-3 text-lg font-semibold
            text-white shadow-sm hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600">
            + Create Job
        </a>
    </div>


    <div class="flex flex-col min-h-[80vh]"> 
        <!-- Jobs Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 flex-grow">
            @foreach ($jobs as $job)
                <div class="glass-card p-6 flex flex-col items-center text-center">
                    <h2 class="text-xl font-semibold text-gray-700 mb-1">{{ $job['title'] }}</h2>
                    <p class="text-gray-500 mt-0">{{ $job->employer->name }}</p>
                    <p class="text-3xl font-bold text-gray-900">
    ${{ number_format($job->salary) }} USD
</p>
                    <p class="text-gray-500 mt-1">per year</p>
                    
                    @foreach ($job->tags as $tag)
                        <span class="bg-gray-200 text-gray-700 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-full">
                            {{ $tag->name }}
                        </span>
                    @endforeach
                    <div class="mt-4 flex justify-end gap-2">
                        <a href="/jobs/{{ $job->id }}/edit" 
                        class="px-3 py-1 bg-gray-500 text-white text-sm rounded-md hover:bg-red-600">
                            Edit
                        </a>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination at bottom -->
        <div class="mt-6 flex justify-center">
            {{ $jobs->links() }}
        </div>
    </div>
</x-layout>
