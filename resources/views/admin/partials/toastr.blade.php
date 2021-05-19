<script src="{{ asset('vendor/toastr/options.js') }}"></script>

<script>
    @if (session('success'))
        toastr.success('{{ session('success') }}');
    @elseif (session('fail'))
        toastr.error('{{ session('fail') }}');
    @endif
</script>
