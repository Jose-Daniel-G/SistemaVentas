<select id="select_estado" name="select_estado" class="form-control">
    @foreach ($estados as $estado)
        <option value="{{ $estado->id }}">{{ $estado->name }}</option>
    @endforeach
</select>