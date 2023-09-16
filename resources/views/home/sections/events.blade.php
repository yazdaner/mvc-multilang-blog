@php
    $lang_dir = App\Models\Language::where('name', session()->get('locale') ?? App::getLocale())->first()->direction;
@endphp

@foreach ($events as $event)
    <div class="col-md-4">
            <div class="card shadow">
                <a href="{{ route('home.event.show', $event) }}">
                <img src="{{ asset(env('EVENTS_BANNER_IMAGES_PATH') . $event->banner) }}" class="card-img-top card-image"
                    alt="value-image" />
                </a>
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="text-danger d-flex justify-content-between align-items-center">
                            <i class="bi bi-eye fs-5 mx-1"></i>
                            <span>{{ $event->views }}</span>
                        </div>

                        <div class="comment text-danger">
                            <i class="bi bi-chat"></i>
                            <span>{{ $event->getCommentsCount() }}</span>
                        </div>
                    </div>
                <a href="{{ route('home.event.show', $event) }}">

                    <h5 class="card-title text-primary fw-bold text-center">{{ $event->title }}</h5>
                    <p class="card-text text-dark">
                        {{ $event->preview }}
                    </p>
                    @if ($lang_dir == 'ltr')
                    <span class="d-block btn btn-danger">{{ date('d M Y H:i', strtotime($event->time)) }}</span>

                    @else
                    <span class="d-block btn btn-danger">{{ verta($event->time)->format('H:i Y/n/j'); }}</span>

                    @endif
                </a>
                </div>
            </div>
    </div>
@endforeach
