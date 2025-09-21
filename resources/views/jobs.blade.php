<x-layout>
    <x-slot:heading>
        Jobs Page
    </x-slot:heading>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"> 
        @foreach ($jobs as $job)
            <div class="glass-card p-6 flex flex-col items-center text-center">
                <h2 class="text-xl font-semibold text-gray-700 mb-1">{{ $job['title'] }}</h2>
                <p class="text-gray-500 mt-0">{{ $job->employer->name }}</p>
                <p class="text-3xl font-bold text-gray-900">{{ $job['salary'] }}</p>
                <p class="text-gray-500 mt-1">per year</p>
                <div class="px-4 py-4">
                    @foreach($job->tags as $tag)
                        <span class="bg-gray-200 text-gray-700 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded-full">{{ $tag->name }}</span>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</x-layout>