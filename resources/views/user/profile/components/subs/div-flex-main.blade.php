<main class="max-w-[1280px] md:ps-20 xl:ps-[260px] m-auto">
    <section class="hidden ms-12 my-8 gap-12 md:flex">
        <img class="w-[150px] h-[150px] self-center rounded-full"
            @if (!empty($user->profile->image)) src="{{ asset($user->profile->image) }}"
        @else
        src="{{ asset('home/assets/default-user.png') }}" @endif
            alt="Profile Photo" />
        <div class="w-full">
            <div class="flex gap-8 items-center">
                <h2 class="text-xl font-normal">
                    {{ strtolower($user->username) }}
                    @include('user.profile.components.subs.verified-badge')
                </h2>
                <div class="flex gap-2 items-center">
                    @if (auth()->check() && auth()->user()->id !== $user->id)
                        @if (Auth::user()->isFollowing($user))
                            <form action="{{ route('user.unfollow', $user) }}" method="POST">
                                @csrf
                                <button type="submit"
                                    class="unfollow-btn px-7 py-1.5 rounded-lg text-sm font-medium bg-[#EFEFEF] hover:bg-[#DBDBDB]">Unfollow</button>
                            </form>
                        @else
                            <form action="{{ route('user.follow', $user) }}" class="follow-form" method="POST">
                                @csrf
                                <button type="submit"
                                    class="follow-btn px-7 py-1.5 rounded-lg text-sm font-medium text-white bg-[#0095f6] hover:bg-[#1877F2]">Follow</button>
                            </form>
                        @endif
                    @else
                        <button type="submit"
                            class="px-7 py-1.5 rounded-lg text-sm font-medium text-white bg-[#0095f6] hover:bg-[#1877F2]">
                            <a href="{{ route('p.edit', Auth::user()->username) }}">Edit Profile</a>
                        </button>
                    @endif
                    <button class="px-7 py-1.5 rounded-lg text-sm font-medium bg-[#EFEFEF] hover:bg-[#DBDBDB]">
                        Message
                    </button>
                    <button class="px-2 py-2 rounded-lg bg-[#EFEFEF] hover:bg-[#DBDBDB]">
                        <svg aria-label="Similar accounts" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor"
                            height="16" role="img" viewBox="0 0 24 24" width="16">
                            <title>Similar accounts</title>
                            <path d="M19.006 8.252a3.5 3.5 0 1 1-3.499-3.5 3.5 3.5 0 0 1 3.5 3.5Z" fill="none"
                                stroke="currentColor" stroke-miterlimit="10" stroke-width="2"></path>
                            <path d="M22 19.5v-.447a4.05 4.05 0 0 0-4.05-4.049h-4.906a4.05 4.05 0 0 0-4.049 4.049v.447"
                                fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"></path>
                            <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                                stroke-width="2" x1="5.001" x2="5.001" y1="7.998" y2="14.003"></line>
                            <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                                stroke-width="2" x1="8.004" x2="2.003" y1="11" y2="11">
                            </line>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="flex w-full gap-10 my-5">
                @if (!empty($user->post))
                    <p><strong class="font-semibold">{{ $user->post->count() }}</strong>
                        {{ $user->post->count() >= 1 ? 'posts' : 'post' }}</p>
                @else
                    <strong class="font-semibold">0</strong> post</p>
                @endif
                <p><strong class="font-semibold">{{ $user->followers->count() }}</strong> followers</p>
                <p><strong class="font-semibold">{{ $user->following->count() }}</strong> following</p>
            </div>
            <div>
                <h3 class="text-sm font-semibold">{{ ucwords($user->profile->name) }}</h3>
                @if (!empty($user->profile->location))
                    <div style="display: flex;align-items:center;">
                        {{-- <svg xmlns="http://www.w3.org/2000/svg" style="width: 14px" viewBox="0 0 100 100"
                        id="location">
                        <path
                            d="M79.535 27.4c-.32-1.201-.971-2.48-1.452-3.6C72.324 9.96 59.741 5 49.581 5 35.98 5 21 14.12 19 32.919v3.841c0 .16.055 1.6.134 2.32 1.121 8.959 8.19 18.48 13.47 27.439 5.68 9.599 11.574 19.041 17.415 28.479 3.6-6.159 7.188-12.399 10.707-18.399.959-1.761 2.071-3.521 3.031-5.201.64-1.119 1.862-2.238 2.421-3.279C71.857 57.722 81 47.24 81 36.92v-4.24c0-1.119-1.387-5.039-1.465-5.28M49.83 46.68c-3.998 0-8.374-1.999-10.534-7.52-.322-.879-.296-2.64-.296-2.801v-2.48c0-7.038 5.976-10.239 11.175-10.239 6.4 0 11.351 5.121 11.351 11.521S56.23 46.68 49.83 46.68">
                        </path>
                    </svg> --}}
                        <span class="mt-1 text-sm text-slate-500">{{ $user->profile->location }}</span>
                    </div>
                @endif
                <p class="text-sm leading-tight">
                    {{ $user->profile->about_me }}
                </p>
                <div class="flex items-center gap-1">
                    <svg aria-label="Link icon" class="x1lliihq x1n2onr6 x7l2uk3" fill="currentColor" height="12"
                        role="img" viewBox="0 0 24 24" width="12">
                        <title>Link icon</title>
                        <path
                            d="m9.726 5.123 1.228-1.228a6.47 6.47 0 0 1 9.15 9.152l-1.227 1.227m-4.603 4.603-1.228 1.228a6.47 6.47 0 0 1-9.15-9.152l1.227-1.227"
                            fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"></path>
                        <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" x1="8.471" x2="15.529" y1="15.529" y2="8.471"></line>
                    </svg>
                    @if (!empty($user->profile->link))
                        <a class="text-sm font-medium hover:underline" target="_blank"
                            href="{{ $user->profile->link }}">{{ $user->profile->link }}</a>
                    @else
                        <a class="text-sm font-medium hover:underline" target="_blank">No link</a>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <section class="flex ms-4 mt-4 items-center gap-8 md:hidden">
        <img class="w-[77px] rounded-full" style="border-radius: 50%;height:77px"
            @if (!empty($user->profile->image)) src="{{ asset($user->profile->image) }}"
        @else
        src="{{ asset('home/assets/default-user.png') }}" @endif
            alt="Profile Photo" />
        <div class="w-full">
            <h2 class="text-xl font-normal">
                {{ strtolower($user->username) }}
                @include('user.profile.components.subs.verified-badge')
            </h2>
            <div class="flex mt-2 me-2 max-w-64 gap-1 sm:gap-2">
                @if (auth()->user() && auth()->user()->id != $user->id)
                    @if (Auth::user()->isFollowing($user))
                        <form action="{{ route('user.unfollow', $user) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="unfollow-btn px-7 py-1.5 rounded-lg text-sm font-medium bg-[#EFEFEF] hover:bg-[#DBDBDB]">
                                Unfollow
                            </button>
                        </form>
                    @else
                        <form action="{{ route('user.follow', $user) }}" class="follow-form" method="POST">
                            @csrf
                            <button type="submit"
                                class="follow-btn px-7 py-1.5 rounded-lg text-sm font-medium text-white bg-[#0095f6] hover:bg-[#1877F2]">
                                Follow
                            </button>
                        </form>
                    @endif
                @else
                    <button
                        class="inline flex-1 px-2 h-8 rounded-lg text-sm font-medium text-white bg-[#0095f6] hover:bg-[#1877F2]"
                        type="submit">
                        <a href="{{ route('p.edit', Auth::user()->username) }}" rel="noopener noreferrer">Edit
                            Profile</a>
                    </button>
                @endif

                <button class="inline flex-1 px-2 h-8 rounded-lg text-sm font-medium bg-[#EFEFEF] hover:bg-[#DBDBDB]">
                    Message
                </button>
                <button class="inline px-2 py-1.5 rounded-lg text-sm font-medium bg-[#EFEFEF] hover:bg-[#DBDBDB]">
                    <svg aria-label="Similar accounts" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor"
                        height="16" role="img" viewBox="0 0 24 24" width="16">
                        <title>Similar accounts</title>
                        <path d="M19.006 8.252a3.5 3.5 0 1 1-3.499-3.5 3.5 3.5 0 0 1 3.5 3.5Z" fill="none"
                            stroke="currentColor" stroke-miterlimit="10" stroke-width="2"></path>
                        <path d="M22 19.5v-.447a4.05 4.05 0 0 0-4.05-4.049h-4.906a4.05 4.05 0 0 0-4.049 4.049v.447"
                            fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2"></path>
                        <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                            stroke-width="2" x1="5.001" x2="5.001" y1="7.998" y2="14.003"></line>
                        <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                            stroke-width="2" x1="8.004" x2="2.003" y1="11" y2="11"></line>
                    </svg>
                </button>
            </div>
        </div>
    </section>
    <section class="flex flex-col ms-4 my-6 md:hidden">
        <h3 class="text-sm font-semibold">{{ ucwords($user->profile->name) }}</h3>
        @if (!empty($user->profile->location))
            <span class="mt-1 text-sm text-slate-500">
                {{ $user->profile->location }}{{-- <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100"
                viewBox="0 0 100 100" id="location">
                <path
                    d="M79.535 27.4c-.32-1.201-.971-2.48-1.452-3.6C72.324 9.96 59.741 5 49.581 5 35.98 5 21 14.12 19 32.919v3.841c0 .16.055 1.6.134 2.32 1.121 8.959 8.19 18.48 13.47 27.439 5.68 9.599 11.574 19.041 17.415 28.479 3.6-6.159 7.188-12.399 10.707-18.399.959-1.761 2.071-3.521 3.031-5.201.64-1.119 1.862-2.238 2.421-3.279C71.857 57.722 81 47.24 81 36.92v-4.24c0-1.119-1.387-5.039-1.465-5.28M49.83 46.68c-3.998 0-8.374-1.999-10.534-7.52-.322-.879-.296-2.64-.296-2.801v-2.48c0-7.038 5.976-10.239 11.175-10.239 6.4 0 11.351 5.121 11.351 11.521S56.23 46.68 49.83 46.68">
                </path>
            </svg> --}}
            </span>
        @endif
        <p class="text-sm leading-tight">
            {{ $user->profile->about_me }}
        </p>
        <div class="flex items-center gap-1">
            <svg aria-label="Link icon" class="x1lliihq x1n2onr6 x7l2uk3" fill="currentColor" height="12"
                role="img" viewBox="0 0 24 24" width="12">
                <title>Link icon</title>
                <path
                    d="m9.726 5.123 1.228-1.228a6.47 6.47 0 0 1 9.15 9.152l-1.227 1.227m-4.603 4.603-1.228 1.228a6.47 6.47 0 0 1-9.15-9.152l1.227-1.227"
                    fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2">
                </path>
                <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" x1="8.471" x2="15.529" y1="15.529" y2="8.471"></line>
            </svg>
            @if (!empty($user->profile->link))
                <a class="text-sm font-medium hover:underline" target="_blank"
                    href="{{ $user->profile->link }}">{{ $user->profile->link }}</a>
            @else
                <a class="text-sm font-medium hover:underline" target="_blank">No link</a>
            @endif
        </div>

    </section>
    <section class="grid py-2 grid-cols-3 place-items-center border-y md:hidden">
        @if (count($user->post) >= 1)
            <div class="flex flex-col items-center">
                <span class="text-sm font-medium">{{ $user->post->count() }}</span>
                <span class="text-sm text-slate-500">posts</span>
            </div>
        @else
            <div class="flex flex-col items-center">
                <span class="text-sm font-medium">0</span>
                <span class="text-sm text-slate-500">post</span>
            </div>
        @endif
        <div class="flex flex-col items-center">
            <span class="text-sm font-medium">{{ $user->followers->count() }}</span>
            <span class="text-sm text-slate-500">followers</span>
        </div>
        <div class="flex flex-col items-center">
            <span class="text-sm font-medium">{{ $user->following->count() }}</span>
            <span class="text-sm text-slate-500">following</span>
        </div>
    </section>
    <section class="mb-20 md:mb-0 md:border-t">
        <div class="grid grid-cols-3 place-items-center">
            <div class="py-4">
                <svg aria-label="Posts" class="x1lliihq x1n2onr6 x1roi4f4" fill="currentColor" height="24"
                    role="img" viewBox="0 0 24 24" width="24">
                    <title>Posts</title>
                    <rect fill="none" height="18" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" stroke-width="2" width="18" x="3" y="3"></rect>
                    <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" x1="9.015" x2="9.015" y1="3" y2="21"></line>
                    <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" x1="14.985" x2="14.985" y1="3" y2="21"></line>
                    <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" x1="21" x2="3" y1="9.015" y2="9.015"></line>
                    <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" x1="21" x2="3" y1="14.985" y2="14.985"></line>
                </svg>
            </div>
            <div class="py-4">
                <svg aria-label="Reels" class="x1lliihq x1n2onr6 x1roi4f4" fill="currentColor" height="24"
                    role="img" viewBox="0 0 24 24" width="24">
                    <title>Reels</title>
                    <line fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                        x1="2.049" x2="21.95" y1="7.002" y2="7.002"></line>
                    <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" x1="13.504" x2="16.362" y1="2.001" y2="7.002"></line>
                    <line fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2" x1="7.207" x2="10.002" y1="2.11" y2="7.002"></line>
                    <path
                        d="M2 12.001v3.449c0 2.849.698 4.006 1.606 4.945.94.908 2.098 1.607 4.946 1.607h6.896c2.848 0 4.006-.699 4.946-1.607.908-.939 1.606-2.096 1.606-4.945V8.552c0-2.848-.698-4.006-1.606-4.945C19.454 2.699 18.296 2 15.448 2H8.552c-2.848 0-4.006.699-4.946 1.607C2.698 4.546 2 5.704 2 8.552Z"
                        fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2"></path>
                    <path
                        d="M9.763 17.664a.908.908 0 0 1-.454-.787V11.63a.909.909 0 0 1 1.364-.788l4.545 2.624a.909.909 0 0 1 0 1.575l-4.545 2.624a.91.91 0 0 1-.91 0Z"
                        fill-rule="evenodd"></path>
                </svg>
            </div>
            <div class="py-4">
                <svg aria-label="Tagged" class="x1lliihq x1n2onr6 x1roi4f4" fill="currentColor" height="24"
                    role="img" viewBox="0 0 24 24" width="24">
                    <title>Tagged</title>
                    <path
                        d="M10.201 3.797 12 1.997l1.799 1.8a1.59 1.59 0 0 0 1.124.465h5.259A1.818 1.818 0 0 1 22 6.08v14.104a1.818 1.818 0 0 1-1.818 1.818H3.818A1.818 1.818 0 0 1 2 20.184V6.08a1.818 1.818 0 0 1 1.818-1.818h5.26a1.59 1.59 0 0 0 1.123-.465Z"
                        fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2"></path>
                    <path d="M18.598 22.002V21.4a3.949 3.949 0 0 0-3.948-3.949H9.495A3.949 3.949 0 0 0 5.546 21.4v.603"
                        fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        stroke-width="2"></path>
                    <circle cx="12.072" cy="11.075" fill="none" r="3.556" stroke="currentColor"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></circle>
                </svg>
            </div>
        </div>

        @if ($user->post->count() > 0)
            <div class="grid grid-cols-3 p-2 gap-1 place-items-center">
                @foreach ($posts as $post)
                    <div>
                        <div>
                            <a href="{{ route('post.show', $post->id) }}">
                                <img class="size-36 sm:size-48 md:size-60 lg:size-80 xl:size-96 object-cover"
                                    src="{{ asset($post->image) }}" alt=" " />
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="grid grid-cols-3 p-2 gap-1 place-items-center">
                <div>
                    <img style="opacity: 0" class="size-36 sm:size-48 md:size-60 lg:size-80 xl:size-96 object-cover"
                        src="{{ asset('profile/preview_1.jpg') }}" alt="image_1" />
                </div>
                <div>
                    <p>No post</p>
                </div>
                <div>
                    <img style="opacity: 0" class="size-36 sm:size-48 md:size-60 lg:size-80 xl:size-96 object-cover"
                        src="{{ asset('profile/preview_1.jpg') }}" alt="image_1" />
                </div>
            </div>
        @endif

    </section>
</main>

