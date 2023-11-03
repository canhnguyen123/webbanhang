<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>GENZ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/brands.min.css"
        integrity="sha512-W/zrbCncQnky/EzL+/AYwTtosvrM+YG/V6piQLSe2HuKS6cmbw89kjYkp3tWFn1dkWV7L1ruvJyKbLz73Vlgfg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="{{ asset('BE/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('BE/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('BE/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.2.96/css/materialdesignicons.css"
        integrity="sha512-arPZ7r4v4xEkxAQngubdkUNXFBVO8NFFRg1IszNv2AMaaZ9cDiCVRFGSZSjF7o5GHpm826QTqtNdOFNSnHbOYQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('BE/vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('BE/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('BE/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('BE/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('BE/js/select.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('BE/css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('BE/css/vertical-layout-light/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
    <link rel="shortcut icon" href="{{ asset('BE/images/favicon.png') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('include.headerTop')
        <!-- partial -->
        @include('include.main')
        <!-- page-body-wrapper ends -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src="{{ asset('BE/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('BE/vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('BE/vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('BE/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('BE/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('BE/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('BE/vendors/select2/select2.min.js') }}"></script>
    <script src="{{ asset('BE/js/select2.js') }}"></script>
    <script src="{{ asset('BE/js/file-upload.js') }}"></script>
    <!-- inject:js -->
    <script src="{{ asset('BE/js/off-canvas.js') }}"></script>
    <script src="{{ asset('BE/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('BE/js/template.js') }}"></script>
    <script src="{{ asset('BE/js/settings.js') }}"></script>
    <script src="{{ asset('BE/js/todolist.js') }}"></script>
    <script src="{{ asset('BE/js/callAPI.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('BE/js/dashboard.js') }}"></script>
    <script src="{{ asset('BE/js/Chart.roundedBarCharts.js') }}"></script>
    <script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.7.0/firebase-storage.js"></script>
    <script src="{{ asset('BE/js/main.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <!-- Slick Carousel CSS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css">
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/10.2.0/swiper-bundle.min.js"
        integrity="sha512-QwpsxtdZRih55GaU/Ce2Baqoy2tEv9GltjAG8yuTy2k9lHqK7VHHp3wWWe+yITYKZlsT3AaCj49ZxMYPp46iJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <script src="{{ asset('BE/js/index.js') }}"></script> --}}
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

    <script type="module">
        const firebaseConfig = {
            apiKey: "AIzaSyBO3mI1DKCovx5uDyvOKzhfBC3nNDOzPY8",
            authDomain: "newdoan-19717.firebaseapp.com",
            projectId: "newdoan-19717",
            storageBucket: "newdoan-19717.appspot.com",
            messagingSenderId: "1092767679876",
            appId: "1:1092767679876:web:9e10e8008d9630aff789d1",
            measurementId: "G-VQHZD23P6S"
        };
        firebase.initializeApp(firebaseConfig);
    </script>
    <script>
        flatpickr(".flatpickr", {
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
        });
        $(document).ready(function() {
            $('#is-limit-voucher').on('change', function() {
                const selectChane = '#is-limit-voucher';
                const input = '#voucher-quantity'
                checkInputVoucher(selectChane, input)
            });
            $('#unit-voucher').on('change', function() {
                const selectChane = '#unit-voucher';
                const input = '#voucher_number_condition'
                checkInputVoucher(selectChane, input)
            });

            function checkInputVoucher(selectChane, input) {
                var selectedValue = $(selectChane).val();
                var voucherQuantity = $(input);

                if (selectedValue === '0' || selectedValue === 'Free') {
                    // Nếu giá trị là '0' (Không), ngăn người dùng nhập giá trị vào input
                    voucherQuantity.on('keydown', function(e) {
                        e.preventDefault();
                    });

                    // Đặt giá trị mặc định là '0'
                    voucherQuantity.val('0');
                } else {
                    // Nếu giá trị là '1' (Có), bỏ bỏ ngăn người dùng nhập giá trị
                    voucherQuantity.off('keydown');
                    // Xóa giá trị hiện có
                    voucherQuantity.val('');
                }
            }
            $('.voucher-unit').on('change', function() {
                var selectedValue = $(this).val();
                var $voucherCategory = $('#voucher_category');
                if (selectedValue === "Free") {
                    $voucherCategory.val("0");
                } else if (selectedValue === "%") {
                    $voucherCategory.val("1");
                } else if (selectedValue === "VNĐ") {
                    $voucherCategory.val("2");
                }
            });
            $(".tab-pane p").click(function() {
                // Loại bỏ lớp "active" từ tất cả các phần tử <p> trong .tab-pane
                $(".tab-pane p").removeClass("active");

                // Thêm lớp "active" vào phần tử <p> được click
                $(this).addClass("active");
            });

            function checkEmty(classId) {
                var input = $('.' + classId); // Tìm input với class được truyền vào
                var formInput = input.closest('.validate-form'); // Lấy thẻ cha .form-input
                var errText = formInput.find('.err-text'); // Lấy thẻ span trong phạm vi thẻ cha

                if (input.val().trim().length === 0) {
                    errText.text('Bạn không thể để trống ô nhập này');
                    return true; // Trả về true nếu có lỗi
                } else {
                    errText.text('');
                    return false; // Trả về false nếu không có lỗi
                }
            }
            var itemCount = 1;
            $('#add-product').click(function(event) {
                event.preventDefault();
                const name = 'nameProduct';
                const code = 'product_code';


                if (checkEmty(name)) {
                    return
                }
                if (checkEmty(code)) {
                    return
                } else {
                    const theloai_id = $('.theloai_id').val();
                    const product_name = $('.nameProduct').val();
                    const product_code = $('.product_code').val();
                    const brand_product = $('.brand_product').val();
                    const baoquan_product = CKEDITOR.instances.baoquan_product.getData();
                    const mota_product = CKEDITOR.instances.mota_product.getData();
                    const dacdiem_product = CKEDITOR.instances.dacdiem_product.getData();


                    const arr_quantity = [];
                    var itemCount = 1;

                    $('.item-quantity').each(function() {
                        var item_arr = [];
                        item_arr.push($(this).find('#item-quantity-color-text-' + itemCount)
                            .text());
                        item_arr.push($(this).find('#item-quantity-Size-text-' + itemCount).text());
                        item_arr.push($(this).find('#item-quantity-quantity-text-' + itemCount)
                            .text());
                        item_arr.push($(this).find('#item-quantity-price-import-text-' + itemCount)
                            .text());
                        item_arr.push($(this).find('#item-quantity-price-out-text-' + itemCount)
                            .text());

                        // Đẩy temp array vào mảng chính arr_quantity
                        arr_quantity.push(item_arr);
                        itemCount++;

                    });
                    const files = Array.from(document.getElementById("file-upload-product").files);
                    const uploadPromises = [];
                    const ref = firebase.storage().ref();

                    files.forEach((file) => {
                        const name = +new Date() + "-" + file.name;
                        const metadata = {
                            contentType: file.type
                        };

                        const task = ref.child(name).put(file, metadata);
                        const uploadPromise = task
                            .then((snapshot) => snapshot.ref.getDownloadURL())
                            .catch(console.error);

                        uploadPromises.push(uploadPromise);
                    });

                    Promise.all(uploadPromises)
                        .then((urls) => {
                            const imageURLs = urls;
                            var csrfToken = $('meta[name="csrf-token"]').attr('content');
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': csrfToken
                                }
                            });
                            $.ajax({
                                type: "POST",
                                url: "{{ route('product_post_add') }}",
                                data: {
                                    theloai_id: theloai_id,
                                    product_name: product_name,
                                    product_code: product_code,
                                    brand_product: brand_product,
                                    baoquan_product: baoquan_product,
                                    mota_product: mota_product,
                                    dacdiem_product: dacdiem_product,
                                    listImg: imageURLs,
                                    listQuantity: JSON.stringify(arr_quantity)
                                },
                                success: function(response) {
                                    if (response.status === 'success') {
                                        alert(response.mess);
                                        window.location = response.route;
                                    } else {
                                        // Xử lý khi có lỗi
                                        alert(response.mess);
                                        // Nếu cần xử lý lỗi cụ thể dựa trên 'errPosition', bạn có thể thêm mã ở đây.
                                    }


                                },
                                error: function(xhr, status, error) {
                                    console.log('Lỗi: ' + error);
                                }
                            });


                        })
                        .catch(console.error);
                }
            })

            var editors = document.querySelectorAll('.editor');
            for (var i = 0; i < editors.length; i++) {
                CKEDITOR.replace(editors[i], {
                    enterMode: CKEDITOR.ENTER_BR, // Sử dụng dòng mới thay vì thẻ <p></p>
                    shiftEnterMode: CKEDITOR.ENTER_P, // Sử dụng thẻ <p></p> khi nhấn Shift + Enter
                    removePlugins: 'div,autolink' // Loại bỏ plugin div và autolink
                });
            }


            var emtyValue = "Bạn không thể để trống ô nhập này";
            var numberValue = "Bạn không thể nhập gì ngoài số";
            $('#category-search-btn').click(function(event) {
                event.preventDefault(); // Ngăn trình duyệt gửi yêu cầu mặc định
                const content = $('#category-search').val();
                const link = '{{ route('category_seach_Ajax') }}';
                const list = '#list-category';
                $('#btn-loadmore-category').hide()
                searchAjax(content, link, list);
            });
            $('#btn-loadmore-category').click(function() {
                const stt = $(this).data('stt')
                const link = '{{ route('category_loadmore_Ajax') }}';
                const list = '#list-category';
                const id = $(this).data('id');
                const btn = $(this)
                loadmoreAjax(stt, id, link, list, btn)
            })
            $('#return-category').click(function() {
                const link = '{{ route('category_return_Ajax') }}';
                const list = '#list-category';
                const btnLoad = '#btn-loadmore-category';
                returnAjax(link, list, btnLoad)
            })
            $('#return-staff').click(function() {
                const link = '{{ route('staff_return_Ajax') }}';
                const list = '#list-staff';
                const btnLoad = '#btn-loadmore-staff';
                returnAjax(link, list, btnLoad)
            })
            $('#staff-search-btn').click(function(event) {
                event.preventDefault(); // Ngăn trình duyệt gửi yêu cầu mặc định
                const content = $('#staff-search').val();
                const link = '{{ route('staff_seach_Ajax') }}';
                const list = '#list-staff';
                $('#btn-loadmore-staff').hide()
                searchAjax(content, link, list);
            });
            $('#return-product').click(function() {
                const link = '{{ route('product_return_Ajax') }}';
                const list = '#list-product';
                const btnLoad = '#btn-loadmore-product';
                returnAjax(link, list, btnLoad)
            })


            $('#return-phanloai').click(function() {
                const link = '{{ route('phanloai_return_Ajax') }}';
                const list = '#list-phanloai';
                const btnLoad = '#btn-loadmore-phanloai';
                returnAjax(link, list, btnLoad)
            })
            $('#phanloai-search-btn').click(function(event) {
                event.preventDefault(); // Ngăn trình duyệt gửi yêu cầu mặc định
                const content = $('#phanloai-search').val();
                const link = '{{ route('phanloai_seach_Ajax') }}';
                const list = '#list-phanloai';
                $('#btn-loadmore-phanloai').hide()
                searchAjax(content, link, list);
            });
            $('#btn-loadmore-phanloai').click(function() {
                const stt = $(this).data('stt')
                const link = '{{ route('phanloai_loadmore_Ajax') }}';
                const list = '#list-phanloai';
                const id = $(this).data('id');
                const btn = $(this)
                loadmoreAjax(stt, id, link, list, btn)
            })

            $('#return-material').click(function() {
                const link = '{{ route('material.return.Ajax') }}';
                const list = '#list-material';
                const btnLoad = '#btn-loadmore-material';
                returnAjax(link, list, btnLoad)
            })
            $('#material-search-btn').click(function(event) {
                event.preventDefault(); // Ngăn trình duyệt gửi yêu cầu mặc định
                const content = $('#material-search').val();
                const link = '{{ route('material.seach.Ajax') }}';
                const list = '#list-material';
                $('#btn-loadmore-material').hide()
                searchAjax(content, link, list);
            });
            $('#btn-loadmore-material').click(function() {
                const stt = $(this).data('stt')
                const link = '{{ route('material.loadmore.Ajax') }}';
                const list = '#list-material';
                const id = $(this).data('id');
                const btn = $(this)
                loadmoreAjax(stt, id, link, list, btn)
            })

            $('#return-position').click(function() {
                const link = '{{ route('position_return_Ajax') }}';
                const list = '#list-position';
                const btnLoad = '#btn-loadmore-position';
                returnAjax(link, list, btnLoad)
            })
            $('#position-search-btn').click(function(event) {
                event.preventDefault(); // Ngăn trình duyệt gửi yêu cầu mặc định
                const content = $('#position-search').val();
                const link = '{{ route('position_seach_Ajax') }}';
                const list = '#list-position';
                $('#btn-loadmore-position').hide()
                searchAjax(content, link, list);
            });
            $('#btn-loadmore-position').click(function() {
                const stt = $(this).data('stt')
                const link = '{{ route('position_loadmore_Ajax') }}';
                const list = '#list-position';
                const id = $(this).data('id');
                const btn = $(this)
                loadmoreAjax(stt, id, link, list, btn)
            })

            $('#theloai-search-btn').click(function(event) {
                event.preventDefault(); // Ngăn trình duyệt gửi yêu cầu mặc định
                const content = $('#theloai-search').val();
                const link = '{{ route('theloai_seach_Ajax') }}';
                const list = '#list-theloai';
                $('.tfoot-table').hide()
                searchAjax(content, link, list);
            });

            $('#return-theloai').click(function() {
                const link = '{{ route('theloai_return_Ajax') }}';
                const list = '#list-theloai';
                const btnLoad = '.tfoot-table';
                returnAjax(link, list, btnLoad)
            })

            $('#voucher-search-btn').click(function(event) {
                event.preventDefault(); // Ngăn trình duyệt gửi yêu cầu mặc định
                const content = $('#voucher-search').val();
                const link = '{{ route('voucher_seach_Ajax') }}';
                const list = '#list-voucher';
                $('.tfoot-table').hide()
                searchAjax(content, link, list);
            });

            $('#return-voucher').click(function() {
                const link = '{{ route('voucher_return_Ajax') }}';
                const list = '#list-voucher';
                const btnLoad = '.tfoot-table';
                returnAjax(link, list, btnLoad)
            })

            $('#color-search-btn').click(function(event) {
                event.preventDefault(); // Ngăn trình duyệt gửi yêu cầu mặc định
                const content = $('#color-search').val();
                const link = '{{ route('color_seach_Ajax') }}';
                const list = '#list-color';
                $('#btn-loadmore-color').hide()
                searchAjax(content, link, list);
            });
            $('#btn-loadmore-color').click(function() {
                const stt = $(this).data('stt')
                const link = '{{ route('color_loadmore_Ajax') }}';
                const list = '#list-color';
                const id = $(this).data('id');
                const btn = $(this)
                loadmoreAjax(stt, id, link, list, btn)
            })
            $('#return-color').click(function() {
                const link = '{{ route('color_return_Ajax') }}';
                const list = '#list-color';
                const btnLoad = '#btn-loadmore-color';
                returnAjax(link, list, btnLoad)
            })

            $('#brand-search-btn').click(function(event) {
                event.preventDefault(); // Ngăn trình duyệt gửi yêu cầu mặc định
                const content = $('#brand-search').val();
                const link = '{{ route('brand_seach_Ajax') }}';
                const list = '#list-brand';
                $('#btn-loadmore-brand').hide()
                searchAjax(content, link, list);
            });
            $('#btn-loadmore-brand').click(function() {
                const stt = $(this).data('stt')
                const link = '{{ route('brand_loadmore_Ajax') }}';
                const list = '#list-brand';
                const id = $(this).data('id');
                const btn = $(this)
                loadmoreAjax(stt, id, link, list, btn)
            })
            $('#return-brand').click(function() {
                const link = '{{ route('brand_return_Ajax') }}';
                const list = '#list-brand';
                const btnLoad = '#btn-loadmore-brand';
                returnAjax(link, list, btnLoad)
            })

            $('#ship-search-btn').click(function(event) {
                event.preventDefault(); // Ngăn trình duyệt gửi yêu cầu mặc định
                const content = $('#ship-search').val();
                const link = '{{ route('ship.seach.Ajax') }}';
                const list = '#list-ship';
                $('#btn-loadmore-ship').hide()
                searchAjax(content, link, list);
            });
            $('#btn-loadmore-ship').click(function() {
                const stt = $(this).data('stt')
                const link = '{{ route('ship.loadmore.Ajax') }}';
                const list = '#list-ship';
                const id = $(this).data('id');
                const btn = $(this)
                loadmoreAjax(stt, id, link, list, btn)
            })
            $('#return-ship').click(function() {
                const link = '{{ route('ship.return.Ajax') }}';
                const list = '#list-ship';
                const btnLoad = '#btn-loadmore-ship';
                returnAjax(link, list, btnLoad)
            })

            $('#methodPayment-search-btn').click(function(event) {
                event.preventDefault(); // Ngăn trình duyệt gửi yêu cầu mặc định
                const content = $('#methodPayment-search').val();
                const link = '{{ route('methodPayment_seach_Ajax') }}';
                const list = '#list-methodPayment';
                $('#btn-loadmore-methodPayment').hide()
                searchAjax(content, link, list);
            });
            $('#btn-loadmore-methodPayment').click(function() {
                const stt = $(this).data('stt')
                const link = '{{ route('methodPayment_loadmore_Ajax') }}';
                const list = '#list-methodPayment';
                const id = $(this).data('id');
                const btn = $(this)
                loadmoreAjax(stt, id, link, list, btn)
            })
            $('#return-methodPayment').click(function() {
                const link = '{{ route('methodPayment_return_Ajax') }}';
                const list = '#list-methodPayment';
                const btnLoad = '#btn-loadmore-methodPayment';
                returnAjax(link, list, btnLoad)
            })

            $('#statusPayment-search-btn').click(function(event) {
                event.preventDefault(); // Ngăn trình duyệt gửi yêu cầu mặc định
                const content = $('#statusPayment-search').val();
                const link = '{{ route('statusPayment_seach_Ajax') }}';
                const list = '#list-statusPayment';
                $('#btn-loadmore-statusPayment').hide()
                searchAjax(content, link, list);
            });
            $('#btn-loadmore-statusPayment').click(function() {
                const stt = $(this).data('stt')
                const link = '{{ route('statusPayment_loadmore_Ajax') }}';
                const list = '#list-statusPayment';
                const id = $(this).data('id');
                const btn = $(this)
                loadmoreAjax(stt, id, link, list, btn)
            })
            $('#return-statusPayment').click(function() {
                const link = '{{ route('statusPayment_return_Ajax') }}';
                const list = '#list-statusPayment';
                const btnLoad = '#btn-loadmore-statusPayment';
                returnAjax(link, list, btnLoad)
            })

            $('#user-search-btn').click(function(event) {
                event.preventDefault(); // Ngăn trình duyệt gửi yêu cầu mặc định
                const content = $('#user-search').val();
                const link = '{{ route('user_seach_Ajax') }}';
                const list = '#list-user';
                $('.tfoot-user').hide()
                searchAjax(content, link, list);
            });

            $('#return-user').click(function() {
                const link = '{{ route('user_return_Ajax') }}';
                const list = '#list-user';
                const btnLoad = '.tfoot-user';
                returnAjax(link, list, btnLoad)
            })

            $('#size-search-btn').click(function(event) {
                event.preventDefault(); // Ngăn trình duyệt gửi yêu cầu mặc định
                const content = $('#size-search').val();
                const link = '{{ route('size_seach_Ajax') }}';
                const list = '#list-size';
                $('#btn-loadmore-size').hide()
                searchAjax(content, link, list);
            });
            $('#btn-loadmore-size').click(function() {
                const stt = $(this).data('stt')
                const link = '{{ route('size_loadmore_Ajax') }}';
                const list = '#list-size';
                const id = $(this).data('id');
                const btn = $(this)
                loadmoreAjax(stt, id, link, list, btn)
            })
            $('#return-size').click(function() {
                const link = '{{ route('size_return_Ajax') }}';
                const list = '#list-size';
                const btnLoad = '#btn-loadmore-size';
                returnAjax(link, list, btnLoad)
            })

            function searchAjax(content, link, list) {
                $.ajax({
                    type: "GET",
                    url: link,
                    data: {
                        content: content
                    },
                    success: function(response) {
                        $(list).html(response.view);
                        $('.req-text-mess').text(response.counMess)
                    },
                    error: function(xhr, status, error) {
                        console.log('Lỗi: ' + error);
                    }
                });
            }

            function loadmoreAjax(stt, id, link, list, btn) {
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                });
                $.ajax({
                    type: "POST",
                    url: link,
                    data: {
                        stt: stt + 1, /// tăng theo 1 cấp để khi load sẽ bắt đầu từ id sau
                        id: id + 1 /// tăng theo 1 cấp để khi load sẽ bắt đầu từ id sau
                    },
                    success: function(response) {
                        var newDataId = response.last_id;
                        btn.data('id', newDataId)
                        var newDataId = response.new_stt;
                        btn.data('stt', newDataId)
                        $(list).append(response.view);
                        if (!response.hasMoreData) {
                            btn.hide();
                        }

                    },
                    error: function(xhr, status, error) {
                        console.log('Lỗi: ' + error);
                    }
                });
            }

            function returnAjax(link, list, btnLoad) {
                $.ajax({
                    type: "GET",
                    url: link,
                    success: function(response) {
                        $(list).html(response);
                        $(btnLoad).show()
                        $('.req-text-mess').text('')
                    },
                    error: function(xhr, status, error) {
                        console.log('Lỗi: ' + error);
                    }
                });
            }


            $('#btn-upload-theloai').click(function(event) {
                event.preventDefault();
                const nametheloai = $('#nametheloai').val();
                const theloaiCode = $('#codetheloai').val();
                const category_id = $('#category_id').val();
                const phanloai_id = $('#phanloai_id').val();
                if (isValueEmpty(nametheloai)) {
                    $('.err-text-theloainame').text(emtyValue);
                } else if (isValueEmpty(theloaiCode)) {
                    $('.err-text-theloaicode').text(emtyValue);
                } else {
                    const ref = firebase.storage().ref();
                    const file = document.querySelector(".upload-img-theloai").files[0];
                    const name = +new Date() + "-" + file.name;
                    const metadata = {
                        contentType: file.type
                    };
                    const task = ref.child(name).put(file, metadata);
                    task
                        .then(snapshot => snapshot.ref.getDownloadURL())
                        .then(url => {
                            console.log(url);
                            var csrfToken = $('meta[name="csrf-token"]').attr('content');
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': csrfToken
                                }
                            });
                            $.ajax({
                                type: "POST",
                                url: "{{ route('theloai_post_add') }}",
                                data: {
                                    nametheloai: nametheloai,
                                    theloaiCode: theloaiCode,
                                    category_id: category_id,
                                    phanloai_id: phanloai_id,
                                    linkImg: url,
                                },
                                success: function(response) {
                                    if (response.status === 'success') {
                                        alert(response.message)
                                        window.location.href = response.redirect;
                                    } else {
                                        alert(response.message)
                                        window.location.href = response.redirect;
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.log('Lỗi: ' + error);
                                }
                            });
                        })
                        .catch(console.error);
                }
            });



            $('#btn-upload-theloai-update').click(function(event) {
                event.preventDefault();
                const nametheloai = $('#nametheloai').val();
                const theloaiCode = $('#codetheloai').val();
                const category_id = $('#category_id_up').val();
                const phanloai_id = $('#phanloai_id_up').val();
                const theloai_id = $(this).data('theloai');
                var img_old = $('.img-item-form').attr('src');
                var updateUrl = "{{ route('theloai_post_update', ['theloai_id' => 0]) }}";
                var link = updateUrl.slice(0, -1) + theloai_id;

                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                });
                if (isValueEmpty(nametheloai)) {
                    $('.err-text-theloainame').text(emtyValue);
                } else if (isValueEmpty(theloaiCode)) {
                    $('.err-text-theloaicode').text(emtyValue);
                } else {
                    if (document.querySelector(".upload-img-theloai").files.length > 0) {
                        const ref = firebase.storage().ref();
                        const file = document.querySelector(".upload-img-theloai").files[0];
                        const name = +new Date() + "-" + file.name;
                        const metadata = {
                            contentType: file.type
                        };
                        const task = ref.child(name).put(file, metadata);
                        task
                            .then(snapshot => snapshot.ref.getDownloadURL())
                            .then(url => {
                                console.log(url);

                                $.ajax({
                                    type: "PUT",
                                    url: link,
                                    data: {
                                        nametheloai: nametheloai,
                                        theloaiCode: theloaiCode,
                                        category_id: category_id,
                                        phanloai_id: phanloai_id,
                                        linkImg: url,
                                    },
                                    success: function(response) {
                                        if (response.status === 'success') {
                                            alert(response.message)
                                            window.location.href = response.redirect;
                                        } else {
                                            alert(response.message)
                                            window.location.href = response.redirect;
                                        }

                                    },
                                    error: function(xhr, status, error) {
                                        console.log('Lỗi: ' + error);
                                    }
                                });
                            })
                            .catch(console.error);
                    } else {

                        $.ajax({
                            type: "PUT",
                            url: link,
                            data: {
                                nametheloai: nametheloai,
                                theloaiCode: theloaiCode,
                                category_id: category_id,
                                phanloai_id: phanloai_id,
                                linkImg: img_old,
                            },
                            success: function(response) {
                                if (response.status === 'success') {
                                    alert(response.message)
                                    window.location.href = response.redirect;
                                } else {
                                    alert(response.message)
                                    window.location.href = response.redirect;
                                }
                            },
                            error: function(xhr, status, error) {
                                console.log('Lỗi: ' + error);
                            }
                        });
                    }
                }

            })
            $('.select_danhmuc, .select_theloais, .select_status').change(function() {
                var category_id = $('.select_danhmuc').val();
                var phanloai_id = $('.select_theloais').val();
                var status = $('.select_status').val();
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{ route('select_data_theloai') }}",
                    data: {
                        category_id: category_id,
                        phanloai_id: phanloai_id,
                        status: status,
                    },
                    success: function(response) {
                        $('#list-theloai').html(response.view);

                        $('.req-text-mess').text(response.mess_req)
                    },
                    error: function(xhr, status, error) {
                        console.log('Lỗi: ' + error);
                    }
                });
            });
            $('#product-search-btn').click(function(event) {
                event.preventDefault(); // Ngăn trình duyệt gửi yêu cầu mặc định
                const content = $('#product-search').val();
                const link = '{{ route('product_seach_Ajax') }}';
                const list = '#list-product';
                $('.tfoot-table').hide()
                searchAjax(content, link, list);
            })
            $('.category_select ,.phanloai_select').change(function() {
                const category_id = $('.category_select').val();
                const phanloai_id = $('.phanloai_select').val();
                select_theloaiProduct(category_id, phanloai_id)
            })
            const category_id = $('.category_select').val();
            const phanloai_id = $('.phanloai_select').val();
            select_theloaiProduct(category_id, phanloai_id)

            function select_theloaiProduct(category_id, phanloai_id) {
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{ route('select_data_theloaiproduct') }}",
                    data: {
                        category_id: category_id,
                        phanloai_id: phanloai_id,
                    },
                    success: function(response) {
                        const theloaiSelect = $('.theloai_req');

                        // Xóa tất cả các tùy chọn hiện tại trong <select>
                        theloaiSelect.empty();

                        // Duyệt qua dữ liệu được trả về từ máy chủ và thêm tùy chọn mới
                        $.each(response.data, function(index, item) {
                            theloaiSelect.append($('<option>', {
                                value: item.theloai_id,
                                text: item.theloai_name
                            }));
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log('Lỗi: ' + error);
                    }
                });
            }
            var addedItems = [];

            function isItemAdded(color, size) {
                for (var i = 0; i < addedItems.length; i++) {
                    if (addedItems[i].color === color && addedItems[i].size === size) {
                        return true;
                    }
                }
                return false;
            }
            $('.add-quantity-item').click(function(e) {
                e.preventDefault();

                const quantity = $('.quantity-product').val();
                const priceInt = $('.price-int').val();
                const priceOut = $('.price-out').val();
                const size = $("input[name='size']:checked").val();
                const color = $("input[name='color']:checked").val();

                if (isItemAdded(color, size)) {
                    alert("Màu và kích thước đã được thêm vào trước đó!");
                    return;
                } else {
                    const newItem = `
            <div class="swiper-slide item-quantity">
                <i class="mdi mdi-close icon-close-item"></i>
                <div class="item-quantity-div item-quantity-color"><p>Màu sắc: <span  id="item-quantity-color-text-${itemCount}">${color}</span></p></div>
                <div class="item-quantity-div item-quantity-Size"><p>Size: <span  id="item-quantity-Size-text-${itemCount}">${size}</span></p></div>
                <div class="item-quantity-div item-quantity-quantity"><p>Số lượng: <span  id="item-quantity-quantity-text-${itemCount}">${quantity}</span></p></div>
                <div class="item-quantity-div item-quantity-price-import"><p>Giá nhập: <span id="item-quantity-price-import-text-${itemCount}">${priceInt}</span></p></div>
                <div class="item-quantity-div item-quantity-price-out"><p>Giá bán: <span id="item-quantity-price-out-text-${itemCount}">${priceOut}</span></p></div>
            </div>
        `;
                    itemCount++;
                    addedItems.push({
                        color: color,
                        size: size
                    });

                    $('.req-div-quantity').append(newItem);
                    $('.quantity-product').val(1);
                    $('.price-int').val('');
                    $('.price-out').val('');
                    $("input[name='size']").eq(0).prop('checked', true);
                    $("input[name='color']").eq(0).prop('checked', true);
                }
            });


            $('.file-upload').change(function() {
                var img = $('.img-upload:first');
                var ip_img = $('.file-upload:first');
                if (ip_img[0].files[0]) {
                    img.attr('src', URL.createObjectURL(ip_img[0].files[0]));
                }
            });

            // khi thêm ảnh hiển thị dạng slider
            $('#file-upload-product').on('change', function(e) {
                var files = e.target.files;
                var sliderProduct = $('.slider-product');
                var indicators = sliderProduct.find('.carousel-indicators');
                var inner = sliderProduct.find('.carousel-inner');

                for (var i = 0; i < files.length; i++) {
                    var imgSrc = URL.createObjectURL(files[i]);

                    // Tạo indicator
                    var indicator = $('<button></button>').attr({
                        'type': 'button',
                        'data-bs-target': '#carouselExampleIndicators',
                        'data-bs-slide-to': i,
                    });
                    if (i === 0) {
                        indicator.addClass('active');
                    }
                    indicators.append(indicator);

                    // Tạo carousel item
                    var carouselItem = $('<div></div>').addClass('carousel-item');
                    if (i === 0) {
                        carouselItem.addClass('active');
                    }
                    var img = $('<img>').addClass('d-block w-100').attr('src', imgSrc);
                    carouselItem.append(img);
                    inner.append(carouselItem);
                }
            });


            var swiper = new Swiper(".mySwiper", {
                slidesPerView: 3,
                spaceBetween: 20,
                initialSlide: 0,
                slidesPerGroup: 3,
                grabCursor: true,
                keyboard: {
                    enabled: true,
                },
                breakpoints: {
                    769: {
                        slidesPerView: 3,
                        slidesPerGroup: 3,
                    },
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                centeredSlides: false,
            });
            $('.myImage').click(function() {
                $('.myModal').show();
                const srcValue = $(this).attr('src')
                $('.imgBig').attr('src', srcValue)
            })
            $('.close').click(function() {
                $('.myModal').hide()
            })
            //   $(".nav-link").on("click", function (e) {
            //     e.preventDefault(); // Ngăn chặn mặc định của thẻ <a>

            //     // Loại bỏ lớp "active" từ tất cả các tab và nội dung tab-pane
            //     $(".nav-link").removeClass("active");
            //     $(".tab-pane").removeClass("active");

            //     // Thêm lớp "active" vào tab được click
            //     $(this).addClass("active");

            //     // Lấy href của tab được click để xác định tab-pane tương ứng
            //     var targetPaneId = $(this).attr("href");

            //     // Thêm lớp "active" vào tab-pane tương ứng
            //     $(targetPaneId).addClass("active");
            //   });
            function isValueEmpty(inputValue) {
                return inputValue.trim().length === 0;
            }

            function isValueEmpty(inputValue) {
                return inputValue.trim().length === 0;
            }

            function isPositiveInteger(inputValue) {
                const regex = /^[1-9]\d*$/;
                return regex.test(inputValue);
            }

            $('.toggle-filter').click(function() {

                $('.toggle-filter-div').toggle();
            })

            $(".uppercaseInput").on("keyup", function() {
                // Lấy giá trị hiện tại của ô nhập
                var inputValue = $(this).val();

                // Chuyển đổi giá trị thành chữ in hoa và cập nhật lại giá trị trong ô nhập
                $(this).val(inputValue.toUpperCase());
            });
            $('.req-div-quantity').on('click', '.icon-close-item', function() {
                $(this).parent().remove(); // Xóa phần tử cha của icon-close-item
            });
            $('.quantity-update').click(function() {
                const quantityItem = $(this).closest('.item-quantity')
                quantityItem.addClass('active');
                const color = quantityItem.find('.color-quantity').text();
                const size = quantityItem.find('.size-quantity').text();
                const quantity = quantityItem.find('.quantity-product').text();
                const priceInt = quantityItem.find('.priceInt-quantity').text();
                const priceOut = quantityItem.find('.priceOut-quantity').text();
                const quantity_id = quantityItem.data('id')

                $('#update-quantity-item').attr('data-quantity', quantity_id);
                $('.list-color-quantity').each(function() {
                    if ($(this).val() === color) {
                        $(this).prop('checked', true);
                    }
                });

                // Check the corresponding radio button for size
                $('.list-size-quantity').each(function() {
                    if ($(this).val() === size) {
                        $(this).prop('checked', true);
                    }
                });
                $('.quantity-product').val(quantity)
                $('.price-int').val(priceInt)
                $('.price-out').val(priceOut)
                $(this).hide()
                $('#add-quantity-item').hide();
                $('#update-quantity-item').show();
                quantityItem.find('.quantity-close').show()
            });
            $('.quantity-close').click(function() {
                const quantityItem = $(this).closest('.item-quantity')
                quantityItem.removeClass('active');
                $(this).hide()
                $('#add-quantity-item').show();
                $('#update-quantity-item').hide();
                $('.list-size-quantity:first').prop('checked', true);
                $('.list-color-quantity:first').prop('checked', true);
                $('.quantity-product').val(1)
                $('.price-int').val("")
                $('.price-out').val("")
                $('.quantity-update').show()

            })
            $('#add-quantity-item').click(function(e) {
                e.preventDefault()
                const size = $('.list-size-quantity:checked').val();
                const color = $('.list-color-quantity:checked').val();
                const quantity = $('.quantity-product').val()
                const priceInt = $('.price-int').val()
                const priceout = $('.price-out').val()
                const product_id = $(this).data('product');
                $('#update-quantity-item').removeAttr('data-quantity');
                const updateUrl = '{{ route('product_post_add_quantity', ['product_id' => 0]) }}';
                const link = updateUrl.slice(0, -1) + product_id;

                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                });
                $.ajax({
                    type: "POST",
                    url: link,
                    data: {
                        size: size,
                        color: color,
                        quantity: quantity,
                        priceout: priceout,
                        priceInt: priceInt,
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            alert(response.mess);
                            window.location = response.route;
                        } else {

                            alert(response.mess);
                            window.location = response.route;
                        }


                    },
                    error: function(xhr, status, error) {
                        console.log('Lỗi: ' + error);
                    }
                });

            })

            $('#add-img').click(function(event) {
                event.preventDefault();

                const product_id = $(this).data('id')
                var updateUrl = "{{ route('product_post_add_Img', ['product_id' => 0]) }}";
                var link = updateUrl.slice(0, -1) + product_id;

                const files = Array.from(document.getElementById("file-upload-product-img").files);
                const uploadPromises = [];
                const ref = firebase.storage().ref();

                files.forEach((file) => {
                    const name = +new Date() + "-" + file.name;
                    const metadata = {
                        contentType: file.type
                    };

                    const task = ref.child(name).put(file, metadata);
                    const uploadPromise = task
                        .then((snapshot) => snapshot.ref.getDownloadURL())
                        .catch(console.error);

                    uploadPromises.push(uploadPromise);
                });

                Promise.all(uploadPromises)
                    .then((urls) => {
                        const imageURLs = urls;
                        var csrfToken = $('meta[name="csrf-token"]').attr('content');
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': csrfToken
                            }
                        });
                        $.ajax({
                            type: "POST",
                            url: link,
                            data: {
                                listImg: imageURLs
                            },
                            success: function(response) {
                                if (response.status === 'success') {
                                    alert(response.mess);
                                    window.location = response.route;
                                } else {
                                    // Xử lý khi có lỗi
                                    alert(response.mess);
                                }


                            },
                            error: function(xhr, status, error) {
                                console.log('Lỗi: ' + error);
                            }
                        });


                    })
                    .catch(console.error);

            })
            let isFilterVisible = true; // Biến để kiểm tra trạng thái của phần tử

            $('.load-more-down').click(function() {
                $('.filter-advanced').toggle();
                $('.load-more-down i').toggleClass('active');
                $('.div-btn-filter').toggle();
                $('.row-2-col').toggleClass('col-4 col-6');


            });

            $('.filter-product').click(function() {
                const theloai_id = $('.theloai_id').val();
                const status = $('.select_status').val();
                const brand_id = $('.brand_id').val();
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                });
                $.ajax({
                    type: "POST",
                    url: '{{ route('filter_product') }}',
                    data: {
                        theloai_id: theloai_id,
                        status: status,
                        brand_id: brand_id,
                    },
                    success: function(response) {
                        $('#list-product').html(response.view);

                        $('.req-text-mess').text(response.mess_req)
                    },
                    error: function(xhr, status, error) {
                        console.log('Lỗi: ' + error);
                    }
                });

            })
            const invalidInputMessage = "Bạn không thể nhập gì ngoài số";

            $('.number-input').on('keyup', function() {
                const inputValue = $(this).val();
                const parentForm = $(this).closest('.validate-form');
                const errTextPriceOut = parentForm.find('.err-text-price-out');

                if (!/^\d+$/.test(inputValue)) {
                    $(this).val('');
                    errTextPriceOut.text(invalidInputMessage).show();
                } else {
                    errTextPriceOut.text('').hide();
                }
            });

            function checkfillerProduct() {
                return checkEmty('startPrice') && checkEmty('endPrice') && checkEmty('startQuantity') && checkEmty(
                    'endQuantity');
            }
            $('.filter-product-plus').click(function() {
                const theloai_id = $('.theloai_id').val();
                const status = $('.select_status').val();
                const brand_id = $('.brand_id').val();
                const color_product = $('.color_product').val();
                const size_product = $('.size_product').val();
                const startPrice = $('.startPrice').val();
                const endPrice = $('.endPrice').val();
                const startQuantity = $('.startQuantity').val();
                const endQuantity = $('.endQuantity').val();
                if (checkfillerProduct()) {
                    return;
                } else {
                    var csrfToken = $('meta[name="csrf-token"]').attr('content');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        }
                    });
                    $.ajax({
                        type: "POST",
                        url: '{{ route('filter_productPlus') }}',
                        data: {
                            theloai_id: theloai_id,
                            status: status,
                            brand_id: brand_id,
                            color_product: color_product,
                            size_product: size_product,
                            startPrice: startPrice,
                            endPrice: endPrice,
                            startQuantity: startQuantity,
                            endQuantity: endQuantity,
                        },
                        success: function(response) {
                            $('#list-product').html(response.view);

                            $('.req-text-mess').text(response.mess_req)
                        },
                        error: function(xhr, status, error) {
                            console.log('Lỗi: ' + error);
                        }
                    });
                }


            })
            $('#btn-upload-banner').click(function(event) {
                event.preventDefault();
                const namebaner = $('#namebanner').val();
                if (checkEmty('namebanner')) {
                    return
                } else {
                    const ref = firebase.storage().ref();
                    const file = document.querySelector(".upload-img").files[0];
                    const name = +new Date() + "-" + file.name;
                    const metadata = {
                        contentType: file.type
                    };
                    const task = ref.child(name).put(file, metadata);
                    task
                        .then(snapshot => snapshot.ref.getDownloadURL())
                        .then(url => {

                            var csrfToken = $('meta[name="csrf-token"]').attr('content');
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': csrfToken
                                }
                            });
                            $.ajax({
                                type: "POST",
                                url: "{{ route('banner_post_add') }}",
                                data: {
                                    linkImg: url,
                                    namebanner: namebaner,
                                },
                                success: function(response) {
                                    if (response.status === 'success') {
                                        alert(response.message)
                                        window.location.href = response.redirect;
                                    } else {
                                        alert(response.message)
                                        window.location.href = response.redirect;
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.log('Lỗi: ' + error);
                                }
                            });
                        })
                        .catch(console.error);
                }
            })
            $('#btn-upload-banner-update').click(function(event) {
                event.preventDefault();
                const namebanner = $('#namebanner').val();
                const img_old = $('.img-item-form').attr('src')
                const banner_id = $(this).data('id');
                var updateUrl = "{{ route('banner_post_update', ['banner_id' => 0]) }}";
                var link = updateUrl.slice(0, -1) + banner_id;

                if (document.querySelector(".upload-img").files.length > 0) {
                    const ref = firebase.storage().ref();
                    const file = document.querySelector(".upload-img").files[0];
                    const name = +new Date() + "-" + file.name;
                    const metadata = {
                        contentType: file.type
                    };
                    const task = ref.child(name).put(file, metadata);
                    task
                        .then(snapshot => snapshot.ref.getDownloadURL())
                        .then(url => {
                            console.log(url);

                            $.ajax({
                                type: "PUT",
                                url: link,
                                data: {
                                    namebanner: namebanner,
                                    linkImg: url,
                                },
                                success: function(response) {
                                    if (response.status === 'success') {
                                        alert(response.message)
                                        window.location.href = response.redirect;
                                    } else {
                                        alert(response.message)
                                        window.location.href = response.redirect;
                                    }

                                },
                                error: function(xhr, status, error) {
                                    console.log('Lỗi: ' + error);
                                }
                            });
                        })
                        .catch(console.error);
                } else {

                    $.ajax({
                        type: "PUT",
                        url: link,
                        data: {
                            namebanner: namebanner,
                            linkImg: img_old,
                        },
                        success: function(response) {
                            if (response.status === 'success') {
                                alert(response.message)
                                window.location.href = response.redirect;
                            } else {
                                alert(response.message)
                                window.location.href = response.redirect;
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log('Lỗi: ' + error);
                        }
                    });
                }
            })
            $('.upload-img').change(function() {
                previewImage(this);
            });

            function previewImage(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('.img-item-form').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]); // Đọc dữ liệu ảnh và cập nhật src của thẻ img
                }
            }

            $(document).on('click', '.loadModalDeatil', function() {
                const textNote = $(this).data('text');
                $('#exampleModal .modal-body .text-mota-table').text(textNote);
                $('#exampleModal').modal('show');
            });
            $('.status-payment-item').click(function() {
                $('.status-payment-item').removeClass('active');
                $(this).addClass('active');
                const status=$(this).data('id')
                getDataPayment(status)
            });

            function getDataPayment(status) {
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    }
                });
                $.ajax({
                    type: "POST",
                    url: "{{ route('selete_billPayment') }}",
                    data: {
                        status: status,
                    },
                    success: function(response) {
                        $('#list-payment').html(response.view)


                    },
                    error: function(xhr, status, error) {
                        console.log('Lỗi: ' + error);
                    }
                });
            }
            $('.payment-change').change(function(){
                const values=$(this).val();
                if(values==5){
                    $('.payment-code').hide()
                    $('.payment-note').hide()
                    $('.reason-mess').show()
                }
                else{
                    $('.payment-code').show()
                    $('.payment-note').show()
                    $('.reason-mess').hide()
                }
            })
             $("#selectOptions").change(function() {
                var selectedOption = $(this).val();
                
                // Kiểm tra giá trị tùy chọn và thực hiện hành động tương ứng
                if (selectedOption === "select-all") {
                    // Đánh dấu tất cả các ô input checkbox
                    $(".checkbox").prop("checked", true);
                } else if (selectedOption === "deselect-all") {
                    // Bỏ chọn tất cả các ô input checkbox
                    $(".checkbox").prop("checked", false);
                }
            });
        });
    </script>

</body>

</html>
