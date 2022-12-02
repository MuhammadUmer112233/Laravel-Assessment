<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<Document xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($books as $book)
        <book>
            <id>{{ $book->id }}</id>
            <title>{{ $book->title}}</title>
            <author>{{ $book->author}}</author>

        </book>
    @endforeach
</Document>
