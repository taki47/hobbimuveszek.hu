@extends('Layouts.Admin')

@section('content')
    <!-- top tiles -->
    <div class="row tile_row" style="display: inline-block;">
        <div class="tile_count">
            <div class="col-md-3 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fas fa-users"></i> Összes felhasználó</span>
                <div class="count">{{ $totalusers }}</div>
            </div>
            <div class="col-md-3 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fas fa-users"></i> Új felhasználók ezen a héten</span>
                <div class="count">{{ $newUserThisWeek }}</div>
            </div>
            <div class="col-md-3 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Összes alkotás</span>
                <div class="count">XXX</div>
            </div>
            <div class="col-md-3 col-sm-4  tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Új alkotások ezen a héten</span>
                <div class="count">XXX</div>
            </div>
        </div>
    </div>
    <!-- /top tiles -->


    <div class="row">
        <div class="col-12 ">
            <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                    <h2>Cím</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    Lorem ipsum
                </div>
            </div>
        </div>
    </div>
@endsection
