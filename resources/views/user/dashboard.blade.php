@extends('layouts.default')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 page-header">
                    <div class="page-pretitle">Overview</div>
                    <h2 class="page-title">Dashboard</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
                                                <i class="olive fas fa-money-bill-alt"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">Rewards Coins</p>
                                                <span class="number">90</span>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="footer">
                                        <hr />
                                        <div class="stats">
                                            <i class="fas fa-calendar"></i> For this Month
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="content">
                                    <div class="head">
                                        <h5 class="mb-0">Coins Overview</h5>
                                        <!-- <p class="text-muted">Current year website visitor data</p> -->
                                    </div>
                                    <div class="canvas-wrapper">
                                        <canvas class="chart" id="trafficflow"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="content">
                                    <div class="head">
                                        <h5 class="mb-0">Website Visited</h5>
                                        {{--<p class="text-muted">Current year website visitor data</p>--}}
                                    </div>
                                    <div class="canvas-wrapper">
                                        <table class="table table-striped">
                                            <thead class="success">
                                            <tr>
                                                <th>Websites</th>
                                                <th>Category</th>
                                                <th>Time Spent</th>
                                                <th>Reward Coins</th>
                                                {{-- <th class="text-end">Visited At</th> --}}
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(isset($trackers))
                                                @foreach($trackers as $k => $item)
                                                    @php
                                                        $item = (object) $item;
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $item->website_url }}</td>
                                                        <td>{{ $item->category }}</td>
                                                        <td>{{ $item->timeSpent }}</td>
                                                        <td>{{ $item->points }}</td>
                                                        {{-- <td class="text-end">{{ $item->last_visited_at }}</td> --}}
                                                    </tr>
                                                @endforeach
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        var chartKeys = @json(array_keys($visitChart));
        var chartValues = @json(array_values($visitChart));

        console.log(chartKeys);
        console.log(chartValues);
    </script>
@endsection

