<div>
    @foreach($jobCards as $card)
        <div class="border p-2 mb-2">
            <h5>{{ $card->job_title }} ({{ $card->status }})</h5>
            <p>{{ $card->job_description }}</p>
            <form wire:submit.prevent="approve({{ $card->id }})">
                <label>Admin Comment</label>
                <textarea wire:model.defer="comments.{{ $card->id }}" class="form-control mb-2"></textarea>
                <button type="submit" class="btn btn-success">Approve</button>
                <button wire:click.prevent="reject({{ $card->id }})" class="btn btn-danger">Reject</button>
            </form>
        </div>
    @endforeach
</div>
