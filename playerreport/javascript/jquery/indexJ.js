alert('Just testing');
$(document).ready(function () {
    alert('Just testing');
        function loadReportModal() {
            id = 1;
            alert('Just testing');
            var options = {
                modal: true,
                height: 300,
                width: 500
            };

            $('#report-modal').load('./playerreport/php/report.php?id='.id,
                function () {
                    alert('Just testing');
                    $('#bootstrap-modal').modal({
                       show : true;
                    });
                });
        }

});