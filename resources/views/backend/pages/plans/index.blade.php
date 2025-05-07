@extends('backend.layouts.master')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
        <div class="d-block mb-4 mb-md-0">
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                    <li class="breadcrumb-item">
                        <a href="#">
                            <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Plans</a></li>
                    <li class="breadcrumb-item active" aria-current="page">All Plans</li>
                </ol>
            </nav>
            <h2 class="h4">All Plans</h2>
        </div>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button class="btn btn-primary mb-3" id="addPlanBtn"><svg class="icon icon-xs me-2" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg> Add Plan</button>

            {{-- <div class="btn-group ms-2 ms-lg-3">
            <button type="button" class="btn btn-sm btn-outline-gray-600">Share</button>
            <button type="button" class="btn btn-sm btn-outline-gray-600">Export</button>
        </div> --}}
        </div>
    </div>
    <div class="card card-body border-0 shadow table-wrapper table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th class="border-gray-200">#</th>
                    <th class="border-gray-200">Name</th>
                    <th class="border-gray-200">Description</th>
                    <th class="border-gray-200">Price Monthly</th>
                    <th class="border-gray-200">Price Yearly</th>
                    <th class="border-gray-200">Features</th>
                    <th class="border-gray-200">Active</th>
                    <th class="border-gray-200">Created at</th>
                    <th class="border-gray-200">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Item -->
                @foreach ($plans as $plan)
                    <tr>
                        <td class="align-middle">
                            {{ $plan->id }}
                        </td>
                        <td class="align-middle">
                            {{ $plan->name }}
                        </td>
                        <td class="align-middle">
                            {{ $plan->description }}
                        </td>
                        <td class="align-middle">
                            {{ $plan->price_monthly }}
                        </td>
                        <td class="align-middle">
                            {{ $plan->price_yearly }}
                        </td>
                        <td class="align-middle">
                            {{-- @foreach ($plan->features as $feature)
                            <li class="d-flex align-items-center mb-3">
                                <span class="lh-1">{{ $feature }}</span>
                            </li> --}}
                            {{ $plan['features'] }}
                        {{-- @endforeach --}}
                        </td>
                        <td class="align-middle">
                            <span class="badge bg-primary">{{ $plan->is_active == 1 ? 'Yes' : 'No' }}</span>
                        </td>
                        <td class="align-middle">
                            {{ $plan->created_at }}
                        </td>
                        <td class="align-middle">
                            <button class="btn btn-sm btn-primary edit-plan"
                                data-plan='@json($plan)'>Edit</button>

                            <button class="btn btn-sm btn-danger delete-plan" data-id="{{ $plan->id }}">Delete</button>
                        </td>

                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <!-- Add/Edit Plan Modal -->
    <div class="modal fade" id="planModal" tabindex="-1" aria-labelledby="planModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <form id="planForm">
                @csrf
                <input type="hidden" name="id" id="plan_id">

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="planModalLabel">Plan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body row g-3">
                        <div class="col-md-6">
                            <label>Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                            <span class="text-danger error name-error"></span>
                        </div>
                        <div class="col-md-6">
                            <label>Slug</label>
                            <input type="text" name="slug" id="slug" class="form-control">
                            <span class="text-danger error slug-error"></span>
                        </div>
                        <div class="col-md-12">
                            <label>Description</label>
                            <textarea name="description" id="description" class="form-control"></textarea>
                            <span class="text-danger error description-error"></span>
                        </div>
                        <div class="col-md-6">
                            <label>Monthly Price</label>
                            <input type="number" name="price_monthly" id="price_monthly" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Yearly Price</label>
                            <input type="number" name="price_yearly" id="price_yearly" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label>Features (comma separated)</label>
                            <input type="text" name="features" id="features" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Status</label>
                            <select name="is_active" id="is_active" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label>Price Tag</label>
                            <select name="price_tag" id="price_tag" class="form-control">
                                <option value="Free">Free</option>
                                <option value="Beliebt">Beliebt</option>
                                <option value="Premium">Premium</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save Plan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script>
        $(document).ready(function() {
            $('#addPlanBtn').click(function() {
                $('#planForm')[0].reset();
                $('.error').text('');
                $('#plan_id').val('');
                $('#planModalLabel').text('Add New Plan');
                $('#planModal').modal('show');
            });

            $('.edit-plan').click(function() {
                const plan = $(this).data('plan');
                $('#plan_id').val(plan.id);
                $('#name').val(plan.name);
                $('#slug').val(plan.slug);
                $('#description').val(plan.description);
                $('#price_monthly').val(plan.price_monthly);
                $('#price_yearly').val(plan.price_yearly);
                $('#features').val(plan.features.join(', '));
                $('#is_active').val(plan.is_active);
                $('#price_tag').val(plan.price_tag);
                $('#planModalLabel').text('Edit Plan');
                $('#planModal').modal('show');
            });

            $('#planForm').submit(function(e) {
                e.preventDefault();
                $('.error').text('');

                const id = $('#plan_id').val();
                const url = id ? `/admin/plan/${id}` : `/admin/plan`;
                const method = id ? 'PUT' : 'POST';

                console.log('Selected price_tag:', $('#price_tag').val());

                const formData = {
                    _token: $('input[name="_token"]').val(),
                    name: $('#name').val(),
                    slug: $('#slug').val(),
                    description: $('#description').val(),
                    price_monthly: $('#price_monthly').val(),
                    price_yearly: $('#price_yearly').val(),
                    is_active: $('#is_active').val(),
                    price_tag: $('#price_tag').val(),
                    features: $('#features').val().split(',').map(item => item.trim())
                };

                console.log('formdata',formData);

                $.ajax({
                    url: url,
                    type: method,
                    data: formData,
                    success: function(res) {
                        console.log('resposne:', res);
                        // $('#planModal').modal('hide');
                        // location.reload();
                    },
                    error: function(xhr) {
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            const errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, val) {
                                $(`.${key}-error`).text(val[0]);
                            });
                        } else {
                            alert('An unexpected error occurred.');
                            console.error(xhr.responseText);
                        }
                    }
                });
            });



            $('.delete-plan').click(function() {
                if (!confirm('Are you sure you want to delete this plan?')) return;
                const id = $(this).data('id');

                $.ajax({
                    url: `/admin/plans/${id}`,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function() {
                        location.reload();
                    }
                });
            });
        });
    </script>
@endsection
