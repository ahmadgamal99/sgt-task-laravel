<script>
    let imagesBasePath  = "{{ asset('/storage/Images') }}";
    let currency        = " {{ __( settings()->get('currency') ) }} ";
    let locale          = "{{ getLocale() }}";
</script>
<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
<script src="{{asset('assets/plugins/custom/fslightbox/fslightbox.bundle.js')}}"></script>
<script src="{{asset('js/translations.js')}}"></script>
<script src="{{asset('js/global_scripts.js')}}"></script>
@stack('scripts')
