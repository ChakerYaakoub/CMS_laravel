@props(['comment', 'site'])

<button id="dropdownCommentButton{{ $comment->id }}"
    onclick="dropdownCommentSettings('dropdownComment-{{ $comment->id }}')"
    class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 dark:text-gray-400 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
    type="button">
    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
        <path
            d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z" />
    </svg>
    <span class="sr-only">Comment settings</span>
</button>
<!-- Dropdown menu -->
<div id="dropdownComment-{{ $comment->id }}" style="display: none"
    class=" z-10 w-36 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconHorizontalButton">
        <li>
            <a href="#"
                class="block py-2 px-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit
                "Not working"</a>
        </li>
        <li>
            <button href="#" onclick="removeComment({{ $comment->id }})"
                class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Remove</button>
        </li>
        {{-- <li>
        <a href="#"
            class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Report</a>
    </li> --}}
    </ul>
</div>

<script>
    function removeComment(commentId) {


        fetch(`/site/comment/remove/${commentId}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => {
                if (response.ok) {
                    // Reload the page or update the comment section
                    window.location.reload();
                } else {
                    throw new Error('Failed to remove comment');
                }
            })
            .catch(error => {
                console.error(error);
                // Handle error, show error message, etc.
            });

    }
</script>
