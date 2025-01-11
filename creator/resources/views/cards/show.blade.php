@extends('layouts.app')

@section('content')
<div class="flex flex-col items-center space-y-6">
    <x-pokemon-card :card="$card" :isLink="false" />

    <!-- Action Buttons -->
    <div class="flex justify-center">
        <a href="{{ route('cards.index') }}" 
           class="text-sm text-gray-600 hover:text-gray-800">
            Back to List
        </a>
    </div>
</div>
@endsection
