@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        @foreach ($products as $product)
            <div class="col-sm-3">
                <img src="https://image.shutterstock.com/image-photo/beautiful-water-drop-on-dandelion-260nw-789676552.jpg" height="200" width="200">
                <p class="text-center">{{ $product->name }}</p>
                <p class="text-center">&#x20b9; {{ number_format($product->price,2) }}</p>
                <button class="btn btn-primary text-center btn-block" onclick="addToCart('{{ $product->id }}')">Add</button>
            </div>
        @endforeach
    </div>
</div>
@endsection
<script type="text/javascript">
    var cart = [];
    var cartHtml ="";
    function addToCart(productId){
        $.ajax({
            url:'{{ route("product.add-to-cart") }}',
            type:'post',
            data:{
                'product_id':productId,
                "_token": "{{ csrf_token() }}",
            },
            success:function(success){
                cartHtmlFunction(success);
            },
            error:function(){

            }
        });
        $(function(){
            function cartHtmlFunction(success){
                cartHtml = "";
                $.each(success,function(key,value){
                cartHtml += '<div class="row cart-detail">';
                    cartHtml += '<div class="col-lg-4 col-sm-4 col-4 cart-detail-img">';
                        cartHtml += '<img src="https://images-na.ssl-images-amazon.com/images/I/811OyrCd5hL._SX425_.jpg">';
                        cartHtml += '</div>';
                    cartHtml += '<div class="col-lg-8 col-sm-8 col-8 cart-detail-product">';
                        cartHtml += '<p>'+value.name+'</p>';
                        cartHtml += '<span class="price text-info"> '+value.price+'</span> <span class="count">
                            Quantity:'+value.qty+'</span>';
                        cartHtml += '</div>';
                    cartHtml += '</div>';
                })

            }
            $("#headerCart").html(cartHtml);
        });
    }
</script>
