@extends('admin.layouts.base')
@section('title','Product')
@section('content')
<div class="admin__content__title">
  <h2>Product</h2>
</div>
<div class="admin__content__control">
  <button type="button" name="button" onclick="toggleForm()">+ Add Product</button>
</div>
{{-- if isset msg --}}
@if(count($errors) > 0)
@foreach($errors->all() as $error)
<div class="form__msg"> <span> {{$error}} </span> </div>
@endforeach
@endif
{{-- if isset msg success --}}
{{-- <div class="form__msg__success"> <span> msg success</span> </div> --}}

<div class="admin__content__control__expand" style="display: none;">
  <div class="admin__content__control__expand__add">
    <form action="/admin/product" method="post" enctype="multipart/form-data">
      {{csrf_field()}}
      <input type="hidden" name="_method" value="post">
      <input type="text" name="nama" value="" placeholder="Nama Product" autocomplete="off">
      <input type="number" name="harga" value="" placeholder="Harga Product" autocomplete="off">
      <input type="number" name="stok" value="" placeholder="Stok" autocomplete="off">
      <p>Tag</p>
      <select class="" name="tag">
        <option value="smartphone">Smartphone</option>
        <option value="laptop">Laptop</option>
        <option value="pc">PC</option>
        <option value="tablet">Tablet</option>
        <option value="gaming">Gaming</option>
        <option value="wearable">Wearable</option>
      </select>
      <textarea name="deskripsi" placeholder="Deskripsi"></textarea>
      <input type="file" name="image" value="">
      <input type="submit" name="submit" value="Tambah" class="form-submit button">
    </form>
  </div>
</div>
<div class="admin__content__list__container">
  @foreach($products as $product)
  <div class="admin__content__list">
    <div class="admin__content__list__image" style="background-image:url('{{$product->image_product}}')"></div>
    <div class="admin__content__list__detail">
      <div class="admin__content__list__title">
        <h1>{{$product->nama_product}}</h1>
      </div>
      <div class="admin__content__list__title">
        <span>Rp. {{number_format($product->harga_product,2)}}</span>
      </div>
    </div>
    <div class="admin__content__list__control">
      <a href="product/edit/{{$product->id_product}}"><i class="fa fa-pencil">edit</i></a>
      <a href="#"><i class="fa fa-trash">delete</i></a>
    </div>
  </div>
  @endforeach
</div>
@endsection