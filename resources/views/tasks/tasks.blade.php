<ul class="list-unstyled">
    @foreach ($tasks as $task)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{ Gravatar::src($task->user->email, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $task->user->name, ['id' => $task->user->id]) !!} <span class="text-muted">posted at {{ $task->created_at }}</span>
                </div>
                <div>
                        <p class="mb-0">{!! nl2br(e($task->status)) !!}</p>
                </div>
                <div>
                    @if (Auth::id() == $task->user_id)
                        {!! Form::open(['route' => ['tasks.show', $task->id], 'method' => 'get']) !!}
                            {!! link_to_route('tasks.show', '詳細', ['id' => $task->id], ['class' => 'btn btn-light']) !!}
                        {!! Form::close() !!}
                        {!! Form::open(['route' => ['tasks.update', $task->id], 'method' => 'put']) !!}
                            {!! link_to_route('tasks.edit', 'Update', ['id' => $task->id], ['class' => 'btn btn-success']) !!}
                        {!! Form::close() !!}
                        {!! Form::open(['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $tasks->links('pagination::bootstrap-4') }}