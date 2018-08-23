<option> </option>
@if (isset($users))
    @foreach($users as $user)
        <option value="{{ $user->id }}"> {{ $user->name }} </option>
    @endforeach
@endif
