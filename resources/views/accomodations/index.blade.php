@extends('layouts.app', [
'class' => '',
'elementActive' => 'accomodation'
])

@section('content')
<div class="container-fluid mt--7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8 user-font">
                            <h3 class="mb-0">{{ __('Accomodations') }}</h3>
                        </div>
                        @if (Auth::user()->can('accomodation-create'))
                            <div class="col-4 text-right add-user">
                                <a href="{{ route('accomodation.create') }}" class="btn btn-sm btn-primary" id="add-user">{{
                                    __('Add accomodation') }}</a>
                            </div>
                        @endif
                    </div>
                </div>
                @include('notification.index')
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table id="tblUser" class="table">
                            <thead class="thead-light">
                                <tr>
                                    <th class="d-none">{{ __('ID') }}</th>
                                    <th scope="col">{{ __('Type') }}</th>
                                    <th scope="col">{{ __('Qty') }}</th>
                                    <th scope="col">{{ __('Capacity') }}</th>
                                    <th scope="col">{{ __('Price') }}</th>
                                    <th scope="col">{{ __('Status') }}</th>
                                    <th scope="col">{{ __('Creation Date') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
<script>
$(document).ready(function() {
    $('#tblUser').DataTable({
        order: [
            [0, 'asc']
        ]
    });


    $('#tblUser tbody').on('click','.btnCanDestroy',function() {
            Swal.fire({
                // title: 'Error!',
                text: 'Do you want to remove ' + $(this).val() + ' user?',
                icon: 'question',
                allowOutsideClick:false,
                confirmButtonText: 'Yes',
                showCancelButton: true,
            }).then((result) => {
                if (result.value) {
                    window.location.href = base_url + "/users/delete/" + $(this).data('id');
                    Swal.fire({
                        title: $(this).val() + ' Deleted Successfully',
                        icon: 'success',
                        allowOutsideClick:false,
                        confirmButtonText: 'Close',
                    }).then(()=>{
                        $('#tblUser').DataTable().ajax.reload();
                    });
                }
            });
        });

        $('#tblUser tbody').on('click','.btnCanVerify',function() {
            Swal.fire({
                // title: 'Error!',
                text: 'Verify ' + $(this).val() + ' user?',
                icon: 'question',
                allowOutsideClick:false,
                confirmButtonText: 'Yes',
                showCancelButton: true,
            }).then((result) => {
                if (result.value) {
                    window.location.href = base_url + "/users/verify/" + $(this).data('id');
                    Swal.fire({
                        title: $(this).val() + ' Verified Successfully',
                        icon: 'success',
                        allowOutsideClick:false,
                        confirmButtonText: 'Close',
                    }).then(()=>{
                        $('#tblUser').DataTable().ajax.reload();
                    });
                }
            });
        });

});
</script>
@endpush
