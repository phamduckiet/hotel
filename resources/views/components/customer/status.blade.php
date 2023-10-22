@if ($status === 'pending')
    <div class="label label-default">{{ __('messages.pending') }}</div>
@elseif ($status === 'canceled')
    <div class="label label-danger">{{ __('messages.canceled') }}</div>
@elseif ($status === 'paid')
    <div class="label label-info">{{ __('messages.paid') }}</div>
@elseif ($status === 'checked_out')
    <div class="label label-success">{{ __('messages.checked_out') }}</div>
@elseif ($status === 'checkin_in')
    <div class="label label-warning">{{ __('messages.checkin_in') }}</div>
@elseif ($status === 'confirmed')
    <div class="label label-primary">{{ __('messages.confirmed') }}</div>
@endif
