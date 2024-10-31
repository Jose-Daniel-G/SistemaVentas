<select id="select_state" name="select_state" class="form-control">
    @foreach ($estados as $estado)
        <option value="{{ $estado->id }}">{{ $estado->name }}</option>
    @endforeach
</select>