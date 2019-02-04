@include('admin.includes.header')
<div class="popup-bg">
    <div class="popup">
      <div class="popup__close">
        <a href="/admin/product" type="button" class="button--close">&times;</a>
      </div>
      <div class="popup__title">
        <h1>Edit Product</h1>
      </div>
        @if(count($errors) > 0)
        @foreach($errors->all() as $error)
        <div class="form__msg"> <span> {{$error}} </span> </div>
        @endforeach
        @endif
      <form action="/admin/product/edit" method="post" enctype="multipart/form-data">
        {{csrf_field()}}    
        <input type="hidden" name="_method" value="post">
        <input type="hidden" name="id" value="{{$products->id_product}}">
        <input type="text" name="nama" placeholder="Nama Product" value="{{$products->nama_product}}">
        <input type="number" name="harga" placeholder="Harga Product" value="{{$products->harga_product}}">
        <input type="number" name="stok" placeholder="Stok" value="{{$products->stok_product}}">
        <p>Tag</p>
        @php
        $tag_smartphone = '';
        $tag_laptop = '';
        $tag_pc = '';
        $tag_tablet = '';
        $tag_gaming = '';
        $tag_wearable = '';
        if($products->tag_product == "Smartphone"){$tag_smartphone = 'selected';}
        if($products->tag_product == "Laptop"){$tag_laptop = 'selected';}
        if($products->tag_product == "PC"){$tag_pc = 'selected';}
        if($products->tag_product == "Tablet"){$tag_tablet = 'selected';}
        if($products->tag_product == "Gaming"){$tag_gaming = 'selected';}
        if($products->tag_product == "Wearable"){$tag_wearable = 'selected';}
        
        @endphp
        <select class="" name="tag">
          <option value="smartphone" {{$tag_smartphone}}>Smartphone</option>
          <option value="laptop" {{$tag_laptop}}>Laptop</option>
          <option value="pc" {{$tag_pc}}>PC</option>
          <option value="tablet" {{$tag_tablet}}>Tablet</option>
          <option value="gaming" {{$tag_gaming}}>Gaming</option>
          <option value="wearable" {{$tag_wearable}}>Wearable</option>
        </select>
        <textarea name="deskripsi" placeholder="Deskripsi">{{$products->deskripsi_product}}</textarea>
        <input type="file" name="image" value="{{$products->image_product}}">
        <input type="submit" name="" value="Ubah" class="form-submit button">
      </form>
    </div>
</div>
@include('admin.includes.footer')