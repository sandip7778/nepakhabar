<div class="row mb-3">
    <div class="col-xl-12">
        <div class="">
            @foreach ($textAds->take(1) as $advertisement)
                    <a href="{{ $advertisement->url }}" target="_blank">
                        <img src="{{ Storage::url($advertisement->ad_path) }}" style="width:100%" alt="{{ $advertisement->name }} Image">
                    </a>
            @endforeach
        </div>
    </div>
</div>

