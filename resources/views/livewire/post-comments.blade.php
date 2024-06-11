<div>
    <div class="comments relative lg:mt-16">
        @foreach ($comments as $comment)
            <livewire:post-comment :key="$comment->id" :comment="$comment" :post="$post"/>
        @endforeach
    </div>
</div>
