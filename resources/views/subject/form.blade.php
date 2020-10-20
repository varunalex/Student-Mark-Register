<div class="w-full m-4 lg:w-1/3 bg-white shadow-md overflow-hidden sm:rounded-lg">
    <x-package-form action="{{ route('subject.store') }}" method="POST" class="flex flex-col">
        <x-slot name="title">
            {{ __('Add a new subject') }}
        </x-slot>
        <x-slot name="description">
            {{ __('* All fields required.') }}
        </x-slot>
        <x-slot name="form">
            <form method="POST" action="{{ route('subject.store') }}" _lpchecked="1">
                @csrf
                <x-package-input id="code" name="code" type="text" max="10" class="mt-1 block w-full"
                    wire:model.defer="state.name" placeholder="Subject code *">
                    <x-slot name="message">
                        dsfsf
                    </x-slot>
                </x-package-input>

                <x-package-input id="subject" name="subject" type="text" max="50" class="mt-1 block w-full"
                    wire:model.defer="state.name" placeholder="Subject *">
                    <x-slot name="message">
                        dsfsf
                    </x-slot>
                </x-package-input>

                <div class="flex items-center justify-end mt-4">
                    <x-package-button type="submit">
                        Add
                    </x-package-button>
                </div>
            </form>
        </x-slot>
    </x-package-form>
</div>
