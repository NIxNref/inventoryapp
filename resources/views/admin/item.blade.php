@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <!-- Add Item Button -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="text-primary">Inventory Management</h2>
            <button id="addItem" class="btn btn-primary btn-lg">
                <i class="fas fa-plus"></i> Add Item
            </button>
        </div>

        <!-- DataTable -->
        <div class="table-responsive">
            <table id="itemTable" class="table table-bordered table-hover table-striped text-center"
                style="width: 100%; margin: 0 auto;">
                <thead class="thead-dark">
                    <tr>
                        <th style="width: 15%;">Product Name</th>
                        <th style="width: 10%;">Product Code</th>
                        <th style="width: 15%;">Category</th>
                        <th style="width: 10%;">Price</th>
                        <th style="width: 10%;">Stock</th>
                        <th style="width: 20%;">Description</th>
                        <th style="width: 10%;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $product)
                        <tr>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->product_code }}</td>
                            <td>{{ $product->category->category_name }}</td>
                            <td>Rp. {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->description }}</td>
                            <td>
                                <!-- Add actions such as Edit and Delete -->
                                <button class="btn btn-warning btn-sm">Edit</button>
                                <button class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection

@push('scripts')
    <!-- Include DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">

    <!-- Include Bootstrap & FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include DataTables JS -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize DataTable
            $('#itemTable').DataTable({
                responsive: true,
                paging: true,
                ordering: true,
                info: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search items...",
                },
                columnDefs: [{
                        orderable: false,
                        targets: -1
                    }, // Disable sorting on the Actions column
                ],
            });

            // Add button click handler
            $('#addItem').click(function() {
                alert('Add Item functionality to be implemented!');
            });
        });
    </script>
@endpush
