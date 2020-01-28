$( document ).ready(function() {
    $('#editableTable').SetEditable({
        columnsEd: "2,3,4,5,6,7,8,9,10,11,12,13,14",
        onEdit: function(columnsEd) {
            var id = columnsEd[0].childNodes[1].innerHTML;
            var usID = columnsEd[0].childNodes[3].innerHTML;
            var exp = columnsEd[0].childNodes[5].innerHTML;
            var cur = columnsEd[0].childNodes[7].innerHTML;
            var acDat = columnsEd[0].childNodes[9].innerHTML;
            var inacDat = columnsEd[0].childNodes[11].innerHTML;
            var edit = columnsEd[0].childNodes[13].innerHTML;
            $.ajax({
                type: 'POST',
                url : "action.inc.php",
                dataType: "json",
                data: {id:id, isID:usID, exp:exp, cur:cur, acDat:acDat, inacDat:inacDat, edit:edit, action:'edit'},
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
                url : "action.inc.php",
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