<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-duration-format/2.3.2/moment-duration-format.min.js" integrity="sha512-ej3mVbjyGQoZGS3JkES4ewdpjD8UBxHRGW+MN5j7lg3aGQ0k170sFCj5QJVCFghZRCio7DEmyi+8/HAwmwWWiA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    let datetimepicker = $('.datetimepicker').datetimepicker({
        format: 'DD MMMM YYYY',
        locale: 'id',
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-arrow-up",
            down: "fa fa-arrow-down",
            previous: "fa fa-chevron-left",
            next: "fa fa-chevron-right",
            today: "fa fa-clock-o",
            clear: "fa fa-trash-o"
        }
    })
</script>