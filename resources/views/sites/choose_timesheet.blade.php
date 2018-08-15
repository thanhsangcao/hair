<option> </option>
@if ($timeSheet != null)
    @if($timeSheet->mon == 'yes')
        <option>
            {{ trans('main.mon') }}
        </option>
    @endif
    @if($timeSheet->tues == 'yes')
        <option>
            {{ trans('main.tue') }}
        </option>
    @endif
    @if($timeSheet->wed == 'yes')
        <option >
            {{ trans('main.wed') }}
        </option>
    @endif
    @if($timeSheet->thur == 'yes')
        <option>
            {{ trans('main.thur') }}
        </option>
    @endif
    @if($timeSheet->fri == 'yes')
        <option >
            {{ trans('main.fri') }}
        </option>
    @endif
    @if($timeSheet->sat == 'yes')
    <option>
            {{ trans('main.sat') }}
        </option>
    @endif
    @if($timeSheet->sun == 'yes')
    <option>
            {{ trans('main.sun') }}
        </option>
    @endif
@endif
