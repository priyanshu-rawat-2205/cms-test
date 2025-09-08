<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>{{ $blog->name }} | My Dark Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <style>
        .prose {
            max-width: 100%;
        }
        .prose img {
            max-width: 100%;
            height: auto;
            border-radius: 0.5rem;
            margin: 1.5rem auto;
        }
        .prose p {
            margin-bottom: 1.25rem;
            line-height: 1.7;
        }
        .prose a {
            color: #818cf8; /* indigo-400 */
            text-decoration: underline;
        }
        .prose a:hover {
            color: #6366f1; /* indigo-500 */
        }
    </style>
</head>
<body class="flex flex-col min-h-screen bg-gray-900 text-gray-200 font-sans leading-relaxed">

    <!-- Main Content -->
    <div class="flex-grow">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            
            <article class="bg-gray-800 rounded-lg shadow-md overflow-hidden p-6 sm:p-8">
                <header class="mb-6 sm:mb-8">
                    <div class="flex flex-wrap gap-2 mb-4">
                        <span class="bg-indigo-500 text-black text-xs font-semibold px-2 py-0.5 rounded-full">
                            {{ $blog->category->name ?? 'Uncategorized' }}
                        </span>
                        @foreach($blog->tags as $tag)
                            <span class="bg-gray-700 text-gray-300 text-xs font-semibold px-2 py-0.5 rounded-full">
                                {{ $tag->name }}
                            </span>
                        @endforeach
                    </div>
                    
                    <h1 class="text-2xl sm:text-3xl font-bold text-indigo-400 mb-4">{{ $blog->name }}</h1>
                    
                    @if($blog->description)
                        <p class="text-sm text-gray-400 mb-6">{{ $blog->description }}</p>
                    @endif
                    
                    <div class="text-xs text-gray-500">
                        Published on {{ \Carbon\Carbon::parse($blog->created_at)->format('F j, Y') }}
                    </div>
                </header>

                <div class="prose prose-invert max-w-none">
                    {!! $blog->content !!}
                </div>

                <footer class="mt-8 pt-6 border-t border-gray-700 text-center">
                    <a href="{{ route('vh.frontend.blog') }}" class="inline-flex items-center text-indigo-400 hover:text-indigo-300 transition duration-150 ease-in-out">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back to All Articles
                    </a>
                </footer>
            </article>
        </div>
    </div>

    <!-- Sticky Footer -->
    <footer class="bg-gray-800 border-t border-gray-700">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-xs text-gray-500">
                &copy; {{ date('Y') }} My Dark Blog. All rights reserved.
            </p>
        </div>
    </footer>

</body>
</html>
