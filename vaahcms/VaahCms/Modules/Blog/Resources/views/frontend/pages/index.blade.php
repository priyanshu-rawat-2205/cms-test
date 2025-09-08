<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>My Dark Blog</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <style>
        @keyframes fade-in {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in { animation: fade-in 0.3s ease-out; }
    </style>
</head>
<body class="flex flex-col min-h-screen bg-gray-900 text-gray-200 font-sans leading-relaxed">

    <header class="bg-gray-800 border-b border-gray-700 fixed top-0 left-0 right-0 z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <a href="{{ route('vh.frontend.blog') }}" class="text-xl font-bold text-indigo-400 hover:text-indigo-300">
                My Dark Blog
            </a>
        </div>
    </header>

    <main class="flex-grow pt-20 pb-6">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(session('error') || session('success') || session('message'))
                <div id="toast" class="fixed top-20 right-4 bg-gray-800 border border-gray-700 px-4 py-3 rounded-lg shadow-lg animate-fade-in">
                    <div class="flex items-center space-x-3">
                        <div class="flex-1 text-sm {{ session('error') ? 'text-red-400' : 'text-green-400' }}">
                            {{ session('error') ?? session('success') ?? session('message') }}
                        </div>
                        <button onclick="document.getElementById('toast').remove()" class="text-gray-400 hover:text-gray-200">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <script>
                    setTimeout(() => {
                        const toast = document.getElementById('toast');
                        if(toast) toast.remove();
                    }, 3000);
                </script>
            @endif

            <section class="bg-gray-800 rounded-lg p-4 mb-6">
                <form method="GET" class="flex flex-wrap gap-2 justify-center">
                    <input type="text" name="search" placeholder="Search blogs..." value="{{ request('search') }}"
                           class="w-full sm:w-1/3 px-3 py-2 rounded bg-gray-700 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500" />
                    <select name="category" class="w-full sm:w-1/5 px-3 py-2 rounded bg-gray-700 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="">All Categories</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category')==$category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <select name="tag" class="w-full sm:w-1/5 px-3 py-2 rounded bg-gray-700 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="">All Tags</option>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}" {{ request('tag')==$tag->id ? 'selected' : '' }}>
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-600 rounded font-medium transition">Filter</button>
                    <a href="{{ route('vh.frontend.blog') }}" class="px-4 py-2 bg-gray-700 hover:bg-gray-600 rounded text-gray-300 hover:text-white transition">Reset</a>
                </form>
            </section>

            <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($blogs as $blog)
                    <a href="{{ route('vh.frontend.blog.detail', $blog->slug) }}">
                    <div class="bg-gray-800 rounded-lg p-4 hover:bg-gray-700 transition">
                        <div class="flex flex-wrap gap-2 mb-2 text-xs">
                        <!-- Category -->
                        <span class="bg-indigo-500 text-black px-2 py-0.5 rounded-full">
                            {{ $blog->category->name ?? 'Uncategorized' }}
                        </span>

                        <!-- Tags -->
                        @php
                            $tags = $blog->tags;
                            $shownTags = $tags->take(2);
                            $hiddenTags = $tags->skip(2);
                        @endphp

                        @foreach($shownTags as $tag)
                            <span class="bg-gray-700 text-gray-300 px-2 py-0.5 rounded-full">{{ $tag->name }}</span>
                        @endforeach

                        @if($hiddenTags->count() > 0)
                            <!-- "+n more" chip -->
                            <div class="relative group">
                                <span class="cursor-pointer bg-gray-600 text-gray-200 px-2 py-0.5 rounded-full">
                                    +{{ $hiddenTags->count() }} more
                                </span>
                                <!-- Tooltip for hidden tags -->
                                <div class="absolute hidden group-hover:block bg-gray-800 border border-gray-700 text-gray-300 text-xs rounded-md px-3 py-2 mt-1 z-20 max-w-xs">
                                    @foreach($hiddenTags as $tag)
                                        <span class="inline-block bg-gray-700 text-gray-300 px-2 py-0.5 rounded-full mr-1 mb-1">{{ $tag->name }}</span>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                        <span class="text-lg font-semibold hover:text-indigo-400 transition block mb-2">
                            {{ $blog->name }}
                        </span>
                        <p class="text-sm text-gray-400 mb-4">{{ Str::limit($blog->content, 100) }}</p>
                        <div class="text-xs text-gray-500 text-right">{{ \Carbon\Carbon::parse($blog->created_at)->format('F j, Y') }}</div>
                    </div>
                    </a>
                @empty
                    <div class="col-span-full text-center text-gray-400 py-8">No blogs found. Adjust your filters.</div>
                @endforelse
            </section>

            @if($blogs->hasPages())
                <div class="flex justify-center mt-6 text-sm">
                    {{ $blogs->withQueryString()->links() }}
                </div>
            @endif

        </div>
    </main>

    <footer class="bg-gray-800 border-t border-gray-700">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <form method="POST" action="{{ route('newsletter.subscribe') }}" class="max-w-2xl mx-auto text-center mb-4">
                @csrf
                <div class="flex flex-col sm:flex-row gap-4 items-center justify-center">
                    <input type="email" name="email" required
                           class="w-full sm:w-2/3 px-4 py-3 rounded bg-gray-700 border border-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                           placeholder="Enter your email to subscribe">
                    <button type="submit"
                            class="bg-indigo-500 hover:bg-indigo-600 text-white font-semibold py-3 px-6 rounded transition duration-150 ease-in-out">
                        Subscribe
                    </button>
                </div>
                @if(session('message'))
                    <p class="mt-3 text-sm text-green-400">{{ session('message') }}</p>
                @endif
            </form>

            <p class="text-center text-xs text-gray-500">&copy; {{ date('Y') }} My Dark Blog. All rights reserved.</p>
        </div>
    </footer>

</body>
</html>
