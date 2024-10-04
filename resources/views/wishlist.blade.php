@extends('master');
@section('content')

<!--Page Title-->
<section class="page-title" style="background-image:url({{asset('user/images/background/10.jpg')}});">
    <div class="auto-container">
        <div class="inner-container clearfix">
            <div class="title-box">
                <h1>Shopping Cart</h1>
                <span class="title">The Interior speak for themselves</span>
            </div>
            <ul class="bread-crumb clearfix">
                <li><a href="{{url('/')}}">Home</a></li>
                <li>My WishList</li>
            </ul>
        </div>
    </div>
</section>
    @include('Message.message')
    <!-- Breadcrumb area start  -->
    <br><br><br><br>
        <div class="cart-outer">
                 <div class="table-outer">
                <table class="cart-table">
                    <thead class="cart-header">
                        <tr>
                            <th>Image</th>
                            <th class="prod-column">Name</th>
                            <th class="price">Price</th>
                            <th>Action</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                             @if (!empty($wishlists))
                            @foreach ($wishlists as $wishlist )
                            @php
                            $img = productImages($wishlist->product->id);
                            @endphp
                            
                        <tr>
                            <td class="prod-column mt-5">
                                <div class="column-box">
                                    <figure class="prod-thumb"><a href="#">
                                     @if(!empty($img->image))
                                        <img style="width: 100%;" src="{{asset('uploads/product/small/'.$img->image)}}"
                                            alt="Product" class="wishlist-item-img rounded">
                                        @else
                                        <img src="{{ asset('Asset/Admin/img/default.png') }}" alt="Product"
                                            class="wishlist-item-img">
                                        @endif
                                    </a></figure>
                                </div>
                            </td>
                            <td><h4 class="prod-title">{{ $wishlist->product->name }}</h4></td>
                            <td class="sub-total"> ${{ number_format($wishlist->product->price,2) }}</td>
                           <td>
                                <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
                                    <button style="font-size: 18px;" class="btn btn-outline-danger btn-sm"
                                        type="button" onclick="RemoveWishlist('{{$wishlist->id}}')"><i class="fas fa-trash-alt me-2"
                                            ></i>Remove</button>
                                </div>
                          
                           </td>
                        
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
          

        </div>
        
  
    <br>
    <br><br><br><br>
    

<script>
function RemoveWishlist(id) {
    var url = '{{route("Remove.Wishlist","ID")}}';
    var newurl = url.replace('ID', id)
    if (confirm('Are You sure want to delete')) {
        $.ajax({
            url: newurl,
            type: 'delete',
            data: {
                  _token: '{{ csrf_token() }}'
            },
            dataType: 'json',
            
            success: function(response) {
                if (response.status == true) {
                    window.location.href = "{{route('Front.wishlist')}}"
                } else {
                    alert(response.msg)
                }
            }
        })
    }
}
</script>

</main>
@endsection
