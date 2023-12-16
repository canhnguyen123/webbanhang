@extends('admin')
@section('main')
    <div class="content-wrapper">
        <div class=" row">
            <div class="col-12 row card">
                <div class="col-12 row card-body">
                    <div class="col-12 titel-box mg-10">
                        <h4>Hiển thị sản phẩm hot ở trang chủ</h4>
                    </div>
                    <form action="{{ route('product_post_showHome') }}" class="col-12" method="post">
                        {{ @csrf_field() }}
                        <table id="example" class="display expandable-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th colspan="1">Hành động</th>
                                    <th colspan="3">Tên</th>
                                    <th colspan="2">Thể loại</th>
                                    <th colspan="1" style="text-align: center">Danh mục</th>
                                    <th colspan="1" style="text-align: center">Phân loại</th>
                                    <th colspan="1" style="text-align: center">Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody id="list-product">
                                @foreach ($listShowed as $itemShow)
                                    <tr>
                                        <td colspan="1">
                                            <input type="checkbox" name="product_id[]" value="{{ $itemShow->product_id }}"
                                                checked>

                                        </td>
                                        <td colspan="3">
                                            <img class="img-tbl mg-none zoomable-image myImage"
                                                src="{{ $itemShow->productImg_name }}">
                                            {{ $itemShow->product_name }}
                                        </td>
                                        <td colspan="2">
                                            {{ $itemShow->theloai_name }}
                                        </td>

                                        <td colspan="1">
                                            {{ $itemShow->category_name }}
                                        </td>
                                        <td colspan="1">
                                            {{ $itemShow->phanloai_name }}
                                        </td>
                                        <td colspan="1" style="text-align: center">
                                            @if ($itemShow->product_status === 1)
                                                <i class="pass-icon mdi mdi-check"></i>
                                            @else
                                                <i class="fail-icon mdi mdi-close"></i>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                                <?php $matched = false; ?>
                                @foreach ($list_product as $item)
                                    @foreach ($listShowed as $itemShow)
                                        @if ($item->product_id == $itemShow->product_id)
                                            <?php $matched = true; ?>
                                        @break
                                    @endif
                                @endforeach

                                @if (!$matched)
                                    <tr>

                                        <td colspan="1">
                                            <input type="checkbox" name="product_id[]" value="{{ $item->product_id }}">
                                        </td>
                                        <td colspan="3">
                                            <img class="img-tbl mg-none zoomable-image myImage"
                                                src="{{ $item->productImg_name }}"> {{ $item->product_name }}
                                        </td>
                                        <td colspan="2">
                                            {{ $item->theloai_name }}
                                        </td>
                                        <td colspan="1">
                                            {{ $item->category_name }}
                                        </td>
                                        <td colspan="1">
                                            {{ $item->phanloai_name }}
                                        </td>
                                        <td colspan="1" style="display: none">
                                            @if ($item->product_status === 1)
                                                <i class="pass-icon mdi mdi-check"></i>
                                            @else
                                                <i class="fail-icon mdi mdi-close"></i>
                                            @endif
                                        </td>
                                    </tr>
                                @endif

                                <?php $matched = false; ?>
                            @endforeach
                        </tbody>
                        </table>

                        <button type="submit" class="btn-pimar-key mr-2">Cập nhật</button>
                </form>


            </div>
            <div class="modal myModal">
                <span class="close">&times;</span>
                <img class="modal-content imgBig">
            </div>
        </div>

    </div>


</div>
@endsection
