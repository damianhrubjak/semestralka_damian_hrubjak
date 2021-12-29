<div class="product-item">
    <a href="{{ route('fe-pages.products.show-fe',$product->id) }}" class="image">
        <img src="{{ route('files.show-file',$product->files->first()->id) }}" alt="">
    </a>
    <div class="text">
        <a href="{{ route('fe-pages.products.show-fe',$product->id) }}" class="heading-product">{{ $product->name }}</a>
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
            <a href="{{ route('fe-pages.products.show-fe',$product->id) }}" class="ml-auto mr-0 mt-4 cta-button">Read
                more</a>
        </div>
    </div>
</div>