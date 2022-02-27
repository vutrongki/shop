<table class="table">
    <tbody>
        @foreach($products as $product)
        <tr>
            <th>{{ $product->name }}</th>
            <td><img src="{{ $product->feature_image_path}}" width="150px"></td>
        </tr>

        @endforeach
    </tbody>
</table>