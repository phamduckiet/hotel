@if ($status === 'pending')
    <div class="badge badge-light-warning">{{ __('messages.pending') }}</div>
@elseif ($status === 'canceled')
    <div class="badge badge-light-danger">{{ __('messages.canceled') }}</div>
@elseif ($status === 'paid')
    <div class="badge badge-light-info">{{ __('messages.paid') }}</div>
@elseif ($status === 'delivered')
    <div class="badge badge-light-success">{{ __('messages.delivered') }}</div>
@elseif ($status === 'delivering')
    <div class="badge badge-light-dark">{{ __('messages.delivering') }}</div>
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
