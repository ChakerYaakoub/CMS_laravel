<div class="mx-4" style="background-color:{{ $site_color->background_color }} ; color : {{ $site_color->font_color }} ">




    <div class="mt-10"
        style="background-color:{{ $site_color->background_color }} ; color : {{ $site_color->font_color }} ">

        <div class="mb-4 md:mb-0 w-full mx-auto relative">
            <div class="px-4 lg:px-0">
                {{-- text-gray-800  --}}
                <h2 id="introduction" class="text-4xl font-semibold leading-tight">
                    {{ $site->site_title }}
                </h2>

                <p class="text-xl">
                    <span class="font-bold text-xl">
                        tags :


                    </span>
                    <span class="py-2 text-green-700 inline-flex items-center justify-center mb-2">
                        {{ $site->tags }}

                    </span>

                </p>


            </div>

            <img src="{{ $site->BasicImage ? asset('storage/' . $site->BasicImage) : 'images/no-image.png' }}"
                alt="{{ $site->site_title }}-image" class="w-full p-1 lg:rounded" style="height: 28em;" />
        </div>

        <div class="flex flex-col lg:flex-row lg:space-x-12">
            {{-- text-gray-700 --}}

            <div class="px-4 lg:px-0 mt-12   leading-relaxed w-full lg:w-3/4">
                {{-- text-gray-800  --}}
                <h1 class="text-2xl  mb-4 mt-4 text-2xl font-bold">
                    1 - Intorduction :
                </h1>
                {{-- <p class="pb-6"> </p> --}}

                <div class="border-l-4 text-lg border-gray-500 pl-4 mb-6 italic rounded">
                    {{ $site->introduction }}
                </div>


                <br>
                <hr width="100%"
                    style=" border: 1px solid {{ $site_color->section_separator_color }};
                border-radius: 5x; "
                    noshade>
                <br>



                @foreach ($site_articles as $site_article)
                    {{-- text-gray-800  --}}
                    <h1 id="article-{{ $loop->index + 1 }}" class="text-2xlfont-semibold mb-4 mt-4 font-bold text-2xl">
                        {{ $loop->index + 2 }} - {{ $site_article->article_title }}

                    </h1>
                    <div class="fr-view">
                        {!! $site_article->article_content !!}

                    </div>
                    <br>
                    <hr width="100%"
                        style=" border: 1px solid {{ $site_color->section_separator_color }};
                    border-radius: 5px; "
                        noshade>
                    <br>
                @endforeach






            </div>

            <div class="w-full lg:w-1/4 m-auto mt-12 max-w-screen-sm">
                <div class="p-4 border-t border-b md:border md:rounded">

                    <div class="flex py-2">
                        <img src="{{ asset('images/noProfil.png') }}"
                            class="h-10 w-10 rounded-full mr-2 object-cover" />
                        <div>
                            {{-- text-gray-700 --}}
                            <p class="font-semibold  text-sm"> {{ $site->site_builder }} </p>
                            {{-- text-gray-600 --}}
                            <p class="font-semibold  text-xs"> writer </p>
                        </div>
                    </div>

                    <img src="{{ $site->logo ? asset('storage/' . $site->logo) : 'images/no-image.png' }}"
                        alt="{{ $site->site_title }}-image" />

                    <br>


                    <div
                        class="px-2 py-1 text-gray-900 flex w-full items-center justify-center justify-between rounded ">
                        <button onclick="handleReaction('like')" class="text-green-500 hover:text-green-700">
                            <i id="likeIcon" class="far fa-thumbs-up fa-2x"></i> <br>
                            <span id='likeNb'></span>
                        </button>
                        <button onclick="handleReaction('dislike')" class="text-red-500 hover:text-red-700">
                            <i id="dislikeIcon" class="far fa-thumbs-down fa-2x"></i> <br>
                            <span id='dislikeNb'></span>

                        </button>
                        <button class="text-red-900 hover:text-pink-700" onclick="handleReaction('love')">
                            <i id="loveIcon" class="far fa-heart fa-2x"></i> <br>
                            <span id='loveNb'></span>

                        </button>
                    </div>
                    <div id="loginAlert" style="display:none;">
                        <x-alert2 type="info" message="You have to login first!" />
                    </div>







                </div>
            </div>

        </div>
    </div>


    {{--  commnet its here  --}}
    {{-- https://flowbite.com/blocks/publisher/comments/ --}}


    @include('sites.partials.comments', [
        'site' => $site,
        'site_template' => $site_template,
        'site_color' => $site_color,
        'site_articles' => $site_articles,
        'comments' => $comments,
    ])





</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Check user's reaction when the page loads
        checkUserReaction();
        TotalReactionsByType()
    });

    const TotalReactionsByType = () => {
        let like = 0;
        let dislike = 0;
        let love = 0;
        @foreach ($reactions as $reaction)
            @if ($reaction->reaction_type == 'like')
                like++;
            @elseif ($reaction->reaction_type == 'dislike')
                dislike++;
            @elseif ($reaction->reaction_type == 'love')
                love++;
            @endif
        @endforeach
        document.getElementById('likeNb').innerText = like;
        document.getElementById('dislikeNb').innerText = dislike;
        document.getElementById('loveNb').innerText = love;



    }

    const handleReaction = (reaction) => {
        // Check if user is logged in
        const isLoggedIn = <?php echo auth()->check() ? 'true' : 'false'; ?>;
        const site_id = <?php echo $site->id; ?>;

        if (isLoggedIn) {
            // Send a request to the server to handle the reaction
            fetch(`/handleReaction/${site_id}/${reaction}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                })
                .then(response => {
                    if (response.ok) {
                        // Reaction successfully handled by the server
                        // Update UI based on the response from the server
                        response.json().then(data => {
                            const oldReaction = data.oldReaction;
                            const newReaction = data.reaction;
                            updateReactionIcon(newReaction);

                            // Update reaction count
                            if (oldReaction && oldReaction !== newReaction) {
                                decrementReactionCount(oldReaction);
                            }
                            incrementReactionCount(newReaction);
                        });
                    } else {
                        throw new Error('Failed to handle reaction');
                    }
                })
                .catch(error => {
                    console.error(error);
                    // Handle error, show error message, etc.
                });
        } else {
            // Show login alert
            document.getElementById('loginAlert').style.display = 'block';
        }
    }

    const incrementReactionCount = (reaction) => {
        const countElement = document.getElementById(`${reaction}Nb`);
        countElement.innerText = parseInt(countElement.innerText) + 1;
    }

    const decrementReactionCount = (reaction) => {
        const countElement = document.getElementById(`${reaction}Nb`);
        countElement.innerText = parseInt(countElement.innerText) - 1;
    }

    const updateReactionIcon = (reaction) => {
        const icon = document.getElementById(`${reaction}Icon`);
        switch (reaction) {
            case 'like':
                toggleReactionIcon('like');
                removeReactionIcon('dislike');
                removeReactionIcon('love');
                break;
            case 'dislike':
                toggleReactionIcon('dislike');

                removeReactionIcon('like');
                removeReactionIcon('love');
                break;
            case 'love':
                toggleReactionIcon('love');

                removeReactionIcon('like');
                removeReactionIcon('dislike');
                break;
            default:
                console.error('Invalid reaction type');
        }
    }

    const toggleReactionIcon = (reaction) => {
        const icon = document.getElementById(`${reaction}Icon`);
        icon.classList.toggle('fa-solid');
    }
    const removeReactionIcon = (reaction) => {
        const icon = document.getElementById(`${reaction}Icon`);
        icon.classList.remove('fa-solid');
    }

    const checkUserReaction = () => {
        // Check if user has a reaction
        const hasReaction = <?php echo $reactions->contains('user_id', auth()->id()) ? 'true' : 'false'; ?>;
        console.log('User has a reaction: ' + hasReaction);

        if (hasReaction) {
            // Get the user's reaction if reactions exist
            const userReaction = "<?php
            if ($reactions != null && $reactions->where('user_id', auth()->id())->isNotEmpty()) {
                echo $reactions->where('user_id', auth()->id())->first()->reaction_type;
            } else {
                echo ''; // Return empty string if no reaction found
            }
            ?>";

            console.log('User reaction type: ' + userReaction);

            if (userReaction !== '') {
                toggleReactionIcon(userReaction);
            }
        }
    }
</script>
