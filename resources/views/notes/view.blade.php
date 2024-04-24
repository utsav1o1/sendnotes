<x-guest-layout>
    <div class="flex justify-between">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
        {{$note->name}}
        </h2>
    </div>
    <p class="mt-2">{{$note->description}}</p>
    <div class="flex justify-end mt-12 space-x-2 item-center">
        <h3 class="text-sm "> Sent from {{$user->name}}</h3>
       <livewire:heartreact :note="$note"/> 
    </div>
</x-guest-layout>
