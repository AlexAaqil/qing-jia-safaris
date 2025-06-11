<div class="Tours">
    <div class="container">
        <div class="app_header">
            <div class="info">
                <h2>Tours</h2>
                <div class="stats">
                    <span>{{ $count_tours }} {{ Str::plural('tour', $count_tours) }}</span>
                    <span>{{ $count_published }} published</span>
                </div>
            </div>

            <div class="search">
                <input type="text" placeholder="Search...">
                <button>Search</button>
            </div>

            <div class="button">
                <a href="{{ Route::has('tours.create') ? route('tours.create') : '#' }}" wire:navigate class="btn">New Tour</a>
            </div>
        </div>

        <div class="tours_list">
            @forelse($tours as $tour)
                <div class="tour">
                    <div class="image">
                        <img src="{{ $tour->image }}" alt="{{ $tour->name }}">
                    </div>

                    <div class="content">
                        <div class="info">
                            <h3 class="title">{{ $tour->title }}</h3>
                            <p class="description">{{ $tour->summary }}</p>
                            <p class="price">
                                <span>From ${{ $tour->price }}</span>
                                @if($tour->price_ranges_to)
                                    <span>To ${{ $tour->price_ranges_to }}</span>
                                @endif
                            </p>
                        </div>

                        <div class="buttons_group">
                            <a href="{{ Route::has('tours.edit') ? route('tours.edit', ['uuid' => $tour->uuid]) : '#' }}" wire:navigate>
                                <x-svgs.edit class="w-4 h-4 mr-1 text-green-600" />
                            </a>
                            <button x-data="" x-on:click.prevent="$wire.set('delete_tour_id', {{ $tour->id }}); $dispatch('open-modal', 'confirm-tour-deletion')" class="btn_transparent" >
                                <x-svgs.trash class="w-4 h-4 text-red-600" />
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <p>No tours found.</p>
            @endforelse
        </div>
    </div>
</div>
