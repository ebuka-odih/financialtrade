<div class="row">
    @if(auth()->user()->user_status == false)
        <div class="col-md-12 col-xl-12">
            <header class="panel-heading">
                <h2 class="panel-title">For full profile verification please complete following steps:</h2>
                <p class="panel-subtitle">
                    <a class="mb-xs mt-xs mr-xs btn btn-xs btn-success" href="{{ route('user.personal_info') }}">Fill Person Info</a>  <a class="mb-xs mt-xs mr-xs btn btn-xs btn-success" href="{{ route('user.kyc_verification') }}">Upload documents</a>
                </p>
                <h2 class="panel-title">After uploading your document it will take atlest 1hr before confirmation</h2>
            </header>
        </div>
    @else

    @endif
</div>
