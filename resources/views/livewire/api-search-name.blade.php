<div>
    <label> Escreva o nome:</label>

    <input type="text" wire:model="apiName" wire:keydown.enter="searchName"
        class="border-2" placeholder="escreva o nome">

    <input type="submit" wire:click="searchName">

    @foreach($results as $result)
        <li>{{ $result['name'] }} - {{ $result['age'] }}</li>
    @endforeach
</div>
