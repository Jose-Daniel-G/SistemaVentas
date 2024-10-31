<select id="city" name="city" class="form-control">
    @foreach ($cityes as $city)
        <option value="{{ $city->id }}">{{ $city->name }}</option>
    @endforeach
</select>