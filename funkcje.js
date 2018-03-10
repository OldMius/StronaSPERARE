$('#PodsumowanieVat tr:first td').each(function(){
   var $td = $(this); 

    var colTotal = 0;
    $('#PodsumowanieVat tr:not(.Sumy)').each(function(){
        colTotal  += parseFloat($(this).children().eq($td.index()).html(),10);
    });

    $('#PodsumowanieVat tr.Sumy').children().eq($td.index()).html('Total: ' + colTotal);
});

*********************************************************

$(document).ready(function(){   
    for (i=0;i<$('#TabelaSum tr:eq(0) td').length;i++) {
       var total = 0;
        $('td.sumka:eq(' + i + ')', 'tr').each(function(i) {
           total = total + parseInt($(this).text());
        });            
        $('#TabelaSum tr:last td').eq(i).text(total);
    }

});

*********************************************************

$(document).ready(function(){
    totalRows("#TabelaSum");
});

function totalRows(tableSelector) {
    var table = $(tableSelector);
    var rows = table.find("tr");
    var val, totals = [];

    //loop through the rows getting values in the rowDataSd columns
    rows
        .each(function(rIndex) {
            if (rIndex > 0 && rIndex < (rows.length-1)) { //not first or last row
                //loop through the columns
                $(this).find("td").each(function(cIndex) {
                    val = parseInt($(this).html());
                    (totals.length>cIndex) ? totals[cIndex]+=val : totals.push(val);
                });
            }
        })
        .last().find("td").each(function(index) {
            val = (totals.length>index) ? totals[index] : 0;
            $(this).html( "Total: " + val );
        });
}
​