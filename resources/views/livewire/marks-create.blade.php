<div class="py-12 flex justify-center">
    <div class="w-full  m-4 lg:w-1/3 bg-white shadow-md sm:rounded-lg">

        <x-package-form class="flex flex-col">
            <x-slot name="title">
                {{ __('Add or Update Marks') }}
            </x-slot>
            <x-slot name="description">
                {{ __('* All fields required.') }}
                <br>
                {{ __('* To update marks of a record, simply fill the form and enter the new marks/score.') }}
            </x-slot>
            <x-slot name="form">
                <form wire:submit.prevent="save">

                    @if ($alert)
                        <x-package-alert-msg on="save" class="text-white bg-green-500">
                            {{ $alertMsg }}
                        </x-package-alert-msg>
                    @endif
                    <div x-data="searchBoxReg()" class="mb-2">
                        <label class="block font-medium text-base text-gray-700">
                            Registration Number *
                        </label>
                        <input type="text" class="mt-1 block w-full form-input rounded-md shadow-sm" x-on:click="open"
                            name="searchReg" wire:model.debounce.300ms="searchReg" x-model="reg_no"
                            placeholder="Type Registration Number..." />
                        <input type="hidden" x-model="uid" />
                        <div x-show="isOpen()" x-on:click.away="close" class="w-full relative">
                            <div class="absolute mt-1 w-full rounded-md bg-white shadow-lg">
                                <ul
                                    class="max-h-56 rounded-md py-1 text-base leading-6 shadow-xs overflow-auto focus:outline-none sm:text-sm sm:leading-5">

                                    @if (strlen($searchReg) >= 2)

                                        @forelse ($students as $item)
                                            <li id="sts-item-{{ $item['id'] }}" role="option"
                                                x-on:click="selectItem({{ $item['id'] }}, '{{ $item['reg_no'] }}')"
                                                class="text-gray-900 cursor-pointer select-none relative py-2 pl-3 pr-9 hover:bg-gray-100">
                                                <div class="flex items-center space-x-3">
                                                    {{ $item['reg_no'] }}
                                                </div>
                                            </li>
                                        @empty
                                            <li role="option" class="text-gray-900 select-none relative py-2 pl-3 pr-9">
                                                <div class="flex items-center space-x-3">
                                                    -- no result --
                                                </div>
                                            </li>
                                    @endforelse

                                @else
                                    <li role="option" class="text-gray-900 select-none relative py-2 pl-3 pr-9">
                                        <div class="flex items-center space-x-3">
                                            Type to search...
                                        </div>
                                    </li>
                                    @endif

                                    <!-- More options... -->
                                </ul>
                            </div>
                        </div>
                        @error('searchReg')
                        <p class="text-sm text-red-600 ml-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div x-data="searchBoxGrade()" class="mb-2">
                        <label class="block font-medium text-base text-gray-700">
                            Class *
                        </label>
                        <input type="text" class="mt-1 block w-full form-input rounded-md shadow-sm" x-on:click="open"
                            name="searchGrade" wire:model.debounce.300ms="searchGrade" x-model="grade"
                            placeholder="Type Grade..." />
                        <input type="hidden" x-model="grade" />
                        <div x-show="isOpen()" x-on:click.away="close" class="w-full relative">
                            <div class="absolute mt-1 w-full rounded-md bg-white shadow-lg">
                                <ul
                                    class="max-h-56 rounded-md py-1 text-base leading-6 shadow-xs overflow-auto focus:outline-none sm:text-sm sm:leading-5">

                                    @if (strlen($searchGrade) >= 1)

                                        @forelse ($grades as $item)
                                            <li id="stg-item-{{ $item['id'] }}" role="option"
                                                x-on:click="selectItem({{ $item['grade'] }}, '{{ $item['class'] }}')"
                                                class="text-gray-900 cursor-pointer select-none relative py-2 pl-3 pr-9 hover:bg-gray-100">
                                                <div class="flex items-center space-x-3">
                                                    {{ $item['grade'] . '-' . $item['class'] }}
                                                </div>
                                            </li>
                                        @empty
                                            <li role="option" class="text-gray-900 select-none relative py-2 pl-3 pr-9">
                                                <div class="flex items-center space-x-3">
                                                    -- no result --
                                                </div>
                                            </li>
                                    @endforelse

                                @else
                                    <li role="option" class="text-gray-900 select-none relative py-2 pl-3 pr-9">
                                        <div class="flex items-center space-x-3">
                                            Type to search...
                                        </div>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        @error('searchGrade')
                        <p class="text-sm text-red-600 ml-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="my-6"></div>
                    <hr>
                    <div class="my-6"></div>
                    <h3 class="text-center text-xl font-bold text-gray-700">Subject</h3>

                    <div x-data="searchBoxSubject()" class="mb-2">
                        <label class="block font-medium text-base text-gray-700">
                            Subject *
                        </label>
                        <input type="text" class="mt-1 block w-full form-input rounded-md shadow-sm" x-on:click="open"
                            name="searchSub" wire:model.debounce.300ms="searchSub" x-model="code"
                            placeholder="Type Subject Code..." />
                        <div x-show="isOpen()" x-on:click.away="close" class="w-full relative">
                            <div class="absolute mt-1 w-full rounded-md bg-white shadow-lg">
                                <ul
                                    class="max-h-56 rounded-md py-1 text-base leading-6 shadow-xs overflow-auto focus:outline-none sm:text-sm sm:leading-5">

                                    @if (strlen($searchSub) >= 2)

                                        @forelse ($subjects as $item)
                                            <li id="stsub-item-{{ $item['id'] }}" role="option"
                                                x-on:click="selectItem('{{ $item['code'] }}')"
                                                class="text-gray-900 cursor-pointer select-none relative py-2 pl-3 pr-9 hover:bg-gray-100">
                                                <div class="flex items-center space-x-3">
                                                    {{ $item['code'] }}
                                                </div>
                                            </li>
                                        @empty
                                            <li role="option" class="text-gray-900 select-none relative py-2 pl-3 pr-9">
                                                <div class="flex items-center space-x-3">
                                                    -- no result --
                                                </div>
                                            </li>
                                    @endforelse

                                @else
                                    <li role="option" class="text-gray-900 select-none relative py-2 pl-3 pr-9">
                                        <div class="flex items-center space-x-3">
                                            Type to search...
                                        </div>
                                    </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        @error('searchSub')
                        <p class="text-sm text-red-600 ml-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex">
                        <div>
                            <x-package-input name="marks" label="Marks *" type="number" max="100" min="1"
                                class="mt-1 block w-full" wire:model.defer="marks" required="required">
                            </x-package-input>
                        </div>
                        <div class="ml-6">
                            <x-package-select name="term" label="Term *" class="mt-1 block w-full"
                                wire:model.defer="term" :options="$terms" required="required">
                            </x-package-select>
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <x-package-button type="submit">
                            Submit
                        </x-package-button>
                    </div>
                </form>
            </x-slot>
        </x-package-form>
    </div>
</div>

<script>
    function searchBoxReg() {
        return {
            show: false,
            uid: 0,
            reg_no: '',
            open() {
                this.show = true
            },
            close() {
                this.show = false
            },
            selectItem(id, reg_no) {
                this.show = false;
                this.reg_no = reg_no;
                this.uid = id;
                Livewire.emit('setRegNo', reg_no);
            },
            isOpen() {
                return this.show === true
            },
        }
    }

    function searchBoxGrade() {
        return {
            show: false,
            grade: '',
            open() {
                this.show = true
            },
            close() {
                this.show = false
            },
            selectItem(grade, cl) {
                this.show = false;
                this.grade = grade + '-' + cl;
                Livewire.emit('setGrade', this.grade);
            },
            isOpen() {
                return this.show === true
            },
        }
    }

    function searchBoxSubject() {
        return {
            show: false,
            code: '',
            open() {
                this.show = true
            },
            close() {
                this.show = false
            },
            selectItem(code) {
                this.show = false;
                this.code = code;
                Livewire.emit('setSub', code);
            },
            isOpen() {
                return this.show === true
            },
        }
    }

</script>
