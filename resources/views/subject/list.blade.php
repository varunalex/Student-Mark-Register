<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <div class="flex justify-end">
        <a href="{{ route('subject.create') }}"
            class="flex items-center py-2 px-4 bg-gray-900 rounded uppercase text-white shadow hover:bg-cool-gray-800">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            Create a subject
        </a>
    </div>


    <div class="flex flex-col my-4">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <livewire:subject-list />
                </div>
            </div>
        </div>
    </div>
</div>
