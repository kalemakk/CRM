@push('styles')
    <!-- Toastr -->
    <link rel="stylesheet" href="{{asset('plugins/toastr/toastr.min.css')}}">
@endpush

@push('scripts')
    <!-- Toastr -->
    <script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>
    <!-- Page specific script -->
    <script>
        $(function () {
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            @if ($message = Session::get('success'))
                toastr.success('<strong>{{ $message }}</strong>')
            @endif

            @if ($message = Session::get('error'))
                toastr.error('<strong>{{ $message }}</strong>')
            @endif

        });
    </script>
@endpush
