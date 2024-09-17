<form action="{{ route('interests.store') }}" method="POST">
    @csrf
    <h2>Select at least 3 interests</h2>
    <div>
        <label>
            <input type="checkbox" name="interests[]" value="Programming"> Programming
        </label>
    </div>
    <div>
        <label>
            <input type="checkbox" name="interests[]" value="Art"> Art
        </label>
    </div>
    <div>
        <label>
            <input type="checkbox" name="interests[]" value="Music"> Music
        </label>
    </div>
    <!-- Add more checkboxes as needed -->
    <button type="submit">Submit</button>
</form>
