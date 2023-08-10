@extends('admin.layouts')
@section('title', $title ?? '')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Product/</span>
            @if ($title == 'e')
                Add New Product
            @endif
        </h4>
        <div class="row">
            <!--  Layout -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="basic-default-name"
                                        placeholder="Product Name" name="name"
                                        @if ($title == 'Edit Product') value="{{ $product->name }}" @endif />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="productDescription">Product
                                    Description</label>

                                <div class="col-sm-10">
                                    <textarea class="form-control" name="description" id="productDescription" rows="3"
                                        placeholder="Product Description">
@if ($title == 'Edit Product'){{ $product->description }}@endif
</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="price">Product Price</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" id="price" placeholder="Product Price"
                                        name="price"
                                        @if ($title == 'Edit Product') value="{{ $product->price }}" @endif />
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="exampleFormControlSelect1"
                                    class="form-label col-form-label col-sm-2">Category</label>
                                <div class="col-sm-10">
                                    <select class="form-select select2 " id="exampleFormControlSelect1" multiple="multiple"
                                        aria-label="Default select example" name="category_ids[]">
                                        @if ($title == 'Edit Product' || $title == 'Add Product')
                                            @foreach ($categories as $cat)
                                                <option
                                                    @if ($title == 'Edit Product') @if (in_array($cat->id, $product->selected_categories)) selected @endif
                                                    @endif
                                                    value="{{ $cat->id }}"> {{ $cat->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            @if ($title == 'Edit Product')
                                <input type="hidden" name="prod_id" value="{{ $product->id }}">
                            @endif
                            @if ($title == 'Edit Product')
                                @php $images_exist = true; @endphp
                            @elseif($title == 'Add Product')
                                @php $images_exist = false; @endphp
                            @endif
                            <div class="mb-3 row ">
                                <label for="formFileMultiple" class="form-label col-form-label col-sm-2">Images</label>
                                <div @class([
                                    'mb-3',
                                    'col-sm-10',
                                    'input-images-2' => $images_exist,
                                    'input-images-1' => !$images_exist,
                                ])>

                                    <input type="image" src="" alt="">
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
{{-- Passing images variable from laravel to js --}}

@section('page_js')
    <script>
        @if ($title == 'Edit Product')
            let images = @json($images);
            let preloaded = [];

            for (let i = 0; i < images.length; i++) {
                preloaded.push({
                    id: images[i].id,
                    src: images[i].image_path
                });
            }
            $('.input-images-2').imageUploader({
                preloaded: preloaded,
                imagesInputName: 'images',
                preloadedInputName: 'old_photos',
                maxSize: 2 * 1024 * 1024,
                maxFiles: 10
            });
        @endif
    </script>
@endsection
