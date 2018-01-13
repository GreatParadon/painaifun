<!DOCTYPE html>
<html>
@section('htmlheader') @include('layouts.partials.htmlheader') @show

<body class="hold-transition @if(Auth::User()) skin-green sidebar-mini @else login-page @endif ">

	@if (Auth::User())
	<div class="wrapper">
		@include('layouts.partials.mainheader') @include('layouts.partials.sidebar')
		<div class="content-wrapper">
			<section class="content">
				<div>
					@include('admin.message')
				</div>
				<div class="nav-tabs-custom">
					<ul class="nav nav-tabs">
						<li class="active">
							<a href="#tab_1" data-toggle="tab" aria-expanded="true">@hasSection ('tabtitle') @yield('tabtitle') @else {{ $page['title'] or '' }} @endif
							</a>
						</li>
						@if(isset($tab)) @foreach($tab as $key => $value)
						<li class="">
							<a href="#tab_{{ $key + 2 }}" data-toggle="tab" aria-expanded="false">{{ ucfirst($value) }}</a>
						</li>
						@endforeach @endif @if(isset($create) and $create == true and isset($edit) and $edit == true)
						<li class="pull-right">
							@if(isset($sort) and $sort == true)
							<a href="{{ '/admin/'.$page['content'].'/sort' }}" class="btn btn-box-tool">Sort {{ $page['content'] }}</a>
							@endif
						</li>
						@if(isset($isEditPage) && $isEditPage)
						<li class="pull-right">
							@if(isset($duplicate) and $duplicate == true)
							<a href="{{ '/admin/'.$page['content'].'/'.$id.'/duplicate' }}" class="btn btn-box-tool">Duplicate {{ $page['content'] }}</a>
							@endif
						</li>
						@endif @if(isset($create) and $create == true)
						<li class="pull-right">
							<a href="{{ '/admin/'.$page['content'].'/create' }}" class="btn btn-box-tool">Create new {{ $page['content'] }}</a>
						</li>
						@endif @endif
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="tab_1">
							@yield('content')
						</div>
						@if(isset($tab)) @foreach($tab as $key => $value)
						<div class="tab-pane" id="tab_{{ $key +2 }}">
							@include('admin.tab.'.$value)
						</div>
						@endforeach @endif
					</div>
				</div>
			</section>
		</div>
		@include('layouts.partials.controlsidebar')
	</div>
	@else @yield('content') @endif @section('scripts') @include('layouts.partials.scripts') @show

</body>

</html>