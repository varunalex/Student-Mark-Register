<div>
    <div class="flex">
        <x-package-input type="text" placeholder="Search..." name="search" wire:model.debounce.500ms="search" />
    </div>
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th
                    class="px-6 py-3 bg-gray-50 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    #
                </th>
                <th
                    class="px-6 py-3 bg-gray-50 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Grade
                </th>
                <th
                    class="px-6 py-3 bg-gray-50 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Class
                </th>
                <th
                    class="px-6 py-3 bg-gray-50 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Students
                </th>
                <th
                    class="px-6 py-3 bg-gray-50 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wide">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            {{-- {{ dd($grades) }} --}}
            @forelse ($grades as $key => $grade)
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="flex items-center">
                            <div class="leading-5 font-medium text-gray-900">
                                {{-- {{ $loop->index + 1 }} --}}
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">

                        <div class="leading-5 text-gray-900">{{ $grade->grade }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="leading-5 text-gray-900">
                            {{ $grade->class }}

                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="flex leading-5 text-gray-900">
                            {{ $grade->studentCount }}
                            @if ($grade->studentCount > 0)
                                <a href="{{ route('students', $grade->id) }}"
                                    class="text-red-600 opacity-50 hover:text-red-900 hover:opacity-100">
                                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z">
                                        </path>
                                    </svg>
                                </a>
                            @endif

                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-right leading-5 font-medium">
                        <a href="{{ route('grade.edit', $grade->id) }}" class="text-indigo-600 hover:text-indigo-900">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap" colspan="4">
                        <div class="flex items-center">
                            <div class="leading-5 font-medium text-gray-900">
                                No sujbects available! <a class="text-blue-700 hover:underline"
                                    href="{{ route('grade.create') }}">Create one?</a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforelse


            <!-- More rows... -->
        </tbody>
    </table>
    <div class="mx-2 text-sm">
        {{ $grades->links() }}
    </div>
    @if (session()->has('alert'))
        <x-package-alert-msg on="update" reset="no" class="text-white bg-green-500">
            Grade Updated 🤙
        </x-package-alert-msg>
    @endif
</div>
