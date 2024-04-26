@extends('layout')

@section('content1')

    <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="5000">
        <ol class="carousel-indicators">
            @foreach($slideshows as $index => $slideshow)
                <li data-target="#myCarousel" data-slide-to="{{ $index }}"
                    class="{{ $index === 0 ? 'active' : '' }}"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach($slideshows as $index => $slideshow)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <div class="hero-wrap js-fullheight"
                         style="background-image: url('{{ asset($slideshow->SlideshowImage) }}');"
                         data-stellar-background-ratio="0.5">
                        <div class="overlay"></div>
                        <div class="container">
                            <div
                                class="row no-gutters slider-text js-fullheight align-items-center justify-content-start"
                                data-scrollax-parent="true">
                                <div class="col-md-7 ftco-animate">
                                    <h1 class="mb-4">{{ $slideshow->Title }}</h1>
                                    <p><a href="{{ route('contact') }}" class="btn btn-white">Contact us</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <section class="ftco-section town-description mb-6">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h1 class="section-title mb-4">Welcome </h1>
                    <p class="section-subtitle">A Town of Culture and Heritage</p>
                    <p class="town-description-text">
                        It is the town of culture and educated people, whose percentage exceeds 90%. One of the largest
                        towns in the region, it's known for its olives and original oil, hand-crushed with love. Shehim
                        embodies authenticity, an open heart, and is famous for its unique traditional weaving.
                        Overcoming earthquakes, it's a town dug deep into its interior, with a rock fault known as the
                        Old Man's Shaq.
                    </p>
                    <p class="town-location mb-20">Located in the Chouf District</p>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* Define a fixed height for the carousel images */
        .carousel-item img {
            height: 200px; /* Adjust this value according to your design */
            object-fit: cover; /* Maintain aspect ratio and cover the entire space */

        }
    </style>

    <section class="ftco-section ftco-services mt-6">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-4">
                    <h2 class="section-title text-center mb-4" style="background-color: #f5f5f5; padding: 15px;">Latest
                        News and Events</h2>
                </div>
                @foreach($posts as $post)
                    <div class="col-md-4 d-flex services align-self-stretch px-4 ftco-animate">
                        <div class="d-block services-wrap text-center"
                             style="box-shadow: 0 0 15px rgba(0, 0, 0, 0.2); margin-bottom: 20px;">
                            <div id="carousel_{{ $post->id }}" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach($post->images as $index => $image)
                                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                            @if (strpos($image->image_path, '.mp4') !== false || strpos($image->image_path, '.mov') !== false || strpos($image->image_path, '.avi') !== false)
                                                <!-- Video -->
                                                <video controls class="d-block w-100" style="height: 300px; width: 500px;">
                                                    <source src="{{ asset($image->image_path) }}" type="video/mp4">
                                                    Your browser does not support the video tag.
                                                </video>
                                            @else
                                                <!-- Image -->
                                                <img src="{{ asset($image->image_path) }}" class="d-block w-100" style="height: 300px; width: 500px;" alt="Post Image">
                                            @endif
                                        </div>
                                    @endforeach
                                </div>

                                <!-- Controls -->
                                <a class="carousel-control-prev" href="#carousel_{{ $post->id }}" role="button"
                                   data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel_{{ $post->id }}" role="button"
                                   data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <div class="media-body py-4 px-3">
                                <h3 class="heading">{{ $post->title }}</h3>
                                <p>
                                        <?php
                                        $words = explode(' ', $post->content);
                                        $excerpt = implode(' ', array_slice($words, 0, 10));
                                        $remaining = implode(' ', array_slice($words, 10));
                                        ?>
                                    {{ $excerpt }}
                                    @if (count($words) > 10)
                                        <span id="more_{{ $post->id }}" style="display: none;">{{ $remaining }}</span>
                                        <a href="#" onclick="toggleVisibility('{{ $post->id }}'); return false;">Read More</a>
                                    @endif
                                </p>

                                <script>
                                    function toggleVisibility(event, postId) {
                                        event.preventDefault();
                                        var moreText = document.getElementById('more_' + postId);
                                        var link = event.target;
                                        var isCollapsed = moreText.style.display === 'none';

                                        var scrollPosition = window.scrollY || window.pageYOffset;

                                        if (isCollapsed) {
                                            moreText.style.display = 'inline';
                                            link.innerText = 'Read Less';
                                        } else {
                                            moreText.style.display = 'none';
                                            link.innerText = 'Read More';
                                        }

                                        // Restore the scroll position
                                        window.scrollTo(0, scrollPosition);
                                    }
                                </script>


                                <p class="card-text"><small
                                        class="text-muted">Published: {{ $post->publish_date }}</small></p>
                                <p><a href="{{ route('blog', $post->id) }}" class="btn btn-primary" style="margin-top: 15px;">View More</a></p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection



