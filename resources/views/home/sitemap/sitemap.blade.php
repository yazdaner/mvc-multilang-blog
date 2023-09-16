<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($posts as $post)
        <url>
            <loc>{{ url('/') }}/posts/{{ $post->slug }}</loc>
            <lastmod>{{ $post->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
    @foreach ($events as $event)
    <url>
        <loc>{{ url('/') }}/events/{{ $event->slug }}</loc>
        <lastmod>{{ $event->created_at->tz('UTC')->toAtomString() }}</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach
    @foreach ($news as $new)
        <url>
            <loc>{{ url('/') }}/news/{{ $new->slug }}</loc>
            <lastmod>{{ $new->created_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.8</priority>
        </url>
    @endforeach
</urlset>
