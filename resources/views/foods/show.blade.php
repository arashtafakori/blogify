<x-app-layout>
    <x-slot:title>
        Show the food
    </x-slot:title>
    <div >
        Show the food . {{route('foods.show', 1)}}
    </div>  
</x-app-layout>