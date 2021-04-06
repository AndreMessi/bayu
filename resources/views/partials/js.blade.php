<script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<script src="{{asset('assets/plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
{{--<script src="{{asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>--}}
{{--<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>--}}
{{--<script src="{{asset('assets/plugins/jszip/jszip.min.js')}}"></script>--}}
{{--<script src="{{asset('assets/plugins/pdfmake/pdfmake.min.js')}}"></script>--}}
{{--<script src="{{asset('assets/plugins/pdfmake/vfs_fonts.js')}}"></script>--}}
{{--<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>--}}
{{--<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>--}}
{{--<script src="{{asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>--}}
<script src="{{asset('assets/dist/js/adminlte.min.js')}}"></script>
<script src="{{asset('assets/plugins/filterizr/jquery.filterizr.min.js')}}"></script>
<script>
    $dtable = $('#dTable')
    $(()=>{
        $(`a[href^="${window.location.href}"]`).addClass('active-link active');
        if ($dtable.length){
            $dtable.dataTable({});
        }

        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });
    })
    const Toast = Swal.mixin({
        toast: true,
        showConfirmButton: false,
        timer: 3000
    });
    const pesan = p => {
        @if(@!auth()->user())
            return Toast.fire({
            icon: 'error',
            title: 'Harap Login Terlebih Dahulu'
        })
        @endif
        $('#pesan_jadwal_id').val(p);
        $('#modal-pesan').modal('show');
    }

</script>
@yield('js_after')
