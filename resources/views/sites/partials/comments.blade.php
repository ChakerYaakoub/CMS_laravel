<div class=" dark:bg-gray-900 py-8 lg:py-16 antialiased" id="comments">
    <div class="max-w-2xl mx-auto px-4">
        <div class="flex justify-between items-center mb-6">
            {{-- // count of comments --}}
            <h2 class="text-lg lg:text-2xl font-bold text-gray-900 dark:text-white">Discussion ({{ $comments->count() }})
            </h2>
        </div>

        {{-- // add new commmets form --}}

        @auth
            <form class="mb-6" method="post" action="/site/comment/store">
                @csrf
                <div
                    class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                    <label for="comment" class="sr-only">Your comment</label>
                    <textarea id="comment" rows="6" name="comment" placeholder="Write a comment..."
                        class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none dark:text-white dark:placeholder-gray-400 dark:bg-gray-800"
                        required></textarea>

                    <input type="number" readonly hidden value="{{ $site->id }}" name="site_id">

                </div>
                <button type="submit"
                    class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800  bg-indigo-600">
                    Post comment
                </button>
            </form>
        @else
            {{-- <x-alert color="default" text1="! " text2="you need to login to add a comment" /> --}}
            <x-alert2 type="info" message="you need to login to add a comment" />



        @endauth


        {{-- // comments + replay  --}}
        @foreach ($comments as $comment)
            <div class="border-b border-gray-200">

                {{-- // Comment principal --}}

                @if ($comment->parent_id == null)
                    <article class="p-6 text-base bg-white rounded-lg dark:bg-gray-900">
                        <footer class="flex justify-between items-center mb-2">
                            <div class="flex items-center">
                                <p
                                    class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                    <img class="mr-2 w-6 h-6 rounded-full" src="{{ asset('images/noProfil.png') }}"
                                        alt="Michael Gough">{{ $comment->user_name }} @if ($comment->user_id == $site->user_id)
                                        <span class="text-xs text-bold  text-red-600  px-3 dark:text-gray-400">
                                            Author </span>
                                    @endif
                                </p>
                                <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate
                                        datetime="{{ $comment->created_at }}"
                                        title="{{ $comment->created_at->format('M. d, Y') }}">{{ $comment->created_at->format('M. d, Y') }}
                                    </time></p>
                            </div>
                            @auth
                                @if (auth()->user()->id == $comment->user_id)
                                    <x-dropdownCommentSettings :comment="$comment" :site="$site" />
                                @endif
                            @endauth
                        </footer>
                        <p class="text-gray-500 dark:text-gray-400">{{ $comment->comment }}</p>

                        @auth


                            <x-reply :comment="$comment" :site="$site" />


                        @endauth
                    </article>
                @endif


                {{-- // Reply // comment   --}}
                @foreach ($comments as $reply)
                    @if ($reply->parent_id != null && $reply->parent_id == $comment->id)
                        <br>
                        <article class="p-6 mb-3 ml-6 lg:ml-12 text-base bg-white rounded-lg dark:bg-gray-900  ">
                            <footer class="flex justify-between items-center mb-2">
                                <div class="flex items-center">
                                    <p
                                        class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white font-semibold">
                                        <img class="mr-2 w-6 h-6 rounded-full" src="{{ asset('images/noProfil.png') }}"
                                            alt="Jese Leos">
                                        {{ $reply->user_name }}

                                        @if ($reply->user_id == $site->user_id)
                                            <span class="text-xs text-bold  text-red-600  px-3 dark:text-gray-400">
                                                Author </span>
                                        @endif

                                    </p>
                                    <p class="text-sm text-gray-600 dark:text-gray-400"><time pubdate
                                            datetime="{{ $comment->created_at }}"
                                            title="{{ $comment->created_at->format('M. d, Y') }}">{{ $comment->created_at->format('M. d, Y') }}
                                        </time></p>
                                </div>
                                @auth
                                    @if (auth()->user()->id == $reply->user_id)
                                        <x-dropdownCommentSettings :comment="$reply" :site="$site" />
                                    @endif
                                @endauth
                            </footer>
                            <p class="text-gray-500 dark:text-gray-400"> {{ $reply->comment }}</p>

                        </article>
                    @endif
                @endforeach

            </div>
        @endforeach

        @if ($comments->count() == 0)
            <div class="text-center">
                <p class="text-gray-500 dark:text-gray-400">No comments yet</p>
            </div>
        @endif

        <script>
            const openComment = (id) => {
                const commentForm = document.getElementById(id);
                if (commentForm.style.display === 'block') {
                    commentForm.style.display = 'none';
                } else {
                    commentForm.style.display = 'block';
                }
            }

            const dropdownCommentSettings = (id) => {
                console.log(id)
                const dropdownComment = document.getElementById(id);
                if (dropdownComment.style.display === 'block') {
                    dropdownComment.style.display = 'none';
                } else {
                    dropdownComment.style.display = 'block';
                }
            }
        </script>






    </div>
</div>
