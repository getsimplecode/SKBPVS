<div class="modal fade" id="deleteEventModal-{{ $event->id }}" tabindex="-1" aria-labelledby="deleteEventModalLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog">
      <form action="{{route('manageevent.destroy',['id' => $event])}}" method="POST" class="modal-content">
        @csrf
        @method('DELETE')
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="deleteEventModalLabel"><i class="fas fa-trash-alt"></i> Delete Event</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
  
        <div class="modal-body">
          <p>Are you sure you want to delete the event titled:</p>
          <h6 class="text-danger"><strong>"{{ $event->title }}"</strong></h6>
        </div>
  
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger"><i class="fas fa-check"></i> Yes, Delete</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
  