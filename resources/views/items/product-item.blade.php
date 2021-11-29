<div class="product-item">
    <div class="image">
        <img src="{{ !$product->files->isEmpty() ? route('files.show-file-full-resolution',$product->files->first()->id) : route('files.show-file-full-resolution',1) }}"
            alt="">
    </div>
    <div class="text">
        <h3 class="heading-product">{{ $product->name }}</h3>
        <div class="parameters">
            <div class="parameter flex items-center">
                <p class="w-24">
                    Condition:
                </p>
                <p class="font-bold ml-4 text-indigo-500">
                    {{ $product->condition }}
                </p>
            </div>
            <div class="parameter flex items-center">
                <p class="w-24">
                    Parameters:
                </p>
                <p class="font-bold ml-4 text-indigo-500">
                    {{ $product->parameters }}
                </p>
            </div>
            <div class="parameter flex items-center">
                <p class="w-24">
                    Price[€]:
                </p>
                <p class="font-bold ml-4 text-indigo-500">
                    {{ $product->price }}
                </p>
            </div>
        </div>
        <div class="w-full flex">
            <button class="ml-auto mr-0 mt-4 cta-button">BUY</button>
        </div>
    </div>
</div>