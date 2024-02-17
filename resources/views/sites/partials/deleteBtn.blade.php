<a class="hover:text-red-500" onclick="deleteSite('{{ $site->id }}')">
    <center><button class="bg-red-500
    {{ $class }} hover:bg-red-700 text-white font-bold py-2 px-2 rounded">
            remove
        </button>
    </center>
</a>


<script>
    function deleteSite(id) {
        if (confirm('Are you sure you want to delete this site?')) {
            fetch(`/site/remove/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => {
                    if (response.ok) {
                        // Optionally, reload the page or perform any other action
                        window.location.href = '/sites/manager/allBlogs';
                    } else {
                        throw new Error('Failed to delete site');
                    }
                })
                .catch(error => {
                    console.error(error);
                    // Handle error, show error message, etc.
                });
        }
    }
</script>
