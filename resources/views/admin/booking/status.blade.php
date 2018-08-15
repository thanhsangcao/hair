<div class="dropdown" id="{{ $booking->id }}">
    @if( $booking->status == __('booking.new') )
        <button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">New <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a href="{{ asset('admin/bookings/'. $booking->id . '/status/' . __('booking.confirm')) }}" class="status-button" id="confirm">Confirm</a></li>
            <li><a href="{{ asset('admin/bookings/'. $booking->id . '/status/' . __('booking.cancel')) }}" class="status-button" id="cancel">Cancel</a></li>
        </ul>
    @elseif( $booking->status == __('booking.confirm') )
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Confirmed <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a href="{{ asset('admin/bookings/'. $booking->id . '/status/' . __('booking.complete')) }}" class="status-button">Complete</a></li>
            
            <li><a href="{{ asset('admin/bookings/'. $booking->id . '/status/' . __('booking.cancel')) }}" class="status-button">Cancel</a></li>
        </ul>
    @elseif( $booking->status == __('booking.complete'))
        <button class="btn btn-success dropdown-toggle" type="button" data-toggle="dropdown">Completed </button>
        
    @elseif( $booking->status == __('booking.cancel'))
        <button class="btn dropdown-toggle" type="button" data-toggle="dropdown">Canceled <span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a href="{{ asset('admin/bookings/'. $booking->id . '/status/' . __('booking.new')) }}" class="status-button">New</a></li>
        </ul>
    @endif
        
</div>
