@extends('admin.layouts')
@section('title', $title ?? '')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Category/</span>
            @if ($title == 'Create Category')
                Add New Category
            @endif
        </h4>
        <div class="row">
            <!--  Layout -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label" for="basic-default-name">Category Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="basic-default-name"
                                        placeholder="Category Name" name="name"
                                        value="{{ $title == 'Edit Category' ? $category->name : '' }}" />
                                </div>
                            </div>
                            @if ($title == 'Create Category')
                                @php $images_exist = false; @endphp
                            @elseif($title == 'Edit Category')
                                @php $images_exist = true; @endphp
                            @endif
                            <div class="mb-3 row ">
                                <label for="formFileMultiple" class="form-label col-form-label col-sm-2">Image</label>
                                <div @class([
                                    'mb-3',
                                    'col-sm-10',
                                    'input-images-2' => $images_exist,
                                    'input-images-1' => !$images_exist,
                                ])>
                                    <input type="image" src="" alt="">
                                    <span id="imageWarning" class="text-danger mb-3" style="display:none">Add only 1
                                        Image</span>
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
        @if ($title == 'Edit Category')
    
            let category = @json($category);
            let preloaded = [];
            preloaded.push({
                id: category.id,
                src: category.image_path
            });
            $('.input-images-2').imageUploader({
                preloaded: preloaded,
                imagesInputName: 'images',
                preloadedInputName: 'old_photos',
                maxSize: 2 * 1024 * 1024,
                maxFiles: 1
            });
        @endif
    </script>
@endsection
