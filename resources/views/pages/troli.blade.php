@include('includes.header')
<div class="content troli">
  <div class="container">
    <div class="content__title">
      <h1 class="title--pemisah">Troli</h1>
    </div>
    <div class="content__list__container">
      @foreach($products as $product)
      <div class="content__list">
        <div class="content__list__image" style="background-image:url('{{$product->image_product}}')"></div>
        <div class="content__list__detail">
          <div class="content__list__title">
            <h1>{{$product->nama_product}}</h1>
          </div>
          <div class="content__list__title">
            <span>Rp. {{number_format($product->harga_product,2)}}</span>
          </div>
        </div>
        <div class="content__list__control">
          <select class="" name="jumlah">
            @for($i = 1; $i <= $product->stok_product; $i++)
            <option value="{{$i}}">{{$i}}</option>
            @endfor
          </select>
          <form action="/troliForm" method="post" style="float:left">
            <input type="submit" name="submit" class="" value="Remove">
            {{csrf_field()}}
            <input type="hidden" name="id_troli" value="{{$product->id}}">
            <input type="hidden" name="_method" value="delete">
          </form>
        </div>
      </div>
      @endforeach
      @if(empty($product->id_product))
        <p class="msg">Yahh! Trolimu Kosong, <a href="/">Beli barang Kuy!</a></p>
      @endif
    </div>
    @if(!empty($product->id_product))
    <div class="content__button">
      <a href="/payment" class="button" style="float:right">Langsung ke Pembayaran</a>
    </div>
    @endif
  </div>
</div>

@include('includes.footer')
