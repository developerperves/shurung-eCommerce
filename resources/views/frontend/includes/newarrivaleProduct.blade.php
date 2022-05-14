
    <div class="col-12">
        <div class="row" >
        @forelse ($news as $new)
        <div class="col-lg-3 col-sm-6">
                            <div class="product-card product-card--block">
                                <div class="product-card__img">
                                    <a href="{{ route('product.detail', $new->slug) }}">
                                        <img src="{{ asset('assets/images') }}/{{ $new->photo }}" alt="{{ $new->photo }}">
                                    </a>
                                    <div class="product-card__overlay">
                                        @if ($new->previous_price != null)   
                                        <div class="product-badge">
                                            -{{ App\Helpers\PriceHelper::DiscountPercentage($new) }}
                                        </div>
                                        @endif
                                        <div class="product-actions">
                                            <ul class="product-btn-list">
                                                <li>
                                                    <a href="{{ route('product.detail', $new->slug) }}" class="product-btn"><i class="icon-eye"></i></a>
                                                </li>
                                                <li>
                                                      <form action="{{ route('cart-add.store') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="productId" value="{{ $new->id }}">
                                                    <input type="hidden" name="product_quantity" value="1">
                                                <button class="product-btn addToCart border-0"><i class="icon-basket"></i></button>
                                            </form>
                                                </li>
                                                <li>
                                                      <a href="{{ route('wishlist.store', $new->id) }}" class="product-btn"  title="{{__('Wishlist')}}"><i class="icon-heart"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-card__body">
                                    <div class="product-category">{{ App\Brand::find($new->brand_id)->name }}</div>
                                    <h3 class="product-name">
                                        <a href="{{ route('product.detail', $new->slug) }}">{{ $new->name }}</a>
                                    </h3>
                                    <div class="product-price">
                                        @if ($new->previous_price!=null)
                                        <del class="old">
                                            <span class="amount">TK.  {{ $new->previous_price }}</span></del>
                                        @endif
                                        <ins class="current ">
                                            <span class="amount">TK.  {{ $new->discount_price }}</span>
                                        </ins>
                                    </div>
                                </div>
                            </div>
        </div>
        @empty
        <div class="col-lg-12 col-sm-12  ml-auto mr-auto">
             <div class="product-card product-card--block text-center">
             <h3 class="alert-warning p-4" >Data Not Found</h3>
        </div>
        </div>

        @endforelse
        </div>
        <h2 id="newarrivaleProductLoading" style="display: none;text-align:center">Loading</h2>
        <!-- end shop cards -->
        <!-- pagination -->
        <div class="row">
         <div class="col-12">
        {{ $news->links() }}
        </div>
</div>
<!-- end pagination -->
</div>


    
