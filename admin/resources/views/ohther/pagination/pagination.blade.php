
<tfoot  class="flex_center tfoot-table" id="{{$nameElement}}">
    <tr >
        <td colspan="6" class="flex_center">
            @if ($paginator->total() > $paginator->perPage())
                <div class="pagination">
                    <ul class="pagination">
                        <!-- Nút Previous -->
                        @if ($paginator->currentPage() > 1)
                            <li class="page-item">
                                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        @endif

                        <!-- Các trang -->
                        @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                            <li class="page-item{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                                <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        <!-- Nút Next -->
                        @if ($paginator->currentPage() < $paginator->lastPage())
                            <li class="page-item">
                                <a class a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>   
            @endif
        </td>
    </tr>
</tfoot>
