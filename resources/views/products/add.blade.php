    @extends('admin.layouts')
    @section('title', $title ?? '')
    @section('content')

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Product/</span> Add New Product</h4>
            <!--  Basic with Icons -->
            <div class="row">
                <!--  Layout -->
                <div class="col-xxl">
                    <div class="card mb-4">
                        {{-- <div class="card-header d-flex align-items-center justify-content-between">
                            <h5 class="mb-0">Create</h5>
                            <small class="text-muted float-end">Default label</small>
                        </div> --}}
                        <div class="card-body">
                            <form>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="basic-default-name"
                                            placeholder="Product Name" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-name">Product Description</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" class="form-control" id="basic-default-name"
                                            placeholder="Product Description">
                                        </textarea>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-company">Price</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" id="basic-default-company"
                                            placeholder="ACME Inc." />
                                    </div>
                                </div>
                              

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label" for="basic-default-message">Message</label>
                                    <div class="col-sm-10">
                                        <textarea id="basic-default-message" class="form-control"  
                                            aria-label="Hi, Do you have a moment to talk Joe?" aria-describedby="basic-icon-default-message2"></textarea>
                                    </div>
                                </div>
                                <div class="row justify-content-end">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
