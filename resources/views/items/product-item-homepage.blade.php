<div class="product-item-homepage">
    <div class="image">
        <img src="{{ route('files.show-file',$product->files->first()->id) }}" alt="">
        <a href="{{ route('fe-pages.products.show-fe',$product->id) }}" class="buy-button cta-button">Read more</a>
    </div>
    <div class="text">
        <a href="{{ route('fe-pages.products.show-fe',$product->id) }}" class="heading-product">{{ $product->name }}</a>
        <p>
            {{ addThreeDots($product->description,50) }}
        </p>
        <div class="parameter flex items-center mt-4">
            <p class="w-24">
                Condition:
            </p>
            <p class="font-bold ml-4 text-indigo-500">
                {{ $product->condition }}
            </p>
        </div>
        <div class="parameter flex items-center mt-1">
            <p class="w-24">
                Parameters:
            </p>
            <p class="font-bold ml-4 text-indigo-500">
                {{ $product->parameters }}
            </p>
        </div>
        <div class="parameter flex items-center mt-1">
            <p class="w-24">
                Price[€]:
            </p>
            <p class="font-bold ml-4 text-indigo-500">
                {{ $product->price }}
            </p>
        </div>
    </div>
</div>