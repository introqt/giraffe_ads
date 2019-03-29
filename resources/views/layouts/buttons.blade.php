@if(Auth::check())
    @if(Auth::user()->checkNeedShowButtonByUserId($ad->user_id))
        <div class="card-footer">
            <a class="link-button" href="/ads/{{$ad->id}}/edit">
                <button class="btn btn-primary">Edit</button>
            </a>

            <form method="POST" action="/ads/{{$ad->id}}" style="display: inline;">
                @method('DELETE')
                @csrf

                <button class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete this ad?');">
                    Delete
                </button>
            </form>
        </div>
    @endif
@endif
