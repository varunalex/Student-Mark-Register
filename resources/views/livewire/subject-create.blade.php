<div class="py-12 flex justify-center">
    <div class="w-full m-4 lg:w-1/3 bg-white shadow-md overflow-hidden sm:rounded-lg">

        <x-package-form action="{{ route('subject.store') }}" method="POST" class="flex flex-col">
            <x-slot name="title">
                {{ __('Add a new subject') }}
            </x-slot>
            <x-slot name="description">
                {{ __('* All fields required.') }}
            </x-slot>
            <x-slot name="form">
                <form method="POST" action="{{ route('subject.store') }}" wire:submit.prevent="save">

                    @if ($alert)
                        <x-package-alert-msg on="save" class="text-white bg-green-500">
                            Subject Created 🤙
                        </x-package-alert-msg>
                    @endif

                    <x-package-input id="code" name="code" type="text" max="10" class="mt-1 block w-full"
                        wire:model.defer="code" placeholder="Subject code *" required="required">
                    </x-package-input>

                    <x-package-input id="subject" name="subject" type="text" max="50" class="mt-1 block w-full"
                        wire:model.defer="subject" placeholder="Subject *" required="required">
                    </x-package-input>

                    <div class="flex items-center justify-end mt-4">
                        <x-package-button type="submit">
                            Create
                        </x-package-button>
                    </div>
                </form>
            </x-slot>
        </x-package-form>
    </div>
</div>
