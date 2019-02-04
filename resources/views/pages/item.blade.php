@include('includes.header')
<div class="content item">
  <div class="container">
    <div class="item--left">
      <div class="item__galery">
        <div class="slider-for">
          <div style="background-image: url('{{$products->image_product}}')"></div>
        </div>
        <div class="slider-nav">
          <div style="background-image: url('{{$products->image_product}}')"></div>
        </div>
      </div>
    </div>
    <div class="item--right">
      <div class="item__title">
        <h2>{{$products->nama_product}}</h2>
      </div>
      <div class="item__detail">
        <div class="item__price">
          Rp. {{number_format($products->harga_product,2)}}
        </div>
        <div class="item__button-buy">
          <form action="/troliForm" method="post">
            <input type="hidden" name="id_product" value="{{$products->id_product}}">
            {{-- <input type="hidden" name="_method" value="post"> --}}
            {{csrf_field()}}
            <button type="submit" name="button" class="button">Beli</button>
          </form>
        </div>
      </div>
      <div class="item__desc">
        <p>{{$products->deskripsi_product}}</p>
      </div>
    </div>
  </div>
</div>
<div class="content related">
  <div class="container">
    <div class="related__title">
      <h1 class="title--pemisah">Related</h1>
    </div>
    <div class="related__list">
      @foreach($relatedProducts as $relatedProduct)
      <a href="/p/{{$relatedProduct->id_product}}" class="content__list">
          <div class="content__list__image" style="background-image:url('{{$relatedProduct->image_product}}')"></div>
          <div class="content__list__title">
            <h2>{{$relatedProduct->nama_product}}</h2>
          </div>
          <div class="content__list__price">
            <span>Rp. {{$relatedProduct->harga_product}}</span>
          </div>
        </a>
      @endforeach
        <!-- <a href="#" class="content__list">
          <div class="content__list__image" style="background-image:url('assets/image/Samsung_Galaxy_Note_9.jpg')"></div>
          <div class="content__list__title">
            <h2>Samsung Galaxy Note 9 - 128GB</h2>
          </div>
          <div class="content__list__price">
            <span>Rp. 18,000,000</span>
          </div>
        </a>
        <a href="#" class="content__list">
          <div class="content__list__image" style="background-image:url('assets/image/Samsung_Galaxy_Note_9.jpg')"></div>
          <div class="content__list__title">
            <h2>Samsung Galaxy Note 9 - 128GB</h2>
          </div>
          <div class="content__list__price">
            <span>Rp. 18,000,000</span>
          </div>
        </a>
        <a href="#" class="content__list">
          <div class="content__list__image" style="background-image:url('assets/image/Samsung_Galaxy_Note_9.jpg')"></div>
          <div class="content__list__title">
            <h2>Samsung Galaxy Note 9 - 128GB</h2>
          </div>
          <div class="content__list__price">
            <span>Rp. 18,000,000</span>
          </div>
        </a> -->
      </div>
    </div>
  </div>
  @include('includes.footer')
  