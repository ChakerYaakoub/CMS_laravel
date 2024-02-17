@props(['comment', 'site'])

<div class="flex items-center mt-4 space-x-4">
    <button type="button" onclick="openComment('comment-{{ $comment->id }}')"
        data-dismiss-target="#comment-{{ $comment->id }}" aria-label="open"
        class="flex items-center text-sm text-gray-500 hover:underline dark:text-gray-400 font-medium">
        <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
            viewBox="0 0 20 18">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
        </svg>
        Reply
    </button>
</div>

<div class="mt-2 px-5">

    <form class="mb-6" method="post" action="/site/reply/store" style="display: none"
        id="comment-{{ $comment->id }}">

        @csrf
        <div
            class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
            <label for="comment" class="sr-only">Your replay</label>
            <textarea id="comment" rows="3" name="comment" placeholder="Write a Reply..."
                class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                required></textarea>

            <input type="number" readonly hidden value="{{ $site->id }}" name="site_id">
            <input type="number" readonly hidden value="{{ $comment->id }}" name="parent_id">


        </div>
        <button type="submit"
            class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800  bg-indigo-600">
            Reply
        </button>
    </form>

</div>
