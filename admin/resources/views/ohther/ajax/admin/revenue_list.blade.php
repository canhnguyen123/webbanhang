@foreach ($list as $item)
<tr>
    <th style="text-align: center">{{ $i++ }}</th>
    <td>
        {{ $item->month_name }}
    </td>

    <td >
        {{ $item->total }}
    </td>
    <td >
        {{ number_format($item->money) }} VNĐ
    </td>
    <td>
 

    </td>
</tr>
@endforeach