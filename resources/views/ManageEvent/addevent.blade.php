<!-- Add Event Modal -->
<div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <form action="{{route('manageevent.store')}}" method="POST" class="modal-content">
        @csrf
        <div class="modal-header text-white" style="background-color: rgb(0, 37, 13)">
          <h5 class="modal-title" id="addEventModalLabel"><i class="fas fa-plus-circle"></i> Add New Event</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
  
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label text-primary">Title</label>
            <input type="text" name="title" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label text-primary">Date</label>
            <input type="date" name="date" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label text-primary">Time</label>
            <input type="time" name="time" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label text-primary">Location</label>
            <input type="text" name="location" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label text-primary">In-Charge</label>
            <select name="incharge" class="form-select">
                <option value="SK CHAIRMAN Niño Reo Garcia">SK CHAIRMAN Niño Reo Garcia</option>
                <option value="SK KAGAWAD Jeah Evardone">SK KAGAWAD Jeah Evardone</option>
                <option value="SK KAGAWAD Lhord Berly Polestico">SK KAGAWAD Lhord Berly Polestico</option>
                <option value="SK KAGAWAD Treshia Autentico">SK KAGAWAD Treshia Autentico</option>
                <option value="SK KAGAWAD Kimberly Keith Autida">SK KAGAWAD Kimberly Keith Autida</option>
                <option value="SK KAGAWAD John Lorenz Evardone">SK KAGAWAD John Lorenz Evardone</option>
                <option value="SK KAGAWAD James Marvin Auza">SK KAGAWAD James Marvin Auza</option>
                <option value="SK KAGAWAD Walter Caturza">SK KAGAWAD Walter Caturza</option>
                <option value="SK SECRETARY Pinky Soria">SK SECRETARY Pinky Soria</option>
                <option value="SK TREASURER Paul John Mejorada">SK TREASURER Paul John Mejorada</option>

            </select>
          </div>
        </div>
  
        <div class="modal-footer">
          <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save Event</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        </div>
      </form>
    </div>
  </div>
  