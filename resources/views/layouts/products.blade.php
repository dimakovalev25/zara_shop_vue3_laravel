<x-app-layout>
   Products
    @foreach($products as $product)
        <h4>{{$product->title}}</h4>
    @endforeach
</x-app-layout>