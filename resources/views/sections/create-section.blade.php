<x-section>
<div class="container mt-5">
  <div class="card shadow-sm border-0 rounded-3">
    <div class="card-header"><h5 class="card-title">Create Section</h5></div>
    <div class="card-body">

      
      <form action="/sections" method="POST">
        @csrf
        <div class="mb-3">
          <label for="gradeLevel" class="form-label">Grade Level</label>
          <select class="form-select custom-input" name="grade_level_code" id="gradeLevel">
            <option selected disabled>Choose grade level</option>
            <option value="7">Grade 7</option>
            <option value="8">Grade 8</option>
            <option value="9">Grade 9</option>
            <option value="10">Grade 10</option>
            <option value="11">Grade 11</option>
            <option value="12">Grade 12</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="section"  class="form-label">Section</label>
          <input 
            type="text" 
            class="form-control custom-input" 
            name="section" 
            id="section" 
            placeholder="Enter section">
        </div>

        <button type="submit" class="btn btn-primary w-100 mt-3">
          Submit
        </button>
      </form>
    </div>
  </div>
</div>


</x-section>