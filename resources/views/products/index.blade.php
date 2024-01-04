@extends('admin.layouts')
@section('content')
@section('title', $title ?? '')
@php dd($products); @endphp
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        @if (!empty($products))
            <h5 class="card-header">Products</h5>
            <div class="table-responsive text-nowrap pb-5">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Description</th>
                            <th>Price</th>
                            <th>Images</th>
                            {{-- <th>Category</th> --}}
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">

                        @foreach ($products as $product)
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $product->name }}</strong>
                                </td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $product->description }}</strong>
                                </td>
                                <td> {{ $product->price }}</td>
                                <td>
                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                        @foreach ($product->images as $image)
                                            <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                data-bs-placement="top" class="avatar avatar-xs pull-up"
                                                title="{{ $product->name }}">
                                                <img src="{{ URL::to('public/images/products/' . $image->image_path) }}"
                                                    alt="Avatar" class="rounded-circle" />
                                        @endforeach
                                        </li>
                                    </ul>
                                </td>

                                {{-- <td>
                                    @foreach ($product->categories as $category)
                                        {{ $category->name }}
                                    @endforeach
                                </td> --}}
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('product.edit', $product) }}"><i
                                                    class="bx bx-edit-alt me-1"></i>
                                                Edit</a>
                                            <a class="dropdown-item" data-bs-toggle="modal" href=""
                                                data-bs-target="#deleteModal{{ $loop->index }}"><i
                                                    class="bx bx-trash me-1"></i>
                                                Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <form action="{{ route('product.destroy', $product) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal fade " id="deleteModal{{ $loop->index }}" tabindex="-1"
                                    aria-labelledby="deleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <button type="button" class="btn-close float-end me-4 mt-2"
                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                <div class="mt-4">
                                                    Are you sure you want to delete <span class="text-danger">
                                                        "{{ $product->name }}"
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">No</button>
                                                <button type="submit" class="btn btn-primary">
                                                    Yes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endforeach
                    </tbody>
                </table>
            </div>


        @endif
    </div>
</div>
@section('script_js')
    <script></script>
@endsection
@endsection
