@foreach ($news as $new)
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
                                                    <a href="#" class="product-btn"><i class="icon-basket"></i></a>
                                                </li>
                                                <li>
                                                    <a href="#" class="product-btn"><i class="icon-heart"></i></a>
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
                        @endforeach