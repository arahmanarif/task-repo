@extends('layouts.admin-master')
@section('section')
    <div>
        <div class="card">
            <div class="card-header">
                {{ __('Product Ledger') }} - ({{ $product->name }})
            </div>
            <div class="card-body">
                {{-- <x-datatable :dataTable="$dataTable"></x-datatable> --}}
                <table class="table table-sm table-bordered table-data">
                    <thead>
                        <tr>
                            <td>{{ __('Date') }}</td>
                            <td>{{ __('Description') }}</td>
                            <td>{{ __('Rate') }}</td>
                            <td>{{ __('Stock In') }}</td>
                            <td>{{ __('Stock Out') }}</td>
                            <td>{{ __('Current Stock') }}</td>
                        </tr>
                    </thead>
                    <tbody></tbody>
                    <tfoot>
                        <th colspan="3" class="text-right">{{ __('Currrent Total') }} : </th>
                        <th id="total_in"></th>
                        <th id="total_out"></th>
                        <th id="current_stock"></th>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
           var orders_table = $('.table-data').DataTable({
            "processing": true,
            "serverSide": true,
            dom: "lBfrtip",
            "pageLength": parseInt("50"),
            "lengthMenu": [
                [10, 25, 50, 100, 500, 1000, -1],
                [10, 25, 50, 100, 500, 1000, "All"]
            ],
            "ajax": {
                "url": "{{ route('products.ledger', $product->id) }}",
                "data": function(d) {
                    d.from_date = $('#from_date').val();
                    d.to_date = $('#to_date').val();
                }
            },

            columns: [
                {
                    data: 'date',
                    name: 'date'
                },
                {
                    data: 'description',
                    name: 'sale.invoice',
                    className: 'fw-bold'
                },
                {
                    data: 'rate',
                    name: 'purchase.invoice',
                    className: 'fw-bold'
                },
                {
                    data: 'stock_in',
                    name: 'purchase.invoice',
                    className: 'fw-bold'
                },
                {
                    data: 'stock_out',
                    name: 'purchase.invoice',
                    className: 'fw-bold'
                },
                {
                    data: 'current_stock',
                    name: 'purchase.invoice',
                    className: 'fw-bold'
                },
            ],
            fnDrawCallback: function() {

                // var total_ordered_qty = sum_table_col($('.data_tbl'), 'total_ordered_qty');
                // $('#total_ordered_qty').text(bdFormat(total_ordered_qty));

                $('.data_preloader').hide();
            }
        });

        function calculateStock() {

            var route = "{{ route('ledger.calculate.stock', $product->id) }}";

            $.ajax({
                type: "GET",
                async:false,
                url: route,
                success: function(data) {

                    console.log(data.stock_in);
                    $('#total_in').html(data.stock_in);
                    $('#total_out').html(data.stock_out);
                    $('#current_stock').html(data.current_stock);
                }
            });
        }

        calculateStock();
    </script>
@endpush
