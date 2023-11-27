<div>
    @forelse ( $polls as $poll )
        <div class="mb-5">
					<div class="mb-5">
						<h3 class="font-bold text-xl">➤ {{ $poll->title }}</h3>
						@foreach ($poll->options as $option)
							<div class="m-4">
								<button class="btn hover:bg-blue-200" wire:click="vote({{ $option->id }})">Vote</button>
								{{ $option->name }} ({{ $option->votes->count() }})
							</div>
						@endforeach
					</div>
					<hr>
        </div>
    @empty
        <div class="text-slate-600">
            No polls available.
        </div>
    @endforelse
</div>
