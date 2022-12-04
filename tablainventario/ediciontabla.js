$( document ).ready(function() {
    $('#edicionTabla').SetEditable({
        columnsEd: "0,1,2,3,4",
        onEdit: function(columnsEd) {
            console.log(columnsEd[0].childNodes[1].innerHTML);
          var empId = columnsEd[0].childNodes[1].innerHTML;
          var empName = columnsEd[0].childNodes[3].innerHTML;
          var gender = columnsEd[0].childNodes[5].innerHTML;
          var age = columnsEd[0].childNodes[7].innerHTML;
          $.ajax({
              type: 'POST',			
              url : "acciontabla.php",	
              dataType: "json",					
              data: {id:empId, name:empName, gender:gender, age:age, action:'edit'},	
              error: function (request, error) {
            },    		
              success: function (response) {
                  if(response.status) {
                  }						
              }
          });
        },
        onBeforeDelete: function(columnsEd) {
        var empId = columnsEd[0].childNodes[1].innerHTML;
        $.ajax({
              type: 'POST',			
              url : "acciontabla.php",
              dataType: "json",					
              data: {id:empId, action:'delete'},
              error: function (request, error) {
                console.log("aaaaaaaaaaaaaaaaaaaaaaaaa");
            },              			
              success: function (response) {
                  if(response.status) {
                  }			
              }
          });
        },
      });
  });
