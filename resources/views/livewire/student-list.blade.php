<div>
    <div class="flex">
        <x-package-input type="text" placeholder="Search..." name="search" wire:model.debounce.500ms="search" />
    </div>
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr>
                <th
                    class="px-6 py-3 bg-gray-50 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Name
                </th>
                <th
                    class="px-6 py-3 bg-gray-50 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Reg No.
                </th>
                <th
                    class="px-6 py-3 bg-gray-50 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wider">
                    Class
                </th>
                <th
                    class="px-6 py-3 bg-gray-50 text-left text-sm leading-4 font-medium text-gray-500 uppercase tracking-wide">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            {{-- {{ dd($grades) }} --}}
            @forelse ($students as $key => $student)
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="flex items-center">
                            <div class="text-sm block leading-5 text-gray-900">
                                {{ $student->f_name . ' ' . $student->l_name }}
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="leading-5 text-gray-900">{{ strtoupper($student->reg_no) }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap">
                        <div class="leading-5 text-gray-900">
                            {{ $student->grade->grade . '-' . $student->grade->class }}

                        </div>
                    </td>

                    <td x-data="deleteConfirmation()"
                        class="flex px-6 py-4 whitespace-no-wrap text-right leading-5 font-medium">
                        <a href="{{ route('student.edit', $student->id) }}" class="text-indigo-600 hover:text-indigo-900">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                        </a>
                        <a href="{{ route('student.profile', $student->id) }}"
                            class="text-green-600 hover:text-green-900 ml-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z">
                                </path>
                            </svg>
                        </a>
                        <a href="javascript:void(0)" x-on:click="conf('{{ $student->id }}')"
                            class="text-red-600 hover:text-red-900 ml-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </a>

                    </td>
                </tr>
            @empty
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap" colspan="4">
                        <div class="flex items-center">
                            <div class="leading-5 font-medium text-gray-900">
                                No students available! <a class="text-blue-700 hover:underline"
                                    href="{{ route('student.create') }}">Add one?</a>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforelse


            <!-- More rows... -->
        </tbody>
    </table>
    <div class="mx-2 text-sm">
        {{ $students->links() }}
    </div>
    @if (session()->has('alert'))
        <x-package-alert-msg on="update" reset="no" class="text-white bg-green-500">
            Srudent Updated 🤙
        </x-package-alert-msg>
    @endif
    @if ($alertD)
        <x-package-alert-msg on="save" class="text-white bg-red-500">
            Student removed ⛔
        </x-package-alert-msg>
    @endif
</div>

<script>
    function deleteConfirmation() {
        return {
            conf(id) {
                if (confirm("Are your sure to remove this student? All the related marks will lost.")) {
                    Livewire.emit('deleteStudent', id);
                } else {
                    console.log(false);
                }
            }
        }
    }

</script>
