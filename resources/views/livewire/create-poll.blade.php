<div>
	<form wire:submit.prevent="createPoll">
		<label for="title">Title</label>
		<input type="text" id="title" wire:model.live="title"> 

		@error('title')
			<div class="text-red-500">{{ $message }}</div>
		@enderror

		<div class="my-5">
			<button class="btn hover:bg-blue-400/10" wire:click.prevent="addOption">Add Option</button>
		</div>

		<div>
			@foreach ($options as $index => $option)
			<div class="mb-4">
				<label for="">Option {{ $index + 1 }}</label>
				<div class="flex gap-2">
					<input type="text" wire:model="options.{{ $index }}">
					<button class="btn hover:bg-red-400/10" wire:click.prevent="removeOption({{ $index }})">Remove</button>
				</div>
				@error('options.*')
					<div class="text-red-500">{{ $message }}</div>
				@enderror
			</div>
			@endforeach
		</div>

		<button type="submit" class="btn hover:bg-emerald-500/10">Create Poll</button>
	</form>
</div>
