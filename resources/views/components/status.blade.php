@if ($status === 'pending')
    <div class="badge badge-light-warning">{{ __('messages.pending') }}</div>
@elseif ($status === 'canceled')
    <div class="badge badge-light-danger">{{ __('messages.canceled') }}</div>
@elseif ($status === 'paid')
    <div class="badge badge-light-info">{{ __('messages.paid') }}</div>
@elseif ($status === 'checked_out')
    <div class="badge badge-light-success">{{ __('messages.checked_out') }}</div>
@elseif ($status === 'checkin_in')
    <div class="badge badge-light-dark">{{ __('messages.checkin_in') }}</div>
@elseif ($status === 'confirmed')
    <div class="badge badge-light-primary">{{ __('messages.confirmed') }}</div>

@elseif ($status === 'published')
    <div class="badge badge-light-success">{{ __('messages.published') }}</div>
@elseif ($status === 'unpublished')
    <div class="badge badge-light-danger">{{ __('messages.unpublished') }}</div>
@elseif ($status === 'draft')
    <div class="badge badge-light-warning">{{ __('messages.draft') }}</div>
@elseif ($status === 'Paypal paid')
    <div class="badge badge-light-primary">{{ __('messages.paypal_paid') }}</div>
@endif
