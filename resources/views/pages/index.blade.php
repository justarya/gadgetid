@include('includes.header')
    <div class="content">
      <div class="container">
        @foreach ($products as $product)
          <a href="/p/{{$product->id_product}}" class="content__list">
            <div class="content__list__image" style="background-image:url('{{$product->image_product}}')"></div>
            <div class="content__list__title">
              <h2>{{$product->nama_product}}</h2>
            </div>
            <div class="content__list__price">
              <span>IDR {{$product->harga_product}}</span>
            </div>
          </a>
        @endforeach
      </div>
    </div>
@include('includes.footer')
