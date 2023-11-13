<div class ="change-item-cart-scroll">
    @if(Session::has("Cart") != null)
    @foreach(Session::get("Cart")->products as $item)
    <div class="content_info-cart-list-item ">
        <div class="content_info-cart-list-item-product">
            <a href="{{asset('detail'.$item['productInfo']->prod_id.'/'.$item['productInfo']->prod_slug.'.html')}}" class="content_info-cart-list-item-img">
                <img src="{{asset('lib/storage/app/avatar/'.$item['productInfo']->prod_img)}}" alt="">
            </a>
            <div class="content_info-cart-list-item-name">
                {{$item['productInfo']->prod_name}}
            </div>
        </div>

        <div class="content_info-cart-list-item-pirce">
            {{number_format($item['productInfo']->prod_price,0,',','.')}}₫

        </div>
        <div class="content_info-cart-list-item-quantity header_wrapper-login-cart-nav-quantity">
            <div   onclick = "PrevCart({{$item['productInfo']->prod_id}});" class="content_info-cart-list-item-quantity-prev">
                <i class='bx bx-chevron-left'></i>
            </div>

            <span id="quanty-item-{{$item['productInfo']->prod_id}}">{{$item['quanty']}}</span>
            <div   onclick = "NextCart({{$item['productInfo']->prod_id}});" class="content_info-cart-list-item-quantity-next">
                <i class='bx bx-chevron-right'></i>
            </div>

        </div>

        <div class="content_info-cart-list-item-sum">
        {{number_format($item['sumprice'],0,',','.')}}₫
            
        </div>

        <div class="content_info-cart-list-item-delete">
            <i data-id="{{$item['productInfo']->prod_id}}" class='bx bx-trash'></i>
        </div>
    </div>
    @endforeach
</div>
<div class="content_info-car-sum">
    <div class="content_info-car-sum-pirce">
        <span>Tổng thanh toán:</span>
        <div class="content_info-car-sum-monney">
             {{number_format(Session::get('Cart')->totalPrice,0,',','.')}}₫
        </div>
    </div>
    <a href="{{asset('/cartmenu')}}" class="content_info-car-sum-button">
            Xem giỏ hàng
    </a>
</div>
<input hidden type="number" id="total-quanty-cart" value="{{Session::get('Cart')->totalQuanty}}">
<input hidden type="number" id="total-quanty-cart1" value="{{Session::get('Cart')->totalQuanty}}">
<input hidden type="number" id="total-quanty-cart2" value="{{Session::get('Cart')->totalQuanty}}">
@else
<style>
    .content_info-car-sum-button-cart{
        display: none;
    }
</style>
<input hidden type="number" id="total-quanty-cart" value="0">
<input hidden type="number" id="total-quanty-cart1" value="0">
<input hidden type="number" id="total-quanty-cart2" value="0">

@endif
