@extends('admin.layouts')
@section('title', $title ?? '')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Product/</span>
            @if ($title == 'e')
                Add New Product
            @endif
        </h4>
        {{-- {{dd($product)}} --}}
        {{-- {{dd($prodCat)}} --}}

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
                                        @if ($title = 'Edit Product') value="{{ $product->name }}" @endif />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="productDescription">Product
                                    Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="description" id="productDescription" rows="3"
                                        placeholder="Product Description"
                                        @if ($title == 'Edit Product') placeholder="" >{{ $product->description }} @endif</textarea>
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label class="col-sm-2 col-form-label" for="price">Product Price</label>
                                            <div class="col-sm-10">
                                                <input type="number" class="form-control" id="price"
                                                    placeholder="Product Price" name="price"
                                                    @if ($title == 'Edit Product') value="{{ $product->price }}" @endif />
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3 row">
                                            <label for="exampleFormControlSelect1"
                                                class="form-label col-form-label col-sm-2">Category</label>
                                            <div class="col-sm-10">
                                                <select class="form-select select2 " id="exampleFormControlSelect1" multiple="multiple"
                                                    aria-label="Default select example" name="category_id">
                                                    @if ($title = 'Edit Product')
                                                        @foreach ($categories as $cat)
    <option @if ($title == 'Edit Product') @if (in_array($cat->id, $product->selected_categories)) selected @endif
                                                                @endif value="{{ $cat->id }}"> {{ $cat->name }}</option>
    @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        
                                        {{-- @if ($title == 'Edit Product') --}}
                        <div class="mb-3 row ">
                                    <label for="formFileMultiple" class="form-label col-form-label col-sm-2">Images</label>
                                    <div class="mb-3 col-sm-10 input-images-2">
                                        <input type="image" src="" alt="">
                                        {{-- <input class="form-control" type="file" id="formFileMultiple" name="image_path[]" multiple --}}
                                    @foreach ($images->images as $image)
    <img src="{{ URL::to('public/images/' . $image->image_path) }} " width="50%" />
    @endforeach
                            </div>
                        </div>
                                    {{-- @endif --}}
                                    @foreach ($images->images as $image)
    </td>
    @endforeach
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

@section('page_js')
    <script>
 @foreach ($images->images as $image)

 @endforeach
        
        let images = $image;
        // console.log(images);
        let preloaded = [{
                id: 1,
                src: 'https://picsum.photos/500/500?random=1'
            },
            {
                id: 2,
                src: 'https://picsum.photos/500/500?random=2'
            },
            {
                id: 3,
                src: 'https://picsum.photos/500/500?random=3'
            },
            {
                id: 4,
                src: 'https://picsum.photos/500/500?random=4'
            },
            {
                id: 5,
                src: 'https://picsum.photos/500/500?random=5'
            },
            {
                id: 6,
                src: 'https://picsum.photos/500/500?random=6'
            },
        ];

        $('.input-images-2').imageUploader({
            preloaded: preloaded,
            imagesInputName: 'photos',
            preloadedInputName: 'old',
            maxSize: 2 * 1024 * 1024,
            maxFiles: 10
        });
    </script>
@endsection
