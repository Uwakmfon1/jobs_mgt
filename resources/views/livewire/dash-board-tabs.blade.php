<div>
    <button wire:click="switchTab('users')">Users</button>
    <button wire:click="switchTab('roles')">Roles</button>
    <button wire:click="switchTab('categories')">Categories</button>

    <div>
        @foreach ($data as $item)
            <p>{{ $item->name ?? $item->id }}</p>
        @endforeach
    </div>
</div>
