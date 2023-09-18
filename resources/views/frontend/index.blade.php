@extends('layouts.frontendMainLayout')
@section('content')
<div class="app-content content">
		<div class="content-overlay"></div>
		<div class="content-wrapper">
				<div class="content-header row">
				</div>
				<div class="content-body">
          FRONT END
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-trendline"></script>
<script src="{{asset('app-assets/js/scripts/charts/index_frontend.js')}}"></script>
<script>

</script>
@endsection

