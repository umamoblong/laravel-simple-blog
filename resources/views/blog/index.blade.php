<!DOCTYPE html>
<html>
<head>
    <title>Blog Publik</title>
    <style>
        body { font-family: Arial; padding: 20px; max-width: 800px; margin: auto; }
        .post { border-bottom: 1px solid #ddd; padding: 15px 0; }
        .post h2 { margin: 0; }
        .post a { text-decoration: none; color: blue; }
        .post small { color: gray; }
        .menu { margin: 20px 0; }
        .menu a { margin-right: 15px; }
    </style>
</head>
<body>
    <h1>📝 Blog Publik</h1>
    <div class="menu">
        <a href="/">Home</a>
        <a href="/blog">Blog</a>
        @auth
            <a href="/dashboard">Dashboard</a>
        @else
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        @endauth
    </div>

    <hr>

    @foreach($posts as $post)
        <div class="post">
            <h2><a href="/blog/{{ $post->id }}">{{ $post->title }}</a></h2>
            <p>{{ substr($post->content, 0, 150) }}...</p>
            <small>Dipublikasikan: {{ $post->created_at->format('d M Y') }}</small>
        </div>
    @endforeach

    @if($posts->isEmpty())
        <p>Belum ada postingan.</p>
    @endif
</body>
</html>