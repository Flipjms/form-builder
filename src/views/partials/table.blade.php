@if($addNewButton)
<a href="{{ $route }}" class="btn btn-success add-new pull-right">{{ trans('clumsy::buttons.add') }}</a>
<div class="clearfix"></div>
<br>
@endif

@include('clumsy::templates.table')