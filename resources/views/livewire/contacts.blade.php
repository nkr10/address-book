<div class="p-6">
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    {{--Contacts page livewire component --}}
    <div class="flex item-center justify-end px-4 py-3 text-right sm:px-6">
        <x-jet-button wire:click="addShowModal">
            {{ __('Add') }}
        </x-jet-button>
    </div>

    {{-- Modal form --}}
<!-- Delete User Confirmation Modal -->
    <x-jet-dialog-modal wire:model="modalFormVisible">
        <x-slot name="title">
            {{ __('Save Contact') }}
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                <x-jet-label for="first_name" value="{{ __('First name') }}"/>
                <x-jet-input id="first_name" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="first_name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="last_name" value="{{ __('Last name') }}"/>
                <x-jet-input id="last_name" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="last_name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="e_mail" value="{{ __('E-mail') }}"/>
                <x-jet-input id="e_mail" class="block mt-1 w-full" type="email" wire:model.debounce.800ms="e_mail" />
            </div>

            <div class="mt-4">
                <x-jet-label for="phone_number" value="{{ __('Phone number') }}"/>
                <x-jet-input id="phone_number" class="block mt-1 w-full" type="tel" wire:model.debounce.800ms="phone_number" />
            </div>

            <div class="mt-4">
                <x-jet-label for="date_of_birth" value="{{ __('Date of Birth') }}"/>
                <x-jet-input id="date_of_birth" class="block mt-1 w-full" type="date" wire:model.debounce.800ms="date_of_birth" />
            </div>

            <div class="mt-4">
                <x-jet-label for="physical_address" value="{{ __('Physical Address') }}"/>
                <x-jet-input id="physical_address autocomplete" onFocus="geolocate()" class="block mt-1 w-full" type="text" wire:model.debounce.800ms="physical_address" />
            </div>

            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCpKtSTGBfcnPOTs4l21sLoiRFCDWQrZ9w&libraries=places&callback=initAutocomplete" async defer></script>

        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('modalFormVisible')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-3" wire:click="add" wire:loading.attr="disabled">
                {{ __('Save') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
