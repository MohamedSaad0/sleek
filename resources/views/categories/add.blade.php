    @extends('admin.layouts')
    @section('title', $title ?? '')
    @section('content')

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Category/</span> Add New Category</h4>
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
                                            placeholder="Category Name" name="name" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="CategoryDescription">Category
                                        Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="description" id="CategoryDescription" rows="3"
                                            placeholder="Category Description"></textarea>
                                    </div>
                                </div>
                                {{-- <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="price">Category Price</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="price"
                                            placeholder="Category Price" name="price" />
                                    </div>
                                </div> --}}
                                {{-- <div class="mb-3 row">
                                    <label for="exampleFormControlSelect1"
                                        class="form-label col-form-label col-sm-2">Category</label>
                                    <div class="col-sm-10">
                                        <select class="form-select select2" id="exampleFormControlSelect1"
                                            aria-label="Default select example" name="category_id">
                                            <option selected>Select Related Product Category</option>
                                            <option value="1">Clothes</option>
                                            <option value="2">Shoes</option>
                                            <option value="3">Sports</option>
                                        </select>
                                    </div>
                                </div> --}}
                                <div class="mb-3 row">
                                    <label for="formFileMultiple" class="form-label col-form-label col-sm-2">Images</label>
                                    <div class="mb-3 col-sm-10">
                                        <input class="form-control" type="file" id="formFileMultiple" name="images"
                                            multiple />
                                    </div>
                                </div>
                                {{-- <input type="hidden" value="{{$request->}}"> --}}
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
