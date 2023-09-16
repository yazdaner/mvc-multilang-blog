@extends('admin.layouts.admin')
@section('style')
    <style>
        .text-break {
            word-wrap: break-word !important;
            word-break: break-word !important;
        }
    </style>

@section('script')
    <script>
        am4core.ready(function() {

            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            // Create chart instance
            var chart = am4core.create("chartdiv", am4charts.XYChart);
            chart.scrollbarX = new am4core.Scrollbar();

            // own code
            chart.rtl = true;
            chart.logo.disabled = true;

            // Add data
            chart.data = @json($chartOneDate);

        
            var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
            categoryAxis.dataFields.category = "month";
            categoryAxis.renderer.grid.template.location = 0;
            categoryAxis.renderer.minGridDistance = 60;
            categoryAxis.tooltip.disabled = true;

            var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            valueAxis.renderer.minWidth = 50;
            valueAxis.min = 0;
            valueAxis.cursorTooltipEnabled = false;

            // Create series
            var series = chart.series.push(new am4charts.ColumnSeries());
            series.sequencedInterpolation = true;
            series.dataFields.valueY = "visits";
            series.dataFields.categoryX = "month";
            series.tooltipText = "[{categoryX}: bold]{valueY}[/]";
            series.columns.template.strokeWidth = 0;

            series.tooltip.pointerOrientation = "vertical";

            series.columns.template.column.cornerRadiusTopLeft = 10;
            series.columns.template.column.cornerRadiusTopRight = 10;
            series.columns.template.column.fillOpacity = 0.8;

            // on hover, make corner radiuses bigger
            var hoverState = series.columns.template.column.states.create("hover");
            hoverState.properties.cornerRadiusTopLeft = 0;
            hoverState.properties.cornerRadiusTopRight = 0;
            hoverState.properties.fillOpacity = 1;

            series.columns.template.adapter.add("fill", function(fill, target) {
                return chart.colors.getIndex(target.dataItem.index);
            })


            var paretoValueAxis = chart.yAxes.push(new am4charts.ValueAxis());
            paretoValueAxis.renderer.opposite = true;
            paretoValueAxis.min = 0;
            paretoValueAxis.max = 100;
            paretoValueAxis.strictMinMax = true;
            paretoValueAxis.renderer.grid.template.disabled = true;
            paretoValueAxis.numberFormatter = new am4core.NumberFormatter();
            paretoValueAxis.numberFormatter.numberFormat = "#'%'"
            paretoValueAxis.cursorTooltipEnabled = false;

            var paretoSeries = chart.series.push(new am4charts.LineSeries())
            paretoSeries.dataFields.valueY = "pareto";
            paretoSeries.dataFields.categoryX = "month";
            paretoSeries.yAxis = paretoValueAxis;
            paretoSeries.tooltipText = "درصد : {valueY.formatNumber('#.0')}%[/]";
            paretoSeries.bullets.push(new am4charts.CircleBullet());
            paretoSeries.strokeWidth = 2;
            paretoSeries.stroke = new am4core.InterfaceColorSet().getFor("alternativeBackground");
            paretoSeries.strokeOpacity = 0.5;

            // Cursor
            chart.cursor = new am4charts.XYCursor();
            chart.cursor.behavior = "panX";

        }); // end am4core.ready()
    </script>

    <script>
        am4core.ready(function() {

            // Themes begin
            am4core.useTheme(am4themes_animated);
            // Themes end

            // Create chart instance
            var chart = am4core.create("chartdiv2", am4charts.PieChart);
            chart.logo.disabled = true;
            chart.rtl = true;

            // Add and configure Series
            var pieSeries = chart.series.push(new am4charts.PieSeries());
            pieSeries.dataFields.value = "value";
            pieSeries.dataFields.category = "label";

            // Let's cut a hole in our Pie chart the size of 30% the radius
            chart.innerRadius = am4core.percent(30);

            // Put a thick white border around each Slice
            pieSeries.slices.template.stroke = am4core.color("#fff");
            pieSeries.slices.template.strokeWidth = 2;
            pieSeries.slices.template.strokeOpacity = 1;
            pieSeries.slices.template
                // change the cursor on hover to make it apparent the object can be interacted with
                .cursorOverStyle = [{
                    "property": "cursor",
                    "value": "pointer"
                }];

            pieSeries.alignLabels = false;
            pieSeries.labels.template.text = "{value.percent.formatNumber('#.0')}%";

            pieSeries.ticks.template.disabled = true;

            // Create a base filter effect (as if it's not there) for the hover to return to
            var shadow = pieSeries.slices.template.filters.push(new am4core.DropShadowFilter);
            shadow.opacity = 0;

            // Create hover state
            var hoverState = pieSeries.slices.template.states.getKey(
                "hover"); // normally we have to create the hover state, in this case it already exists

            // Slightly shift the shadow and make it more prominent on hover
            var hoverShadow = hoverState.filters.push(new am4core.DropShadowFilter);
            hoverShadow.opacity = 0.7;
            hoverShadow.blur = 5;

            // Add a legend
            chart.legend = new am4charts.Legend();
            chart.legend.itemContainers.template.reverseOrder = true;
            chart.data = [{
                "label": "پست ها",
                "value": {{ $allPostsViews }}
            }, {
                "label": "رویداد ها",
                "value": {{ $allEventsViews }}
            }, {
                "label": "خبر ها",
                "value": {{ $allNewsViews }}
            }];

        }); // end am4core.ready()
    </script>
@endsection
@endsection
@section('content')
<div class="row gy-4">
    <div class="col-lg-9">
        <!-- Stats -->
        <div class="row g-3">
            <div class="col-6 col-lg-3">
                <div class="bg-white p-3 d-flex align-items-center justify-content-center rounded">
                    <div class="stats-icon bg-purple me-3">
                        <i class="bi bi-eye-fill lh-0"></i>
                    </div>
                    <div class="">
                        <h5 class="card-title fs-7 text-muted">بازدید سایت</h5>
                        <p class="card-text fw-bold mt-2">{{ $allViewsPage }}</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="bg-white p-3 d-flex align-items-center justify-content-center rounded">
                    <div class="stats-icon bg-red me-3">
                        <i class="bi bi-heart-fill lh-0"></i>
                    </div>
                    <div class="">
                        <h5 class="card-title fs-7 text-muted">لایک ها</h5>
                        <p class="card-text fw-bold mt-2">{{ $likesCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="bg-white p-3 d-flex align-items-center justify-content-center rounded">
                    <div class="stats-icon bg-green me-3">
                        <i class="bi bi-chat-dots-fill lh-0"></i>
                    </div>
                    <div class="">
                        <h5 class="card-title fs-7 text-muted">کامنت ها </h5>
                        <p class="card-text fw-bold mt-2">{{ $commentsCount }}</p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="bg-white p-3 d-flex align-items-center justify-content-center rounded">
                    <div class="stats-icon bg-blue me-3">
                        <i class="bi bi-bookmark-plus-fill lh-0"></i>
                    </div>
                    <div class="">
                        <h5 class="card-title fs-7 text-muted">بوک مارک ها </h5>
                        <p class="card-text fw-bold mt-2">{{ $bookmarksCount }}</p>
                    </div>
                </div>
            </div>


        </div>

        <!-- Chart -->

        <div class="row w-100 m-0">
            <div class="col-12 bg-white rounded mt-4 p-4">
                <div class="">آمار ماهانه ی بازید از سایت</div>
                <div class="">
                    <div id="chartdiv" style="height: 500px;"></div>
                </div>
            </div>
        </div>

        <!-- Progress & Comments -->

        <div class="row w-100 m-0 g-4">

            <!-- Progress -->
            <div class="col-lg-4 p-0 px-2">
                <div class="bg-white p-4 rounded">
                    <div class="mb-4">
                        <h5 class="fw-bold">بیشترین بازدید ها</h5>
                    </div>
                    <div>
                        <div class="progress">
                            <div class="progress-bar bg-blue" style="width: {{ $mostPostView }}%" role="progressbar"
                                aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">{{ $mostPostView }}%</div>
                        </div>
                        <p class="fs-7 text-muted mt-2">بیشترین بازدید پست</p>
                        <hr>
                    </div>
                    <div>
                        <div class="progress">
                            <div class="progress-bar bg-green" style="width: {{ $mostEventView }}%" role="progressbar"
                                aria-valuenow="33" aria-valuemin="0" aria-valuemax="100">{{ $mostEventView }}%</div>
                        </div>
                        <p class="fs-7 text-muted mt-2">بیشترین بازدید رویداد</p>
                        <hr>
                    </div>

                    <div>
                        <div class="progress">
                            <div class="progress-bar bg-red" style="width: {{ $mostNewsView }}%" role="progressbar"
                                aria-valuenow="77" aria-valuemin="0" aria-valuemax="100">{{ $mostNewsView }}%</div>
                        </div>
                        <p class="fs-7 text-muted mt-2">بیشترین بازدید خبر</p>
                    </div>
                </div>
            </div>

            <!-- Comments -->
            <div class="col-lg-8 p-0">
                <div class="bg-white p-4 rounded">
                    <div class="mb-4">
                        <h5 class="fw-bold">آخرین کامنت ها</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead>
                                <tr>
                                    <th>تصویر</th>
                                    <th>نام کاربری</th>
                                    <th>کامنت</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lastComments as $lastComment)
                                    <tr>
                                        <td>
                                            @php
                                                if ($lastComment->user->avatar) {
                                                    $avatar = asset(env('USER_IMAGES_PATH') . $lastComment->user->avatar->image);
                                                } else {
                                                    $avatar = asset('image/user.png');
                                                }
                                            @endphp
                                            <img src="{{ $avatar }}" alt="user" class="rounded-circle"
                                                height="50" width="50">
                                        </td>
                                        <td class="text-muted">
                                            {{ $lastComment->user->name }}
                                        </td>
                                        <td class="text-muted">
                                            {{ $lastComment->body }}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>


    </div>

    <div class="col-lg-3">

        <!-- Profile -->
        <div class="bg-white p-3 d-flex align-items-center justify-content-lg-center justify-content-start rounded">
            <img src="{{auth()->user()->getUserProfile()}}" class="img-fluid rounded-circle me-2" style="width: 70px; height: 70px;">

            <div class="">
                <p class="card-text fw-bold mb-1 fs-5">{{auth()->user()->name}}</p>
                <h5 class="card-title fs-6 text-muted dir-ltr">{{auth()->user()->roles()->first()->display_name ?? 'بدون نقش'}}</h5>
            </div>
        </div>

        <!-- Users -->

        <div class="bg-white mt-4 p-4 rounded">

            <div class="mb-4">
                <h5 class="fw-bold">آخرین کاربران</h5>
            </div>

            @foreach ($lastUsers as $lastUser)
                <div class="py-2 d-flex align-items-center justify-content-start rounded">
                    @php
                        if ($lastUser->avatar) {
                            $avatar = asset(env('USER_IMAGES_PATH') . $lastUser->avatar->image);
                        } else {
                            $avatar = asset('image/user.png');
                        }
                    @endphp
                    <img src="{{ $avatar }}" alt="user" class="rounded-circle me-3"
                        style="width: 60px;height:60px;min-width:60px;">
                    <div class="">
                        <p class="card-text fw-bold mb-1 fs-6">{{ $lastUser->name }}</p>
                        <h5 class="card-title fs-7 text-muted dir-ltr text-break">{{ $lastUser->email }}</h5>
                    </div>
                </div>
            @endforeach

        </div>

        <!-- Chart2 -->

        <div class="bg-white mt-4 p-4 rounded">

            <div class="mb-4">
                <h5 class="fw-bold">آمار بازید محتوا</h5>
                <p class="fw-bold">بازدید کل محتوا : {{$allViewsContent}}</p>
            </div>

            <div id="chartdiv2" style="height: 350px;"></div>

        </div>



    </div>
</div>
@endsection
