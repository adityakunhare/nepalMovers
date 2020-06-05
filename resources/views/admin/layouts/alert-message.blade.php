@if(session()->has('error-message') || session()->has('info-message') || session()->has('warning-message') || session()->has('message'))
<div class="card-body" id="alert_message">
    @if(session()->has('error-message'))
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
        {{session()->get('error-message')}}
    </div>
    @elseif(session()->has('info-message'))

    <div class="alert alert-info alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-info"></i> Alert!</h5>
        {{session()->get('info-message')}}
    </div>
    @elseif(session()->has('warning-message'))
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
        {{session()->get('warning-message')}}
    </div>
    @elseif(session()->has('message'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h5><i class="icon fas fa-check"></i> Alert!</h5>
        {{session()->get('message')}}
    </div>
    @endif

</div>
@endif
