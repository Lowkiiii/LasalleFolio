<form action="{{ route('interests.store') }}" method="POST">
    @csrf

    {{-- diri lang edit --}}
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
    <div>
        <label>
            <input type="checkbox" name="interests[]" value="Artifical_Intelligence"> Artifical Intelligence
        </label>
    </div>
    <!-- Add more Interests -->
    <button type="submit">Submit</button>

    {{-- asta di edit--}}
</form>
