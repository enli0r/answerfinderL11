<div>
    @foreach ($posts as $post)
        <livewire:post-index :key="$post->id" :post="$post"/>
    @endforeach
</div>
