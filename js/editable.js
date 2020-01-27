$( document ).ready(function() {
    $('#editableTable').SetEditable({
        columnsEd: "0,1,2,3,4,5,6,7,8,9,10,11,12,13",
        onEdit: function(columnsEd) {
            var id = columnsEd[0].childNodes[1].innerHTML;
            var usName = columnsEd[0].childNodes[3].innerHTML;
            var fName = columnsEd[0].childNodes[5].innerHTML;
            var lName = columnsEd[0].childNodes[7].innerHTML;
            var DOB = columnsEd[0].childNodes[9].innerHTML;
            var address = columnsEd[0].childNodes[11].innerHTML;
            var email = columnsEd[0].childNodes[13].innerHTML;
            var admin = columnsEd[0].childNodes[15].innerHTML;
            var manager = columnsEd[0].childNodes[17].innerHTML;
            var accountant = columnsEd[0].childNodes[19].innerHTML;
            var active = columnsEd[0].childNodes[21].innerHTML;
            var suspEnd = columnsEd[0].childNodes[23].innerHTML;
            var pwdAtm = columnsEd[0].childNodes[25].innerHTML;
            $.ajax({
                type: 'POST',
                url : "action.php",
                dataType: "json",
                data: {id:id, userName:usName, fName:fName, lName:lName, DOB:DOB, address:address, email:email,
                    admin:admin, manager:manager, accountant:accountant, active:active, suspEnd:suspEnd, pwdAtm:pwdAtm, action:'edit'},
                success: function (response) {
                    if(response.status) {
                    }
                }
            });
        },
        onBeforeDelete: function(columnsEd) {
            var id = columnsEd[0].childNodes[1].innerHTML;
            $.ajax({
                type: 'POST',
                url : "action.php",
                dataType: "json",
                data: {id:id, action:'delete'},
                success: function (response) {
                    if(response.status) {
                    }
                }
            });
        },
    });
});