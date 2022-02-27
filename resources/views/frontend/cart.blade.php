@extends('layouts.client')

@section('content')
<!-- breadcrumb -->
<div class="container">
    <div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
        <a href="index.html" class="stext-109 cl8 hov-cl1 trans-04">
            Home
            <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
        </a>

        <span class="stext-109 cl4">
            Shoping Cart
        </span>
    </div>
</div>


<!-- Shoping Cart -->
<form class="bg0 p-t-75 p-b-85">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                <div class="m-l-25 m-r--38 m-lr-0-xl">
                    <div class="wrap-table-shopping-cart">
                        <table class="table-shopping-cart">
                            <tr class="table_head">
                                <th class="column-1">Product</th>
                                <th class="column-2"></th>
                                <th class="column-3">Price</th>
                                <th style="text-align:center">Quantity</th>
                                <th class="column-4">Color</th>
                                <th class="column-4">Size</th>
                                <th class="column-5">Total</th>
                            </tr>
                            <?php $total = 0 ?>
                            @foreach($carts as $cart)
                            <tr class="table_row">
                                <td class="column-1">
                                    <div class="how-itemcart1">
                                        <img src="{{ $cart['image'] }}" alt="IMG">
                                    </div>
                                </td>
                                <td class="column-2">{{ $cart['name'] }}</td>
                                <td class="column-3 price" data-price="{{ $cart['price'] }}">${{ $cart['price'] }}</td>
                                <td class="column-3">
                                    <input type="number" class="quantity" data-product="{{ $cart['product_id'] }}" style="text-align:center" name="num-product1" value="{{ $cart['quantity'] }}">
                                </td>
                                <td class="column-4">
                                    {{ $cart['color'] }}
                                </td>
                                <td class="column-4">
                                    {{ $cart['size'] }}
                                </td>
                                <td class="column-5">
                                    <p class="total" data-price="{{ $cart['price'] }}">${{ $cart['price']*$cart['quantity'] }}</p>
                                </td>
                            </tr>
                            <?php $total += $cart['price'] * $cart['quantity']; ?>
                            @endforeach
                        </table>
                    </div>

                    <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                        <div class="flex-w flex-m m-r-20 m-tb-5">
                            <input class="stext-104 cl2 plh4 size-117 bor13 p-lr-20 m-r-10 m-tb-5" type="text" name="coupon" placeholder="Coupon Code">

                            <div class="flex-c-m stext-101 cl2 size-118 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-5">
                                Apply coupon
                            </div>
                        </div>

                        <div class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                            Update Cart
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                    <h4 class="mtext-109 cl2 p-b-30">
                        Cart Totals
                    </h4>

                    <div class="flex-w flex-t bor12 p-b-13">
                        <div class="size-208">
                            <span class="stext-110 cl2 subtotal d-flex">
                                Subtotal:  <span style="display:inline-block;margin-left:10px">$<?php echo $total; ?></span>
                            </span>
                        </div>

                        <div class="size-209">
                            <span class="mtext-110 cl2">

                            </span>
                        </div>
                    </div>

                    <div class="flex-w flex-t bor12 p-t-15 p-b-30">
                        <div class="size-208 w-full-ssm">
                            <span class="stext-110 cl2">
                                Shipping:
                            </span>
                        </div>

                        <div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
                            <p class="stext-111 cl6 p-t-2">
                                There are no shipping methods available. Please double check your address, or contact us if you need any help.
                            </p>

                            <div class="p-t-15">
                                <span class="stext-112 cl8">
                                    Calculate Shipping
                                </span>

                                <div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
                                    <select class="js-select2" name="time">
                                        <option>Select a country...</option>
                                        <option>USA</option>
                                        <option>UK</option>
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>

                                <div class="bor8 bg0 m-b-12">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="State /  country">
                                </div>

                                <div class="bor8 bg0 m-b-22">
                                    <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Postcode / Zip">
                                </div>

                                <div class="flex-w">
                                    <div class="flex-c-m stext-101 cl2 size-115 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer">
                                        Update Totals
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="flex-w flex-t p-t-27 p-b-33">
                        <div class="size-208">
                            <span class="mtext-101 cl2">
                                Total:
                            </span>
                        </div>

                        <div class="size-209 p-t-1">
                            <span class="mtext-110 cl2">
                                $79.65
                            </span>
                        </div>
                    </div>


                    <a href="{{ route('checkout')}}" style="color:#fff;" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                        Proceed to Checkout
                    </a>

                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('js')
<script>
    $(".js-select2").each(function() {
        $(this).select2({
            minimumResultsForSearch: 20,
            dropdownParent: $(this).next('.dropDownSelect2')
        });
    })
</script>
<!--===============================================================================================-->
<script src="{{ asset('shop/vendor/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
<!--===============================================================================================-->
<script src="{{ asset('shop/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<script>
    $('.js-pscroll').each(function() {
        $(this).css('position', 'relative');
        $(this).css('overflow', 'hidden');
        var ps = new PerfectScrollbar(this, {
            wheelSpeed: 1,
            scrollingThreshold: 1000,
            wheelPropagation: false,
        });

        $(window).on('resize', function() {
            ps.update();
        })
    });
</script>


<script src="{{ asset('shop/js/main.js') }}"></script>
<script>
const listElementPrice = document.querySelectorAll('.price');
const listElementQuantity = document.querySelectorAll('.quantity');
const listTotal = document.querySelectorAll('.total');
var cartTotal = 0;
listElementQuantity.forEach(function(elementQuantity, index) {
    elementQuantity.onchange = function() {
        let quantity = elementQuantity.value;
        let productId = elementQuantity.getAttribute('data-product');
        let price = listElementPrice[index].getAttribute('data-price');
        const url = "{{ route('updateCart') }}" + '?quantity=' + quantity + '&productId=' + productId;
        $.ajax({
            type: 'GET',
            url: url,
            success: function(response) {
                location.reload();
            }
        })
    }
})
</script>
@endsection