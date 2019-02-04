@include('includes.header')
<div class="content payment-balance">
  <div class="container">
    <form class="" action="/payment/balance" method="post">
      <h1>Pembayaran</h1>
      <table>
        <tr>
          <th>Product</th>
          <th>Qty</th>
          <th>Price</th>
          <th>Total Price</th>
        </tr>
        @php $total = 0 @endphp
        @foreach($products as $product)
          <tr>
            <td>{{$product->nama_product}}</td>
            <td>{{$product->total_product}}</td>
            <td>{{$product->harga_product}}</td>
            <td>{{$totalProduct = $product->harga_product*$product->total_product}}</td>
          </tr>
          @php $total += $totalProduct @endphp
        @endforeach
      </table>
      <h3>Saldomu: Rp. {{number_format($user->saldo,2)}}</h3>
      <h3>Total Pembayaran: Rp. {{number_format($total,2)}}</h3>
      {{csrf_field()}}
      <input type="hidden" name="_method" value="post">
      @if($user->saldo < $total)
        <p class="alert">Saldomu tidak cukup</p>
        <p>Silahkan <a href="/isisaldo">Isi Saldo</a></p>
        <input type="submit" name="submitPembayaran" value="Bayar Pakai Saldo >" class="button" disabled>
        @else
        <input type="hidden" name="total" value="{{$total}}">
        <input type="submit" name="submitPembayaran" value="Bayar Pakai Saldo >" class="button">

      @endif
    </form>
  </div>
</div>
@include('includes.footer')