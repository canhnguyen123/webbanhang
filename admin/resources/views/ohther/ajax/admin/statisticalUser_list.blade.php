@foreach ($getListUser as $item)
<tr>
    <th colspan="1" style="text-align: center">{{ $i++ }}</th>
    <td colspan="3">
        <a href="{{ route('user_deatil', ['user_id' => $item->user_id]) }}">
            {{ $item->user_fullname }}
        </a>
    </td>
    <td colspan="1" >{{ $item->order_count }}</td>
    <td colspan="3" >{{number_format($item->total_amount)  }} VNĐ</td>
    <td colspan="1">{{ $item->comment_count }}</td>
    <td colspan="1">{{ $item->total_cancel }}</td>
    <td colspan="1">{{ $item->cancel_count }}</td>
    <td colspan="1" class="converer-time">{{ $item->created_at }}</td>
</tr>
@endforeach