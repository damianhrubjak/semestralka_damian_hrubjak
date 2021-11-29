<div class="product-item-homepage">
    <div class="image">
        <img src="{{ !$product->files->isEmpty() ? route('files.show-file-full-resolution',$product->files->first()->id) : route('files.show-file-full-resolution',1) }}"
            alt="">
        <button class="buy-button cta-button">BUY</button>
    </div>
    <div class="text">
        <h3 class="heading-product">{{ $product->name }}</h3>
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