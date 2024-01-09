@foreach ($list_myTodo as $item)
    <li class="{{$item->todolist_status === 1 ? "completed" : ""}}">
        <div class="form-check">
            <label class="form-check-label">
                <input class="checkbox" type="checkbox" {{$item->todolist_status === 1 ? "checked" : ""}}>
                {!! htmlspecialchars_decode($item->todolist_name) !!}
                <i class="input-helper " ></i>
            </label>
        </div>
        <i class="remove ti-close update-status-todoList" data-id={{$item->todolist_id}}></i>
    </li>
@endforeach
