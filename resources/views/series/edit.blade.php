<x-layout title="Edit serie ' {!! $serie->nome !!}'">

    <x-series.form :action="route('series.update', $serie->id)"
     :nome="$serie->nome"  
     :seasons="$serie->seasons"   
     :episodes="$serie->episodes"
     :update="true" />

</x-layout>
