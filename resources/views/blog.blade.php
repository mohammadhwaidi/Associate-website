@extends('layout')

@section('content1')
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                @foreach($posts as $post)
                    <div class="card mb-4">
                        <div id="carousel_{{ $post->id }}" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach($post->images as $index => $image)
                                    <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                        @if (pathinfo($image->image_path, PATHINFO_EXTENSION) == 'mp4' || pathinfo($image->image_path, PATHINFO_EXTENSION) == 'mov' || pathinfo($image->image_path, PATHINFO_EXTENSION) == 'avi')
                                            <!-- Video -->
                                            <video controls class="d-block w-100">
                                                <source src="{{ asset($image->image_path) }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        @else
                                            <!-- Image -->
                                            <img src="{{ asset($image->image_path) }}" class="d-block w-100" alt="Post Image">
                                        @endif
                                    </div>
                                @endforeach
                            </div>

                            <a class="carousel-control-prev" href="#carousel_{{ $post->id }}" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carousel_{{ $post->id }}" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="small text-muted">{{ $post->created_at->format('F j, Y') }}</div>
                            <h2 class="card-title text-center">{{ $post->title }}</h2>
                            <p class="card-text text-center">{{ $post->content }}</p>

                            <!-- Comments Section -->
                            <div class="comment-section">
                                @php
                                    $commentCount = $post->comments->count();
                                    $displayedComments = $post->comments->take(3);
                                @endphp
                                @foreach($displayedComments as $index => $comment)
                                    <div class="single-comment mb-3">
                                        <strong>{{ $comment->user ? $comment->user->name : 'Anonymous' }}</strong>
                                        <p>{{ $comment->content }}</p>
                                    </div>
                                @endforeach
                                @if($commentCount > 3)
                                    <div class="additional-comments" style="display: none;">
                                        @foreach($post->comments->slice(3) as $comment)
                                            <div class="single-comment mb-3">
                                                <strong>{{ $comment->user ? $comment->user->name : 'Anonymous' }}</strong>
                                                <p>{{ $comment->content }}</p>
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="btn btn-link show-more-btn">Show More Comments</button>
                                @endif
                            </div>

                            <!-- Comment Form -->
                            <div class="add-comment mt-4">
                                <h4>Add Comment</h4>
                                <form method="POST" action="{{ route('comments.store', ['postId' => $post->id]) }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="comment">Your Comment:</label>
                                        <textarea class="form-control" id="comment" name="content" rows="3" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach

                    <!-- Pagination -->
                    <nav aria-label="Pagination">
                        <ul class="pagination justify-content-center">
                            @if ($posts->onFirstPage())
                                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                                    <span class="page-link" aria-hidden="true">&lsaquo;</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $posts->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                                </li>
                            @endif

                            @if ($posts->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $posts->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                                </li>
                            @else
                                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                                    <span class="page-link" aria-hidden="true">&rsaquo;</span>
                                </li>
                            @endif
                        </ul>
                    </nav>

            </div>
        </div>
    </div>

    <script>
        document.querySelectorAll('.show-more-btn').forEach(button => {
            button.addEventListener('click', function() {
                const additionalComments = this.previousElementSibling;
                additionalComments.style.display = additionalComments.style.display === 'none' ? 'block' : 'none';
                this.textContent = this.textContent === 'Show More Comments' ? 'Show Less Comments' : 'Show More Comments';
            });
        });
    </script>
@endsection
