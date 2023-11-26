<div>
	<form>
		<label for="title">Title:</label>
		<input type="text" id="title" wire:model.live="title"> 
		Current title: {{ $title }}

		<div class="my-5">
			<button class="btn hover:bg-blue-400/10" wire:click.prevent="addOption">Add Option</button>
		</div>

		<div>
			@foreach ($options as $index => $option)
			<div class="mb-4">
				{{ $index }}: {{ $option }}
			</div>
			@endforeach
		</div>
	</form>
</div>
