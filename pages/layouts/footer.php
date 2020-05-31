
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <footer class="footer footer-static footer-light">
        <p class="clearfix blue-grey lighten-2 mb-0"><span class="float-md-left d-block d-md-inline-block mt-25">&copy; 2020 <b>Naufal Rasyid & TB Nawaf</b>, All rights Reserved</span><span class="float-md-right d-none d-md-block">Made with<i class="feather icon-heart pink"></i></span>
            <button class="btn btn-primary btn-icon scroll-top" type="button"><i class="feather icon-arrow-up"></i></button>
        </p>
    </footer>

    <script src="assets/app-assets/vendors/js/vendors.min.js"></script>

    <script src="assets/app-assets/vendors/js/extensions/jquery.steps.min.js"></script>
    <script src="assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>

    <script src="assets/app-assets/js/core/app-menu.js"></script>
    <script src="assets/app-assets/js/core/app.js"></script>
    <script src="assets/app-assets/js/scripts/components.js"></script>

    <!-- <script src="assets/app-assets/js/scripts/pages/dashboard-ecommerce.js"></script> -->
    <script src="assets/app-assets/js/scripts/forms/wizard-steps.js"></script>

    <script src="assets/app-assets/vendors/js/pickers/pickadate/picker.js"></script>
    <script src="assets/app-assets/vendors/js/pickers/pickadate/picker.date.js"></script>
    <script src="assets/app-assets/vendors/js/pickers/pickadate/picker.time.js"></script>
    <script src="assets/app-assets/vendors/js/pickers/pickadate/legacy.js"></script>

    <script src="assets/app-assets/js/scripts/pickers/dateTime/pick-a-datetime.js"></script>

    <script>
    $(document).on("click", ".open-modal", function () {
         var skripsiId = $(this).data('id');
         $(".modal-body #skripsiId").val( skripsiId );
    });
    </script>
</body>
</html>