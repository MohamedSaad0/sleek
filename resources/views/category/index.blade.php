@extends('admin.layouts')
@section('content')
@section('title', $title ?? '')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        @if (!empty($categories))
            <h5 class="card-header">Categories</h5>
            <div class="table-responsive text-nowrap pb-5">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>Images</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($categories as $category)
                            <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                                    <strong>{{ $category->name }}</strong>
                                </td>
                                <td>
                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar avatar-xs pull-up" title="{{ $category->name }}">
                                            <img src="{{ URL::to('public/images/') . $category->images }}"
                                                alt="Avatar" class="rounded-circle" />
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('category.edit', $category) }}"><i
                                                    class="bx bx-edit-alt me-1"></i>
                                                Edit</a>
                                            <a class="dropdown-item" data-bs-toggle="modal" href=""
                                                data-bs-target="#deleteModal"><i class="bx bx-trash me-1"></i>
                                                Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal fade " id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                            <button type="button" class="btn-close float-end me-4 mt-2" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                            <div class="mt-4">
                                Are you sure you want to delete <span class="text-danger"> "{{ $category->name }}"
                                </span>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                            <button type="button" class="btn btn-primary"> <a
                                    href="{{ route('category.destroy', $category) }}"
                                    class="text-white">Yes</a></button>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
@section('script_js')
    <script></script>
@endsection
@endsection
