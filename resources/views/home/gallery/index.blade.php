@extends('home.layouts.home')
@section('title', __('Gallery'))

@section('script')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('tabs', () => ({
            tabName: "{{ __('All') }}",
            tabs: [
                @foreach ($categories_gallery as $category_gallery)
                    {
                        'category': '{{ $category_gallery->title }}',
                        'images': [
                            @foreach ($category_gallery->images as $image)
                                {
                                    'title': '{{ $image->title }}',
                                    'caption': '{{ $image->caption }}',
                                    'image': '{{ asset(env('GALLERY_IMAGES_PATH') . $image->image) }}',
                                },
                            @endforeach
                        ]
                    },
                @endforeach {
                    'category': "{{ __('All') }}",
                    'images': [
                        @foreach ($gallery as $image)
                            {
                                'title': '{{ $image->title }}',
                                'caption': '{{ $image->caption }}',
                                'image': '{{ asset(env('GALLERY_IMAGES_PATH') . $image->image) }}',
                            },
                        @endforeach
                    ]
                }
            ],
        }))
    })
</script>
@endsection
@section('content')

@include('home.sections.gallery')

@endsection
