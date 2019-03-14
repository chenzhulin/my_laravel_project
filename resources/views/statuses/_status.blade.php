<li class="media mt-4 mb-4">
 <a href="{{ route('users.show',$user->id) }}">
     <img src="{{ $user->gravatar() }}" alt="{{ $user->name }}" class="mr-3 gravatar">
 </a>
    <div class="media-body">
        <h5 class="mt-0 mb-1">{{ $user->name }} <small>{{ $status->created_at->diffForHumans() }}</small></h5>
        {{ $status->content }}
    </div>
    @can('destroy',$status)
        <form action="{{ route('statuses.destroy', $status->id) }}" method="post" onsubmit="return confirm('确定要删除这条微博吗？');">
            {{ method_field('DELETE') }}
            {{csrf_field()}}
            <button class="btn btn-sm btn-danger" type="submit">删除</button>
        </form>
    @endcan
</li>