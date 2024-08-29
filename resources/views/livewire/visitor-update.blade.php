<div>
<div class="row d-flex justify-content-center">           
<p>Are you sure you want to Check Out Visitor ?</p>
</div>
    <form wire:submit.prevent="update">
        <input type="hidden" wire:model="id_visitor" >
        <input type="hidden" wire:model="status">
        <div class="row d-flex justify-content-center">
            <button type="submit" class="btn btn-primary">Check Out</button>
        </div>
    </form>
</div>
