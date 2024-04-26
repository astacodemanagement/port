@push('script')
    <script src="{{ asset('vendors/cleave-js/cleave.min.js') }}"></script>
    <script src="{{ asset('vendors/cleave-js/addons/cleave-phone.id.js') }}"></script>
    <script>
        initPhoneNumber()
        initPriceFormat()
        initIDCardFormat()
        
        function initPhoneNumber(){
            $('.phone-number').toArray().forEach(function(field){
                new Cleave(field, {
                    phone: true,
                    phoneRegionCode: 'ID'
                });
            })
        }

        function initPriceFormat(){
            $('.price-format').toArray().forEach(function(field){
                new Cleave(field, {
                    numeral: true,
                    numeralThousandsGroupStyle: 'thousand'
                })
            })
        }

        function initIDCardFormat(){
            $('.id-card-format').toArray().forEach(function(field){
                new Cleave(field, {
                    numericOnly: true,
                    delimiter: '',
                    prefix: '',
                    blocks: [16]
                })
            })
        }
    </script>
@endpush
