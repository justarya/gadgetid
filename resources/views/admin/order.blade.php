@extends('admin.layouts.base')
@section('title','Order')
@section('content')
<div class="admin__content__title">
  <h2>Order Request</h2>
</div>
<div class="admin__content__list__container">
  @foreach($orders as $order)
  <div class="admin__content__list--order">
    <h2>Data barang dipesan</h2>
    <div class="admin__content__list__item">
      @foreach ($order->TransactionProducts as $product)
      <div class="admin__content__list">
        <div class="admin__content__list__image" style="background-image:url('{{$product->product->image_product}}')"></div>
        <div class="admin__content__list__detail">
          <div class="admin__content__list__title">
            <h1>{{$product->product->nama_product}}</h1>
          </div>
          <div class="admin__content__list__price">
            <span>Rp. {{$product->product->harga_product}}</span>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="admin__content__list__main">
      <h2>Data Konsumen</h2>
      <table>
        <tr>
          <td>Nama</td>
          <td>: {{$order->User->nama}}</td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>: {{$order->User->alamat}}</td>
        </tr>
        <tr>
          <td>Nomor Telp</td>
          <td>: {{$order->User->no_telp}}</td>
        </tr>
      </table>
    </div>
    <div class="admin__content__list__button">
    @if($order->status == 1)
      <form action="/confirmationorder" method="post">
        {{csrf_field()}}
        <input type="hidden" name="id_transaction" value="{{$order->id_transaction}}">
        <input type="hidden" name="_method" value="put">
        <input type="submit" name="submit" class="button" value="Terima Pesanan">
        {{-- <input type="submit" name="submit" class="button" value="Batalkan Pesanan"> --}}
      </form>
      @elseif($order->status == 2)
      <form action="/sendResi" method="post">
        {{csrf_field()}}
        <h3>Masukan Nomor Resi</h3>
        <input type="hidden" name="id_transaction" value="{{$order->id_transaction}}">
        <input type="hidden" name="_method" value="put">
        <input type="text" name="resi" placeholder="No Resi">
        <input type="submit" name="submit_resi" class="button">
      </form>    
    @elseif($order->status == 3)
      <h3>Status: Sending</h3>
    @elseif($order->status == 4)
      <h3>Success</h3>
    @endif
    </div>
  </div>
  @endforeach
</div>
@endsection

<!-- <div class="popup-bg">
<div class="popup">
  <div class="popup__close">
    <button type="button" class="button--close" onclick="togglePopup()">&times;</button>
  </div>
  <div class="popup__title">
    <h1>Edit Product</h1>
  </div>
  <form class="" action="" method="post">
    <input type="text" name="nama" value="" placeholder="Nama Product">
    <input type="text" name="harga" value="" placeholder="Harga Product">
    <textarea name="deskripsi" placeholder="Deskripsi"></textarea>
    <input type="file" name="gambar" value="">
    <input type="submit" name="" value="Tambah" class="form-submit button">
  </form>
</div>
</div> -->
