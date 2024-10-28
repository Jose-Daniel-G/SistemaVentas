<select id="ciudad" name="ciudad" class="form-control">
    @foreach ($ciudades as $ciudad)
        <option value="{{ $ciudad->id }}">{{ $ciudad->name }}</option>
    @endforeach
</select>